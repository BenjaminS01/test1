

    
    
    
    <?php

if((isset($_GET['j'])&&$_GET['j']=='test')||isset($_POST['submitEdit'])){
    include_once __DIR__.'/personalDataEdit.php';
}
else if(isset($_GET['j'])&&$_GET['j']=='test1'){
    include_once __DIR__.'/addressEdit.php';
}
else if(isset($_GET['j'])&&$_GET['j']=='test2'){
    include_once __DIR__.'/passwordEdit.php';
}
else{
    
    include_once __DIR__.'/personalDataNoEdit.php';
}








