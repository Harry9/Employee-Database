function valid_employee(frm_obj)
{
    if(frm_obj.em_name.value=="")
   {
      alert("Please enter your name.");
	  frm_obj.em_name.focus();
	  return false;
   }
      if(frm_obj.em_father.value=="")
   {
      alert("Please enter your father name.");
	  frm_obj.em_father.focus();
	  return false;
   }
      if(frm_obj.em_mother.value=="")
   {
      alert("Please enter your mother name.");
	  frm_obj.em_mother.focus();
	  return false;
   }
      if(frm_obj.em_dob.value=="")
   {
      alert("Please enter your date of birth.");
	  frm_obj.em_dob.focus();
	  return false;
   }

      if(frm_obj.em_city.value==0)
   {
      alert("Please select your city.");
	  frm_obj.em_city.focus();
	  return false;
   }
         if(frm_obj.em_state.value==0)
   {
      alert("Please select your state.");
	  frm_obj.em_state.focus();
	  return false;
   }
         if(frm_obj.em_country.value==0)
   {
      alert("Please select your country.");
	  frm_obj.em_country.focus();
	  return false;
   }
     if(frm_obj.em_nationality.value=="")
   {
      alert("Please enter your nationality.");
	  frm_obj.em_nationality.focus();
	  return false;
   }
   
        if(frm_obj.em_gender[0].checked==false && frm_obj.em_gender[1].checked==false)
   {
      alert("Please select your gender.");
	  frm_obj.em_gender[0].focus();
	  return false;
   }
        if(frm_obj.em_ms[0].checked==false && frm_obj.em_ms[1].checked==false)
   {
      alert("Please select your marital status.");
	  frm_obj.em_ms[0].focus();
	  return false;
   }
     
      if(frm_obj.em_email.value=="")
   {
      alert("Please enter your email id.");
	  frm_obj.em_email.focus();
	  return false;
   }
      if(frm_obj.em_mobile.value=="")
   {
      alert("Please enter your mobile no..");
	  frm_obj.em_mobile.focus();
	  return false;
   }
          if(frm_obj.em_doj.value=="")
   {
      alert("Please enter your date of joining.");
	  frm_obj.em_doj.focus();
	  return false;
   }
         if(frm_obj.em_bg.value=="")
   {
      alert("Please enter your blood group.");
	  frm_obj.em_bg.focus();
	  return false;
   }
       return true;

}


function delete_employee(em_id)
{
   if(confirm("Do you want to delete the employee?"))
   {
      this.document.employee_view.em_id.value=em_id;
	  this.document.employee_view.act.value="delete_employee";
	  this.document.employee_view.submit();
   }

}

function delete_multiple_employee()
{
	if(confirm("Do you want to delete the multiple employees?"))
	{
		this.employee_view.act.value="delete_multiple_employee";
		this.employee_view.submit();
	}
}


function delete_project(pr_id)
{
   if(confirm("Do you want to delete the employee?"))
   {
      this.document.project_view.pr_id.value=pr_id;
	  this.document.project_view.act.value="delete_employee";
	  this.document.project_view.submit();
   }

}

function delete_multiple_project()
{
	if(confirm("Do you want to delete the multiple employees?"))
	{
		this.project_view.act.value="delete_multiple_employee";
		this.project_view.submit();
	}
}