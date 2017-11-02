<?php
####Function for generating the dynamic option list####
function get_option_list($table,$col_id,$col_value,$sel=0)
{
   $SQL="SELECT * FROM $table ORDER BY $col_value";
   $rs=mysql_query($SQL) or die(mysql_error());
   $option_list="<option value=0>Please Select</option>";
   while($data=mysql_fetch_assoc($rs))
   {
     if($data[$col_id]==$sel)
	 {
     $option_list.="<option value='$data[$col_id]' selected>$data[$col_value]</option>";
	 }
	  else
	 {
     $option_list.="<option value='$data[$col_id]'>$data[$col_value]</option>";
	 }
   }
   return $option_list;
}

####Function for generating the dynamic checkbox####
function get_check_list($table,$col_id,$col_value,$name,$sel=0)
{
   $SQL="SELECT * FROM $table ORDER BY $col_value";
   $rs=mysql_query($SQL) or die(mysql_error());
   $option_list="";
   $sel=explode(",",$sel);
   while($data=mysql_fetch_assoc($rs))
   {
      if(in_array($data[$col_id],$sel))
	  {
     $option_list.="<input type='checkbox' name='$name' value='$data[$col_id]' checked>$data[$col_value]<br>";
	 }
	 else
	 {
	      $option_list.="<input type='checkbox' name='$name' value='$data[$col_id]'>$data[$col_value]<br>";
	 }
   }
   return $option_list;
}

####Function for getting value####

function get_value($table,$col_id,$col_value,$id_value)
{
   $SQL="SELECT $col_value FROM $table WHERE $col_id=$id_value";
   $rs=mysql_query($SQL) or die(mysql_error());
   $data=mysql_fetch_assoc($rs);
   return $data[$col_value];  
}

####Function for getting multiple value####

function get_multiple_value($table,$col_id,$col_value,$id_value)
{
   $SQL="SELECT $col_value FROM $table WHERE $col_id IN ($id_value)";
   
   $rs=mysql_query($SQL) or die(mysql_error());
   while($data=mysql_fetch_assoc($rs))
   {
      $qualification.=$data[$col_value].",";
   }
   return $qualification;  
}
?>