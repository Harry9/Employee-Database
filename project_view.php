<?php
     include_once("includes/header.php");
	 $condition=1;
	 if($_REQUEST[search_text])
	 {
	    $pr=$_REQUEST[search_text];
		$condition.=" AND (pr_name LIKE '%$pr%'";
		$condition.=" OR pr_location LIKE '%$pr%'";
		$condition.=" OR pr_end LIKE '%$pr%'";
		$condition.=" OR pr_start LIKE '%$pr%')";
	 }  
	 $SQL="SELECT * FROM project WHERE $condition  ORDER BY pr_id";
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




<h2 class="art-PostHeader" align="left">Project View </h2>
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
<form name="project_view" action="lib/project.php" method="post">
<table width="70%" border="1" align="center" class="table">
  <tr>
    <td colspan="6" align="right" ><strong><a href="project_add.php">Project Add </a> | <a href="Javascript:delete_multiple_project()">Delete</a> | <a href="Javascript:window.print()">Print</a> |<a href="lib/project.php?act=export_project&amp;pr_id=<?=$data[pr_id]?>">Export</a></strong></td>
  </tr>
  <tr>
    <th >Check</th>
    <th >Id no. </th>
    <th >Project Name</th>
    <th >Project Start Date</th>
    <th >Action</th>
  </tr>
  
  <?php
  while($data=mysql_fetch_assoc($rs))
  {
   ?>
  <tr>
    <td align="center" ><input name="pr_id_multiple[]" type="checkbox" value="<?=$data[pr_id]?>" /></td>
    <td align="center" ><?=$data['pr_id']?></td>
    <td ><a href="project_details.php?pr_id=<?=$data['pr_id']?>" rel="facebox"><?=$data['pr_name']?></a></td>
    <td ><?=$data['pr_start']?></td>
    
    <td ><a href="project_add.php?pr_id=<?=$data['pr_id']?>">Edit</a> | <a href="Javascript:delete_project(<?=$data['pr_id']?>)">Delete</a></td>
  </tr>
  <?php } ?>
</table>
<input type="hidden" name="act" />
<input type="hidden" name="pr_id" />
</form>
<?php 
   include_once("includes/footer.php");
?> 