<?php require_once("../../includes/initialize.php");?>
<?php include_layout_template('header');

if(isset($_POST['submit'])){
$duplicate_code=course::find_by_course_code($_POST['code']);
	if(isset($_POST['course_id'])){
	$course=Course::find_by_course_id($_POST['course_id']);			
	$code=strtoupper(trim($_POST['code'])); 
	$name=trim($_POST['name']); 
	$codes=str_replace(" ","",$code);
	$names=str_replace(" ","_",$name);		
	$course->code=$codes;
	$course->course_name=$names;
	$course->year=trim($_POST['year']);
	$course->units=trim($_POST['units']);
	$course->semester=trim($_POST['semester']);
	$course->elective_core=trim($_POST['option']);
	

	

		if($course->save()){
		$message_type="success";
			$message="Changes Successfully Saved";
		}
		else{
		$message_type="error";
		$message="Nothing To Be Updated. Information Remained The same";
		}
	}
	else{
		
		$course=new Course();
	$code=strtoupper(trim($_POST['code'])); 
	$name=trim($_POST['name']); 
	$codes=str_replace(" ","",$code);
	$names=str_replace(" ","_",$name);
		
	$course->code=$codes;
	$course->course_name=$names;
	$course->year=trim($_POST['year']);
	$course->units=trim($_POST['units']);
	$course->semester=trim($_POST['semester']);
	$course->elective_core=trim($_POST['option']);

	if($duplicate_code){
	$message_type="error";
    $message="A Course With The Same Code Already Exists";
	}
	else{
		if($course->save()){
		$message_type="success";
			$message="Course Successfully Registered";
		}
		else{
		$message_type="error";
		$message="not success";
		}
		}
		
		
	}
}
if(isset($_POST['search'])){


$results=course::find_by_course_code($_POST['code']);


}




