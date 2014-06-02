<?php require_once("../../includes/initialize.php");?>
<?php include_layout_template('header'); 

if(isset($_POST['submit'])){

$Duplicate_program=Program::find_by_program_prefix($_POST['prefix'],$_POST['name']);

	if(isset($_POST['program_id'])){
	$program=Program::find_by_program_id($_POST['program_id']);	
	$program->program_name=$_POST['name'];
	$program->duration=$_POST['duration'];
	$program->program_prefix=strtoupper(trim($_POST['prefix']));
	$program->department_id=$_POST['department'];
		
		
	
		if($program->save()){
		$message_type="success";
			$message="Changes Successfully Saved";
		}
		else{
		$message_type="error";
		$message="Nothing To Be Updated. Information Remained The same";
		}
		
		
		
		
	}
	else{
		
	$program=new Program();
	$program->program_name=$_POST['name'];
	$program->duration=$_POST['duration'];
	$program->program_prefix=strtoupper(trim($_POST['prefix']));
	$program->department_id=$_POST['department'];

	if($Duplicate_program){
		$message_type="error";
	    $message="A Program With The Same Prefix Or Name Already Exists";
		}
	else{
		if($program->save()){
	$message_type="success";
	$message="Program Successfully Registered";
		}
		else{
		$message_type="error";
		$message="not success";
		}
		}
		
		
	}
}

