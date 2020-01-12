
<div class="account">
    <div>
        <h3>Hallo <?php if(isset($_SESSION['email'])){echo $_SESSION['email'];}  
                if(isset($_COOKIE['email'])){echo $_COOKIE['email'];} ?></h3></p>
    </div>
     <div>
         <h1>Accountdaten</h1>
    </div>

<div class="links">
    <a href="?c=accounts&a=personalData"> personal data</a>
    <a href="?c=accounts&a=myOrders"> my orders</a>
</div>
    
</div>



