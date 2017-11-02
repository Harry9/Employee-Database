<?php 
    include("includes/db_connect.php");
	ini_set("display_errors",0);
    if($_REQUEST['em_id'])
   {
      $SQL="SELECT em_salary,em_name,em_id FROM employee WHERE em_id = '$_REQUEST[em_id]'";
	  $rs=mysql_query($SQL) or die(mysql_error());
	  $data=mysql_fetch_assoc($rs);
	  $total_salary=$data['em_salary'];
   }
?>

<form name="salary_frm" action="lib/salary.php">
<table  border="1" align="center" class="tble">
  <tr>
    <td colspan="2">Employee Salary Entry Form</td>
  </tr>
  <tr>
    <td>Employee Name</td>
    <td><strong><?=$data['em_name']?></strong></td>
  </tr>
  <tr>
    <td>Salary Amount</td>
    <td><input type="text" name="salary_amount" id="salary_amount" class="input_box"/></td>
  </tr>
  <tr>
    <td>Salary Date</td>
    <td><input type="text" name="salary_date" id="salary_date" class="input_box" /></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="button" id="button" value="Submit" />
      <input type="reset" name="button2" id="button2" value="Reset" /></td>
  </tr>
</table>
<input type="hidden" value="<?=$data[em_id]?>" name="em_id" />
<input type="hidden" value="save_salary" name="act" />
</form>

<p>
  <?php
    $SQL="SELECT * FROM salary WHERE salary_em_id=$_REQUEST[em_id]";
   $rs=mysql_query($SQL) or die(mysql_error());
?>
</p>
<p>&nbsp; </p>
<div style="height:150; overflow:scroll"> 
  <table width="200" border="1" align="center" class="table">
  <tr>
    <td>S. No.</td>
    <td>Salary Date</td>
    <td>Salary Amount</td>
  </tr> 
<?php
   $sr_no=1;
   $total_paid_salary=0;
   while($data=mysql_fetch_assoc($rs))
   {
	 $total_paid_salary+=$data[salary_amount];
  ?>  
  <tr>
    <td><?=$sr_no++?></td>
    <td><?=$data[salary_amount]?></td>
    <td><?=$data[salary_date]?></td>
  </tr>
  <?php }
  $balance=$total_salary-$total_paid_salary;
   ?>

</table>
</div>
<table  border="1" align="center" class="table">
  <tr>
    <td>Total Salary</td>
    <td><?=$total_salary;?></td>
    <td>Total Paid Salry</td>
    <td><?=$total_paid_salary;?></td>
    <td>Balance</td>
    <td><?=$balance;?></td>
  </tr>
</table>
<p>&nbsp;</p>
