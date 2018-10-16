

<div class='f2b'>
    <a class='pseudobutton' href="http://localhost/ClassMade/index.php?page=MainPage">Sign out</a>
    <a class='pseudobutton' href="http://localhost/ClassMade/index.php?page=cart">Cart</a>
    <a class='pseudobutton' href="http://localhost/ClassMade/index.php?page=orders">Orders</a>
    <a class='pseudobutton' href="http://localhost/ClassMade/index.php?page=userMainPage">to main page</a>
</div>

<div class="wrapper">        
    <ul class="products">
        <?php
        
            $cat = $_GET['cat'];
            showProducts($cat);
        ?>
    </ul>
</div>