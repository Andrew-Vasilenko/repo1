<?php
require_once './DAL/staffCRUD.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of staffBL
 *
 * @author L
 */
class staffBL {
    //put your code here
    public $name;
    public $phone;
    public $login;
    public $password;
    
    public function Create($name, $phone, $login, $password){
        $create = new self();
        
        $create->name = $name;
        $create->phone = $phone;
        $create->login = $login;
        $create->password = $password;
        
        staffCRUD::Create($create);
    }
    
    public function Login($login, $password){
        try {
            $row = staffCRUD::Login($login, $password);
            return $row;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
    
    public function Random(){
        $row = staffCRUD::Random();
        return $row;
    }
    
    public function Read(){
        try {
            staffCRUD::Read();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
    
    public function Update($id, $name, $phone, $login, $password){
        try {
            
            $update = new self();//создаем update
            
            $update->id = $id;//пихаем туда все что получили
            $update->name = $name;
            $update->phone = $phone;
            $update->login = $login;
            $update->password = $password;
            
            staffCRUD::Update($update);//отправляем этот сформированный update в CRUD
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }        
    }
    
    public function Delete($id){
        try {
            
            $delete = new self();
            $delete->id = $id;
            
            staffCRUD::Delete($delete);
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
}
//check