if(isset($_GET['action'])){
	 if(isset($_GET['program_id'])){
		 if($_GET['action']=='delete'){
			$program=Program::find_by_program_id($_GET['program_id']);
			if(!empty($program)){
				if($program->delete()){
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
$programs=Program::find_all();//TO BE REMOVED
$dept=Department::find_all();//selects all departments




?>
<nav class="art-nav">
    <ul class="art-hmenu"><li><a href="home.php" class="">Home</a></li><li><a href="departments.php" class="">Departments</a></li><li><a href="programs.php" class="active">Programs</a><ul class="active"><li><a href="programs/course-assignment.php">Course Assignment</a></li><li><a href="programs/program-course.php">Program Course</a></li></ul></li><li><a href="courses.php">Courses</a><ul><li><a href="courses/course-view.php">Course Edit</a></li></ul></li><li><a href="students.php">Students</a></li><li><a href="#">Reports</a><ul><li><a href="reports/course-reports.php">Course Reports</a></li><li><a href="reports/department-reports.php">Department Reports</a></li><li><a href="reports/student-reports.php">Student Reports</a></li></ul></li><li><a href="#">Account</a><ul><li><a href="account/my-account.php">My Account</a></li><li><a href="account/student-account.php">Student Account</a></li></ul></li></ul> 
   
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
<ul class="art-vmenu"><li><a href="home.php" class="">Home</a></li><li><a href="departments.php" class="">Departments</a></li><li><a href="programs.php" class="active">Programs</a><ul class="active"><li><a href="programs/course-assignment.php">Course Assignment</a></li><li><a href="programs/program-course.php">Program Course</a></li></ul></li><li><a href="courses.php">Courses</a><ul><li><a href="courses/course-view.php">Course Edit</a></li></ul></li><li><a href="students.php">Students</a></li><li><a href="#">Reports</a><ul><li><a href="reports/course-reports.php">Course Reports</a></li><li><a href="reports/department-reports.php">Department Reports</a></li><li><a href="reports/student-reports.php">Student Reports</a></li></ul></li><li><a href="#">Account</a><ul><li><a href="account/my-account.php">My Account</a></li><li><a href="account/student-account.php">Student Account</a></li></ul></li></ul>
                
        </div>
</div></div>
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
						<?php if($message==""){}else if($message_type=="success"){ echo "<div class='success'>".$message."</div>";} else{ echo "<div class='error'>".$message."</div>";}?>
                                <div class="art-postmetadataheader">
                                        <h2 class="art-postheader">Programs Registration</h2>
                                                            
                                    </div>
                                <div class="art-postcontent art-postcontent-0 clearfix">
								
								
								<br/>
								
								
								
								
								<div class="register">	
				<?php 
				 if((isset($_GET['action']))&&($_GET['action']=='edit')){
					 $prog=Program::find_by_program_id($_GET['program_id']);
				?>
                <fieldset>		
				<legend>Edit</legend>
				<form action="programs.php" method="post">
				<div class="fields">PROGRAM PREFIX</div>
				<div class="fields"><input type="text" name="prefix" readonly="true" value="<?php echo $prog->program_prefix;  ?>" required pattern="[a-z A-Z]{3}"/></div>
				<div class="fields">PROGRAM NAME</div>
				<div class="fields"><input type="text" name="name" title="only characters are allowed" value="<?php echo $prog->program_name;?>" required pattern="[a-z A-Z]+"/></div>
				<div class="fields">DURATION</div>
				<div class="fields"><input type="text" name="duration" title="Numbers Only Of Length 1. can Either be 4 or 5" value="<?php  echo $prog->duration ; ?>" required pattern="[4-5]{1}"/></div>
				<div class="fields">DEPARTMENT NAME</div>
				<div class="fields">
				<select name="department" required>	
     			<?php $no=1; foreach($dept as $department): ?>
				<option value="<?php echo $department->department_id;?>"><?php echo $department->department_name;?></option>
				 <?php $no++; endforeach;?>
				 </select> 
				 </div>	
	             <input type="hidden" name="program_id" value="<?php  echo $prog->program_id; ?>"/>
				<div class="fields"><input type="submit" value="Save Changes" name="submit"></div>
				</form>
				</fieldset>
				<?php 
				}
				else{
				?>
				 <fieldset>		
				<legend>Register</legend>
				<form action="programs.php" method="post">
				<div class="fields">PROGRAM PREFIX</div>
				<div class="fields"><input type="text" name="prefix"  title="Only 3 Characters Allowed" required pattern="[a-z A-Z]{3}"/></div>
				<div class="fields">PROGRAM NAME</div>
				<div class="fields"><input type="text" name="name" title="only characters are allowed" required pattern="[a-z A-Z]+"/></div>
				<div class="fields">DURATION</div>
				<div class="fields"><input type="text" name="duration" title="Numbers Only Of Length 1. can Either be 4 or 5" required pattern="[4-5]{1}"/></div>
				<div class="fields">DEPARTMENT NAME</div>
				<div class="fields">
				<select name="department" required>	
                 <option></option>				
      			<?php foreach($dept as $department): ?>
				<option value="<?php echo $department->department_id;?>"><?php echo $department->department_name;?></option>
				 <?php endforeach;?>
				 </select> 
				 </div>	
	
				<div class="fields"><input type="submit" value="REGISTER" name="submit"></div>
				</form>
				</fieldset>
				
				
				<?php }?>
				
				</div>
				
				
				<div class="details">
				<fieldset>
				<legend>Details</legend>
				<table>
				<tr><th>#</th><th><u>PREFIX</u></th><th><u>PROGRAM</u></th><th><u>DEPARTMENT NAME</u></th><th><u>DURATION</u></th><th><u>ACTION</u></th></tr>
				<?php $no=1; foreach($programs as $programs):?>
				
				<tr><td><?php echo $no;?></td><td><?php echo $programs->program_prefix;?></td><td><?php echo $programs->program_name;?></td><td>
				<?php $dept=Department::find_by_department_id($programs->department_id); echo $dept->department_name;?>
				</td><td><?php echo $programs->duration ." Years";?></td><td><a href="programs.php?program_id=<?php echo $programs->program_id?>&action=delete"><input type="button" value="delete"></a><a href="programs.php?program_id=<?php echo $programs->program_id?>&action=edit"><input type="button" value="edit"></a></td></tr>
			     <?php $no++; endforeach;?>
				</table>
				</fieldset>
				</div>
		
								
								
								
								</div>


</article></div>
                    </div>
                </div>
            </div><?php include_layout_template('footer'); ?>