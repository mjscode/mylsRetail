<?php
    include 'utils/db.php';
    //will be used to creat objects from the items data.
    include 'utils/itemClass.php';
    //if no id was requested.
    if(empty($ids)){
        $ids=[];
    }
    //because of the limit it requires the value to be an proper integer for mysql, type casting solves that.
    function bindValues($value,$key,$statement){
        if(gettype($value)==='integer'){
            $statement->bindParam($key+1,$value,PDO::PARAM_INT);
        }else{
            $statement->bindParam($key+1,$value);
             
        }
    }
    //this is a seperate query to get a list of all categories, because of the db instance there is no unncessary connections.
    try {
        $query = "SELECT * FROM category";
        $statement = Db::getDb()->prepare($query);
        $statement->execute();
        $categories= $statement->fetchAll();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $errors[] = "Something went wrong " . $e->getMessage();
    }

    if (empty($page)) {
        $page = 0;
    }

    $numPerPage = 7;

    try {

        $query = "SELECT i.*, c.name as categoryName
        FROM items i join category c 
        on i.categoryId= c.id where ";
        //the query is built based on the requests sent...
        if(!empty($ids)) {
            //creats a string from the possible ids.
            $qm = array_fill(0, count($ids), '?');
            $in = join(",", $qm);
                    
            $query .= "(i.categoryId IN ($in)) and ";
        }
        //the array will contain the values which will be later binded to statement.
        $array=$ids;
        if(!empty($search)){
            //uses wildcards to search for an item that's close to the name, also checks the categories.
            $query.="(i.name like concat('%', ?, '%') or c.name like concat('%', ?, '%')) and ";
            $array[]=$search;
            $array[]=$search;
        }
        if(!empty($min)){
            $query.="(price >= ?) and ";
            $array[]=$min;
        }
        if(!empty($max)){
            $query.="(price <= ?) and ";
            $array[]=$max;
        }
        //in case no filter was applied.
        $query.='1 ';
        if(!empty($sort)){
            //turns the sort into valid string for query.
            $query.=" order by ".str_replace('_',' ',$sort);
            
        }
        //for the pages.
        $query.=" limit ?, ?";
        $array[]=(int)$page * ($numPerPage-1);
        $array[]=(int)$numPerPage;
        $statement = Db::getDb()->prepare($query);
        //calls the function on the array and the statement.
        array_walk($array,"bindValues",$statement);
        $statement->execute();
        $itemsArray = $statement->fetchAll();
        //will be used to check if there's any more pages to view.
        $more=false;
        //one extra to know there's at least one on the next page.
        if(count($itemsArray)===7){
            $more=true;
            array_pop($itemsArray);
        }
        
        $items=[];
        //creats objects from the item data.
        foreach($itemsArray as $itemArray){
            $item=new Item($itemArray);
            $items[]=$item;
        }
        $statement->closeCursor();
        
    } catch (PDOException $e) {
        $errors []= "Something went wrong " . $e->getMessage();
    }

?>