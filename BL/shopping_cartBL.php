<?php
require_once './DAL/shopping_cartCRUD.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of shopping_cart
 *
 * @author L
 */
class shopping_cartBL {
    //put your code here
    public $client_id;
    public $product_id;
    public $quantity;
    public $total_cost;
    
    public function Create($client_id, $product_id, $quantity, $total_cost){
        $create = new self();
        
        $create->client_id = $client_id;
        $create->product_id = $product_id;
        $create->quantity = $quantity;
        $create->total_cost = $total_cost;
        
        shopping_cartCRUD::Create($create);
    }
    
    public function Read(){
        try {
            shopping_cartCRUD::Read();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
    
    public function SizeOfUsr($usr){
        try{
            $size = shopping_cartCRUD::SizeOfUsr($usr);
            return $size; 
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
    
    public function ReadByUsr($howmany, $usr){
        try {
            $row = shopping_cartCRUD::ReadByUsr($howmany, $usr);
            return $row;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
    
    public function Update($id, $client_id, $product_id, $quantity, $total_cost){
        try {
            
            $update = new self();//создаем update
            
            $update->id = $id;//пихаем туда все что получили
            $update->client_id = $client_id;
            $update->product_id = $product_id;
            $update->quantity = $quantity;
            $update->total_cost = $total_cost;
            
            shopping_cartCRUD::Update($update);//отправляем этот сформированный update в CRUD
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }        
    }
    
    public function Delete($id){
        try {
            
            $delete = new self();
            $delete->id = $id;
            
            shopping_cartCRUD::Delete($delete);
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
    
    public function DeleteByClient($client_id){
        try {
            $delete = new self();
            $delete->client_id = $client_id;
            
            shopping_cartCRUD::DeleteByClient($delete);
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
}
