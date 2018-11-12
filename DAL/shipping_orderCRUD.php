<?php
require_once './DAL/DBconnector.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of shipping_orderCRUD
 *
 * @author L
 */
class shipping_orderCRUD {
    //put your code here
    
    public function Size(){
        try{
            $db = DBconnector::Connect();
			
			$result = mysql_query("SELECT count(*) as total from shipping_order");
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
           $query = 'SELECT * FROM shipping_order WHERE client_id=' . $usr;
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
    
    public function SizeOfStaff($usr){
        try{
           $size = 0;
           $db = DBconnector::Connect();
           $query = 'SELECT * FROM shipping_order WHERE staff_id=' . $usr;
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
    
    public function Create($create){
        try {
            $db = DBconnector::Connect();
            
            
            $query = "INSERT INTO shipping_order (client_id, staff_id, final_cost, shipping_status, payment_status, tracking_number, return_cost, comment_label) VALUES "
                    . "(:client_id, :staff_id, :final_cost, :shipping_status, :payment_status, :tracking_number, :return_cost, :comment_label)";
            $statement = $db->prepare($query);
            $statement->execute(array(
                ':client_id' => $create->client_id,
                ':staff_id' => $create->staff_id,
                ':final_cost' => $create->final_cost,
                ':shipping_status' => $create->shipping_status,
                ':payment_status' => $create->payment_status,
                ':tracking_number' => $create->tracking_number,
                ':return_cost' => $create->return_cost,
                ':comment_label' => $create->comment_label
                    
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
            $query = 'SELECT * FROM shipping_order';
                foreach ($db->query($query)as $row){
                    echo 'id:'.$row['id']. '<br>';
                    echo 'client_id:'.$row['client_id']. '<br>';
                    echo 'staff_id: '.$row['staff_id']. '<br>';
                    echo 'final_cost: '.$row['final_cost']. '<br>';
                    echo 'shipping_status: '.$row['shipping_status']. '<br>';
                    echo 'payment_status: '.$row['payment_status']. '<br>';
                    echo 'tracking_number: '.$row['tracking_number']. '<br>';
                    echo 'return_cost: '.$row['return_cost']. '<br>';
                    echo 'comment_label: '.$row['comment_label']. '<br>';
                }
            }
         catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
        $db = null;    
    }
    
    public function ReadByUsr($howmany, $usr){
        try {
            $size = shipping_orderCRUD::SizeOfUsr($usr);//колво записей в таблице
            $db = DBconnector::Connect();
            $query = 'SELECT * FROM shipping_order WHERE client_id=' . $usr;
            
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
    
    public function ReadByStaff($howmany, $usr){
        try {
            $size = shipping_orderCRUD::SizeOfStaff($usr);//колво записей в таблице
            $db = DBconnector::Connect();
            $query = 'SELECT * FROM shipping_order WHERE staff_id=' . $usr;
            
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
            
            if ($update->client_id != ''){
                $query = "UPDATE shipping_order SET client_id = :client_id WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->execute(array(
                ':client_id' => $update->client_id,
                ':id' => $update->id
            ));
            }
            if ($update->staff_id != ''){
                $query = "UPDATE shipping_order SET staff_id = :staff_id WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->execute(array(
                ':staff_id' => $update->staff_id,
                ':id' => $update->id
            ));
            }
            if ($update->final_cost != ''){
                $query = "UPDATE shipping_order SET final_cost = :final_cost WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->execute(array(
                ':final_cost' => $update->final_cost,
                ':id' => $update->id
            ));
            }
            if ($update->shipping_status != ''){
                $query = "UPDATE shipping_order SET shipping_status = :shipping_status WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->execute(array(
                ':shipping_status' => $update->shipping_status,
                ':id' => $update->id
            ));
            }
            if ($update->payment_status != ''){
                $query = "UPDATE shipping_order SET payment_status = :payment_status WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->execute(array(
                ':payment_status' => $update->payment_status,
                ':id' => $update->id
            ));
            }
            if ($update->tracking_number != ''){
                $query = "UPDATE shipping_order SET tracking_number = :tracking_number WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->execute(array(
                ':tracking_number' => $update->tracking_number,
                ':id' => $update->id
            ));
            }
            if ($update->return_cost != ''){
                $query = "UPDATE shipping_order SET return_cost = :return_cost WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->execute(array(
                ':return_cost' => $update->return_cost,
                ':id' => $update->id
            ));
            }
            if ($update->comment_label != ''){
                $query = "UPDATE shipping_order SET comment_label = :comment_label WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->execute(array(
                ':comment_label' => $update->comment_label,
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
            $query = "DELETE FROM shipping_order WHERE id=:id";
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