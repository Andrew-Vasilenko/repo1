<?php
require_once './DAL/clientCRUD.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clientBL
 *
 * @author L
 */
class clientBL {
    //put your code here
    public $email;
    public $password;
    public $phone;
    public $shipping_address;
    
    public function Create($email, $password, $phone, $shipping_address){
        $create = new self();
        
        $create->email = $email;
        $create->password = $password;
        $create->phone = $phone;
        $create->shipping_address = $shipping_address;
        
        clientCRUD::Create($create);
    }
    
    public function ReadById($id){
        $row = clientCRUD::ReadById($id);
        return $row;
    }
    
    public function Read(){
        try {
            clientCRUD::Read();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
    
    public function Login($login, $password){
        try {
            $row = clientCRUD::Login($login, $password);
            return $row;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
    
    public function Update($id, $email, $password, $phone, $shipping_address){
        try {
            
            $update = new self();//создаем update
            
            $update->id = $id;//пихаем туда все что получили
            $update->email = $email;
            $update->password = $password;
            $update->phone = $phone;
            $update->shipping_address = $shipping_address;
            
            clientCRUD::Update($update);//отправляем этот сформированный update в CRUD
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }        
    }
    
    public function Delete($id){
        try {
            
            $delete = new self();
            $delete->id = $id;
            
            clientCRUD::Delete($delete);
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
}
