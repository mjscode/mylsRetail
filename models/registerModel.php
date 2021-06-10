<?php
   include 'utils/db.php';
   //used to add register information to session.
   include 'utils/sessionBuilder.php';
    //will be used to build the query based on the post request sent.
    include 'utils/queryBuilder.php';
        //ensures all data was sent.
        if(!empty($inputArray) ){
            
            $userName=$inputArray['username'];
            $pass= $inputArray['password'];
            $repeat=$inputArray['repeat'];
            unset($inputArray['repeat']);
            unset($inputArray['register']);
            //checks if password is repeated correctly.
            if($pass===$repeat){
                //builds a query necessary because the input depends on the user.
                $queryObject=new queryBuilder($inputArray);
                $query=$queryObject->insert_query_string('users');
                
                try {
                    $statement = Db::getDb()->prepare($query);
                    $queryObject->bindValues($statement);
                    $statement->execute();
                    $statement->closeCursor();
                    //if successful..
                    add_to_session($inputArray);
                    http_response_code(302);
                    header("Location: index.php?action=homepage");

                } catch (PDOException $e) {
                    //username must be uniqe if already taken registration will fail. By looking at the error we can
                    //see what the error was and return the proper message.
                    if ($e->getCode()==23000){
                        $error="Sorry! that username '".$userName."' is already taken.";
                    }else{
                    $error = "Something went wrong " . $e->getMessage();
                    }
                }
        }else{
            $error="your passwords do not match. Please repeat the same password in order to register.";
        }
        }else{
            $error = "we need you to give a valid User Name and Password in order to registger";
        }
?>