<?php
require_once './DAL/DBconnector.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clientCRUD
 *
 * @author L
 */
class clientCRUD {
    //put your code here
    public function Create($create){
        try {
            $db = DBconnector::Connect();
            $query = "INSERT INTO client (email, password, phone, shipping_address) VALUES "
                    . "(:email, :password, :phone, :shipping_address)";
            $statement = $db->prepare($query);
            $statement->execute(array(
                ':email' => $create->email,
                ':password' => $create->password,
                ':phone' => $create->phone,
                ':shipping_address' => $create->shipping_address
            ));
            //echo 'Record created successfully';
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
        $db = null;
    }
    
    public function ReadAll(){
        try {
            $db = DBconnector::Connect();
            $query = 'SELECT * FROM client';
                foreach ($db->query($query)as $row){
                    echo 'id:'.$row['id']. '<br>'; //как получить это в переменной а не 'echo'?
                    echo 'email:'.$row['email']. '<br>';
                    echo 'password: '.$row['password']. '<br>';
                    echo 'phone: '.$row['phone']. '<br>';
                    echo 'shipping_address: '.$row['shipping_address']. '<br>';
                }
            }
         catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
        $db = null;    
    }
    
    public function ReadById($id){
        try {
            $db = DBconnector::Connect();
            $query = 'SELECT * FROM client WHERE id=' . $id;
                foreach ($db->query($query)as $row){
                    return $row;
                }
            }
         catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
        $db = null;    
    }
    
    public function Login($login, $password){//if row[email] == login && row[password] == password
        try {
            $db = DBconnector::Connect();
            $query = 'SELECT * FROM client WHERE email=' . "'" . $login . "'";//ищем клиента с этим мейлом
            $row = $db->prepare($query);
            foreach ($db->query($query)as $row){
                if ($row['password'] == $password){ //Cannot use object of type PDOStatement as array
                    return $row; //если нашли сравниваем пароль и если пароль верен - возвращаем всю строчку
                }
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
            
            if ($update->email != ''){
                $query = "UPDATE client SET email = :email WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->execute(array(
                ':email' => $update->email,
                ':id' => $update->id
            ));
            }
            if ($update->password != ''){
                $query = "UPDATE client SET password = :password WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->execute(array(
                ':password' => $update->password,
                ':id' => $update->id
            ));
            }
            if ($update->phone != ''){
                $query = "UPDATE client SET phone = :phone WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->execute(array(
                ':phone' => $update->phone,
                ':id' => $update->id
            ));
            }
            if ($update->shipping_address != ''){
                $query = "UPDATE client SET shipping_address = :shipping_address WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->execute(array(
                ':shipping_address' => $update->shipping_address,
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
            $query = "DELETE FROM client WHERE id=:id";
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
