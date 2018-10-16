<?php
    //session_start();
    if (isset($_GET['page'])){
        $name = $_GET['page'];
        if ($name != 'main') {
            require_once 'PL/Controllers/' . $name . 'Controller.php'; //including the nesessary Controller
        }
    }else{
        require_once 'PL/Controllers/MainPageController.php';
    }

?>
<!DOCTYPE html>
<html>
    <head>  
        <title>Reef</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="PL/main/main.css" > 
        <style>
            <?php
                //include additional css;
            
                if (isset($_GET['page'])){
                    $name = $_GET['page'];
                    if ($name != 'main'){
                        require 'PL/' . $name . '/' . $name . '.css'; //including CSS
                    } 
                }else{
                    require 'PL/MainPage/MainPage.css';
                }
            ?>
        </style>
    </head>
    <body>
	<div class="wrapper">
            <header id = 'header'>
                <h1>Reef</h1>
		<h3>online store</h3>
                </a>
               
            </header>
            </div>
	
                    <?php 
                
                    if (isset($_GET['page'])){
                        $name = $_GET['page'];
                        if ($name != 'main'){
                            require 'PL/' . $name . '/' . $name . '.php'; //including PHP
                        }
                    }else{
                        require 'PL/MainPage/MainPage.php';
                    }
                    
                    function Poster(){
                        if (isset($_POST['catRequest'])){
                            
                        }
                    }
                
                    ?>
            
    </body>
</html>