if(isset($_GET['action'])){
	 if(isset($_GET['course_id'])){
		 if($_GET['action']=='delete'){
			$course=Course::find_by_course_id($_GET['course_id']);
			if(!empty($course)){
				if($course->delete()){
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
$cs=Course::find_all_ordered();


 ?>
<nav class="art-nav">
    <ul class="art-hmenu"><li><a href="home.php" class="">Home</a></li><li><a href="departments.php" class="">Departments</a></li><li><a href="programs.php" class="">Programs</a><ul class=""><li><a href="programs/course-assignment.php" class="">Course Assignment</a></li><li><a href="programs/program-course.php" class="">Program Course</a></li></ul></li><li><a href="courses.php" class="active">Courses</a><ul class="active"><li><a href="courses/course-view.php">Course Edit</a></li></ul></li><li><a href="students.php">Students</a></li><li><a href="#">Reports</a><ul><li><a href="reports/course-reports.php">Course Reports</a></li><li><a href="reports/department-reports.php">Department Reports</a></li><li><a href="reports/student-reports.php">Student Reports</a></li></ul></li><li><a href="#">Account</a><ul><li><a href="account/my-account.php">My Account</a></li><li><a href="account/student-account.php">Student Account</a></li></ul></li></ul> 
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
<ul class="art-vmenu"><li><a href="home.php" class="">Home</a></li><li><a href="departments.php" class="">Departments</a></li><li><a href="programs.php" class="">Programs</a><ul class=""><li><a href="programs/course-assignment.php" class="">Course Assignment</a></li><li><a href="programs/program-course.php" class="">Program Course</a></li></ul></li><li><a href="courses.php" class="active">Courses</a><ul class="active"><li><a href="courses/course-view.php">Course Edit</a></li></ul></li><li><a href="students.php">Students</a></li><li><a href="#">Reports</a><ul><li><a href="reports/course-reports.php">Course Reports</a></li><li><a href="reports/department-reports.php">Department Reports</a></li><li><a href="reports/student-reports.php">Student Reports</a></li></ul></li><li><a href="#">Account</a><ul><li><a href="account/my-account.php">My Account</a></li><li><a href="account/student-account.php">Student Account</a></li></ul></li></ul>
                
        </div>
</div></div>
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
						<?php if($message==""){}else if($message_type=="success"){ echo "<div class='success'>".$message."</div>";} else{ echo "<div class='error'>".$message."</div>";}?>
                                <div class="art-postmetadataheader">
                                        <h2 class="art-postheader">Course Registration</h2>
                                                            
                                    </div>
                                <div class="art-postcontent art-postcontent-0 clearfix">
								
								
							<br/>


								<div class="register">	
				<?php 
				 if((isset($_GET['action']))&&($_GET['action']=='edit')){
					 $cs2=Course::find_by_course_id($_GET['course_id']);
				?>
                <fieldset>		
				<legend>Edit</legend>
				<form action="courses.php" method="post">
								<div class="fields">COURSE CODE</div>
				<div class="fields"><input type="text" name="code" readonly="true" title="Should 6 characters long.Alphanumeric" pattern="[a-z A-Z 0-9]{6}" value="<?php echo $cs2->code;?>" required/></div>
				<div class="fields">COURSE NAME</div>
				<div class="fields"><input type="text" name="name" title="characters only" value="<?php echo $cs2->course_name;?>" required/></div>
				<div class="fields">YEAR <select name="year" required>
				<option></option>
				<option value="1">1st</option>
				<option value="2">2nd</option>
				<option value="3">3rd</option>
				<option value="4">4th</option>
				<option value="5">5th</option>
							</select> </div>
				
				<div class="fields">SEMESTER
				<select name="semester" required>
				<option></option>
				<option value="1">1st</option>
				<option value="2">2nd</option>
			
				</select>
				</div>
				<div class="fields">UNITS</div>
				<div class="fields"><input type="text" name="units" value="<?php echo $cs2->units;?>" title="Numbers Only. Between 3 and 6" required pattern="[3-6]{1}"/></div>
		        <div class="fields">OPTION <select name="option" required>
				<option></option>
				<option value="core">Core</option>
				<option value="elective">Elective</option></select></div>
				
				<input type="hidden" name="course_id" value="<?php echo $cs2->course_id;?>"/>
				
				<div class="fields"><input type="submit" value="Save Changes" name="submit"></div>
				</form>
				</fieldset>
				<?php 
				}
				else{
				?>
				 <fieldset>		
				<legend>Register</legend>
				<form action="courses.php" method="post">
				<div class="fields">COURSE CODE</div>
				<div class="fields"><input type="text" name="code" title="Should 6 characters long.Alphanumeric" pattern="[a-z A-Z 0-9]{6}" required /></div>
				<div class="fields">COURSE NAME</div>
				<div class="fields"><input type="text" name="name"title="characters only" required pattern="[a-z A-Z]+"/></div>
				<div class="fields">YEAR <select name="year" required>
				<option></option>
				<option value="1">1st</option>
				<option value="2">2nd</option>
				<option value="3">3rd</option>
				<option value="4">4th</option>
				<option value="5">5th</option>
				
				</select> </div>
				
				<div class="fields">SEMESTER
				<select name="semester" required>
				<option></option>
				<option value="1">1st</option>
				<option value="2">2nd</option>
			

				</select>
				
				</div>
				
				<div class="fields">UNITS</div>
				<div class="fields"><input type="text" name="units" title="Numbers Only. Between 3 and 6" required  pattern="[3-6]{1}"/></div>
		        <div class="fields">OPTION <select name="option" required>
				<option></option>
				<option value="core">Core</option>
				<option value="elective">Elective</option></select></div>					
				<div class="fields"><input type="submit" value="ADD NEW" name="submit"></div>
				</form>
				</fieldset>
				
				
				<?php }?>
				
				</div>
				
				
				<div class="search">
				<fieldset>
				<legend>search</legend>
				<div class="art-textblock art-object227400126" data-left="97.5%">
    <form class="art-search" method="POST" name="Search" action="courses.php">
    <input type="text"  placeholder="COURSE CODE" name="code" required />
    <input type="submit" value="Search" name="search" class="art-search-button" >
</form>
</div>
</div>
				</fieldset>
					<div class="details">
				<?php if(isset($_POST['search'])){?>
				<?php if($results){?>
				<fieldset>
				<legend>Details</legend>
				<table>
				<tr><th>#</th><th><u>CODE</u></th><th><u>COURSE NAME</u></th><th><u>UNITS</u></th><th><u>YEAR</u></th><th><u>SEM</u></th><th><u>OPTION</u></th><th><u>ACTION</u></th></tr>
				<?php $no=1;?>
				<tr><td><?php echo $no;?></td><td><?php echo $results->code;?></td><td><?php echo $results->course_name;?></td><td><?php echo $results->units;?></td><td><?php echo $results->year?></td><td><?php echo $results->semester;?></td><td><?php echo $results->elective_core;?></td><td><a href="courses.php?course_id=<?php echo $results->course_id?>&action=delete"><input type="button" value="delete"></a><a href="courses.php?course_id=<?php echo $results->course_id?>&action=edit"><input type="button" value="edit"></a></td></tr>
			    				</table>
				</fieldset>
				<?php } else{echo "<p align='center'><h3>No Results Found</h3></p>";}?>
				<?php
				}else{?>
				<fieldset>
				<legend>Details</legend>
				<table>
				<tr><th>#</th><th><u>CODE</u></th><th><u>COURSE NAME</u></th><th><u>UNITS</u></th><th><u>YEAR</u></th><th><u>SEM</u></th><th><u>OPTION</u></th><th><u>ACTION</u></th></tr>
			
			    <?php $no=1; foreach($cs as $course): ?>
				<tr><td><?php echo $no;?></td><td><?php echo $course->code;?></td><td><?php echo $course->course_name;?></td><td><?php echo $course->units;?></td><td><?php echo $course->year?></td><td><?php echo $course->semester;?></td><td><?php echo $course->elective_core;?></td><td><a href="courses.php?course_id=<?php echo $course->course_id?>&action=delete"><input type="button" value="delete"></a><a href="courses.php?course_id=<?php echo $course->course_id?>&action=edit"><input type="button" value="edit"></a></td></tr>
			     <?php $no++; endforeach;?>
				</table>
				</fieldset>
				<?php
				}
				
				?>
				</div>
															
								
								
								
								
								</div>


</article></div>
                    </div>
                </div>
            </div><?php include_layout_template('footer'); ?>