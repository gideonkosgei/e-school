<?php require_once("../../../includes/initialize.php");?>
<?php include_layout_template('header_subfolder');


if(isset($_POST['search'])){
$results=Student::find_by_admission_number($_POST['adm']);
if(empty($results)){
$message_type="error";
$message="No Results found";

}
}

if(isset($_POST['change_password'])){
$studee=Student::find_by_admission_number($_POST['admission_number']);
$studee->password=uniqid();
if($studee->save()){
$message_type="success";
$message=" PASSWORD Generated Succcessfully. New Password Is <b>".$studee->password."</b>";
	}
}


 ?>
<nav class="art-nav">
    <ul class="art-hmenu"><li><a href="../home.php" class="">Home</a></li><li><a href="../departments.php" class="">Departments</a></li><li><a href="../programs.php" class="">Programs</a><ul class=""><li><a href="../programs/course-assignment.php" class="">Course Assignment</a></li><li><a href="../programs/program-course.php" class="">Program Course</a></li></ul></li><li><a href="../courses.php" class="">Courses</a><ul class=""><li><a href="../courses/course-view.php" class="">Course Edit</a></li></ul></li><li><a href="../students.php" class="">Students</a></li><li><a href="#" class="">Reports</a><ul class=""><li><a href="../reports/course-reports.php" class="">Course Reports</a></li><li><a href="../reports/department-reports.php" class="">Department Reports</a></li><li><a href="../reports/student-reports.php" class="">Student Reports</a></li></ul></li><li><a href="#" class="active">Account</a><ul class="active"><li><a href="../account/my-account.php" class="">My Account</a></li><li><a href="../account/student-account.php" class="active">Student Account</a></li></ul></li></ul> 
    
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
<ul class="art-vmenu"><li><a href="../home.php" class="">Home</a></li><li><a href="../departments.php" class="">Departments</a></li><li><a href="../programs.php" class="">Programs</a><ul class=""><li><a href="../programs/course-assignment.php" class="">Course Assignment</a></li><li><a href="../programs/program-course.php" class="">Program Course</a></li></ul></li><li><a href="../courses.php" class="">Courses</a><ul class=""><li><a href="../courses/course-view.php" class="">Course Edit</a></li></ul></li><li><a href="../students.php" class="">Students</a></li><li><a href="#" class="">Reports</a><ul class=""><li><a href="../reports/course-reports.php" class="">Course Reports</a></li><li><a href="../reports/department-reports.php" class="">Department Reports</a></li><li><a href="../reports/student-reports.php" class="">Student Reports</a></li></ul></li><li><a href="#" class="active">Account</a><ul class="active"><li><a href="../account/my-account.php" class="">My Account</a></li><li><a href="../account/student-account.php" class="active">Student Account</a></li></ul></li></ul>
                
        </div>
</div></div>
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
						<?php if($message==""){}else if($message_type=="success"){ echo "<div class='success'>".$message."</div>";} else{ echo "<div class='error'>".$message."</div>";}?>
                                <div class="art-postmetadataheader">
                                        <h2 class="art-postheader">Manage Student's Passwords</h2>
                                                            
                                    </div>
                                <div class="art-postcontent art-postcontent-0 clearfix"><br/>
								
								
								<div class="details">
				<fieldset>
				<legend>search</legend>
				<div class="art-textblock art-object227400126" data-left="97.5%">
    <form class="art-search" method="POST" name="Search" action="student-account.php">
    <input type="text"  placeholder="ADMISSION NUMBER " name="adm"  size="85"required />
    <input type="submit" value="Search" name="search" class="art-search-button" >
	</fieldset>
</form>

</div>
</div>
<?php if(isset($_POST['search']) AND $results) {?>
<div class="details">
<fieldset>
				<legend>Details</legend>
				<table>
				<tr><th>#</th><th><u>ADM</u></th><th><u>NAME</u></th><th><u>PROGRAM</u></th><th><u>OPT</u></th><th><u>ID</u></th><th><u>MOBILE</u></th><th><u>SEX</u></th><th><u>ACTION</u></th></tr>
				<form action="student-account.php" method="post">
				<?php $no=1;?>
				<tr><td><?php echo $no;?></td><td><?php echo $results->admission_number;?></td><td><?php echo $results->first_name ." ".  $results->last_name ;?></td><td>
				<?php $program=Program::find_by_program_id($results->program_id); echo $program->program_name;?></td>
				<td><?php echo $results->gssp_pssp;?></td><td><?php echo $results->id_number;?></td><td><?php echo $results->telephone;?></td><td><?php echo $results->sex?></td><td><input type="hidden"  name="admission_number"  value="<?php echo $results->admission_number;?>"><input type="submit"  name="change_password" value="Generate password"></td></tr>
				</form>
			    				</table>
				</fieldset>
</div>
<?php } else{}?>


</article></div>
                    </div>
                </div>
            </div><?php include_layout_template('footer'); ?>