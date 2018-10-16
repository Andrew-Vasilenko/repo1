<?php
require_once './DAL/categoryCRUD.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of OperationProvider
 *
 * @author L
 */
class categoryBL {
    //put your code here
    
    public $name;
    public $description;
    
    //получить апдейт айди, и параметрЫ - значениЯ того, что апдейтить. выгрузить весь рекорд с тем айди,
    //затем сравнить каждый параметр с полученными если среди полученных есть пустые - мы рекорд оставляем без изменений, если
    //если полученные - не пустые - то мы обновляем этот параметр в рекорде
    
    public function Size(){
        try{
            $size = categoryCRUD::Size();
            return $size;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
    
    public function Create($name, $description){
        
        try {
            
            $create = new self(); // category c = new categoryBL();
            
            $create->name = $name; // c.name = name;
            $create->description = $description; // c.description = description;
            
            categoryCRUD::Create($create);
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
    
    public function ReadAll(){
        try {
            shopping_cartCRUD::ReadAll();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
    
    public function Read($howmany){
        try {
            $row = categoryCRUD::Read($howmany);
            return $row;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
    
    public function Update($id, $name, $description){
        try {
            
            $update = new self();//создаем update
            
            $update->id = $id;//пихаем туда все что получили
            $update->name = $name;
            $update->description = $description;
            
            categoryCRUD::Update($update);//отправляем этот сформированный update в CRUD
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }        
    }
    
    public function Delete($id){
        try {
            
            $delete = new self();
            $delete->id = $id;
            
            categoryCRUD::Delete($delete);
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
}
