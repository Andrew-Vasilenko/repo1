<?php
session_start(['gc_maxlifetime' => 600]);
if (isset($_POST['loginClick'])){
    require './BL/staffBL.php';
    $login = htmlspecialchars($_POST["loginTB"]);
    $password = htmlspecialchars($_POST["passwordTB"]);
    $row = staffBL::Login($login, $password);
    if ($row['login'] == $login){
        $_SESSION['logged_staff'] = $row['id'];
        $login = '';
        $password = '';
        $row = '';
        header("Location:http://localhost/ClassMade/index.php?page=userPageStaff");
    }else{
        unset($_SESSION['logged_staff']);
        session_destroy();
        $login = '';
        $password = '';
        $row = '';
        echo 'incorrect login or password';
        exit;
    }
}

