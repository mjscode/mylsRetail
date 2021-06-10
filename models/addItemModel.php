<?php
    include '../utils/db.php';
    //requires a seprate session start as this is not on the index page. With a new session it will recieve the sessions from the front-end.
    session_start();
    $string=''; //string will be used to catch errors.
    if($_SESSION['admin']){//ensures proper authoriztion.

        if( isset($_POST['name'])&& isset($_POST['unit'])
            && isset($_POST['price']) && isset($_POST['stock'] )
            && isset($_POST['category'])){
                $name=$_POST['name'];
                $unit=$_POST['unit'];
                $price=$_POST['price'];
                $stock=$_POST['stock'];
                if($stock==' '){
                    $stock=0;
                }
                $category=$_POST['category'];
        try {

            $query = "INSERT INTO `items`(`categoryId`, `name`, 
            `amount`,`unit`, `price`)
             VALUES (:category,:itemName,:stock,:unit,:price)";
            $statement = Db::getDb()->prepare($query);
            $statement->bindValue('category',$category);
            $statement->bindValue('itemName',$name);
            $statement->bindValue('stock',$stock);
            $statement->bindValue('unit',$unit);
            $statement->bindValue('price',$price);
            $rowAdded=$statement->execute();
            if(!$rowAdded){
                $string='insertion failed';
            }
            $statement->closeCursor();

        } catch (PDOException $e) {
            $string = "Something went wrong " . $e->getMessage();
        }
    }else{
        $string="All proper info required.";
    }
    }else{
        $string="Denied! Unauthorized access.";
    }
    if(!empty($string)){ //if any errors it will fail and send message to front-end.
        http_response_code(500);
        exit("Unable to add item, ".$string);
    };


?>   
