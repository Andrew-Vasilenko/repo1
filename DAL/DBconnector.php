<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBconnector
 *
 * @author L
 */
class DBconnector {
    //put your code here
    
    public function Connect(){
        try{
            $db = new PDO('mysql:host=localhost; dbname=mydb', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);//ошибки бд
            return $db;
        } catch (Exception $ex) { // ошибки PDO
            echo $ex->getMessage();
            exit();
        } 
    }   
}
