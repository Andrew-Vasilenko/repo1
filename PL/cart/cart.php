<style>
    

.invisible{
    display: none;
}
</style>

<div class='f2b'>
    <a class='pseudobutton' href="http://localhost/ClassMade/index.php?page=MainPage">Sign out</a>
    <a class='pseudobutton' href="http://localhost/ClassMade/index.php?page=orders">Orders</a>
    <a class='pseudobutton' href="http://localhost/ClassMade/index.php?page=userMainPage">to main page</a>
</div>

<div class="wrapper">        
    <ul class="products">
        <?php
            
            $usr = $_SESSION['logged_user'];
            showPositions($usr);
        ?>
    </ul><form method="POST">
        <div class="f2b">
        <input type='submit' name='placeOrder' value='Place order'>
        </div>
    </form>
</div>