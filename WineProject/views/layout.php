<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/style.css" type="text/css">
    <script src="assets/js/script.js"></script>
</head>
<body>
<header>

</header>

<nav>
    <ul>
        <li><a href="?a=start"><img class="nav-logo" src="assets/styles/logo.jpg"></a></li>
        <li>
            <div class="dropdown">
                <button class="dropdown-button" onclick="window.location.href='?c=products&a=allProducts';">Products</button>
                <div class="dropdown-content">
                    <a href="?c=products&a=allProducts">All</a>
                    <a href="?c=products&a=category&s=Red%20Wine">Red wines</a>
                    <a href="?c=products&a=category&s=White%20Wine">White wines</a>
                    <a href="?c=products&a=category&s=Rose%20Wine">Rose wines</a>
                    <a href="?c=products&a=category&s=Sparkling%20Wine">Sparkling wines</a>
                    <a href="?c=products&a=category&s=Accessory">Accessories</a>
                </div>
            </div>
        </li>
        <li><a href="?a=wineInformation">Wine Guide</a></li>
        <li><a href="?a=shoppingCartShow">Basket</a></li>
        <li>
            <div class="dropdown">
                <button class="dropdown-button" onclick="window.location.href='?c=pages&a=account';">Account</button>
                <div class="dropdown-content">

                    <?php if (usersIdIfLoggedIn() !== null): ?>

                        <a href="?c=accounts&a=personalData"> personal data</a>
                        <a href="?c=accounts&a=myOrders"> my orders</a>

                    <?php else: ?>
                        <a href="?a=login">Login</a>
                        <a href="?a=register">Sign-Up</a>
                    <?php endif; ?>

                </div>
            </div>
        </li>


        <li>    <?php

            if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
                include __DIR__ . '/logout.php';
            } else if (isset($_COOKIE['logged']) && $_COOKIE['logged'] === 'isLogged') {
                include __DIR__ . '/logout.php';
            }

            ?></li>
    </ul>
</nav>

<main>
    <div class="error">
        <?php
        if (isset($this->_params['error'])) {
            foreach ($this->_params['error'] as $value) {
                echo nl2br($value . "\r\n");
            }
        }
        ?>
    </div>
    <?php echo $body; ?>

    

</main>
<footer>
    <a href="?a=imprint">Imprint</a>
</footer>
</body>
</html>