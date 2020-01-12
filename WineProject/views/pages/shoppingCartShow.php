<?php
$accountId = isset($_SESSION['id']) ? $_SESSION['id'] : $_COOKIE['id'];
$shoppingCart = \skwd\models\ShoppingCart::find('accountId=' . $accountId);
$shoppingCart = $shoppingCart[0];
$shoppingCartItems = \skwd\models\ShoppingCartItem::find('shoppingCartId=' . $shoppingCart['id']);
if (count($shoppingCartItems) === 0):?>
    <h3>Your shopping cart is empty</h3>
    <p>Continue shopping on your SKWD online shop <a href="?c=products&a=allProducts"> here</a></p>

<?php else: ?>
    <?php

    $sum = 0;
    $itemNumb=0;
    foreach ($shoppingCartItems as $item) {
        $sum += $item['actualPrice']*$item['qty'];
        $itemNumb+=$item['qty'];
    }
    ?>
    <a href="?c=pages&a=checkout">Proceed to checkout</a>
    <h3>Your basket products</h3>
    <h4>Subtotal for <?= $itemNumb ?> items: <?= $sum ?></h4>

    <?php foreach ($shoppingCartItems as $shoppingCartItem):
        $pictures = productsPicture($shoppingCartItem['productID']);
        $picturePath = count($pictures) > 0 ? $pictures[0]['path'] : 'assets/images/noPicture.jpg';
        $productName = \skwd\models\Product::find('id=' . $shoppingCartItem['productID'])[0]['prodName'];
        ?>
        <a href="?c=products&a=theProduct&i=<?= $shoppingCartItem['productID'] ?>"><img src="<?= $picturePath ?>"></a>
        <br>
        <a href="?c=products&a=theProduct&i=<? $shoppingCartItem['productID'] ?>"> <?= $productName ?></a><br>
        <p>Price: <?=  $shoppingCartItem['actualPrice']?></p>
        <p>Quantity: <?= $shoppingCartItem['qty'] ?></p>
        <iframe name="hiddenFrame" class="hide"></iframe>
        <form method="post" action="?c=pages&a=shoppingCartShow&i=<?= $shoppingCartItem['productID'] ?>&p=<?=$shoppingCartItem['actualPrice']?>&cartOp=upDate"
              target="hiddenFrame">
            <select name="qty">
                <option value="1" >1</option>
                <?php for ($i = 2; $i < 11; ++$i): ?>
                    <option value="<?= $i ?>" <?= isset($shoppingCartItem['qty']) ? ($shoppingCartItem['qty'] == $i ?  " selected " : '') : '' ?>><?= $i ?></option>;
                <?php endfor; ?>
            </select>
            <button type="submit">Change quantity</button>
        </form>

        <iframe name="hiddenFrame" class="hide"></iframe>
        <form method="post" action="?c=pages&a=shoppingCartShow&i=<?= $shoppingCartItem['productID'] ?>&cartOp=delete"
              target="hiddenFrame">
            <button type="submit">Delete</button>
        </form>

    <?php endforeach; ?><br><br>
<?php endif; ?>

