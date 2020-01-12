
<div>
<fieldset>
<legend>consignee </legend>
<table>
<tr><td>firstname: </td><td><?php echo $this->_params['customer'][0]['firstName'];?></td></tr>
<tr><td>lastname:</td> <td><?php echo $this->_params['customer'][0]['lastName'];?></td></tr>
<tr><td>email: </td><td><?php echo $this->_params['account'][0]['email'];?></td></tr>
<tr><td>phone number: </td><td><?php echo $this->_params['customer'][0]['phoneNumber']; ?></td></tr>
<tr><td>date of birth: </td><td><?php echo dateOfBirthInRightOrder($this->_params['customer'][0]['dateOfBirth']);?></td></tr>
</table>
</fieldset>
<fieldset>
<legend>delivery address </legend>
<table>
<tr><td>zip: </td><td><?php echo $_POST['zip'];?></td></tr>
<tr><td>city</td><td><?php echo $_POST['city'];?></td></tr>
<tr><td>street</td><td><?php echo $_POST['street'];?></td></tr>
<tr><td>country</td><td><?php echo $_POST['country'];?></td></tr>
</table>
</fieldset>
<fieldset>
<legend>pay method:  </legend>
<table>
<tr><td><?php echo $_POST['payMethod'];?></td></tr>
</table>
</fieldset>
<br> <br>

<form action="<?= $_SERVER['PHP_SELF'] . '?a=checkout';?>" method = "POST">
<input type="submit" name="submitOrder" value="submit order">
</form>
</div>

