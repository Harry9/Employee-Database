<?php
include_once("../includes/db_connect.php");
include_once("../includes/functions.php");
if(($_REQUEST['act']))
{
   $_REQUEST['act']();
 
   
}
function save_works_on()
{ 
  $R=$_REQUEST;
 
  print "<pre>";
 
  if($R['w_id'])
  {
		$SQL=
		    "UPDATE `works_on` SET 
			`em_id1` = '$R[em_id1]', 
			`pr_id1` = '$R[pr_id1]',
			`hours` = '$R[hours]'
			WHERE `w_id` = $R[w_id];
			";
	$msg="Project Updated Successfully...";
  }
  else
  {
	 $SQL="INSERT INTO `works_on` ( `em_id1`, `pr_id1`, `hours`) VALUES ('$R[em_id1]', '$R[pr_id1]', '$R[hours]');";
	 

  $msg="Data Saved Successfully...";
  }
   $rs=mysql_query($SQL) or die(mysql_error());
   if($rs)
   {
     header("Location:../works_on_view?msg=$msg");
   }
}

####Function for Deleting the works_on####
function delete_works_on()
{

    /////Delete the record from database///
   $SQL="DELETE FROM works_on WHERE w_id=$_REQUEST[w_id]";
   $rs=mysql_query($SQL) or die(mysql_error());
   $msg="Data Deleted Successfully...";
      if($rs)
   {
     header("Location:../works_on_view?msg=$msg");
   }

}

####Function for Deleting multiple works_ons####
function delete_multiple_works_on()
{
     $R=$_REQUEST;
     $w_id_array=$R['w_id_multiple'];
     foreach($w_id_array as $w_id)
	 {

		     /////Delete the record from database///
		     $SQL="DELETE FROM works_on WHERE w_id=$w_id";
		     $rs=mysql_query($SQL) or die(mysql_error());
	
	 }  
	  header("Location:../works_on_view?msg=Data Deleted Successfully...");
}

function export_works_on()
{
  ini_set("display_errors",0);
  $SQL="SELECT* FROM works_on ORDER BY w_id";
  $rs=mysql_query($SQL) or die(mysql_error());
  $heading=array("Project Id","Employee Id","Hours");
  $tsv[]=implode("\t",$heading);
  $fields=array();
  while($data=mysql_fetch_assoc($rs))
  {
	$fields['pr_id1']=$data['pr_id1']; 
	$fields['em_id1']=$data['em_id1'];
	$fields['hours']=$data['hours'];
	$tsv[]=implode("\t",$fields);
  }
  
  $fileName='Works On.xis';
  header("Content-type: application/vnd.ms-exel");
  header("Content-Disposition: attachment; filename=$fileName");
  print_r($tsv);
}
?>