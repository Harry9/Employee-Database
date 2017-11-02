<?php include_once("db_connect.php"); ?>
<?php 
      include_once("functions.php");
	  ini_set("display_errors",0);
	  $SERVER_PATH="http://127.0.0.1/php_employee/";
?>
<html>
<head>
<title>PHP Employee Project</title>
<script src="js/v.js" type="text/javascript"></script>
<script src="js/v1.js" type="text/javascript"></script>
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="templatemo_background_section_top">
	  <div class="templatemo_container">
	    <div id="templatemo_header">
	      <div id="templatemo_logo_section">
	        <h1>Symantec Corporation</h1>
	        <p>&nbsp;</p>            
		  <h2>Employee Management System</h2>
		  </div>
               
    </div><!-- end of headder -->
                
    		<div id="templatemo_menu_panel">
            
    			<div id="templatemo_menu_section">
                
            		<ul>
		                <li><a href="employee_view.php" <?php if (basename($_SERVER['PHP_SELF']) == "employee_view.php") { ?> class="selected" <?php } ?>>Employee</a></li>
        		        <li><a href="employee_salary.php">Salary</a></li>
        		        <li><a href="project_view.php">Project</a></li>
        		        <li><a href="works_on_view.php">Works On   </a></li>
        		        <li><a href="department_view.php">Department</a></li>                     
                        <li><a href="lg.php">Logout</a>                        </li>
            		</ul> 
                    
				</div>
                
		    </div> <!-- end of menu -->
            
	  </div><!-- end of container-->
        
	</div><!-- end of templatemo_background_section_top-->
    
    <div id="templatemo_background_section_middle">
    
    	<div class="templatemo_container">
        
        	<div id="templatemo_left_section">
            	
              <div class="templatemo_post">
                <div class="templatemo_post_mid_top">
</div>
                    
              <div class="templatemo_post_mid">
                    	                        
                        <p>&nbsp;</p>
