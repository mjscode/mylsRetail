<?php
     //styles will be used for homepage only
    $styles = "
        .category img {
            width: 206px;
            height: 150px;
        }
        .category{
            padding-bottom:2%;
        }
        header{
            border-bottom:black solid 2px;
            margin-bottom:2%;
        }
        .row{
            padding-bottom:2%
        }
        #creditsBody{
            display:none;
        }
        #alertBox{
            display:none;
        }
    ";
    include 'top.php';
    //checks if client is logged in and then checks if he has given a name.
    if($_SESSION["logged"]){
        $name=$_SESSION['name'];
    }else{
        $name='';
    }
    //this modal displays info about the site it is displayed when page is first opened. It can be displayed later.
    include 'modals/homeModal.php';
?>
<header class='row text-center'>
    <div id="mainHeader" class="col-sm-10">
        <h3 ><strong>Welcome<?= $name?>!</strong></h3>
        <h4>Check out our Inventory! Click a category below to view a selection,
        or to view all.</h4>
    </div>
            <div class="col-sm-2">
            <!--the button for the modal -->
                <button class="btn btn-primary btn-lg" id="infoB">Info</button>
            </div>
</header>
<?php
    //will display errors from the query, else will be invisible.
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
<div class="row text-center">

            <div class="col-sm-10">
                <div class="row">
                <?php 
                $i = 0;
                //goes through the array of category objects (including general).
                foreach($categories as $category) :
                ?>
                    <!--link will go to catalog page using this id to get items from the category. -->
                    <a href="catalog?categoryId=<?= $category->get('id') ?>">
                        <div class="col-md-3 col-sm-4 category">
                            <figure>
                                <img src="images/<?= $category->get('picture') ?>" alt="picture of the category"/>
                            </figure>
                            <figcaption class="text-center">
                                <h4 id="caption"><?=$category->get('name')?></h4>
                                <hr>
                                <p>Number of Items: <?= $category->get('selection') ?></p>
                                <p>Example:<?=$category->get('example') ?></p>
                                <h5>Most Expansive Item: $<?= $category->get('expansive') ?> Cheapest Item: $<?=$category->get('cheapest') ?></h5>
                            </figcaption>
                        </div>
                    </a>
                    <?php
                    //ensures that rows will contain 3 or 4 categories prevents several being pushed out.
                    if (++$i % 3 === 0) {
                        echo '<div class="clearfix visible-sm-block"></div>';
                    }
                    if ($i % 4 === 0) {
                            echo '<div class="clearfix visible-md-block visible-lg-block"></div>';
                    };
                endforeach;
                    ?>
            </div>
            </div>
                    
            </div>
            <!--this panel displays links for the photographers that took the pictures -->
            <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
            <div class="panel panel-default ">
            <div id="creditsHeading" class="panel-heading">
                <h4> Like these Photos?</h4>
            </div>
                <div id="creditsBody" class="panel-body text-center">The photos were downloaded from the website 
                <a href="https://unsplash.com">unsplash.com</a> they were taken by the following Photographers
                 (click on one to view their website):
                 <hr>
                  <?php include 'credits.php' ?>
                  <button id="creditsClose">Close</button>
                  </div>
             </div>
            </div> 
            </div>
            <!-- the js file for this page -->
            <script src="jsFiles/sidebar.js"></script>
<?php
//link to main portfollio.
include 'bottom.php';
?>