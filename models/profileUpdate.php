<?php
    include 'utils/db.php';
    $string='';
    if($_SESSION['logged']){
        //gets the json object and turn it into a php array.
        $json = file_get_contents("php://input"); 

        $update = json_decode($json,true);

        if(!empty($update['userName'])){//the id of the client.
            $userName=$update['userName'];
            $queryString='';
            //checks which values were added and then builds a query string.
             if(!empty($update['name'])){
                 $queryString.="name=:name ";
                 $name=$update['name'];
                 
                 if(sizeof($update)>2){
                     $queryString.=", ";
                 }
             }
             if(!empty($update['email'])){
                 $queryString.="email=:email";
                 $email=$update['email'];
             }
             try {

                $query = "update users set ".$queryString." where username=:username";
                $statement = Db::getDb()->prepare($query);
                if(!empty($name)){
                    $statement->bindValue('name',$name);
                }
                if(!empty($email)){
                    $statement->bindValue('email',$email);
                }
                $statement->bindValue('username',$userName);
                $success=$statement->execute();
                if($success){
                    if(!empty($name)){
                        $_SESSION['name']=$name;
                    }
                    if(!empty($email)){
                        $_SESSION['email']=$email;
                    }
                }
                $statement->closeCursor();
            } catch (PDOException $e) {
                $string = "Something went wrong " . $e->getMessage();
            }


        }else{
            $string="require vaild user name";
        }

    }else{
        $string="Denied! Unauthorized access.";
    }
    if(!empty($string)){
        http_response_code(500);
        exit("Unable to update user profile, ".$string);
    };

?>