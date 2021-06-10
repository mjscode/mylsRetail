<?php
    //takes in the the registration or sign in query.
    function add_to_session($asosArray){
        //once logged in.
        $_SESSION['logged']=true;
        $_SESSION['username']=$asosArray['username'];
        //checks if client gave a name
        if(isset($asosArray['name'])){
            $_SESSION['name']=' '.$asosArray['name'];
        }else{
            $_SESSION['name']='';
        }
        //checks if client gave an email address.
        if(isset($asosArray['email'])){
            $_SESSION['email']=$asosArray['email'];
        }else{
            $_SESSION['email']='';
        }
        //if client is signed in with admin rights he will get a session, otherwise it will go to default of the index page which was false.
        if(!empty($asosArray['admin'])){
            if($asosArray['admin']){
                $_SESSION['admin']=true;
            }
        }
    }
?>