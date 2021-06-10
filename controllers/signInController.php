<?php
    //checks if form was submitted otherwise goes staight to signin page.
    if(isset($_POST['logIn']) || isset($_POST['register'])){
        //if person signed in...
        if (isset($_POST['logIn'])){
            //makes sure proper data was entered otherwise an error will be displayed.
            if(!empty($_POST['username']) && !empty($_POST['userPassword'])){
            
                $userName=$_POST['username'];
                $userPass=$_POST['userPassword'];
                //query will be sent to database.
                include 'models/signInModel.php';    
            
            } else{
                $error="in order to login you need to enter both fields";
            }
        }else{//if person registered...
            include 'registerController.php';
        }
    }
    //if no form was submitted proceed to page.
    include 'views/signInView.php';
    ?>