<?php 
	$SERVER_PATH="http://127.0.0.1/php_employee/";
    include("includes/db_connect.php");
	include("includes/functions.php");
	ini_set("display_errors",0);
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
<h2 class="art-PostHeader" align="left">Employee Details </h2>
<form action="lib/employee.php" enctype="multipart/form-data" name="employee_frm" onsubmit="return valid_employee(this);" method="post">
  <table width="70%" height="350" border="1" align="center" class="table">
  <tr>
    <th height="3" colspan="4" valign="bottom" ><span class="style3">Employee Details View</span></th>
  </tr>
  <tr>
    <th height="5" align="center" valign="middle" >Name</th>
    <td height="5" align="left" ><?=$data['em_name']?></td>
    <th height="5" align="center" valign="middle" >Father's Name </th>
    <td height="5" align="left" valign="middle" ><?=$data['em_father']?></td>
  </tr>
  <tr>
    <th height="5" align="center" valign="middle" >Mother's Name </th>
    <td height="5" align="left" ><?=$data['em_mother']?></td>
    <th height="5" align="center" valign="middle" >Date Of Birth </th>
    <td height="5" align="left" valign="middle" ><?=$data['em_dob']?></td>
  </tr>
  <tr>
    <th height="5" align="center" valign="middle" >Address1</th>
    <td height="5" align="left" ><?=$data['em_add1']?></td>
    <th height="5" align="center" valign="middle" >Address2</th>
    <td height="5" align="left" valign="middle" ><?=$data['em_add1']?></td>
  </tr>
  <tr>
    <th height="5" align="center" valign="middle" >City</th>
    <td height="5" align="left" ><?=get_value("city","city_id","city_name", $data['em_city'])?></td>
    <th height="5" align="center" valign="middle" >State</th>
    <td height="5" align="left" valign="middle" ><?=get_value("state","state_id","state_name", $data['em_state'])?>
  <tr>
    <th height="5" align="center" valign="middle" >Country</th>
    <td height="5" align="left" ><?=get_value("country","country_id","country_name", $data['em_country'])?></td>
    <th height="5" align="center" valign="middle" >Nationality</th>
    <td height="5" align="left" valign="middle" ><?=$data['em_nationality']?></td>
  </tr>
  <tr align="left">
    <th height="5" valign="middle" >Gender</th>
    <td height="5" align="left" ><?=$data['em_gender']?></td>
    <th height="5" valign="middle" >Qualification</th>
    <td height="5" align="left" valign="middle" >
    <?=get_multiple_value("qualification","qualification_id","qualification_name", $data['em_qual'])?>  </td>
  </tr>
  <tr>
    <th height="5" align="center" valign="middle" >Marital Status </th>
    <td height="5" align="left" ><?=$data['em_ms']?></td>
    <th height="5" align="center" valign="middle" >Photo</th>
    <td height="5" align="left" valign="middle" ><?php
	    if($data[em_photo])
		{
		    echo "<br><img src='$SERVER_PATH/uploads/$data[em_photo]' height=50";
		}
		?>	</td>
  </tr>
  <tr>
    <th height="3" align="center" valign="middle" >Email address </th>
    <td height="3" align="left" ><?=$data['em_email']?></td>
    <th height="3" align="center" valign="middle" >Mobile no. </th>
    <td height="3" align="left" valign="middle" ><?=$data['em_mobile']?></td>
  </tr>
  <tr>
    <th height="3" align="center" valign="middle" >Date Of Joining</th>
    <td height="3" align="left" ><?=$data['em_doj']?></td>
    <th height="3" align="center" valign="middle" >Blood Group </th>
    <td height="3" align="left" valign="middle" ><?=$data['em_bg']?></td>
  </tr>
  <tr>
    <th height="3" align="center" valign="middle" >Total Salary</th>
    <td height="3" align="left" ><?=$data['em_salary']?></td>
    <th height="3" align="center" valign="middle" >Department No.</th>
    <td height="3" align="left" valign="middle" ><?=$data['em_dep']?></td>
  </tr>
  <tr>
    <th height="3" align="center" valign="middle" >Supervisor No.(if any)</th>
    <td height="3" align="left" ><?=$data['em_super']?></td>
  </tr>
  <tr>
    <th height="3" colspan="4" align="center" valign="middle" ><input type="button" value="Print" onclick="window.print()"/></th>
  </tr>
</table>

</form>
 