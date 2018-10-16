<?php
require_once './BL/productBL.php';
function FillingProductName($size, $cat){
    $row = productBL::ReadByCat($size, $cat);
    $proName = $row['name'];
    return $proName;
}

function FillingProductDescription($size, $cat){
    $row = productBL::ReadByCat($size, $cat);
    $proDescription = $row['description'];
    return $proDescription;
}

function FillingProductPrice($size, $cat){
    $row = productBL::ReadByCat($size, $cat);
    $proPrice = $row['price'];
    return $proPrice;
}

function FillingProductId($size, $cat){
    $row = productBL::ReadByCat($size, $cat);
    $proId = $row['id'];
    return $proId;
}

function showProducts($cat){
    $size = productBL::SizeOfCat($cat);
    while ($size != 0){
        $Proname = FillingProductName($size, $cat); 
        $Prodescription = FillingProductDescription($size, $cat);
        $Proprice = FillingProductPrice($size, $cat);
        $Proid = FillingProductId($size, $cat);
        --$size;
        require './PL/productsPage/showProducts.php';
    }
}

if (isset($_POST['addToCart'])){
    session_start();
    $pdt = htmlspecialchars($_POST['ProductIdTb']);
    
    if (isset($_SESSION['logged_user'])){
        echo $_SESSION['logged_user'];
    }else{
        header("Location:http://localhost/ClassMade/index.php?page=login&pdt=" . $pdt);
    }
}
    