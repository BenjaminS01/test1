<div class="login">

        <img src="assets/styles/loginLogo.jpg" alt="login logo">
    
    
        <form action="<?=$_SERVER['PHP_SELF'] .'?a=login';?>" method="post">
            <label for="email">email: </label>
            <br>
            <input type="text" name="email" id="email" placeholder="your e-mail" required
            <?=isset($_POST['email']) ? 'value="'.htmlspecialchars($_POST['email']).'"' : ''?>> <br>
            
            <label for="loginPassword">password: </label>
            <br>
            <input type="password" name="validationPassword" id="loginPassword" placeholder="your password"
            required> <br>

            <div class = buttonLogin>
                <input type="submit" name="submitLogin" value="login">
            </div>

            <br>
            
            <div class="check">
                <input type="checkbox" name="rememberMe" id="check"
                <?=isset($_POST['rememberMe']) ? 'checked' : ''?>>
                <label for="check">remain signed in?</label>
                <br>
                <a href="?a=register">no account yet?</a>
            </div>
            
            
        </form>

    
</div>

