<?php
require_once './DAL/shipping_orderCRUD.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of shipping_order
 *
 * @author L
 */
class shipping_orderBL {
    //put your code here
    public $client_id;
    public $staff_id;
    public $final_cost;
    public $shipping_status;
    public $payment_status;
    public $tracking_number;
    public $return_cost;
    public $comment_label;
    
    public function SizeOfUsr($usr){
        try{
            $size = shipping_orderCRUD::SizeOfUsr($usr);
            return $size; 
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
    
    public function SizeOfStaff($usr){
        try{
            $size = shipping_orderCRUD::SizeOfStaff($usr);
            return $size; 
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
    
    public function Create($client_id, $staff_id, $final_cost, $shipping_status, $payment_status, $tracking_number, $return_cost, $comment_label){
        
            $create = new self();
        
            $create->client_id = $client_id;
            $create->staff_id = $staff_id;
            $create->final_cost = $final_cost;
            $create->shipping_status = $shipping_status;
            $create->payment_status = $payment_status;
            $create->tracking_number = $tracking_number;
            $create->return_cost = $return_cost;
            $create->comment_label = $comment_label;
        
            shipping_orderCRUD::Create($create);
        
    }
    
    public function Read(){
        try {
            shipping_orderCRUD::Read();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
    
    public function ReadByUsr($howmany, $usr){
        try {
            $row = shipping_orderCRUD::ReadByUsr($howmany, $usr);
            return $row;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
    
    public function ReadByStaff($howmany, $usr){
        try {
            $row = shipping_orderCRUD::ReadByStaff($howmany, $usr);
            return $row;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
    
    public function Update($id, $client_id, $staff_id, $final_cost, $shipping_status, $payment_status, $tracking_number, $return_cost, $comment_label){
        try {
            
            $update = new self();//создаем update
            $update->id = $id;
            $update->client_id = $client_id;
            $update->staff_id = $staff_id;
            $update->final_cost = $final_cost;
            $update->shipping_status = $shipping_status;
            $update->payment_status = $payment_status;
            $update->tracking_number = $tracking_number;
            $update->return_cost = $return_cost;
            $update->comment_label = $comment_label;
            
            shipping_orderCRUD::Update($update);//отправляем этот сформированный update в CRUD
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }        
    }
    
    public function Delete($id){
        try {
            
            $delete = new self();
            $delete->id = $id;
            
            shipping_orderCRUD::Delete($delete);
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
}
