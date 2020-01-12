<h1>Checkout</h1>

<?php

    if($this->_params['checkoutSite1'] === true){ 
    require_once __DIR__.'/../checkout1.php';
    }
    else{
    require_once __DIR__.'/../checkout2.php';
    }
?>