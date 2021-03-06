<?php
    include 'utils/db.php';
    $string='';
        if(isset($_POST['updateId']) && isset($_POST['unit'])
            && isset($_POST['price']) && isset($_POST['stock'])){
                $updateId=$_POST['updateId'];
                $unit=$_POST['unit'];
                $price=$_POST['price'];
                $stock=$_POST['stock'];
        try {

            $query = "update items set unit=:unit, price=:price, amount=:stock where id=:id";
            $statement = Db::getDb()->prepare($query);
            $statement->bindValue('id',$updateId);
            $statement->bindValue('unit',$unit);
            $statement->bindValue('price',$price);
            $statement->bindValue('stock',$stock);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $string = "Something went wrong " . $e->getMessage();
        }
    }else{
        $string="All information must be entered.";
    }
    if(!empty($string)){
        http_response_code(500);
        exit("Unable to update item, ".$string);
    };

?>   
?>