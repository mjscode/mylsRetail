<?php
    include 'utils/db.php';
    $string='';
        if(!empty($_POST['delete'])){
            $deleteId=$_POST['delete'];
        try {
            $query = "delete FROM items where id=:id";
            $statement = Db::getDb()->prepare($query);
            $statement->bindValue('id',$deleteId);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $string = "Something went wrong " . $e->getMessage();
        }
    }else{
        $string="Delete id required.";
    }
    
    if(!empty($string)){
        http_response_code(500);
        exit("Unable to delete item, ".$string);
    };
?>