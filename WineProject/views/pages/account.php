
<?php 

if(isset($_SESSION['logged'])&& $_SESSION['logged']==true){

    include __DIR__.'/../accountLogged.php';
}
else if(isset($_COOKIE['logged'])&& $_COOKIE['logged']=='isLogged'){
    include __DIR__.'/../accountLogged.php';
}
else{
    include __DIR__.'/../accountNotLogged.php';
}


