<?php
    $styles="
    .formHeader{border-bottom:1px solid black; margin-bottom: 3%}
    #signInForm{padding:2% 0% 0% 0%; margin-bottom:5%;}
    #registerForm{margin-top:5%;}
    ";
include 'top.php';
?>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div id="signInForm" class="well">
            <form  class="form-horizontal" method="post" action="signin">
                <div class="form-group">
                    <label class="control-label col-sm-2">User Name: </label>
                    <div class="col-sm-3">
                        <input
                        type="text" id="username" class="form-control" name="username" 
                        placeholder="User Name" required>
                    </div>        
                    <label class="control-label col-sm-2">Password: </label>
                    <div class="col-sm-3">
                        <input type="password" class="form-control"
                        name="userPassword" placeholder="Password" required>
                    </div>
                    <div class="col-sm-2">
                        <input  type="submit"  name='logIn' value="Log In"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    if (!empty($error)):
?>  
        <div class="row">
            <div id='alertBox' class="col-sm-6 col-sm-offset-3 text-center">
                <div class="alert alert-warning">
                    <strong>Error!</strong> <?=$error?>
                    <div>
                        <button id='closeAlert'>Close</button>
                    </div>
                </div>
            </div>
        </div>
<?php 
    endif; 
?>
<div id="registerForm" class="row">
    <?php include 'register.php' ?>
    <!-- The info box, it's hidden except for the button, which triggers the box-->
    <div class="col-sm-3 col-sm-offset-0 text-center">
        <div class="alert alert-success">
            <div id='infoHeader' >
                <a> <h5>Info</h5></a>
            </div>
            <div id='info'>
                <div class="text-justify">
                    <strong>Welcome!</strong> This is is the sample log in page. You can sign in
                    as a user using name: "geo13", password: "thirtygrav".<br>
                     Or as an Administrator using "carlsons", "poncho45". <br>You can also register and include whatever information you wish 
                    (remember this is a sample website and any information you enter 
                    will be avaible to the public).
                    <br>
                </div> 
                <button id='infoButton'>Ok</button>
            </div>
        </div>
    </div>
</div>
<script src="jsFiles/logIn.js"></script>
<?php
    include 'bottom.php';
?>