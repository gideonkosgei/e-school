<?php require_once("../../../includes/initialize.php");?>
<?php include_layout_template('header_subfolder'); 

$course=Course::find_all();
$prog=Program::find_all();
$course_y_s=null;

if(isset($_POST['view'])){
$sem=$_POST['semester'];
$y=$_POST['year'];

$course_y_s=Course::find_courses_by_year_sem($y,$sem);

	}
	
	
if(isset($_POST['assign'])){
if(empty($_POST['code'])){
$message_type="error";
$message="You Must Select Alleast One Course.Process Failed";
}
else{
$p_c=new program_course();

$code_array=$_POST['code'];
$source="";
foreach($code_array as $one_code){
$source .=$one_code.", ";
}
$p_c->semester=$_POST['semester'];
$p_c->year=$_POST['year'];
$p_c->program_id=$_POST['program'];
$p_c->program_course=$source;

if($p_c->save()){
		$message_type="success";
			$message="Program Course Assignment Successfully Registered";
		}
		else{
		$message_type="error";
		$message="not success";
		}
		}

}
	




?>
<nav class="art-nav">
    <ul class="art-hmenu"><li><a href="../home.php" class="">Home</a></li><li><a href="../departments.php" class="">Departments</a></li><li><a href="../programs.php" class="active">Programs</a><ul class="active"><li><a href="../programs/course-assignment.php" class="active">Course Assignment</a></li><li><a href="../programs/program-course.php">Program Course</a></li></ul></li><li><a href="../courses.php">Courses</a><ul><li><a href="../courses/course-view.php">Course Edit</a></li></ul></li><li><a href="../students.php">Students</a></li><li><a href="#">Reports</a><ul><li><a href="../reports/course-reports.php">Course Reports</a></li><li><a href="../reports/department-reports.php">Department Reports</a></li><li><a href="../reports/student-reports.php">Student Reports</a></li></ul></li><li><a href="#">Account</a><ul><li><a href="../account/my-account.php">My Account</a></li><li><a href="../account/student-account.php">Student Account</a></li></ul></li></ul> 
   
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
<ul class="art-vmenu"><li><a href="../home.php" class="">Home</a></li><li><a href="../departments.php" class="">Departments</a></li><li><a href="../programs.php" class="active">Programs</a><ul class="active"><li><a href="../programs/course-assignment.php" class="active">Course Assignment</a></li><li><a href="../programs/program-course.php">Program Course</a></li></ul></li><li><a href="../courses.php">Courses</a><ul><li><a href="../courses/course-view.php">Course Edit</a></li></ul></li><li><a href="../students.php">Students</a></li><li><a href="#">Reports</a><ul><li><a href="../reports/course-reports.php">Course Reports</a></li><li><a href="../reports/department-reports.php">Department Reports</a></li><li><a href="../reports/student-reports.php">Student Reports</a></li></ul></li><li><a href="#">Account</a><ul><li><a href="../account/my-account.php">My Account</a></li><li><a href="../account/student-account.php">Student Account</a></li></ul></li></ul>
                
        </div>
</div></div>
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
						<?php if($message==""){}else if($message_type=="success"){ echo "<div class='success'>".$message."</div>";} else{ echo "<div class='error'>".$message."</div>";}?>
                              <div class="art-postmetadataheader">
                                        <h3 class="art-postheader">Assign Program Courses</h3>
                                                            
                                 </div>
                                <div class="art-postcontent art-postcontent-0 clearfix"><br/>
								
								
								
								<div class="register">	

				 <fieldset>		
				<legend>Register</legend>
				<form action="course-assignment.php" method="post">
				<div class="fields">YEAR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <select name="year">
				<option value="1">1st</option>
				<option value="2">2nd</option>
				<option value="3">3rd</option>
				<option value="4">4th</option>
				<option value="5">5th</option>
				
				</select> </div>
				
				<div class="fields">SEMESTER
				<select name="semester">
				<option value="1">1st</option>
				<option value="2">2nd</option>
				

				</select>
				<br/>
				<br/>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="view courses" name="view">
				</form>
				</fieldset>	
				
				</div>
				
				<?php if($course_y_s){ ?>
				<div class="details">	
	            <fieldset>				
				<legend>Courses</legend>
				<br/>
				<form action="course-assignment.php" method="post">
				<div class="fields"><b>SELECT PROGRAM </b>
				<select name="program">			
				
				<?php foreach($prog as $prog):?>
				
				<option value="<?php echo $prog->program_id;?>"><?php echo $prog->program_name;?></option>
				
				 <?php endforeach;?>
				</select></div>
				<u><H4>Select Courses To Assign</H4></u>
				<br/>
				
				<?php
				  $no=1;	
				foreach($course_y_s as $course):	          
					echo $no.". <input type='checkbox' name='code[]' value='$course->code' />  ".$course->code." - ".$course->course_name." <br/>";
					$no++;			
				endforeach;	

				?>
			
				<br/>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="hidden" name="semester" value="<?php echo $course->semester; ?>"/>
				<input type="hidden" name="year" value="<?php echo $course->year; ?>"/>
				<input type="submit" value="assign" name="assign"/>
				</form>
				</fieldset>
				</div>
				<?php } else{
				if(isset($_POST['assign'])){
				
				echo"<h2>There Are No Courses That Meet That Criteria</h2>";}
				else{
				}
				}?>
								
								
								
								
								
								
								
								
								</div>


</article></div>
                    </div>
                </div>
            </div><?php include_layout_template('footer'); ?>