<?php   
    include 'utils/verification.php';// will ensure user is signed in.
    $userName=$_SESSION['username'];
    //default values.
    if($_SESSION['admin']){
        $status='Administrator';
        $admin=true;
    }else{
        $status='User';
        $admin=false;
    }
    if(!empty($_SESSION['name'])){
        $name=$_SESSION['name'];
    }else{
        $name='(Not Listed)';
    }
    if(!empty($_SESSION['email'])){
        $email=$_SESSION['email'];
    }else{
        $email='(Not Listed)';
    }
        
    if($admin){
        //only include model if an admin.
        include 'models/profileModel.php';
    }
  
    include 'views/profileView.php';
    //
?>
