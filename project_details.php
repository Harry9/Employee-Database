<?php 
	$SERVER_PATH="http://127.0.0.1/php_employee/";
    include("includes/db_connect.php");
	include("includes/functions.php");
	ini_set("display_errors",0);
    if($_REQUEST['pr_id'])
   {
      $SQL="SELECT * FROM project WHERE pr_id = '$_REQUEST[pr_id]'";
	  $rs=mysql_query($SQL) or die(mysql_error());
	  $data=mysql_fetch_assoc($rs);
   }
?>
<style type="text/css">
<!--
.style3 {font-size: 24px}
-->
</style>
<h2 class="art-PostHeader" align="left">Project  Details </h2>
<form action="lib/project.php" enctype="multipart/form-data" name="project_frm" onsubmit="return valid_project(this);" method="post">
  <table width="70%" height="28" border="1" align="center" class="table">
  <tr>
    <th height="3" colspan="4" valign="bottom" ><span class="style3">Project Details View</span></th>
  </tr>
  <tr>
    <th height="5" align="center" valign="middle" >Project Name</th>
    <td height="5" align="left" ><?=$data['pr_name']?></td>
    <th height="5" align="center" valign="middle" >Project Location</th>
    <td height="5" align="left" valign="middle" ><?=$data['pr_location']?></td>
  </tr>
  <tr>
    <th height="5" align="center" valign="middle" >Project Starting Date</th>
    <td height="5" align="left" ><?=$data['pr_start']?></td>
    <th height="5" align="center" valign="middle" >Project Ending Date</th>
    <td height="5" align="left" valign="middle" ><?=$data['pr_end']?></td>
  </tr>
  <tr>
    <th height="3" colspan="4" align="center" valign="middle" ><input type="button" value="Print" onclick="window.print()"/></th>
  </tr>
</table>

</form>
 