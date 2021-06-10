<?php
    //if client selects a category it's possible for client to pick several. If only one id is sent a new array is created.
    if(! empty($_GET['categoryId'])){
        if(gettype($_GET['categoryId'])==='array'){
            $ids=$_GET['categoryId'];
        }elseif($_GET['categoryId']>0){
            $ids[]=$_GET['categoryId'];
        }
    }
    //searches for the name
    if(! empty($_GET['searchName'])){
        $search=$_GET['searchName'];
    }else{
        $search='';
    }
    //minimuim price also for search/filter
    if(! empty($_GET['minPrice'])){
        $min=$_GET['minPrice'];
    }else{
        $min='';
    }
    //maximuim price also for search/filter
    if(! empty($_GET['maxPrice'])){
        $max=$_GET['maxPrice'];
    }else{
        $max='';
    }

    //current page
    if(! empty($_GET["page"])) {
        if(!is_numeric($_GET["page"])) {
            $errors[] = "page must be a number";
        } else {
            $page = $_GET["page"];
        }
    }
    //used for sorting defualt is by category, if proper sort value is submitted than that is the sort.
    $sort='categoryId';
    if(! empty($_GET['sort'])){
        $valid=['price_desc','price_asc','categoryId','name'];
        if(in_array($_GET['sort'],$valid)){
            $sort=$_GET['sort'];
        }
    }
    $errors=[];

    include 'models/catalogModel.php';
    include 'views/catalogView.php';
?>