<?php
     include_once("includes/header.php");
	 $condition=1;
	 if($_REQUEST[search_text])
	 {
	    $de=$_REQUEST[search_text];
		$condition.=" AND (de_name LIKE '%$de%'";
		$condition.=" OR de_no LIKE '%$de%'";
		$condition.=" OR de_man LIKE '%$de%'";
		$condition.=" OR de_loc  LIKE '%$de%')";
	 }  
	 $SQL="SELECT * FROM department WHERE $condition  ORDER BY de_no";
     $rs=mysql_query($SQL) or die(mysql_error());
?>

  <link href="plugins/facebox/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <link href="plugins/facebox/example.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="plugins/facebox/jquery.js" type="text/javascript"></script>
  <script src="plugins/facebox/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : '../src/loading.gif',
        closeImage   : '../src/closelabel.png'
      })
    })
  </script>




<h2 class="art-PostHeader" align="left">Department View </h2>
<div align="center"><?=$_REQUEST['msg']?></div>
<form name="search_text" action="#">
<table width="70%" border="0" align="center" class="table">
  <tr>
    <th align="left" scope="col">Search Text : 
      <input type="text" name="search_text" />
      <input name="Search" type="submit" id="Search" value="Search" /></th>
  </tr>
</table>
</form>
<form name="department_view" action="lib/department.php" method="post">
<table width="70%" border="1" align="center" class="table">
  <tr>
    <td colspan="6" align="right" ><strong><a href="department_add.php">Department Add </a> | <a href="Javascript:delete_multiple_department()">Delete</a> | <a href="Javascript:window.print()">Print</a> |<a href="lib/department.php?act=export_department&amp;de_no=<?=$data[de_no]?>">Export</a></strong></td>
  </tr>
  <tr>
    <th >Check</th>
    <th >Department  no. </th>
    <th >Department  Name</th>
    <th >Department Location</th>
    <th >Action</th>
  </tr>
  
  <?php
  while($data=mysql_fetch_assoc($rs))
  {
   ?>
  <tr>
    <td align="center" ><input name="de_no_multiple[]" type="checkbox" value="<?=$data['de_no']?>" /></td>
    <td align="center" ><?=$data['de_no']?></td>
    <td ><a href="department_details.php?de_no=<?=$data['de_no']?>" rel="facebox"><?=$data['de_name']?></a></td>
    <td ><?=$data['de_loc']?></td>
    
    <td ><a href="department_add.php?de_no=<?=$data['de_no']?>">Edit</a> | <a href="Javascript:delete_department(<?=$data['de_no']?>)">Delete</a></td>
  </tr>
  <?php } ?>
</table>
<input type="hidden" name="act" />
<input type="hidden" name="de_no" />
</form>
<?php 
   include_once("includes/footer.php");
?> 