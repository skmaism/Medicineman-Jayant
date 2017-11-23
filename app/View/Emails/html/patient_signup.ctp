<table width="100%" border="0" cellspacing="1" cellpadding="0" class="gridtable">

<tr>
    <td width="21%" height="70">
	<img src="<?php echo _BASE_; ?>img/<?php echo $mySetting['size2'][0]."x".$mySetting['size2'][1].$mySetting['logo']; ?>" /></td>
    <td width="79%"><div class="cont">Call Us : <span>+91-<?php echo $mySetting['mobile']; ?></span> <br />Email Us: <span><?php echo $mySetting['email']; ?></span></div></td>
  </tr>
   <tr>
    <td colspan="2" style="border-top:#FA4002 1px solid;">
         <!-- text -->
     </td> 
  </tr>
<tr>
<td colspan="2" width="20%">Hi <?php echo ucwords($data['first_name']) ; ?>,</td>
</tr>
<tr>
<td colspan="2" width="20%">You have registered as patient.</td>
</tr>
<tr>
<td width="20%"> <strong>User Name</strong> </td>
<td width="80%"><?php echo $data['email'] ; ?></td>
</tr>
<tr>
  <td><strong>Password</strong></td>
  <td><?php echo $data['password']; ?></td>
</tr>


</table>

<a href="<?php echo FULL_BASE_URL.router::url('/',false); ?>patients/verify/<?php echo MD5($p_id); ?>">Please click here to verify your Email </a>