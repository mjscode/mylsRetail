<?php
    include 'utils/db.php';
    $string='';
    
    if($_SESSION['admin']){
        if(isset($_POST['username'])){//the id of the user to be upgraded.
            $username=$_POST['username'];

            try{
                $query="update users set admin=true where username=:username";
                $statement = Db::getDb()->prepare($query);
                $statement->bindValue('username',$username);
                $statement->execute();
                $statement->closeCursor();
            } catch (PDOException $e) {
                $string = "Something went wrong " . $e->getMessage();
            }
        }else{
            $string="valid username required.";
        }
    }
    else{
        $string="Denied! Unauthorized access.";
    }
    if(!empty($string)){
        http_response_code(500);
        exit("Unable to update user profile, ".$string);
    };
?>