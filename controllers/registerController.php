<?php
    //checks to make sure data is comming from registration form.
    if (isset($_POST['register'])){
        //ensures proper data.
        if(!empty($_POST['username']) && !empty($_POST['password']) 
        && !empty($_POST['repeat'])){

            $inputArray=$_POST;
            
            include 'models/registerModel.php';

        }else{
        $error="in order to register you need to enter all required fields";
        }
    }
    
?>