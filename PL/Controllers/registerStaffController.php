<?php
    if (isset($_POST['registerClick'])){
        require './BL/staffBL.php';   //неправильный путь там две директории сверху
        //check_input($_POST["loginTB"], "Input your login");
        //check_input($_POST["passwordTB"], "Input your password");

        $name = htmlspecialchars($_POST["nameTB"]);
        $phone = htmlspecialchars($_POST["phoneTB"]);
        $login = htmlspecialchars($_POST["loginTB"]);
        $password = htmlspecialchars($_POST["passwordTB"]);
    
        staffBL::Create($name, $phone, $login, $password);
        
        $name = '';
        $phone = '';
        $login = '';
        $password = '';
        
        header("Location:http://localhost/ClassMade/index.php?page=loginStaff");
}
        