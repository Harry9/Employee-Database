<?php 
   include_once("includes/header.php");
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
<h2 class="art-PostHeader" align="left">Department Add </h2>
<form action="lib/department.php" enctype="multipart/form-data" name="department_frm" onSubmit="return valid_department(this);" method="post">
  <table width="70%" height="26" border="1" align="center" class="table">
  <tr>
    <th height="3" colspan="4" valign="bottom" ><span class="style3">Department  Registration Form</span> </th>
  </tr>
  <tr>
    <th height="5" align="center" valign="middle" >Department Name</th>
    <td height="5" align="left" ><input name="de_name" type="text" id="de_name" value="<?=$data['de_name']?>" /></td>
    <th height="5" align="center" valign="middle" >Department Location</th>
    <td height="5" align="left" valign="middle" ><input name="de_loc" type="text" id="de_loc"  value="<?=$data['de_loc']?>"/></td>
  </tr>
  <tr>
    <th height="3" align="center" valign="middle" >Manager No.</th>
    <th height="3" align="center" valign="middle" ><input name="de_man" type="text" id="de_man" value="<?=$data['de_man']?>" /></th>
    <th height="3" align="center" valign="middle" >&nbsp;</th>
    <th height="3" align="center" valign="middle" >&nbsp;</th>
  </tr>
  <tr>
    <th height="3" colspan="4" align="center" valign="middle" ><input type="submit" name="Submit" value="Submit" />
      <input type="reset" name="Submit2" value="Reset" /></th>
  </tr>
</table>
  <p>
  <input type="hidden" name="act" value="save_department" />
  <input type="hidden" name="de_no" value="<?=$data[de_no]?>" />
  </p>
</form>
<?php 
   include_once("includes/footer.php");
?>  