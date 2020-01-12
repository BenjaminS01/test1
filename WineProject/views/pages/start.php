start.php

<p>hallo <?php if(isset($_SESSION['logged']) && isset($_SESSION['email'])&& $_SESSION['logged']==true){
    echo $_SESSION['email'];}
    else if(isset($_COOKIE['logged']) && $_COOKIE['logged']==='isLogged'){
        echo $_COOKIE['email'];
    }
    else{echo 'gast';}?></p>

    <br><br>

    <p><?php if(isset($_GET['k'])&& $_GET['k']==='orderFinished'){echo 'order finished!!!!!!!!!';} ?></p>



