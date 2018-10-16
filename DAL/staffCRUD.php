<?php
require_once './DAL/DBconnector.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of staffCRUD
 *
 * @author L
 */
class staffCRUD {
    //put your code here
    
    public function Size(){
        try {
            $size = 0;
            $db = DBconnector::Connect();
            $query = 'SELECT * FROM staff';
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
    }
    
    public function Create($create){
        try {
            $db = DBconnector::Connect();
            $query = "INSERT INTO staff (name, phone, login, password) VALUES "
                    . "(:name, :phone, :login, :password)";
            $statement = $db->prepare($query);
            $statement->execute(array(
                ':name' => $create->name,
                ':phone' => $create->phone,
                ':login' => $create->login,
                ':password' => $create->password
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
            $query = 'SELECT * FROM staff';
                foreach ($db->query($query)as $row){
                    echo 'id:'.$row['id']. '<br>';
                    echo 'name:'.$row['name']. '<br>';
                    echo 'phone: '.$row['phone']. '<br>';
                    echo 'login: '.$row['login']. '<br>';
                    echo 'password: '.$row['password']. '<br>';
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
            $query = 'SELECT * FROM staff WHERE login=' . "'" . $login . "'";//ищем клиента с этим мейлом
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
    
    public function Random(){
        $db = DBconnector::Connect();
        $size = staffCRUD::Size();
        if ($size == 0){
            echo 'Sorry, there are no staff to manage orders';
            exit();
        }
        $choice = rand(1 ,$size);
        $query = 'SELECT * FROM staff';
        foreach ($db->query($query)as $row){
            if ($size - $choice == 0){
                return $row;
            }else{
                ++$choice;
            }
            
            
        }
    }
    
    public function Update($update){     //пусть принимает класс со значениями, затем
        try {
            $db = DBconnector::Connect();
            
            if ($update->name != ''){
                $query = "UPDATE staff SET name = :name WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->execute(array(
                ':name' => $update->name,
                ':id' => $update->id
            ));
            }
            if ($update->phone != ''){
                $query = "UPDATE staff SET phone = :phone WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->execute(array(
                ':phone' => $update->phone,
                ':id' => $update->id
            ));
            }
            if ($update->login != ''){
                $query = "UPDATE staff SET login = :login WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->execute(array(
                ':login' => $update->login,
                ':id' => $update->id
            ));
            }
            if ($update->password != ''){
                $query = "UPDATE staff SET password = :password WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->execute(array(
                ':password' => $update->password,
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
            $query = "DELETE FROM staff WHERE id=:id";
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
