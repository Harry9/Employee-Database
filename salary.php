<?php
include_once("../includes/db_connect.php");
if(($_REQUEST['act']))
{
   $_REQUEST['act']();
   
}
function save_salary()
{
	$R=$_REQUEST;
	$SQL="INSERT INTO `salary` ( `salary_em_id`, `salary_amount`, `salary_date`) VALUES ( '$R[em_id]', '$R[salary_amount]', '$R[salary_date]');";
	$rs=mysql_query($SQL) or die(mysql_error());
   $msg="Salary Saved Successfully...";
      if($rs)
   {
     header("Location:../employee_salary.php?msg=$msg");
   }
}
?>