<style>
    

.invisible{
    display: none;
}
</style>


<div class='f2b'>
    <a class='pseudobutton' href="http://localhost/ClassMade/index.php?page=MainPage">Sign out</a>
</div>

<div class="wrapper">        
    <ul class="products">
        <?php
        $usr = $_SESSION['logged_staff'];
        listOrders($usr);
            
        ?>
    </ul>
</div>