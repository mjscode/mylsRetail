<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MYL's Sample Site</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="icon" href="images/favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body {
            padding-top: 70px;
        }
        #info{
            display:none;
        }
        #bottom{
            margin-top: 10%;
        }

        .jumbotron{
            background-color:#4faf54;
        }
        #userN{
            color:orange;
        }
        #status{
            color:red;
        }
        

        <?php if (!empty($styles)) echo $styles ?>
    </style>
</head>

<body>
    <!-- a navbar at the top of the page, on device with a small resolution it will appear as a collapsed menu.-->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
            <!-- button for small resolution get's the links from id later -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            </div>
            <!-- the main navbar -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?= getLink('homepage',[]) ?>">Home</a></li>
                <li><a href="<?= getLink('catalog',[]) ?>">Catalog</a></li>
                <!-- checks if logged in -->
                <?php if(!empty($_SESSION["logged"])):?>
                    <li><a href="<?= getLink('logout',[]) ?>">Log Out</a></li>
                <?php else:?>
                    <li><a href="<?= getLink('signin',[]) ?>">Log in</a></li>
                <?php endif ?>
                <!-- only allows access to profile page if registered. -->
                <?php if(!empty($_SESSION["logged"])):?>
                <li><a href="<?= getLink('profile',[]) ?>">Profile</a></li>
                <?php endif ?>
                 <li>
                	<a href="https://github.com/mjscode/PcsClass/tree/master/myPortfolio"><span class="glyphicon glyphicon-cog"></span> View Source Code</a>
            	</li>
            </ul>
            <!-- inludes data about the user -->
            <?php include 'label.php'; ?>
            </div>
        </div>
        </nav>
    <div class="container">
        <div class="jumbotron">
            <div class="container text-center">
                <h1>MYL's Retail</h1>
                <h2>A sample store site from MYL's</h2>
            </div>
        </div>