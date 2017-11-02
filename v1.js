function valid_project(frm_obj)
{
   if(frm_obj.pr_name.value=="")
   {
      alert("Please enter project name.");
	  frm_obj.pr_name.focus();
	  return false;
   }
   
      if(frm_obj.pr_location.value=="")
   {
      alert("Please enter your project location .");
	  frm_obj.pr_location.focus();
	  return false;
   }
      if(frm_obj.pr_start.value=="")
   {
      alert("Please enter your project Start Date.");
	  frm_obj.pr_start.focus();
	  return false;
   }
        if(frm_obj.pr_start.value=="")
   {
      alert("Please enter your project Start Date.");
	  frm_obj.pr_start.focus();
	  return false;
   }    
          if(frm_obj.prde_num.value=="")
   {
      alert("Please enter your project department no..");
	  frm_obj.prde_num.focus();
	  return false;
   }
    return true;

}
function valid_department(frm_obj)
{
	  if(frm_obj.de_name.value=="")
   {
      alert("Please enter department name.");
	  frm_obj.de_name.focus();
	  return false;
   }
      if(frm_obj.de_loc.value=="")
   {
      alert("Please enter department location.");
	  frm_obj.de_loc.focus();
	  return false;
   }
}

function valid_works_on(frm_obj)
{
	
      if(frm_obj.em_id1.value=="")
   {
      alert("Please enter Employee name.");
	  frm_obj.em_id1.focus();
	  return false;
   }
     if(frm_obj.pr_id1.value=="")
   {
      alert("Please enter Project name.");
	  frm_obj.pr_id1.focus();
	  return false;
   }
       if(frm_obj.hours.value=="")
   {
      alert("Please enter  Hours.");
	  frm_obj.hours.focus();
	  return false;
   }
}

function delete_project(pr_id)
{
   if(confirm("Do you want to delete the project?"))
   {
      this.document.project_view.pr_id.value=pr_id;
	  this.document.project_view.act.value="delete_project";
	  this.document.project_view.submit();
   }

}

function delete_multiple_project()
{
	if(confirm("Do you want to delete the multiple project?"))
	{
		this.project_view.act.value="delete_multiple_project";
		this.project_view.submit();
	}
}

function delete_department(de_no)
{
   if(confirm("Do you want to delete the department?"))
   {
      this.document.department_view.de_no.value=de_no;
	  this.document.department_view.act.value="delete_department";
	  this.document.department_view.submit();
   }

}

function delete_multiple_department()
{
	if(confirm("Do you want to delete the multiple department?"))
	{
		this.department_view.act.value="delete_multiple_department";
		this.department_view.submit();
	}
}
function delete_works_on(w_id)
{
   if(confirm("Do you want to delete the data?"))
   {
      this.document.works_on_view.w_id.value=w_id;
	  this.document.works_on_view.act.value="delete_works_on";
	  this.document.works_on_view.submit();
   }

}

function delete_multiple_works_on()
{
	if(confirm("Do you want to delete the multiple data?"))
	{
		this.works_on_view.act.value="delete_multiple_works_on";
		this.works_on_view.submit();
	}
}