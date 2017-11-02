<?php 
	$SERVER_PATH="http://127.0.0.1/php_employee/";
    include("includes/db_connect.php");
	include("includes/functions.php");
	ini_set("display_errors",0);
    if($_REQUEST['de_no'])
   {
      $SQL="SELECT * FROM department WHERE de_no = '$_REQUEST[de_no]'";
	  $rs=mysql_query($SQL) or die(mysql_error());
	  $data=mysql_fetch_assoc($rs);
   }
?>
<style type="text/css">
<!--
.style3 {font-size: 24px}
-->
</style>
<h2 class="art-PostHeader" align="left">Department  Details </h2>
<form action="lib/department.php" enctype="multipart/form-data" name="department_frm" onsubmit="return valid_department(this);" method="post">
  <table width="70%" height="28" border="1" align="center" class="table">
  <tr>
    <th height="3" colspan="4" valign="bottom" ><span class="style3">Department Details View</span></th>
  </tr>
  <tr>
    <th height="5" align="center" valign="middle" >Department  Name</th>
    <td height="5" align="left" ><?=$data['de_name']?></td>
    <th height="5" align="center" valign="middle" >Department Location</th>
    <td height="5" align="left" valign="middle" ><?=$data['de_loc']?></td>
  </tr>
  <tr>
    <th height="5" align="center" valign="middle" >Manager No.</th>
    <td height="5" align="left" ><?=$data['de_man']?></td>
  </tr>
  <tr>
    <th height="3" colspan="4" align="center" valign="middle" ><input type="button" value="Print" onclick="window.print()"/></th>
  </tr>
</table>

</form>
 