<?php
include 'utils/db.php';
include 'utils/usersClass.php';

if($_SESSION['logged']){
    $userName=$_SESSION['username'];
    $users=[];
try {
    //gets all users besides for client as his information is already stored in the session.
    $query = "SELECT username,name,email,admin FROM users where username <> '". $userName."'";
    $statement = Db::getDb()->prepare($query);
    $statement->execute();
    $usersArray= $statement->fetchAll();
    foreach($usersArray as $userArray){
        $user=new User($userArray);
        $users[]=$user;
    }
    $statement->closeCursor();
} catch (PDOException $e) {
    $errors[] = "Something went wrong " . $e->getMessage();
}
}
?>