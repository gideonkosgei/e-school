<?php require_once("../../../includes/initialize.php");?>
<?php include_layout_template('header_subfolder'); 
$prog=Program::find_all();

if(isset($_POST['view'])){
$pg=Program_course::find_by_program_course_by_Prog_id($_POST['program']);
if($pg){

$course_y_s=Course::find_courses_by_year_sem($_POST['semester'],$_POST['year']);

$_SESSION['prog']=$_POST['program'];
$_SESSION['sem']=$_POST['semester'];
$_SESSION['year']=$_POST['year'];



if(isset($_POST['edit'])){
if(isset($_POST['program_course_id'])){
$p_c=Program_course:: find_by_program_course_id($_POST['program_course_id']);
$code_array=$_POST['code'];
$source="";
foreach($code_array as $one_code){
$source .=$one_code.", ";
}
$p_c->program_course=$source;

if($p_c->save()){
		$message_type="success";
			$message="Changes Successfully Saved";
		}
		else{
		$message_type="error";
		$message="not success";
		}
		}

}
}
else{
$message_type="error";
		$message="The Course Does Not Have Courses";
}
}

?>
<nav class="art-nav">
    <ul class="art-hmenu"><li><a href="../home.php" class="">Home</a></li><li><a href="../departments.php" class="">Departments</a></li><li><a href="../programs.php" class="">Programs</a><ul class=""><li><a href="../programs/course-assignment.php" class="">Course Assignment</a></li><li><a href="../programs/program-course.php" class="">Program Course</a></li></ul></li><li><a href="../courses.php" class="active">Courses</a><ul class="active"><li><a href="../courses/course-view.php" class="active">Course Edit</a></li></ul></li><li><a href="../students.php">Students</a></li><li><a href="#">Reports</a><ul><li><a href="../reports/course-reports.php">Course Reports</a></li><li><a href="../reports/department-reports.php">Department Reports</a></li><li><a href="../reports/student-reports.php">Student Reports</a></li></ul></li><li><a href="#">Account</a><ul><li><a href="../account/my-account.php">My Account</a></li><li><a href="../account/student-account.php">Student Account</a></li></ul></li></ul> 
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
<ul class="art-vmenu"><li><a href="../home.php" class="">Home</a></li><li><a href="../departments.php" class="">Departments</a></li><li><a href="../programs.php" class="">Programs</a><ul class=""><li><a href="../programs/course-assignment.php" class="">Course Assignment</a></li><li><a href="../programs/program-course.php" class="">Program Course</a></li></ul></li><li><a href="../courses.php" class="active">Courses</a><ul class="active"><li><a href="../courses/course-view.php" class="active">Course Edit</a></li></ul></li><li><a href="../students.php">Students</a></li><li><a href="#">Reports</a><ul><li><a href="../reports/course-reports.php">Course Reports</a></li><li><a href="../reports/department-reports.php">Department Reports</a></li><li><a href="../reports/student-reports.php">Student Reports</a></li></ul></li><li><a href="#">Account</a><ul><li><a href="../account/my-account.php">My Account</a></li><li><a href="../account/student-account.php">Student Account</a></li></ul></li></ul>
                
        </div>
</div></div>
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
						<?php if($message==""){}else if($message_type=="success"){ echo "<div class='success'>".$message."</div>";} else{ echo "<div class='error'>".$message."</div>";}?>
                                <div class="art-postmetadataheader">
                                        <h2 class="art-postheader">Select Course To Edit</h2>
                                                            
                                    </div>
                                <div class="art-postcontent art-postcontent-0 clearfix">
								<br/>
								 <fieldset>	
								 
				<legend>Program's Course Edit</legend>
				<br/>
				<form action="course-view.php" method="post">
				<div class="fields"><b>SELECT PROGRAM </b>
				<select name="program">			
				
				<?php foreach($prog as $prog):?>
				
				<option value="<?php echo $prog->program_id;?>"><?php echo $prog->program_name;?></option>
				
				 <?php endforeach;?>
				</select>
				<select name="year"><option value="1">1st year</option><option value="2">2nd year</option><option value="3">3rd year</option><option value="4">4th year</option>
				<option value="5">5th year</option>
							</select>
				<select name="semester"><option value="1">1st semester</option><option value="2">2nd semester</option></select>
				<input type="submit" value="click to edit" name="view">
				</div>
				</form>
				</fieldset>
				<?php
				if(isset($_POST['view']) && $pg){?>
				
				<fieldset>				
				<legend>Courses</legend>
				<br/>
				<form action="course-view.php" method="post">
				
				
				<br/>
				
				<?php
				  $no=1;	
				foreach($course_y_s as $course):
								
					echo $no.". <input type='checkbox' name='code[]' value='$course->code' checked='checked' />  ".$course->code." - ".$course->course_name." <br/>";
					$no++;	
					
				endforeach;	
				
                $p=Program_course::find_course_by_prog_sem_year($_SESSION['prog'],$_SESSION['sem'],$_SESSION['year']);
										?>
			
				<br/>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="hidden" name="program_course_id" value="<?php echo $p->program_course_id;?>"/>
				<input type="submit" value="save changes" name="edit"/>
				</form>
				</fieldset>
				
				<?php
				}
				else{}
				?>
				
				
				
				
				
				
				
								
								</div>


</article></div>
                    </div>
                </div>
            </div><?php include_layout_template('footer'); ?>