<?php
require_once './DAL/DBconnector.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoryCRUD
 *
 * @author L
 */
class categoryCRUD {
    //put your code here           то, что у него xDAL - то у меня xCRUD
    
    
    public function Size(){
        try{
            $db = DBconnector::Connect();
			
			$result = mysql_query("SELECT count(*) as total from category");
			$size = mysql_fetch_assoc($result);
			
            return $size['total'];
			
            } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
        $db = null;  
    }
    
    
    public function Create($create){
        try {
            $db = DBconnector::Connect();
            $query = "INSERT INTO category (name, description) VALUES (:name, :description)";
            $statement = $db->prepare($query);
            $statement->execute(array(
                ':name' => $create->name,
                ':description' => $create->description
            ));
            echo 'Record created successfully';
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
        $db = null;
    }
    
    public function Read($howmany){
        try {
            $size = categoryCRUD::Size();//колво записей в таблице
            $db = DBconnector::Connect();
            $query = 'SELECT * FROM category';
            foreach ($db->query($query)as $row){
                if ($size - $howmany == 0){
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
    
    public function Update($update){     //пусть принимает класс со значениями, затем
        try {
            $db = DBconnector::Connect();
            
            if ($update->name != ''){
                $query = "UPDATE category SET name = :name WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->execute(array(
                ':name' => $update->name,
                ':id' => $update->id
            ));
            }
            if ($update->description != ''){
                $query = "UPDATE category SET description = :description WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->execute(array(
                ':description' => $update->description,
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
            $query = "DELETE FROM category WHERE id=:id";
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