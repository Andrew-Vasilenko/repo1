<?php

require_once './DAL/productCRUD.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of productBL
 *
 * @author L
 */
class productBL {
    //put your code here
    
    public $name;
    public $description;
    public $price;
    public $category_id;
    
    public function Create($name, $description, $price, $category_id){
        $create = new self();
        
        $create->name = $name;
        $create->description = $description;
        $create->price = $price;
        $create->category_id = $category_id;
        
        productCRUD::Create($create);
    }
    
    public function getById($id){
        try {
            $row = productCRUD::getById($id);
            return $row;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
    
    public function Size(){
        try{
            $size = productCRUD::Size();
            return $size;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
    
    public function SizeOfCat($cat){
        try{
            $size = productCRUD::SizeOfCat($cat);
            return $size; 
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
    
    public function ReadByCat($howmany, $cat){
        try {
            $row = productCRUD::ReadByCat($howmany, $cat);
            return $row;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
    
    public function SelectById($pdt){
        try {
            $row = productCRUD::SelectById($pdt);
            return $row;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
    
    public function Update($id, $name, $description, $price, $category_id){
        try {
            
            $update = new self();//создаем update
            
            $update->id = $id;//пихаем туда все что получили
            $update->name = $name;
            $update->description = $description;
            $update->price = $price;
            $update->category_id = $category_id;
            
            productCRUD::Update($update);//отправляем этот сформированный update в CRUD
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }        
    }
    
    public function Delete($id){
        try {
            
            $delete = new self();
            $delete->id = $id;
            
            productCRUD::Delete($delete);
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
    
}
