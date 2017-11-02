<?php
include_once("../includes/db_connect.php");
include_once("../includes/functions.php");
if(($_REQUEST['act']))
{
   $_REQUEST['act']();
 
   
}
function save_project()
{ 
  $R=$_REQUEST;
 
  print "<pre>";
 
  if($R['pr_id'])
  {
		$SQL=
		    "UPDATE `project` SET 
			`pr_name` = '$R[pr_name]', 
			`pr_location` = '$R[pr_location]',
			`pr_start` = '$R[pr_start]',
			`pr_end` = '$R[pr_end]',
			`prde_num` = '$R[prde_num]'
			WHERE `pr_id` = $R[pr_id];
			";
	$msg="Project Updated Successfully...";
  }
  else
  {
	 $SQL="INSERT INTO `project` ( `pr_name`, `pr_location`, `pr_start`, `pr_end`,`prde_num`) VALUES ('$R[pr_name]', '$R[pr_location]', '$R[pr_start]', '$R[pr_end]','$R[prde_num]');";
	 

  $msg="Project Saved Successfully...";
  }
   $rs=mysql_query($SQL) or die(mysql_error());
   if($rs)
   {
     header("Location:../project_view?msg=$msg");
   }
}

####Function for Deleting the project####
function delete_project()
{

    /////Delete the record from database///
   $SQL="DELETE FROM project WHERE pr_id=$_REQUEST[pr_id]";
   $rs=mysql_query($SQL) or die(mysql_error());
   $msg="Project Deleted Successfully...";
      if($rs)
   {
     header("Location:../project_view?msg=$msg");
   }

}

####Function for Deleting multiple projects####
function delete_multiple_project()
{
     $R=$_REQUEST;
     $pr_id_array=$R['pr_id_multiple'];
     foreach($pr_id_array as $pr_id)
	 {

		     /////Delete the record from database///
		     $SQL="DELETE FROM project WHERE pr_id=$pr_id";
		     $rs=mysql_query($SQL) or die(mysql_error());
	
	 }  
	  header("Location:../project_view?msg=Project Deleted Successfully...");
}

function export_project()
{
  ini_set("display_errors",0);
  $SQL="SELECT* FROM project ORDER BY pr_id";
  $rs=mysql_query($SQL) or die(mysql_error());
  $heading=array("Id No.","Project name","Project Location","Project Starting Date","Project Ending Date");
  $tsv[]=implode("\t",$heading);
  $fields=array();
  while($data=mysql_fetch_assoc($rs))
  {
	$fields['pr_id']=$data['pr_id']; 
	$fields['pr_name']=$data['pr_name'];
	$fields['pr_location']=$data['pr_location'];
	$fields['pr_start']=$data['pr_start'];
	$tsv[]=implode("\t",$fields);
  }
  
  $fileName='Project.xis';
  header("Content-type: application/vnd.ms-exel");
  header("Content-Disposition: attachment; filename=$fileName");
  print_r($tsv);
}
?>