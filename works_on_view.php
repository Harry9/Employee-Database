<?php
     include_once("includes/header.php");
	 $condition=1;
	 if($_REQUEST[search_text])
	 {
	    $pr=$_REQUEST[search_text];
		$condition.=" AND (w_id LIKE '%$pr%'";
		$condition.=" OR pr_id1 LIKE '%$pr%'";
		$condition.=" OR em_id1 LIKE '%$pr%'";
		$condition.=" OR hours LIKE '%$pr%')";
	 }  
	 $SQL="SELECT * FROM works_on WHERE $condition  ORDER BY w_id";
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




<h2 class="art-PostHeader" align="left">Works_on View </h2>
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
<form name="works_on_view" action="lib/works_on.php" method="post">
<table width="70%" border="1" align="center" class="table">
  <tr>
    <td colspan="7" align="right" ><strong><a href="works_on_add.php">Works_on Add </a> | <a href="Javascript:delete_multiple_works_on()">Delete</a> | <a href="Javascript:window.print()">Print</a> |<a href="lib/works_on.php?act=export_works_on&amp;w_id=<?=$data[w_id]?>">Export</a></strong></td>
  </tr>
  <tr>
    <th >Check</th>
    <th >S. No.</th>
    <th >Project Id</th>
    <th >Employee Id</th>
    <th >Working Hours</th>
    <th >Action</th>
  </tr>
  
  <?php
  while($data=mysql_fetch_assoc($rs))
  {
   ?>
  <tr>
    <td align="center" ><input name="w_id_multiple[]" type="checkbox" value="<?=$data[w_id]?>" /></td>
    <td align="center" ><?=$data['w_id']?></td>
    <td align="center" ><?=$data['pr_id1']?></td>
    <td ><a href="works_on_details.php?w_id=<?=$data['w_id']?>" rel="facebox"><?=$data['em_id1']?></a></td>
    <td ><?=$data['hours']?></td>
    
    <td ><a href="works_on_add.php?w_id=<?=$data['w_id']?>">Edit</a> | <a href="Javascript:delete_works_on(<?=$data['w_id']?>)">Delete</a></td>
  </tr>
  <?php } ?>
</table>
<input type="hidden" name="act" />
<input type="hidden" name="w_id" />
</form>
<?php 
   include_once("includes/footer.php");
?> 