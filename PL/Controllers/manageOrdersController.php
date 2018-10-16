<?php
session_start();
require_once './BL/shipping_orderBL.php';

function FillingShipping_orderId($size, $usr){
    $row = shipping_orderBL::ReadByStaff($size, $usr);
    $shipping_orderId = $row['id'];
    return $shipping_orderId;
}

function FillingShipping_orderClient_id($size, $usr){
    $row = shipping_orderBL::ReadByStaff($size, $usr);
    $shipping_orderClient_id = $row['client_id'];
    return $shipping_orderClient_id;
}

function FillingShipping_orderFinal_cost($size, $usr){
    $row = shipping_orderBL::ReadByStaff($size, $usr);
    $shipping_orderFinal_cost = $row['final_cost'];
    return $shipping_orderFinal_cost;
}

function FillingShipping_orderShipping_status($size, $usr){
    $row = shipping_orderBL::ReadByStaff($size, $usr);
    $shipping_orderShipping_status = $row['shipping_status'];
    return $shipping_orderShipping_status;
}

function FillingShipping_orderPayment_status($size, $usr){
    $row = shipping_orderBL::ReadByStaff($size, $usr);
    $shipping_orderPayment_status = $row['payment_status'];
    return $shipping_orderPayment_status;
}

function FillingShipping_orderTracking_number($size, $usr){
    $row = shipping_orderBL::ReadByStaff($size, $usr);
    $shipping_orderTracking_number = $row['tracking_number'];
    return $shipping_orderTracking_number;
}

function FillingShipping_orderReturn_cost($size, $usr){
    $row = shipping_orderBL::ReadByStaff($size, $usr);
    $shipping_orderReturn_costs = $row['return_cost'];
    return $shipping_orderReturn_costs;
}

function FillingShipping_orderComment_label($size, $usr){
    $row = shipping_orderBL::ReadByStaff($size, $usr);
    $shipping_orderComment_label = $row['comment_label'];
    return $shipping_orderComment_label;
}

function listOrders($usr){
    $size = shipping_orderBL::SizeOfStaff($usr);
    while ($size != 0){
        $Shipid = FillingShipping_orderId($size, $usr);
        $Shipclient_id = FillingShipping_orderClient_id($size, $usr);
        $Shipfinal_cost = FillingShipping_orderFinal_cost($size, $usr);
        $Shipshipping_status = FillingShipping_orderShipping_status($size, $usr);
        $Shippayment_status = FillingShipping_orderPayment_status($size, $usr);
        $Shiptracking_number = FillingShipping_orderTracking_number($size, $usr);
        $Shipreturn_cost = FillingShipping_orderReturn_cost($size, $usr);
        $Shipcomment_label = FillingShipping_orderComment_label($size, $usr);
        --$size;
        require './PL/manageOrders/listOrders.php';
    }
}

if (isset($_POST['deleteOrder'])){
    $id = $_POST['shipId'];
    shipping_orderBL::Delete($id);
}

if (isset($_POST['change_shipping_status'])){
    
    $id = $_POST['shipId'];
    $client_id = '';
    $staff_id = '';
    $final_cost = '';
    $shipping_status = $_POST['shipping_statusTB'];
    $payment_status = '';
    $tracking_number = '';
    $return_cost = '';
    $comment_label = '';
    
    shipping_orderBL::Update($id, $client_id, $staff_id, $final_cost, $shipping_status, $payment_status, $tracking_number, $return_cost, $comment_label);
}

if (isset($_POST['change_payment_status'])){
    
    $id = $_POST['shipId'];
    $client_id = '';
    $staff_id = '';
    $final_cost = '';
    $shipping_status = '';
    $payment_status = $_POST['payment_statusTB'];
    $tracking_number = '';
    $return_cost = '';
    $comment_label = '';
    
    shipping_orderBL::Update($id, $client_id, $staff_id, $final_cost, $shipping_status, $payment_status, $tracking_number, $return_cost, $comment_label);
}

if (isset($_POST['change_tracking_number'])){
    
    $id = $_POST['shipId'];
    $client_id = '';
    $staff_id = '';
    $final_cost = '';
    $shipping_status = '';
    $payment_status = '';
    $tracking_number = $_POST['tracking_numberTB'];
    $return_cost = '';
    $comment_label = '';
    
    shipping_orderBL::Update($id, $client_id, $staff_id, $final_cost, $shipping_status, $payment_status, $tracking_number, $return_cost, $comment_label);
}

if (isset($_POST['change_comment_label'])){
    
    $id = $_POST['shipId'];
    $client_id = '';
    $staff_id = '';
    $final_cost = '';
    $shipping_status = '';
    $payment_status = '';
    $tracking_number = '';
    $return_cost = '';
    $comment_label = $_POST['comment_labelTB'];
    
    shipping_orderBL::Update($id, $client_id, $staff_id, $final_cost, $shipping_status, $payment_status, $tracking_number, $return_cost, $comment_label);
}
