<?php
include_once("../includes/db_connect.php");
include_once("../includes/functions.php");
if(($_REQUEST['act']))
{
   $_REQUEST['act']();
   
}
function save_department()
{ 
  $R=$_REQUEST;
 
  print "<pre>";
 
  if($R['de_no'])
  {
		$SQL=
		    "UPDATE `department` SET 
			`de_name` = '$R[de_name]', 
			`de_loc` = '$R[de_loc]',
			`de_man` = '$R[de_man]'
			WHERE `de_no` = $R[de_no];
			";
	$msg="Department Updated Successfully...";
  }
  else
  {
	 $SQL="INSERT INTO `department` ( `de_name`, `de_loc`,`de_man`) VALUES ( '$R[de_name]', '$R[de_loc]', '$R[de_man]');";
	 

  $msg="Department Saved Successfully...";
  }
   $rs=mysql_query($SQL) or die(mysql_error());
   if($rs)
   {
     header("Location:../department_view?msg=$msg");
   }
}

####Function for Deleting the department####
function delete_department()
{
    /////Delete the record from database///
   $SQL="DELETE FROM department WHERE de_no=$_REQUEST[de_no]";
   $rs=mysql_query($SQL) or die(mysql_error());
   $msg="Department Deleted Successfully...";
      if($rs)
   {
     header("Location:../department_view?msg=$msg");
   }

}

####Function for Deleting multiple departments####
function delete_multiple_department()
{
     $R=$_REQUEST;     
     $de_no_array=$R['de_no_multiple'];
     foreach($de_no_array as $de_no)
	 {

		     /////Delete the record from database///
		     $SQL="DELETE FROM department WHERE de_no=$de_no";
		     $rs=mysql_query($SQL) or die(mysql_error());
	
	 }  
	  header("Location:../department_view?msg=Department Deleted Successfully...");
}

function export_department()
{
  ini_set("display_errors",0);
  $SQL="SELECT* FROM department ORDER BY de_no";
  $rs=mysql_query($SQL) or die(mysql_error());
  $heading=array("Department No.","Department name","Department Location");
  $tsv[]=implode("\t",$heading);
  $fields=array();
  while($data=mysql_fetch_assoc($rs))
  {
	$fields['de_no']=$data['de_no']; 
	$fields['de_name']=$data['de_name'];
	$fields['de_loc']=$data['de_loc'];
	$tsv[]=implode("\t",$fields);
  }
  
  $fileName='Department.xis';
  header("Content-type: application/vnd.ms-exel");
  header("Content-Disposition: attachment; filename=$fileName");
  print_r($tsv);
}
?>