

<fieldset>
<legend>consignee </legend>
<table>
<tr><td>firstname: </td><td><?php echo $this->_params['customer'][0]['firstName'];?></td></tr>
<tr><td>lastname: </td> <td><?php echo $this->_params['customer'][0]['lastName'];?></td></tr>
</table>
</fieldset>

<br><br>

<form action="<?= $_SERVER['PHP_SELF'] . '?a=checkout';?>" method="POST" >

<fieldset>
<legend>delivery address</legend>
        <label for="country">Country:<br>
            <select name="country" id="country">
                <option value=<?=$this->_params['address'][0]['country']?>><?= isset($_POST['Country']) ? htmlspecialchars($_POST['Country']) : $this->_params['address'][0]['country'] ?></option>
                <?php
                $arrayCountry = ['Germany', 'Austria', 'Belgium', 'Bulgaria', 'Cyprus', 'Czech Republic', 'Denmark', 'Estonia', 'Finland',
                    'France', 'Great Britain', 'Hungary', 'Ireland', 'Italy', 'Latvia', 'Luxembourg', 'Malta', 'Netherlands',
                    'Poland', 'Portugal', 'Romania', 'Slovakia', 'Slovenia', 'Spain', 'Sweden', 'Croatia'];
                foreach ($arrayCountry as $value) :?>
                    <option value="<?= $value ?>" <?= isset($_POST['country']) ? ($_POST['country'] === $value ? "selected" : '') : '' ?>><?= $value ?></option>';
                <?php endforeach; ?>
            </select>
            <br>
            
<label for="zip">Zip: <br></label>
        <input type="text" id="zip" name="zip"
               value="<?= isset($_POST['zip']) ? htmlspecialchars($_POST['zip']) : $this->_params['address'][0]['zip']; ?>" required/><br>
        <label for="city">City:</label><br>
        <input type="text" id="city" name="city"
               value="<?= isset($_POST['city']) ? htmlspecialchars($_POST['city']) : $this->_params['address'][0]['city'] ;?>"
               required/><br>
        <label for="street">Street:</label><br>
        <input type="text" id="street" name="street"
               value="<?= isset($_POST['street']) ? htmlspecialchars($_POST['street']) : $this->_params['address'][0]['street']; ?>"
               required/><br>
</fieldset>

<br><br>

<label for="payment">payment:</label>
        <input type="radio" name="payMethod" value="transfer" required <?= isset($_POST['payMethod']) ? ($_POST['payMethod'] === 'tranfer' ? "checked" : '') : ''?>/>transfer
        <input type="radio" name="payMethod" value="cash on delivery" required <?= isset($_POST['payMethod']) ? ($_POST['payMethod'] === 'cash on delivery' ? "checked" : '') : ''?>/>cash on delivery
        <input type="radio" name="payMethod" value="paypal" required <?= isset($_POST['payMethod']) ? ($_POST['payMethod'] === 'paypal' ? "checked" : '') : ''?>/>paypal<br>
        
    <input type="submit" name="submitCheckout" value="go to order overview">

<br>

</form>