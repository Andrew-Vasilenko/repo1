<div class='f2b'>
    <a class='pseudobutton' href="http://localhost/ClassMade/index.php?page=login">Login</a>
    <a class='pseudobutton' href="http://localhost/ClassMade/index.php?page=register">Register</a>
    <a class='pseudobutton' href="http://localhost/ClassMade/index.php?page=MainPage">to main page</a>
</div>

<div class="wrapper">        
    <ul class="products">
        <?php
        
            $cat = $_GET['cat'];
            showProducts($cat);
        ?>
    </ul>
</div>