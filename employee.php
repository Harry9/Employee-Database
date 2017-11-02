<?php
include_once("../includes/db_connect.php");
include_once("../includes/functions.php");
if(($_REQUEST['act']))
{
   $_REQUEST['act']();
   
}
function save_employee()
{
  $R=$_REQUEST;
  $R['em_qual']=implode(",",$R['em_qual']);
  print "<pre>";
  $image_name =$_FILES['em_photo']['name'];
  if($image_name)
  {
  $location =$_FILES['em_photo']['tmp_name'];
  $image_arr=explode(".",$image_name);
  $image_name=$image_arr[0]."_".time().".".$image_arr[1];
  move_uploaded_file($location,"../uploads/$image_name");
  }
  else
  {
    $image_name=$R['em_photo'];
  }
  if($R['em_id'])
  {
		$SQL=
		    "UPDATE `employee` SET 
			`em_name` = '$R[em_name]', 
			`em_father` = '$R[em_father]', 
			`em_mother` = '$R[em_mother]',
			`em_dob` = '$R[em_dob]', 
			`em_add1` = '$R[em_add1]', 
			`em_add2` = '$R[em_add2]',
			`em_city` = '$R[em_city]',
			`em_state` = '$R[em_state]', 
			`em_country` = '$R[em_country]',
			`em_nationality` = '$R[em_nationality]',
			`em_gender` = '$R[em_gender]',
			`em_qual` = '$R[em_qual]', 
			`em_ms` = '$R[em_ms]',
			`em_photo` = '$image_name',
			`em_email` = '$R[em_email]', 
			`em_mobile` = '$R[em_mobile]',
			`em_doj` = '$R[em_doj]',
			`em_bg` = '$R[em_bg]',
			`em_salary` = '$R[em_salary]',
			`em_dep` = '$R[em_dep]',
			`em_super` = '$R[em_super]'
			WHERE `em_id` = $R[em_id];
			";
	$msg="Employee Updated Successfully...";
  }
  else
  {
  $SQL="INSERT INTO `employee` (`em_name`, `em_father`, `em_mother`, `em_dob`, `em_add1`, `em_add2`, `em_city`, `em_state`, `em_country`, `em_nationality`, `em_gender`, `em_qual`, `em_ms`, `em_photo`, `em_email`, `em_mobile`,`em_doj`,`em_bg`,`em_salary`,`em_dep`,`em_super`) VALUES ('$R[em_name]', '$R[em_father]', '$R[em_mother]', '$R[em_dob]', '$R[em_add1]', '$R[em_add2]', '$R[em_city]', '$R[em_state]', '$R[em_country]', '$R[em_nationality]', '$R[em_gender]', '$R[em_qual]', '$R[em_ms]', '$image_name', '$R[em_email]', '$R[em_mobile]', '$R[em_doj]', '$R[em_bg]', '$R[em_salary]','$R[em_dep]','$R[em_super]');";
  $msg="Employee Saved Successfully...";
  }
   $rs=mysql_query($SQL) or die(mysql_error());
   if($rs)
   {
     header("Location:../employee_view?msg=$msg");
   }
}

####Function for Deleting the employee####
function delete_employee()
{
     ////Delete the image if exist///
	 $SQL="SELECT* FROM employee WHERE em_id='$_REQUEST[em_id]'";
     $rs=mysql_query($SQL) or die(mysql_error());
	 $data=mysql_fetch_assoc($rs);
	 if($data[em_photo])
	 {
	    unlink("../uploads/".$data[em_photo]);
	 }
    /////Delete the record from database///
   $SQL="DELETE FROM employee WHERE em_id=$_REQUEST[em_id]";
   $rs=mysql_query($SQL) or die(mysql_error());
   $msg="Employee Deleted Successfully...";
      if($rs)
   {
     header("Location:../employee_view?msg=$msg");
   }

}

####Function for Deleting multiple employees####
function delete_multiple_employee()
{
     $R=$_REQUEST;
     $em_id_array=$R['em_id_multiple'];
     foreach($em_id_array as $em_id)
	 {
			 ////Delete the image if exist///
			 $SQL="SELECT* FROM employee WHERE em_id='$em_id'";
			 $rs=mysql_query($SQL) or die(mysql_error());
			 $data=mysql_fetch_assoc($rs);
			 if($data['em_photo'])
			 {
				unlink("../uploads/".$data['em_photo']);
			 }
		     /////Delete the record from database///
		     $SQL="DELETE FROM employee WHERE em_id=$em_id";
		     $rs=mysql_query($SQL) or die(mysql_error());
	
	  }  
	  header("Location:../employee_view?msg=Employee Deleted Successfully...");
}

function export_employee()
{
  ini_set("display_errors",0);
  $SQL="SELECT* FROM employee ORDER BY em_id";
  $rs=mysql_query($SQL) or die(mysql_error());
  $heading=array("Id No.","Employee name","Father Name","Mother Name","Date of Birth","Address 1","Address 2","City","State","Country","Nationality","Gender","Qualification","Marital Status","Email","Mobile","Date Of Joining","Blood Group","Salary");
  $tsv[]=implode("\t",$heading);
  $fields=array();
  while($data=mysql_fetch_assoc($rs))
  {
	$fields['em_id']=$data['em_id']; 
	$fields['em_name']=$data['em_name'];
	$fields['em_father']=$data['em_father'];
	$fields['em_mother']=$data['em_mother'];
	$fields['em_dob']=$data['em_dob'];
	$fields['em_add1']=$data['em_add1'];
	$fields['em_add2']=$data['em_add2'];
	$fields['em_city']=get_value("city","city_id","city_name",$data[em_city]);
	$fields['em_state']=get_value("state","state_id","state_name",$data[em_state]);
	$fields['em_country']=get_value("country","country_id","country_name",$data[em_country]);
	$fields['em_nationality']=$data['em_nationality'];
	$fields['em_gender']=$data['em_gender'];
	$fields['em_qual']=get_multiple_value("qualification","qualification_id","qualification_name",$data['em_qual']);
	$fields['em_ms']=$data['em_ms'];
	$fields['em_email']=$data['em_email']; 
	$fields['em_mobile']=$data['em_mobile'];
	$fields['em_doj']=$data['em_doj'];
	$fields['em_bg']=$data['em_bg'];
	$fields['em_salary']=$data['em_salary'];
	$tsv[]=implode("\t",$fields);
  }
  
  $fileName='Empoyee.xis';
  header("Content-type: application/vnd.ms-exel");
  header("Content-Disposition: attachment; filename=$fileName");
  print_r($tsv);
}
?>