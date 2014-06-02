<?php require_once("../../../includes/initialize.php");?>
<?php include_layout_template('header_subfolder'); 
$prog=Program::find_all();
if(isset($_POST['view'])){
$progy=$_POST['program'];
$duration=Program::find_by_program_id($progy);


$y1_s1=Course::find_courses_by_program_year_sem($progy,1,1);
$y1_s2=Course::find_courses_by_program_year_sem($progy,2,1);
$y2_s1=Course::find_courses_by_program_year_sem($progy,1,2);
$y2_s2=Course::find_courses_by_program_year_sem($progy,2,2);
$y3_s1=Course::find_courses_by_program_year_sem($progy,1,3);
$y3_s2=Course::find_courses_by_program_year_sem($progy,2,3);
$y4_s1=Course::find_courses_by_program_year_sem($progy,1,4);
$y4_s2=Course::find_courses_by_program_year_sem($progy,2,4);
$y5_s1=Course::find_courses_by_program_year_sem($progy,1,5);
$y5_s2=Course::find_courses_by_program_year_sem($progy,2,5);

}





?>
<nav class="art-nav">
    <ul class="art-hmenu"><li><a href="../home.php" class="">Home</a></li><li><a href="../departments.php" class="">Departments</a></li><li><a href="../programs.php" class="active">Programs</a><ul class="active"><li><a href="../programs/course-assignment.php" class="">Course Assignment</a></li><li><a href="../programs/program-course.php" class="active">Program Course</a></li></ul></li><li><a href="../courses.php">Courses</a><ul><li><a href="../courses/course-view.php">Course Edit</a></li></ul></li><li><a href="../students.php">Students</a></li><li><a href="#">Reports</a><ul><li><a href="../reports/course-reports.php">Course Reports</a></li><li><a href="../reports/department-reports.php">Department Reports</a></li><li><a href="../reports/student-reports.php">Student Reports</a></li></ul></li><li><a href="#">Account</a><ul><li><a href="../account/my-account.php">My Account</a></li><li><a href="../account/student-account.php">Student Account</a></li></ul></li></ul> 
    
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
<ul class="art-vmenu"><li><a href="../home.php" class="">Home</a></li><li><a href="../departments.php" class="">Departments</a></li><li><a href="../programs.php" class="active">Programs</a><ul class="active"><li><a href="../programs/course-assignment.php" class="">Course Assignment</a></li><li><a href="../programs/program-course.php" class="active">Program Course</a></li></ul></li><li><a href="../courses.php">Courses</a><ul><li><a href="../courses/course-view.php">Course Edit</a></li></ul></li><li><a href="../students.php">Students</a></li><li><a href="#">Reports</a><ul><li><a href="../reports/course-reports.php">Course Reports</a></li><li><a href="../reports/department-reports.php">Department Reports</a></li><li><a href="../reports/student-reports.php">Student Reports</a></li></ul></li><li><a href="#">Account</a><ul><li><a href="../account/my-account.php">My Account</a></li><li><a href="../account/student-account.php">Student Account</a></li></ul></li></ul>
                
        </div>
