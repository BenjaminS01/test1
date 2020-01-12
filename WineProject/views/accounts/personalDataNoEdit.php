<div class="personalData">
<h1>your personal data</h1>

<div class="fieldset">
<h4>personal data <a href="?c=accounts&a=personalData&j=test">edit</a></h4>
<table>
<tr><td>firstname: </td><td><?php echo $this->_params['customer'][0]['firstName'];?></td></tr>
<tr><td>lastname:</td> <td><?php echo $this->_params['customer'][0]['lastName'];?></td></tr>
<tr><td>email: </td><td><?php echo $this->_params['account'][0]['email'];?></td></tr>
<tr><td>phone number: </td><td><?php echo $this->_params['customer'][0]['phoneNumber'];?></td></tr>
<tr><td>date of birth: </td><td><?php echo $this->_params['dateOfBirthInRightOrder'];?></td></tr>
</table>


<h4>address <a href="?c=accounts&a=personalData&j=test1">edit</a></h4>
<table>
<tr><td>zip: </td><td><?php echo $this->_params['address'][0]['zip'];?></td></tr>
<tr><td>city</td><td><?php echo $this->_params['address'][0]['city'];?></td></tr>
<tr><td>street</td><td><?php echo $this->_params['address'][0]['street'];?></td></tr>
<tr><td>country</td><td><?php echo $this->_params['address'][0]['country'];?></td></tr>
</table>


<h4>change password <a href="?c=accounts&a=personalData&j=test2">edit</a></h4>

</div>
</div>