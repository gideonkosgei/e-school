<?php require_once("../../../includes/initialize.php");?>
<?php include_layout_template('header_subfolder'); 
$admin=Administrator::find_by_administrator_id(1);

if(isset($_POST['submit'])){
 
    if(trim($_POST['old_password'])!= $admin->password){	
	$message_type="error";
	$message="The Old Password You Have Provided Does Not Match With The One In The System";	
	}
	else if($_POST['password']!=$_POST['con_password']){
	$message_type="error";
	$message="password fields did not match";
		}
			else {
         //change password
					$admin->password=trim($_POST['password']);	
					if($admin->save()){
					$message_type="success";
					$message="password Successfully changed";
					}
					else{
					$message_type="error";
					$message="Password Remained The Same";
					}
		
		    }
}



?>

<nav class="art-nav">
    <ul class="art-hmenu"><li><a href="../home.php" class="">Home</a></li><li><a href="../departments.php" class="">Departments</a></li><li><a href="../programs.php" class="">Programs</a><ul class=""><li><a href="../programs/course-assignment.php" class="">Course Assignment</a></li><li><a href="../programs/program-course.php" class="">Program Course</a></li></ul></li><li><a href="../courses.php" class="">Courses</a><ul class=""><li><a href="../courses/course-view.php" class="">Course Edit</a></li></ul></li><li><a href="../students.php" class="">Students</a></li><li><a href="#" class="">Reports</a><ul class=""><li><a href="../reports/course-reports.php" class="">Course Reports</a></li><li><a href="../reports/department-reports.php" class="">Department Reports</a></li><li><a href="../reports/student-reports.php" class="">Student Reports</a></li></ul></li><li><a href="#" class="active">Account</a><ul class="active"><li><a href="../account/my-account.php" class="active">My Account</a></li><li><a href="../account/student-account.php">Student Account</a></li></ul></li></ul> 
    
	<ul class="art-hmenu" style="float:right;">
	<li> <span style="text-align:justify;">
	
	<p><a href="../logout.php"><img src="../../images/logout.png" alt="logout"></a></p>
	</span>	</li>	</ul>
	
	</nav>
<div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-sidebar1"><div class="art-vmenublock clearfix">
        <div class="art-vmenublockheader">
            <h3 class="t">MENU</h3>
        </div>
        <div class="art-vmenublockcontent">
<ul class="art-vmenu"><li><a href="../home.php" class="">Home</a></li><li><a href="../departments.php" class="">Departments</a></li><li><a href="../programs.php" class="">Programs</a><ul class=""><li><a href="../programs/course-assignment.php" class="">Course Assignment</a></li><li><a href="../programs/program-course.php" class="">Program Course</a></li></ul></li><li><a href="../courses.php" class="">Courses</a><ul class=""><li><a href="../courses/course-view.php" class="">Course Edit</a></li></ul></li><li><a href="../students.php" class="">Students</a></li><li><a href="#" class="">Reports</a><ul class=""><li><a href="../reports/course-reports.php" class="">Course Reports</a></li><li><a href="../reports/department-reports.php" class="">Department Reports</a></li><li><a href="../reports/student-reports.php" class="">Student Reports</a></li></ul></li><li><a href="#" class="active">Account</a><ul class="active"><li><a href="../account/my-account.php" class="active">My Account</a></li><li><a href="../account/student-account.php">Student Account</a></li></ul></li></ul>
                
        </div>
</div></div>
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
						<?php if($message==""){}else if($message_type=="success"){ echo "<div class='success'>".$message."</div>";} else{ echo "<div class='error'>".$message."</div>";}?>
                                <div class="art-postmetadataheader">
                                        <h2 class="art-postheader">Manage My Account</h2>
                                                            
                                    </div>
                                <div class="art-postcontent art-postcontent-0 clearfix"><br/>
								
								
								<div class="register">	
			
				
             <fieldset>		
				<legend>Account</legend>
			
				
				<form method="post" action="my-account.php">
				<div class="fields">OLD PASSWORD</div>
				<div class="fields"><input type="password" name="old_password"required/></div>
				<div class="fields">NEW PASSWORD</div>
				<div class="fields"><input type="password" name="password" required/></div>
				<div class="fields">CONFIRM PASSWORD</div>
				<div class="fields"><input type="password" name="con_password" required/></div>
				<div class="fields"><input type="submit" value="CHANGE" name="submit"></div>
				 </form>
				 
				</fieldset>	
	            				
				</div>
								
								
								
								
								
								</div>


</article></div>
                    </div>
                </div>
            </div><?php include_layout_template('footer'); ?>