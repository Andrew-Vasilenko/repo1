<?php
session_start();
require_once './BL/shopping_cartBL.php';// юзер и размер
require_once './BL/productBL.php';
require_once './BL/shipping_orderBL.php';
require_once './BL/staffBL.php';

function FillingShopping_cartId($size, $usr){
    $row = shopping_cartBL::ReadByUsr($size, $usr);
    $cartId = $row['id'];
    return $cartId;
}

function FillingShopping_cartProduct_id($size, $usr){
    $row = shopping_cartBL::ReadByUsr($size, $usr);
    $cartProduct_id = $row['product_id'];
    return $cartProduct_id;
}

function FillingShopping_cartQuantity($size, $usr){
    $row = shopping_cartBL::ReadByUsr($size, $usr);
    $cartQuantity = $row['quantity'];
    return $cartQuantity;
}

function FillingShopping_cartTotal_cost($size, $usr){
    $row = shopping_cartBL::ReadByUsr($size, $usr);
    $cartTotal_cost = $row['total_cost'];
    return $cartTotal_cost;
}

function showPositions($usr){
    $size = shopping_cartBL::SizeOfUsr($usr);
    while ($size != 0){
        
        $CartId = FillingShopping_cartId($size, $usr); 
        $CartProduct_id = FillingShopping_cartProduct_id($size, $usr);
        $CartQuantity = FillingShopping_cartQuantity($size, $usr);
        $CartTotal_cost = FillingShopping_cartTotal_cost($size, $usr);
        $productName = productBL::getById($CartProduct_id)['name'];
        $productPrice = productBL::getById($CartProduct_id)['price'];
        --$size;
        require './PL/cart/showPositions.php';
    }
}

if (isset($_POST['changeQuantity'])){
    
    $quantity = $_POST['quantityTB'];
    $id = $_POST['idTB'];
    $client_id = '';
    $product_id = '';
    $total_cost = $_POST['priceTB'] * $quantity;
    
    shopping_cartBL::Update($id, $client_id, $product_id, $quantity, $total_cost);
}

if (isset($_POST['deleteCart'])){
    $id = $_POST['idTB'];
    shopping_cartBL::Delete($id); 
}
    
if (isset($_POST['placeOrder'])){
    $client_id = $_SESSION['logged_user'];

    $staff_id = staffBL::Random()['id'];
    $final_cost = 0;
    $shipping_status = 'forming (not shipped yet)';
    $payment_status = 'awaiting of confirmation from the seller';
    $tracking_number = NULL;
    $comment_label = NULL;

    $size = shopping_cartBL::SizeOfUsr($client_id);

    while($size != 0){
        $row = shopping_cartBL::ReadByUsr($size, $client_id);
        $final_cost = $final_cost + $row['total_cost'];
        --$size;
    }
    
    if ($final_cost > 0){
        $return_cost = ($final_cost / 100) * 15;

        shipping_orderBL::Create($client_id, $staff_id, $final_cost, $shipping_status, $payment_status, $tracking_number, $return_cost, $comment_label);

        shopping_cartBL::DeleteByClient($client_id);
    } else {
        print_r('Your shopping cart is empty, put some products first, then press the button');
    } 
}