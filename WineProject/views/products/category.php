<?php
$category=$_GET['s'];
$this->_params['error']=[];
$setWithProductIdAndPropertyId=\skwd\models\PropertyProProduct::find('value= \''.$category.'\'');
?>
<?php if (count($setWithProductIdAndPropertyId)===0):
    array_push($this->_params['error'],'There is no products with category '.$category.' yet');
else :
    foreach($setWithProductIdAndPropertyId as $key=>$value):
        $productId=$value['productID'];
        $product=\skwd\models\Product::find('id='.$productId);
        $dbPicture = productsPicture($productId);
        $picture = count($dbPicture) !== 0 ? $dbPicture[0]['path'] : 'assets/images/noPicture.jpg';
        $price=$product[0]['standardPrice'];
        ?>
        <a href="?c=products&a=theProduct&i=<?= $productId?>"><img src="<?php echo $picture; ?>"></a><br>
        <a href="?c=products&a=theProduct&i=<?= $productId?>"> <?= $product[0]['prodName']; ?></a>
        <?= $price .' €'?>
        <iframe name="hiddenFrame" class="hide"></iframe>
        <form action="?a=shoppingCartShow&i=<?= $productId ?>&p=<?=$price?>" method="post" <?= usersIdIfLoggedIn()===null? "": "target=\"hiddenFrame\"" ?>>
            <button type="submit">Add to basket</button>
        </form>
        <?php endforeach;?>
<?php endif;?>

