<?php
require_once './DAL/DBconnector.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of shopping_cartCRUD
 *
 * @author L
 */
class shopping_cartCRUD {
    //put your code here
    
    public function Size(){
        try{
            $db = DBconnector::Connect();
			
			$result = mysql_query("SELECT count(*) as total from shopping_cart");
			$size = mysql_fetch_assoc($result);
			
            return $size['total'];
			
            } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
        $db = null;  
    }
    
    public function SizeOfUsr($usr){
        try{
           $size = 0;
           $db = DBconnector::Connect();
           $query = 'SELECT * FROM shopping_cart WHERE client_id=' . $usr;
           foreach ($db->query($query)as $row){
                    $size = $size + 1;
                }
                return $size;
            } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
        $db = null;  
    }
    
    public function ReadByUsr($howmany, $usr){
        try {
            $size = shopping_cartCRUD::SizeOfUsr($usr);//колво записей в таблице
            $db = DBconnector::Connect();
            $query = 'SELECT * FROM shopping_cart WHERE client_id=' . $usr;
            
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
    
    public function Create($create){
        try {
            $db = DBconnector::Connect();
            
            
            $query = "INSERT INTO shopping_cart (client_id, product_id, quantity, total_cost) VALUES "
                    . "(:client_id, :product_id, :quantity, :total_cost)";
            $statement = $db->prepare($query);
            $statement->execute(array(
                ':client_id' => $create->client_id,
                ':product_id' => $create->product_id,
                ':quantity' => $create->quantity,
                ':total_cost' => $create->total_cost
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
            $db = DBconnector::Connect();
            $query = 'SELECT * FROM shopping_cart';
                foreach ($db->query($query)as $row){
                    echo 'id:'.$row['id']. '<br>';
                    echo 'client_id:'.$row['client_id']. '<br>';
                    echo 'product_id: '.$row['product_id']. '<br>';
                    echo 'quantity: '.$row['quantity']. '<br>';
                    echo 'total_cost: '.$row['total_cost']. '<br>';
                }
            }
         catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
        $db = null;    
    }
    
    public function Update($update){     //пусть принимает класс со значениями, затем
        try {
            $db = DBconnector::Connect();
            
            if ($update->client_id != ''){
                $query = "UPDATE shopping_cart SET client_id = :client_id WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->execute(array(
                ':client_id' => $update->client_id,
                ':id' => $update->id
            ));
            }
            if ($update->product_id != ''){
                $query = "UPDATE shopping_cart SET product_id = :product_id WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->execute(array(
                ':product_id' => $update->product_id,
                ':id' => $update->id
            ));
            }
            if ($update->quantity != ''){
                $query = "UPDATE shopping_cart SET quantity = :quantity WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->execute(array(
                ':quantity' => $update->quantity,
                ':id' => $update->id
            ));
            }
            if ($update->total_cost != ''){
                $query = "UPDATE shopping_cart SET total_cost = :total_cost WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->execute(array(
                ':total_cost' => $update->total_cost,
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
            $query = "DELETE FROM shopping_cart WHERE id=:id";
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
    
    public function DeleteByClient($delete){
        try {
            $db = DBconnector::Connect();
            $query = "DELETE FROM shopping_cart WHERE client_id=:client_id";
            $statement = $db->prepare($query);
            $statement->execute(array(
                ':client_id' => $delete->client_id
            ));
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
        $db = null;
    }
}
//check