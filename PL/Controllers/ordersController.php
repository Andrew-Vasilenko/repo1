<?php
session_start();
require_once './BL/shipping_orderBL.php';

function FillingShipping_orderId($size, $usr){
    $row = shipping_orderBL::ReadByUsr($size, $usr);
    $shipping_orderId = $row['id'];
    return $shipping_orderId;
}

function FillingShipping_orderStaff_id($size, $usr){
    $row = shipping_orderBL::ReadByUsr($size, $usr);
    $shipping_orderStaff_id = $row['staff_id'];
    return $shipping_orderStaff_id;
}

function FillingShipping_orderFinal_cost($size, $usr){
    $row = shipping_orderBL::ReadByUsr($size, $usr);
    $shipping_orderFinal_cost = $row['final_cost'];
    return $shipping_orderFinal_cost;
}

function FillingShipping_orderShipping_status($size, $usr){
    $row = shipping_orderBL::ReadByUsr($size, $usr);
    $shipping_orderShipping_status = $row['shipping_status'];
    return $shipping_orderShipping_status;
}

function FillingShipping_orderPayment_status($size, $usr){
    $row = shipping_orderBL::ReadByUsr($size, $usr);
    $shipping_orderPayment_status = $row['payment_status'];
    return $shipping_orderPayment_status;
}

function FillingShipping_orderTracking_number($size, $usr){
    $row = shipping_orderBL::ReadByUsr($size, $usr);
    $shipping_orderTracking_number = $row['tracking_number'];
    return $shipping_orderTracking_number;
}

function FillingShipping_orderReturn_cost($size, $usr){
    $row = shipping_orderBL::ReadByUsr($size, $usr);
    $shipping_orderReturn_costs = $row['return_cost'];
    return $shipping_orderReturn_costs;
}

function FillingShipping_orderComment_label($size, $usr){
    $row = shipping_orderBL::ReadByUsr($size, $usr);
    $shipping_orderComment_label = $row['comment_label'];
    return $shipping_orderComment_label;
}

function showOrders($usr){
    $size = shipping_orderBL::SizeOfUsr($usr);
    while ($size != 0){
        $Shipid = FillingShipping_orderId($size, $usr);
        $Shipstaff_id = FillingShipping_orderStaff_id($size, $usr);
        $Shipfinal_cost = FillingShipping_orderFinal_cost($size, $usr);
        $Shipshipping_status = FillingShipping_orderShipping_status($size, $usr);
        $Shippayment_status = FillingShipping_orderPayment_status($size, $usr);
        $Shiptracking_number = FillingShipping_orderTracking_number($size, $usr);
        $Shipreturn_cost = FillingShipping_orderReturn_cost($size, $usr);
        $Shipcomment_label = FillingShipping_orderComment_label($size, $usr);
        --$size;
        require './PL/orders/showOrders.php';
    }
}

if (isset($_POST['deleteOrder'])){
    $id = $_POST['idTB'];
    shipping_orderBL::Delete($id);
}