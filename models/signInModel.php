<?php
        include 'utils/db.php';
        //used to add login information to session.
        include 'utils/sessionBuilder.php';
            //checks for right data.
            if( !empty($userName) && !empty($userPass)){
                try {
                    //username is unique and used in place of id.
                    $query = "Select * from users where username = :username";
                    //db instance.
                    $statement = Db::getDb()->prepare($query);
                    $statement->bindValue('username', $userName);
                    $statement->execute();
                    $outputArray =$statement->fetch(PDO::FETCH_ASSOC);
                    $statement->closeCursor(); 
                    $password=$outputArray['password'];
                    //if no such user.
                    if(empty($password)){
                        $error='user name is invalid';
                    } else{
                        //the password is stored as a hash password to make it hard to guess. Requires verify to read it.
                        //here it checks the password in db against the password the client entered.
                        if(password_verify($userPass, $password)){
                            //array will be added to session password is removed as it's no longer needed.
                            unset($outputArray['password']);
                            add_to_session($outputArray);
                            //query successfull, automatically loads homepage.
                            http_response_code(302);
                            header("Location: homepage");
                        } else{
                            $error='password is invalid';
                        }
                    }
                } catch (PDOException $e) {
                        $error = "Something went wrong " . $e->getMessage();
                }
            } else{
                $error="you have not entered a valid name or password";
            };
?>