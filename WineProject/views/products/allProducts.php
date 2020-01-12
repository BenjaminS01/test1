<?php
$dbQuery = null;
$dbQuery = \skwd\models\Product::find();
$this->_params['error'] = [];
?>
<?php if ($dbQuery === null || count($dbQuery) === 0):
    array_push($this->_params['error'], "There are no products yet");
    ?>
<?php else: ?>
    <div class="container">
        <?php foreach ($dbQuery as $key => $value): ?>
            <div>
                <?php $dbPicture = productsPicture($dbQuery[$key]['id']);
                $picture = count($dbPicture) !== 0 ? $dbPicture[0]['path'] : 'assets/images/noPicture.jpg';
                $price = $dbQuery[$key]['standardPrice'];
                ?>
                <a href="?c=products&a=theProduct&i=<?= $dbQuery[$key]['id'] ?>"><img class="container-image"
                                                                                      src="<?php echo $picture; ?>"></a><br>
                <div class="container-name">
                    <a href="?c=products&a=theProduct&i=<?= $dbQuery[$key]['id'] ?>"> <?= $dbQuery[$key]['prodName']; ?></a>
                </div>
                <div class="container-price">
                    <?= $price . ' €' ?>
                </div>
                <iframe name="hiddenFrame" class="hide"></iframe>
                <form action="?a=shoppingCartShow&i=<?= $dbQuery[$key]['id']; ?>&p=<?= $price; ?>"
                      method="post" <?= usersIdIfLoggedIn() === null ? "" : "target=\"hiddenFrame\"" ?>>
                    <div class="basket-button">
                        <button type="submit">Add to basket</button>
                    </div>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>








