<?php
require_once './DAL/DBconnector.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of productCRUD
 *
 * @author L
 */
class productCRUD {
    //put your code here
    
    public function getById($id){
        try {
            $db = DBconnector::Connect();
            $query = 'SELECT * FROM product WHERE id=' . $id;
            foreach ($db->query($query)as $row){
                return $row;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
        $db = null;  
    }
    
    public function Size(){
        try{
            $size = 0;
            $db = DBconnector::Connect();
            $query = 'SELECT * FROM product';
           foreach ($db->query($query)as $row){
                    if (isset($row['id'])){
                        $size = $size + 1;
                    }
                }
                return $size;
            } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
        $db = null;  
    }
    
    public function SizeOfCat($cat){
        try{
           $size = 0;
           $db = DBconnector::Connect();
           $query = 'SELECT * FROM product WHERE category_id=' . $cat;
           foreach ($db->query($query)as $row){
                    if (isset($row['id'])){
                        $size = $size + 1;
                    }
                }
                return $size;
            } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
        $db = null;  
    }
    
    public function ReadByCat($howmany, $cat){
        try {
            $size = productCRUD::SizeofCat($cat);//колво записей в таблице
            $db = DBconnector::Connect();
            $query = 'SELECT * FROM product WHERE category_id=' . $cat;
            
            foreach ($db->query($query)as $row){
                if ($size - $howmany == 0 && $row['name'] != NULL){
                    return $row;
                }else{
                    ++$howmany;
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
        $db = null;
    }
    
    public function Create($create){
        try {
            $db = DBconnector::Connect();
            $query = "INSERT INTO product (name, description, price, category_id) VALUES "
                    . "(:name, :description, :price, :category_id)";
            $statement = $db->prepare($query);
            $statement->execute(array(
                ':name' => $create->name,
                ':description' => $create->description,
                ':price' => $create->price,
                ':category_id' => $create->category_id
            ));
            echo 'Record created successfully';
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
        $db = null;
    }
    
    public function Read(){
        try {
            /*$db = DBconnector::Connect();
            $query = 'SELECT * FROM product';
                foreach ($db->query($query)as $row){
                    echo 'id:'.$row['id']. '<br>';
                    echo 'name:'.$row['name']. '<br>';
                    echo 'description: '.$row['description']. '<br>';
                    echo 'price: '.$row['price']. '<br>';
                    echo 'category_id: '.$row['category_id']. '<br>';
                }*/
            $amount = 0;
            $db = DBconnector::Connect();
            $query = 'SELECT * FROM product';
            $row = $db->prepare($query);
            foreach ($db->query($query)as $row){
                if (isset($row['id'])){ //if (row id != 0)
                  $product = new self(); //пакуем...
                  $product->name = $row['name'];
                  $product->description = $row['description'];
                  $product->price = $row['price'];   
                }
            }
        }
         catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
        $db = null;    
    }
    
    public function SelectById($pdt){
        try {
            $db = DBconnector::Connect();
            $query = 'SELECT * FROM product WHERE id=' . $pdt;
            
            foreach ($db->query($query)as $row){
                return $row;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
        $db = null;
    }
    
    public function Update($update){     //пусть принимает класс со значениями, затем
        try {
            $db = DBconnector::Connect();
            
            if ($update->name != ''){
                $query = "UPDATE product SET name = :name WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->execute(array(
                ':name' => $update->name,
                ':id' => $update->id
            ));
            }
            if ($update->description != ''){
                $query = "UPDATE product SET description = :description WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->execute(array(
                ':description' => $update->description,
                ':id' => $update->id
            ));
            }
            if ($update->price != ''){
                $query = "UPDATE product SET price = :price WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->execute(array(
                ':price' => $update->price,
                ':id' => $update->id
            ));
            }
            if ($update->category_id != ''){
                $query = "UPDATE product SET category_id = :category_id WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->execute(array(
                ':category_id' => $update->category_id,
                ':id' => $update->id
            ));
            }
        }catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
        $db = null;
    }
    
    public function Delete($delete){
        try {
            $db = DBconnector::Connect();
            $query = "DELETE FROM product WHERE id=:id";
            $statement = $db->prepare($query);
            $statement->execute(array(
                ':id' => $delete->id
            ));
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
        $db = null;
    }
}
//check