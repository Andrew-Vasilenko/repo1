<?php
session_start(['gc_maxlifetime' => 600]);
if (isset($_POST['loginClick'])){
    require './BL/clientBL.php';
    $login = htmlspecialchars($_POST["loginTB"]);
    $password = htmlspecialchars($_POST["passwordTB"]);
    $row = clientBL::Login($login, $password);
    if ($row['email'] == $login){
        $_SESSION['logged_user'] = $row['id'];
        $login = '';
        $password = '';
        $row = '';
        header("Location:http://localhost/ClassMade/index.php?page=userMainPage");
    }else{
        unset($_SESSION['logged_user']);
        session_destroy();
        echo 'incorrect user or password';
        $login = '';
        $password = '';
        $row = '';
        exit;
    }
}



/*echo 'Welcome ';
        echo $_SESSION['logged_user'];*/










/*
    if (isset($_POST['loginClick'])){
        require './BL/clientBL.php';
        //check_input($_POST["loginTB"], "Input your login");
        //check_input($_POST["passwordTB"], "Input your password");
        $login = htmlspecialchars($_POST["loginTB"]);
        $password = htmlspecialchars($_POST["passwordTB"]);
        
        clientBL::ReadS($login, $password);
    
        //echo $login;
        //echo $password;
        
        
}*/
        