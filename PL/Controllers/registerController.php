<?php
    if (isset($_POST['registerClick'])){
        require './BL/clientBL.php';   //неправильный путь там две директории сверху
        //check_input($_POST["loginTB"], "Input your login");
        //check_input($_POST["passwordTB"], "Input your password");

        $email = htmlspecialchars($_POST["emailTB"]);
        $password = htmlspecialchars($_POST["passwordTB"]);
        $phone = htmlspecialchars($_POST["phoneTB"]);
        $address = htmlspecialchars($_POST["addressTB"]);
    
        clientBL::Create($email, $password, $phone, $address);
        
        $email = '';
        $password = '';
        $phone = '';
        $address = '';
        
        header("Location:http://localhost/ClassMade/index.php?page=login");
}
        