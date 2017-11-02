<?php
     include_once("includes/header.php");
	 $condition=1;
	 if($_REQUEST[search_text])
	 {
	    $em=$_REQUEST[search_text];
		$condition.=" AND (em_name LIKE '%$em%'";
		$condition.=" OR em_father LIKE '%$em%'";
		$condition.=" OR em_id LIKE '%$em%'";
		$condition.=" OR em_mother LIKE '%$em%'";
		$condition.=" OR em_ms LIKE '%$em%'";
		$condition.=" OR em_dob LIKE '%$em%'";
		$condition.=" OR em_doj LIKE '%$em%'";
		$condition.=" OR em_mobile LIKE '%$em%'";
		$condition.=" OR em_gender LIKE '%$em%'";
		$condition.=" OR em_bg LIKE '%$em%'";
		$condition.=" OR em_email LIKE '%$em%'";
		$condition.=" OR em_salary LIKE '%$em%'";
	    $condition.=" OR em_super LIKE '%$em%'";
		$condition.=" OR em_dep LIKE '%$em%'";
		$condition.=" OR em_nationality LIKE '%$em%'";
		$condition.=" OR em_add1 LIKE '%$em%'";
		$condition.=" OR em_add2 LIKE '%$em%')";
	 }  
	 $SQL="SELECT * FROM employee WHERE $condition  ORDER BY em_id";
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




<h2 class="art-PostHeader" align="left">Employee View </h2>
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
<form name="employee_view" action="lib/employee.php" method="post">
<table width="70%" border="1" align="center" class="table">
  <tr>
    <td colspan="6" align="right" ><strong><a href="employee_add.php">Employee Add </a> | <a href="Javascript:delete_multiple_employee()">Delete</a> | <a href="Javascript:window.print()">Print</a> |<a href="lib/employee.php?act=export_employee&amp;em_id=<?=$data[em_id]?>">Export</a></strong></td>
  </tr>
  <tr>
    <th >Check</th>
    <th >Id no. </th>
    <th >Name</th>
    <th >Father Name </th>
    <th > Mobile </th>
    <th >Action</th>
  </tr>
  
  <?php
  while($data=mysql_fetch_assoc($rs))
  {
   ?>
  <tr>
    <td align="center" ><input name="em_id_multiple[]" type="checkbox" value="<?=$data[em_id]?>" /></td>
    <td align="center" ><?=$data['em_id']?></td>
    <td ><a href="employee_details.php?em_id=<?=$data['em_id']?>" rel="facebox"><?=$data['em_name']?></a></td>
    <td ><?=$data['em_father']?></td>
    <td ><?=$data['em_mobile']?></td>
    <td ><a href="employee_add.php?em_id=<?=$data['em_id']?>">Edit</a> | <a href="Javascript:delete_employee(<?=$data['em_id']?>)">Delete</a></td>
  </tr>
  <?php } ?>
</table>
<input type="hidden" name="act" />
<input type="hidden" name="em_id" />
</form>
<?php 
   include_once("includes/footer.php");
?> 