<?php 
	$SERVER_PATH="http://127.0.0.1/php_employee/";
    include("includes/db_connect.php");
	include("includes/functions.php");
	ini_set("display_errors",0);
    if($_REQUEST['w_id'])
   {
      $SQL="SELECT * FROM works_on WHERE w_id = '$_REQUEST[w_id]'";
	  $rs=mysql_query($SQL) or die(mysql_error());
	  $data=mysql_fetch_assoc($rs);
   }
?>
<style type="text/css">
<!--
.style3 {font-size: 24px}
-->
</style>
<h2 class="art-PostHeader" align="left">works_on  Details </h2>
<form action="lib/works_on.php" enctype="multipart/form-data" name="works_on_frm" onsubmit="return valid_works_on(this);" method="post">
  <table width="70%" height="28" border="1" align="center" class="table">
  <tr>
    <th height="3" colspan="4" valign="bottom" ><span class="style3">works_on Details View</span></th>
  </tr>
  <tr>
    <th height="5" align="center" valign="middle" >Employee Id</th>
    <td height="5" align="left" ><?=$data['em_id1']?></td>
    <th height="5" align="center" valign="middle" >Project Id</th>
    <td height="5" align="left" valign="middle" ><?=$data['pr_id1']?></td>
  </tr>
  <tr>
    <th height="5" align="center" valign="middle" >Hours</th>
    <td height="5" align="left" ><?=$data['hours']?></td>

  </tr>
  <tr>
    <th height="3" colspan="4" align="center" valign="middle" ><input type="button" value="Print" onclick="window.print()"/></th>
  </tr>
</table>

</form>
 