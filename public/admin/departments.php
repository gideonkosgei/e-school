<?php require_once("../../includes/initialize.php");?>
<?php include_layout_template('header'); 

if(isset($_POST['submit'])){
$duplicate_department=Department::find_by_department_name($_POST['department_name']);
	
	if(isset($_POST['department_id'])){
	
			
		$department=Department::find_by_department_id($_POST['department_id']);
		$department->department_name=trim($_POST['department_name']);
			if($duplicate_department){
			$message_type="error";
	         $message="A Department With The Same Name Already Exists";}
			else{
		if($department->save()){
		$message_type="success";
			$message="Changes Successfully Saved";
		}
		else{
		$message_type="error";
		$message="Nothing To Be Updated. Information Remained The same";
		}
		}
		
		
	}
	
	
	else{
	if($duplicate_department){
	
	$message_type="error";
	$message="A Department With The Same Name Already Exists";
	
	
	}else{
		
		$department=new Department();
		$department->department_name=trim($_POST['department_name']);

		if($department->save()){
		$message_type="success";
			$message="Department Successfully Registered";
		}
		else{
		$message_type="error";
		$message="not success";
		}
		}
	}
}

if(isset($_GET['action'])){
	 if(isset($_GET['department_id'])){
		 if($_GET['action']=='delete'){
			$department=Department::find_by_department_id($_GET['department_id']);
			if(!empty($department)){
				if($department->delete()){
				$message_type="success";
					$message="Delete succesful";
				}
				else{
				$message_type="error";
					$message="Delete failed";
				}
			 }
			 else{
			 		$message_type="error";
			 $message="No record";
			 }
		 }
	}
	 else{
	 		$message_type="error";
	    $message="You did not provide department ID no action taken";
	 }
}

//select all for diaplay
$departments=Department::find_all();


?>
<nav class="art-nav">
    <ul class="art-hmenu"><li><a href="home.php" class="">Home</a></li><li><a href="departments.php" class="active">Departments</a></li><li><a href="programs.php">Programs</a><ul><li><a href="programs/course-assignment.php">Course Assignment</a></li><li><a href="programs/program-course.php">Program Course</a></li></ul></li><li><a href="courses.php">Courses</a><ul><li><a href="courses/course-view.php">Course Edit</a></li></ul></li><li><a href="students.php">Students</a></li><li><a href="#">Reports</a><ul><li><a href="reports/course-reports.php">Course Reports</a></li><li><a href="reports/department-reports.php">Department Reports</a></li><li><a href="reports/student-reports.php">Student Reports</a></li></ul></li><li><a href="#">Account</a><ul><li><a href="account/my-account.php">My Account</a></li><li><a href="account/student-account.php">Student Account</a></li></ul></li></ul> 
     <ul class="art-hmenu" style="float:right;">
	<li> <span style="text-align:justify;">
	
	<p><a href="logout.php"><img src="../images/logout.png" alt="logout"></a></p>
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
<ul class="art-vmenu"><li><a href="home.php" class="">Home</a></li><li><a href="departments.php" class="active">Departments</a></li><li><a href="programs.php">Programs</a><ul><li><a href="programs/course-assignment.php">Course Assignment</a></li><li><a href="programs/program-course.php">Program Course</a></li></ul></li><li><a href="courses.php">Courses</a><ul><li><a href="courses/course-view.php">Course Edit</a></li></ul></li><li><a href="students.php">Students</a></li><li><a href="#">Reports</a><ul><li><a href="reports/course-reports.php">Course Reports</a></li><li><a href="reports/department-reports.php">Department Reports</a></li><li><a href="reports/student-reports.php">Student Reports</a></li></ul></li><li><a href="#">Account</a><ul><li><a href="account/my-account.php">My Account</a></li><li><a href="account/student-account.php">Student Account</a></li></ul></li></ul>
                
        </div>
</div></div>
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
						<?php if($message==""){}else if($message_type=="success"){ echo "<div class='success'>".$message."</div>";} else{ echo "<div class='error'>".$message."</div>";}?>
                                <div class="art-postmetadataheader">
                                        <h2 class="art-postheader">Departments Registration</h2>
                                                            
                                    </div>
                                <div class="art-postcontent art-postcontent-0 clearfix">
								
								<br/>
								
								
								
								
								<div class="register">	
				<?php 
				 if((isset($_GET['action']))&&($_GET['action']=='edit')){
					 $department=Department::find_by_department_id($_GET['department_id']);
				?>
                <fieldset>		
				<legend>Edit</legend>
				<form action="departments.php" method="post">
				<div class="fields">DEPARTMENT NAME</div>
				<div class="fields"><input type="text" name="department_name" title="only characters are allowed" value="<?php echo $department->department_name; ?>"required pattern="[a-z A-Z]+" /></div>
				<input type="hidden" name="department_id" value="<?php echo $department->department_id; ?>"/> 
				<div class="fields"><input type="submit" value="Edit" name="submit"></div>
				</form>
				</fieldset>
				<?php 
				}
				else{
				?>
				 <fieldset>		
				<legend>Register</legend>
				<form action="departments.php" method="post">
				<div class="fields">DEPARTMENT NAME</div>
				<div class="fields"><input type="text" name="department_name" title="only characters are allowed" required pattern="[a-z A-Z]+"/></div>
				<div class="fields"><input type="submit" value="Add New" name="submit"></div>
				</form>
				</fieldset>
				
				
				<?php }?>
				
				</div>
				
				
				<div class="details">
				<fieldset>
				<legend>Details</legend>
				<table>
				<tr><th>#</th><th><u>DEPARTMENT NAME</u></th><th><u>ACTION</u></th></tr>
				<?php $no=1; foreach($departments as $department): ?>
				<tr><td><?php echo $no;?></td><td><?php echo $department->department_name;?></td><td><a href="departments.php?department_id=<?php echo $department->department_id?>&action=delete"><input type="button" value="delete"></a><a href="departments.php?department_id=<?php echo $department->department_id?>&action=edit"><input type="button" value="edit"></a></td></tr>
			     <?php $no++; endforeach;?>
				</table>
				</fieldset>
				</div>
								
								
								
								
								
								</div>


</article></div>
                    </div>
                </div>
            </div><?php include_layout_template('footer'); ?>