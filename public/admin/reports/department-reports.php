<?php require_once("../../../includes/initialize.php");?>
<?php include_layout_template('header_subfolder'); 
$dept=Department::find_all();

?>
<nav class="art-nav">
    <ul class="art-hmenu"><li><a href="../home.php" class="">Home</a></li><li><a href="../departments.php" class="">Departments</a></li><li><a href="../programs.php" class="">Programs</a><ul class=""><li><a href="../programs/course-assignment.php" class="">Course Assignment</a></li><li><a href="../programs/program-course.php" class="">Program Course</a></li></ul></li><li><a href="../courses.php" class="">Courses</a><ul class=""><li><a href="../courses/course-view.php" class="">Course Edit</a></li></ul></li><li><a href="../students.php" class="">Students</a></li><li><a href="#" class="active">Reports</a><ul class="active"><li><a href="../reports/course-reports.php" class="">Course Reports</a></li><li><a href="../reports/department-reports.php" class="active">Department Reports</a></li><li><a href="../reports/student-reports.php">Student Reports</a></li></ul></li><li><a href="#">Account</a><ul><li><a href="../account/my-account.php">My Account</a></li><li><a href="../account/student-account.php">Student Account</a></li></ul></li></ul> 
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
<ul class="art-vmenu"><li><a href="../home.php" class="">Home</a></li><li><a href="../departments.php" class="">Departments</a></li><li><a href="../programs.php" class="">Programs</a><ul class=""><li><a href="../programs/course-assignment.php" class="">Course Assignment</a></li><li><a href="../programs/program-course.php" class="">Program Course</a></li></ul></li><li><a href="../courses.php" class="">Courses</a><ul class=""><li><a href="../courses/course-view.php" class="">Course Edit</a></li></ul></li><li><a href="../students.php" class="">Students</a></li><li><a href="#" class="active">Reports</a><ul class="active"><li><a href="../reports/course-reports.php" class="">Course Reports</a></li><li><a href="../reports/department-reports.php" class="active">Department Reports</a></li><li><a href="../reports/student-reports.php">Student Reports</a></li></ul></li><li><a href="#">Account</a><ul><li><a href="../account/my-account.php">My Account</a></li><li><a href="../account/student-account.php">Student Account</a></li></ul></li></ul>
                
        </div>
</div></div>
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                                <div class="art-postmetadataheader">
                                        <h2 class="art-postheader">Department Reports</h2>
                                                            
                                    </div>
                                <div class="art-postcontent art-postcontent-0 clearfix"><br>
								
								
										<fieldset>	
								 
				<legend>Report Filter</legend>
				<br/>
				<form action="../department_report.php" method="post">
				<div class="fields"><b>Filter </b>
				<select name="department" required>	
                 <option></option>				
      			<?php foreach($dept as $department): ?>
				<option value="<?php echo $department->department_id;?>"><?php echo $department->department_name;?></option>
				 <?php endforeach;?>
				 </select> 
				
				
				<input type="submit" value="View Report" name="view">
				</div>
				</form>
				</fieldset>
								
								</div>


</article></div>
                    </div>
                </div>
            </div><?php include_layout_template('footer'); ?>