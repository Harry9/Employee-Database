<?php 
   include_once("includes/header.php");
   if($_REQUEST['em_id'])
   {
      $SQL="SELECT * FROM employee WHERE em_id = '$_REQUEST[em_id]'";
	  $rs=mysql_query($SQL) or die(mysql_error());
	  $data=mysql_fetch_assoc($rs);
   }
?>
<style type="text/css">
<!--
.style3 {font-size: 24px}
-->
</style>
<h2 class="art-PostHeader" align="left">Employee Add </h2>
<form action="lib/employee.php" enctype="multipart/form-data" name="employee_frm" onSubmit="return valid_employee(this);" method="post">
  <table width="70%" height="350" border="1" align="center" class="table">
  <tr>
    <th height="3" colspan="4" valign="bottom" ><span class="style3">Employee Registration Form</span> </th>
  </tr>
  <tr>
    <th height="5" align="center" valign="middle" >Name</th>
    <td height="5" align="left" ><input name="em_name" type="text" id="em_name" value="<?=$data['em_name']?>" /></td>
    <th height="5" align="center" valign="middle" >Father's Name </th>
    <td height="5" align="left" valign="middle" ><input name="em_father" type="text" id="em_father" value="<?=$data['em_father']?>" /></td>
  </tr>
  <tr>
    <th height="5" align="center" valign="middle" >Mother's Name </th>
    <td height="5" align="left" ><input name="em_mother" type="text" id="em_mother"  value="<?=$data['em_mother']?>"/></td>
    <th height="5" align="center" valign="middle" >Date Of Birth (yy-mm-dd)</th>
    <td height="5" align="left" valign="middle" ><input name="em_dob" type="text" id="em_dob"  value="<?=$data['em_dob']?>" /></td>
  </tr>
  <tr>
    <th height="5" align="center" valign="middle" >Address1</th>
    <td height="5" align="left" ><textarea name="em_add1" id="em_add1"><?=$data['em_add1']?></textarea></td>
    <th height="5" align="center" valign="middle" >Address2</th>
    <td height="5" align="left" valign="middle" ><textarea name="em_add2" id="em_add2"> <?=$data['em_add2']?></textarea></td>
  </tr>
  <tr>
    <th height="5" align="center" valign="middle" >City</th>
    <td height="5" align="left" ><select name="em_city" id="em_city">
	<?php echo get_option_list("city","city_id","city_name",$data[em_city]); ?>
    </select>    </td>
    <th height="5" align="center" valign="middle" >State</th>
    <td height="5" align="left" valign="middle" ><select name="em_state" id="em_state">
	<?php echo get_option_list("state","state_id","state_name",$data['em_state']);?>
      </select></td>
  </tr>
  <tr>
    <th height="5" align="center" valign="middle" >Country</th>
    <td height="5" align="left" ><select name="em_country" id="em_country">
	  <?php echo get_option_list("country","country_id","country_name",$data['em_country']);?>
      </select></td>
    <th height="5" align="center" valign="middle" >Nationality</th>
    <td height="5" align="left" valign="middle" ><input name="em_nationality" type="text" id="em_nationality" value="<?=$data['em_nationality']?>"/></td>
  </tr>
  <tr align="left">
    <th height="5" valign="middle" >Gender</th>
    <td height="5" align="left" ><input name="em_gender" type="radio" value="Male" <?php if($data['em_gender']=="Male") echo "checked";?> />
      Male 
      <input name="em_gender" type="radio" value="Female" <?php if($data['em_gender']=="Female") echo "checked";?> /> 
      Female </td>
    <th height="5" valign="middle" >Qualification</th>
    <td height="5" align="left" valign="middle" >
	<div style="height:100; overflow:scroll"><?php echo get_check_list("qualification","qualification_id","qualification_name","em_qual[]",$data['em_qual']);?>  </div>  </td>
  </tr>
  <tr>
    <th height="5" align="center" valign="middle" >Marital Status </th>
    <td height="5" align="left" ><input name="em_ms" type="radio" value="Married" <?php if($data['em_ms']=="Married") echo "checked";?>/>
       Married   <input name="em_ms" type="radio" value="Unmarried" <?php if($data['em_ms']=="Unmarried") echo "checked";?> /> 
      Unmarried </td>
    <th height="5" align="center" valign="middle" >Photo</th>
    <td height="5" align="left" valign="middle" ><input name="em_photo" type="file" id="em_photo" />
	<?php
	    if($data[em_photo])
		{
		    echo "<br><img src='$SERVER_PATH/uploads/$data[em_photo]' height=50";
		}
		?>	</td>
  </tr>
  <tr>
    <th height="3" align="center" valign="middle" >Email address </th>
    <td height="3" align="left" ><input name="em_email" type="text" id="em_email" value="<?=$data['em_email']?>" /></td>
    <th height="3" align="center" valign="middle" >Mobile no. </th>
    <td height="3" align="left" valign="middle" ><input name="em_mobile" type="text" id="em_mobile" value="<?=$data['em_mobile']?>" /></td>
  </tr>
  <tr>
    <th height="3" align="center" valign="middle" >Date Of Joining (yy-mm-dd)</th>
    <td height="3" align="left" ><input name="em_doj" type="text" id="em_doj" value="<?=$data['em_doj']?>" /></td>
    <th height="3" align="center" valign="middle" >Blood Group </th>
    <td height="3" align="left" valign="middle" ><input name="em_bg" type="text" id="em_bg" value="<?=$data['em_bg']?>" /></td>
  </tr>
  <tr>
    <th height="5" align="center" valign="middle" >Total Salary</th>
    <td height="5" align="left" ><input name="em_salary" type="text" id="em_salary"  value="<?=$data['em_salary']?>"/></td>
    <th height="5" align="center" valign="middle" >Department No.</th>
    <td height="5" align="left" valign="middle" ><input name="em_dep" type="text" id="em_dep"  value="<?=$data['em_dep']?>"/></td>
  </tr>
  <tr>
    <th height="5" align="center" valign="middle" >Supervisor No.(if any)</th>
    <td height="5" align="left" ><input name="em_super" type="text" id="em_super"  value="<?=$data['em_super']?>"/></td>
    <th height="5" align="center" valign="middle" >&nbsp;</th>
    <td height="5" align="left" valign="middle" >&nbsp;</td>
  </tr>
  <tr>
    <th height="3" colspan="4" align="center" valign="middle" ><input type="submit" name="Submit" value="Submit" />
      <input type="reset" name="Submit2" value="Reset" /></th>
  </tr>
</table>
  <p>
  <input type="hidden" name="em_photo" value="<?=$data[em_photo]?>" />
  <input type="hidden" name="act" value="save_employee" />
  <input type="hidden" name="em_id" value="<?=$data[em_id]?>" />
  </p>
</form>
<?php 
   include_once("includes/footer.php");
?>  