<div class="test1">

<div class="personalDataEdit">

<div class="register">

<form action="<?= $_SERVER['PHP_SELF'] . '?a=personalData&c=accounts&j=test2'; ?>" method="POST">
<div class="address">
<h3>change password</h3>
<div class="text">
<label for="oldPassword">old password: </label>
<input type="password" name="oldPassword" id="oldPassword"
 value="<?= isset($_POST['firstName']) 
 ? 'your password' : 'your password'?>"/>
 </div>
<br>
<div class="text"> 
<label for="newPassword">new password: </label>
<input type="password" name="newPassword" id="newPassword" 
value="<?= isset($_POST['newPassword']) 
 ? 'your password' : 'your password'?>"/>
 </div>
 <br>
 <div class="text">
 <label for="newPassword">new password check: </label>
<input type="password" name="newPasswordCheck" id="newPasswordCheck"
value="<?= isset($_POST['newPasswordCheck']) 
 ? 'your password' : 'your password'?>"/>
 </div>
 <br>
<div class="button">
 <input type="submit" value="submit edit" name="submitEditPassword">
 </div>
</div>
</form>

</div>

</div>

</div>