</div></div>
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                                <div class="art-postmetadataheader">
                                        <h2 class="art-postheader">View Course By Program</h2>
                                                            
                                    </div>
                                <div class="art-postcontent art-postcontent-0 clearfix"><br/>
								
									            <fieldset>				
				<legend>Program's Course</legend>
				<br/>
				<form action="program-course.php" method="post">
				<div class="fields"><b>SELECT PROGRAM </b>
				<select name="program">			
				
				<?php foreach($prog as $prog):?>
				
				<option value="<?php echo $prog->program_id;?>"><?php echo $prog->program_name;?></option>
				
				 <?php endforeach;?>
				</select>
				<input type="submit" value="click to view" name="view">
				</div>
				</form>
				</fieldset>
			<?php if(isset($_POST['view'])){?>
				<fieldset>
				<legend>views</legend>
			
				
			   <h2>YEAR 1</h2>
				<u><h4>semester 1</h4></u>
				<?php
				if($y1_s1) { 
				$no=1;
                foreach($y1_s1 as $codes){
				$elec=$codes->elective_core;
				if($elec=="core"){$elective="";}else{$elective="(<b>elective</b>)";}
				echo $no .".". $codes->code ."-". $codes->course_name ." ". $elective ."<br/>";
				$no++;
				}
				}else{
				echo"<h3>No Courses Assigned</h3>";
				
				}?>
				<u><h4>semester 2</h4></u>
				<?php
				if($y1_s2) { 
				$no=1;
                foreach($y1_s2 as $codes){
				$elec=$codes->elective_core;
				if($elec=="core"){$elective="";}else{$elective="(<b>elective</b>)";}
				echo $no .".". $codes->code ."-". $codes->course_name ." ". $elective ."<br/>";
				$no++;
				}
				}
				else{echo"<h3>No Courses Assigned</h3>";}

				?>
				<h2>YEAR 2</h2>
				<u><h4>semester 1</h4></u>
				<?php
				if($y2_s1) { 
				$no=1;
                foreach($y2_s1 as $codes){
				$elec=$codes->elective_core;
				if($elec=="core"){$elective="";}else{$elective="(<b>elective</b>)";}
				echo $no .".". $codes->code ."-". $codes->course_name ." ". $elective ."<br/>";
				$no++;
				}
				}else{echo"<h3>No Courses Assigned</h3>";}?>
				<u><h4>semester 2</h4></u>
				<?php
				if($y2_s2) { 
				$no=1;
                foreach($y2_s2 as $codes){
				$elec=$codes->elective_core;
				if($elec=="core"){$elective="";}else{$elective="(<b>elective</b>)";}
				echo $no .".". $codes->code ."-". $codes->course_name ." ". $elective ."<br/>";
				$no++;
				}
				}
				else{echo"<h3>No Courses Assigned</h3>";}

				?><h2>YEAR 3</h2>
				<u><h4>semester 1</h4></u>
				<?php
				if($y3_s1) { 
				$no=1;
                foreach($y3_s1 as $codes){
				$elec=$codes->elective_core;
				if($elec=="core"){$elective="";}else{$elective="(<b>elective</b>)";}
				echo $no .".". $codes->code ."-". $codes->course_name ." ". $elective ."<br/>";
				$no++;
				}
				}else{echo"<h3>No Courses Assigned</h3>";}?>
				<u><h4>semester 2</h4></u>
				<?php
				if($y3_s2) { 
				$no=1;
                foreach($y3_s2 as $codes){
				$elec=$codes->elective_core;
				if($elec=="core"){$elective="";}else{$elective="(<b>elective</b>)";}
				echo $no .".". $codes->code ."-". $codes->course_name ." ". $elective ."<br/>";
				$no++;
				}
				}
				else{echo"<h3>No Courses Assigned</h3>";}

				?><h2>YEAR 4</h2>
				<u><h4>semester 1</h4></u>
				<?php
				if($y4_s1) { 
				$no=1;
                foreach($y4_s1 as $codes){
				$elec=$codes->elective_core;
				if($elec=="core"){$elective="";}else{$elective="(<b>elective</b>)";}
				echo $no .".". $codes->code ."-". $codes->course_name ." ". $elective ."<br/>";
				$no++;
				}
				}else{echo"<h3>No Courses Assigned</h3>";}?>
				<u><h4>semester 2</h4></u>
				<?php
				if($y4_s2) { 
				$no=1;
                foreach($y4_s2 as $codes){
				$elec=$codes->elective_core;
				if($elec=="core"){$elective="";}else{$elective="(<b>elective</b>)";}
				echo $no .".". $codes->code ."-". $codes->course_name ." ". $elective ."<br/>";
				$no++;
				}
				}
				else{echo"<h3>No Courses Assigned</h3>";}
				
				if($duration->duration==4){
				}
				else{

				?><h2>YEAR 5</h2>
				<u><h4>semester 1</h4></u>
				<?php
				if($y5_s1) { 
				$no=1;
                foreach($y5_s1 as $codes){
				$elec=$codes->elective_core;
				if($elec=="core"){$elective="";}else{$elective="(<b>elective</b>)";}
				echo $no .".". $codes->code ."-". $codes->course_name ." ". $elective ."<br/>";
				}
				}else{echo"<h3>No Courses Assigned</h3>";}?>
				<u><h4>semester 2</h4></u>
				<?php
				if($y5_s2) { 
				$no=1;
                foreach($y5_s2 as $codes){
				$elec=$codes->elective_core;
				if($elec=="core"){$elective="";}else{$elective="(<b>elective</b>)";}
				echo $no .".". $codes->code ."-". $codes->course_name ." ". $elective ."<br/>";
				$no++;
				}
				}
				else{echo"<h3>No Courses Assigned</h3>";}
				}

				?>
				
				</fieldset>
				<?php }else{}?>
				
				
				</div>


</article></div>
                    </div>
                </div>
            </div><?php include_layout_template('footer'); ?>