<?php 
   include_once("includes/header.php");
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
<h2 class="art-PostHeader" align="left">project Add </h2>
<form action="lib/project.php" enctype="multipart/form-data" name="project_frm" onSubmit="return valid_project(this);" method="post">
  <table width="70%" height="33" border="1" align="center" class="table">
  <tr>
    <th height="3" colspan="4" valign="bottom" ><span class="style3">Project  Registration Form</span> </th>
  </tr>
  <tr>
    <th height="5" align="center" valign="middle" >Project Name</th>
    <td height="5" align="left" ><input name="pr_name" type="text" id="pr_name" value="<?=$data['pr_name']?>" /></td>
    <th height="5" align="center" valign="middle" >Project Location</th>
    <td height="5" align="left" valign="middle" ><input name="pr_location" type="text" id="pr_location" value="<?=$data['pr_location']?>" /></td>
  </tr>
  <tr>
    <th height="5" align="center" valign="middle" >Project Starting Date</th>
    <td height="5" align="left" ><input name="pr_start" type="text" id="pr_start"  value="<?=$data['pr_start']?>"/></td>
    <th height="5" align="center" valign="middle" >Project Ending Date</th>
    <td height="5" align="left" valign="middle" ><input name="pr_end" type="text" id="pr_end" value="<?=$data['pr_end']?>" /></td>
  </tr>
  <tr>
    <th height="3" align="center" valign="middle" >Department no.</th>
    <th height="3" align="center" valign="middle" ><input name="prde_num" type="text" id="de_num"  value="<?=$data['prde_num']?>"/></th>
    <th height="3" align="center" valign="middle" >&nbsp;</th>
    <th height="3" align="center" valign="middle" >&nbsp;</th>
  </tr>
  <tr>
    <th height="3" colspan="4" align="center" valign="middle" ><input type="submit" name="Submit" value="Submit" />
      <input type="reset" name="Submit2" value="Reset" /></th>
  </tr>
</table>
  <p>
  <input type="hidden" name="act" value="save_project" />
  <input type="hidden" name="pr_id" value="<?=$data[pr_id]?>" />
  </p>
</form>
<?php 
   include_once("includes/footer.php");
?>  