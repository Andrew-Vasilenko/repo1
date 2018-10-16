<?php
require_once './BL/categoryBL.php';
session_start();
unset($_SESSION['logged_user']);
session_destroy();

function FillingCategoryName($size){
    $row = categoryBL::Read($size);
    $catName = $row['name'];
    return $catName;
}

function FillingCategoryDescription($size){
    $row = categoryBL::Read($size);
    $catDescription = $row['description'];
    return $catDescription;
}

function FillingCategoryId($size){
    $row = categoryBL::Read($size);
    $catId = $row['id'];
    return $catId;
}
    //теперь получим все id продуктов подходящих под эту категорию





function showCategories(){
    $size = categoryBL::Size();
    while ($size != 0){
        $Catname = FillingCategoryName($size);
        $Catdescription = FillingCategoryDescription($size);
        $Catid = FillingCategoryId($size);
        --$size;
        require 'PL/MainPage/showCategories.php';
    }
}

if (isset($_POST['catRequest'])){
    $cat = htmlspecialchars($_POST['categoryIdTb']);
    header("Location:http://localhost/ClassMade/index.php?page=productsPage&cat=" . $cat);
}









