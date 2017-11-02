<?php 
   include_once("includes/header.php");
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
<h2 class="art-PostHeader" align="left">Employee Project Add </h2>
<form action="lib/works_on.php" enctype="multipart/form-data" name="works_on_frm" onSubmit="return valid_works_on(this);" method="post">
  <table width="70%" height="28" border="1" align="center" class="table">
  <tr>
    <th height="3" colspan="4" valign="bottom" ><span class="style3">Employee Project Form</span> </th>
  </tr>
  <tr>
    <th height="5" align="center" valign="middle" >Employee Id</th>
    <td height="5" align="left" ><input name="em_id1" type="text" id="em_id1" value="<?=$data['em_id1']?>" /></td>
    <th height="5" align="center" valign="middle" >Project Id</th>
    <td height="5" align="left" valign="middle" ><input name="pr_id1" type="text" id="pr_id1" value="<?=$data['pr_id1']?>" /></td>
  </tr>
  <tr>
    <th height="5" align="center" valign="middle" >Hours</th>
    <td height="5" align="left" ><input name="hours" type="text" id="hours"  value="<?=$data['hours']?>"/></td>
    <th height="5" align="center" valign="middle" >&nbsp;</th>
    <td height="5" align="left" valign="middle" >&nbsp;</td>
  </tr>
  <tr>
    <th height="3" colspan="4" align="center" valign="middle" ><input type="submit" name="Submit" value="Submit" />
      <input type="reset" name="Submit2" value="Reset" /></th>
  </tr>
</table>
  <p>
  <input type="hidden" name="act" value="save_works_on" />
  <input type="hidden" name="w_id" value="<?=$data[w_id]?>" />
  </p>
</form>
<?php 
   include_once("includes/footer.php");
?>  