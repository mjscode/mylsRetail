<?php

    $styles="
    #profileHeading{border-bottom:1px solid hsla(18, 32%, 45%, 1);}
    #profileHead{ margin-bottom: 3%}
    #profileBox{margin-top: 3%;}
    hr{border-top: 1px solid hsla(18, 32%, 45%, 1);}
    #profileRow{margin-bottom:10%;}
    #usersRow{margin-top:10%;}
    ";
    if(empty($errors)){
        $styles.="    #alertRow{display:none;}";
    }
 include 'views/top.php'; 
?>
<div id="alertRow" class="row">
    <div id='alertBox' class="col-sm-6 col-sm-offset-3 text-center"> 
        <div class="alert alert-warning">
            <div id="alerts">
            <?php
                if (!empty($errors)):
                    foreach($errors as $error):
            ?> 
                    <div><strong>Error!</strong> <?=$error?></div>
                        <?php 
                            endforeach;
                            endif;
                         ?>
            </div>
            <div>
                <button id='closeAlert'>Close</button>
            </div>
        </div>
    </div>
</div>
<div id="profileRow" class="row">
    <div class="col-sm-9 col-sm-offset-2">
        <div id= "profileBox" class="well">
            <div class="row text-center" id = "profileHead">
                <h3 ><strong id="profileHeading">Your Profile</strong></h3>
            </div>
            <div id="profileInfo" class="row text-center">
                <div class="col-sm-3 ">
                User Name: <span id='userName'><?= $userName ?></span>
                </div>
                <div class="col-sm-3 ">
                Name: <span id='nameSlot'><?= $name ?></span>
                </div>
                <div class="col-sm-3 ">
                Email: <span id='emailSlot'><?= $email ?></span>
                </div>
                <div class="col-sm-3 ">
                Authorization: <?= $status ?>
                </div>
            </div>
            <hr>
            <div class="row text-center">
                <p>Update your name and email here:
            </div>
            <div class="row">
            <form  class="form-horizontal" id="profileForm">
                <div class="form-group">
                    <label class="control-label col-sm-2">Your Name: </label>
                    <div class="col-sm-3">
                        <input
                        type="text" id="nameInput"
                         value = "<?= $name ?>">
                    </div>
                    <label class="control-label col-sm-2">Email: </label>
                    <div class="col-sm-3">
                        <input type="text"
                        id="emailInput"  value= "<?= $email ?>">
                    </div>
                    <div class="col-sm-2">
                        <input  type="submit" id="update" value="Update"/>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<?php if($admin): include "modals/upgradeModal.php"; ?><!-- if client is a admin include the following page -->
<hr>
    <div id="usersRow" class= "row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="panel panel-primary">
                <div id="userListHeading" class="panel-heading">
                    <h4>Below is a list of all users and their info:</h4>
                </div>
                <div id="userListBody" class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>User Name:</th>
                                <th>Name:</th>
                                <th>Email:</th>
                                <th>Authorization</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user) :?>
                                <tr class="user">
                                    <td class="username"><?= $user->get('username') ?></td>
                                    <td ><?= $user->get('name') ?></td>
                                    <td ><?= $user->get('email') ?></td>
                                    <td class="status">
                                        <?php 
                                            //if admin displays admin, if user displays a button to upgrade.
                                            if($user->get('admin')){
                                                echo "Administrator";
                                            }else{
                                                echo "<button class='upgrade'>Upgrade to Admin</button>";
                                            } ?>
                                            </td>
                                </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src='jsFiles/usersUpdate.js'></script>";
<?php endif ?>
<script src="jsFiles/profileUpdate.js"></script>
<script src="jsFiles/profile.js"></script>
<?php include "bottom.php"; ?>