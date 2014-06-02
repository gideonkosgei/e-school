<?php require_once("../../includes/initialize.php");?>
<?php include_layout_template('header'); 

$date=$date=Date('y');
if(isset($_POST['submit'])){
$duplicate_student=Student::find_by_id_number($_POST['id']);

	if(isset($_POST['admission_number'])){
		$student=Student::find_by_admission_number($_POST['admission_number']);
			
	$student->first_name=trim($_POST['first']);
	$student->last_name=trim($_POST['last']);
    $student->sex=trim($_POST['sex']);
	$student->id_number=trim($_POST['id']);
	$student->telephone=trim($_POST['tel']);
	$student->gssp_pssp=trim($_POST['option']);
	$student->program_id=trim($_POST['program']);

		if($student->save()){
		$message_type="success";
			$message="Changes Successfully Saved";
		}
		else{
		$message_type="error";
		$message="Nothing To Be Updated. Information Remained The same";
		}
	}
	else{
		
$student=new Student();	
$adm=Student::find_last_admission_year($_POST['program'],$_POST['option'],$date);


if($adm){
$number=$adm->admission_number;
$serial=substr($number,4,strlen($number)-7);
$adm_y=substr($number,strlen($number)-2,strlen($number));
$serial=$serial+1;
$prefix=Program::find_by_program_id($_POST['program']);
$number_a=$prefix->program_prefix ."/".$serial."/".$date;
}
else{
 if($_POST['option']=="PSSP"){
 $serial=1001;
$prefix=Program::find_by_program_id($_POST['program']);
$number_a=$prefix->program_prefix ."/".$serial."/".$date;
}

else{
$serial=1;
$prefix=Program::find_by_program_id($_POST['program']);
$number_a=$prefix->program_prefix ."/".$serial."/".$date;
}

}

	
	
	$student->first_name=trim($_POST['first']);
	$student->last_name=trim($_POST['last']);
    $student->sex=trim($_POST['sex']);
	$student->id_number=trim($_POST['id']);
	$student->telephone=trim($_POST['tel']);
	$student->gssp_pssp=trim($_POST['option']);
	$student->program_id=trim($_POST['program']);
	$student->admission_year=$date=Date('y');
	$student->year=$date=Date('Y');
	$student->admission_number=$number_a;
	
	
	if($duplicate_student){
	$message_type="error";
	$message="A Student With The Same ID Number Already Exists";
	}
	else
			if($student->save()){
		$message_type="success";
			$message="Student Successfully Registered";
		}
		else{
		$message_type="error";
		$message="not success";
		}
		}
		
	}



if(isset($_POST['search'])){
$results=Student::find_by_admission_number($_POST['adm']);
}

if(isset($_GET['action'])){
	 if(isset($_GET['admission_number'])){
		 if($_GET['action']=='delete'){
			$student=Student::find_by_admission_number($_GET['admission_number']);
			if(!empty($student)){
				if($student->delete()){
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
	    $message="You did not provide an admission number no action taken";
	 }
}

//select all for diaplay
$departments=Department::find_all();
$prog=Program::find_all();
$std=Student::find_all();

?>
<nav class="art-nav">
    <ul class="art-hmenu"><li><a href="home.php" class="">Home</a></li><li><a href="departments.php" class="">Departments</a></li><li><a href="programs.php" class="">Programs</a><ul class=""><li><a href="programs/course-assignment.php" class="">Course Assignment</a></li><li><a href="programs/program-course.php" class="">Program Course</a></li></ul></li><li><a href="courses.php" class="">Courses</a><ul class=""><li><a href="courses/course-view.php" class="">Course Edit</a></li></ul></li><li><a href="students.php" class="active">Students</a></li><li><a href="#">Reports</a><ul><li><a href="reports/course-reports.php">Course Reports</a></li><li><a href="reports/department-reports.php">Department Reports</a></li><li><a href="reports/student-reports.php">Student Reports</a></li></ul></li><li><a href="#">Account</a><ul><li><a href="account/my-account.php">My Account</a></li><li><a href="account/student-account.php">Student Account</a></li></ul></li></ul> 
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
<ul class="art-vmenu"><li><a href="home.php" class="">Home</a></li><li><a href="departments.php" class="">Departments</a></li><li><a href="programs.php" class="">Programs</a><ul class=""><li><a href="programs/course-assignment.php" class="">Course Assignment</a></li><li><a href="programs/program-course.php" class="">Program Course</a></li></ul></li><li><a href="courses.php" class="">Courses</a><ul class=""><li><a href="courses/course-view.php" class="">Course Edit</a></li></ul></li><li><a href="students.php" class="active">Students</a></li><li><a href="#">Reports</a><ul><li><a href="reports/course-reports.php">Course Reports</a></li><li><a href="reports/department-reports.php">Department Reports</a></li><li><a href="reports/student-reports.php">Student Reports</a></li></ul></li><li><a href="#">Account</a><ul><li><a href="account/my-account.php">My Account</a></li><li><a href="account/student-account.php">Student Account</a></li></ul></li></ul>
                
        </div>
</div></div>
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
						<?php if($message==""){}else if($message_type=="success"){ echo "<div class='success'>".$message."</div>";} else{ echo "<div class='error'>".$message."</div>";}?>
                                <div class="art-postmetadataheader">
                                        <h2 class="art-postheader">Student Registration</h2>
                                                            
                                    </div>
                                <div class="art-postcontent art-postcontent-0 clearfix"><br>
								
								
								
								
								<div class="register">	
				<?php 
				 if((isset($_GET['action']))&&($_GET['action']=='edit')){
					 $studee=Student::find_by_admission_number($_GET['admission_number']);
					 
				?>
                <fieldset>		
				<legend>Edit</legend>
				<form action="students.php" method="post">
				<div class="fields">FIRST NAME</div>
				<div class="fields"><input type="text" name="first"  value="<?php echo $studee->first_name; ?>"required title="characters Only" required pattern="[a-z A-Z]+"/></div>
			    <div class="fields">LAST NAME</div>
				<div class="fields"><input type="text" name="last" value="<?php echo $studee->last_name; ?>" required title="characters Only" required pattern="[a-z A-Z]+"/></div>
				<div class="fields">ID NUMBER</div>
				<div class="fields"><input type="text" name="id" value="<?php echo $studee->id_number;?>"required title="Numbers Only.8 in size" required pattern="[0-9]{8}"/></div>
				<div class="fields">MOBILE NUMBER</div>
				<div class="fields"><input type="text" name="tel" value="<?php echo $studee->telephone;?>"required title="Numbers Only.10 in size" required pattern="[0-9]{10}"/></div>	
				<div class="fields">GENDER  <select name="sex"><option>MALE</option><option>FEMALE</option></select></div> 
				<div class="fields">PROGRAM  <select name="program">
				
				<?php foreach($prog as $prog):?>
				
				<option value="<?php echo $prog->program_id;?>"><?php echo $prog->program_name;?></option>
				
				 <?php endforeach;?>
				</select></div>
			
				<div class="fields">OPTION  <select name="option"><option value="GSSP">GSSP</option><option value="PSSP">PSSP</option></select>
				</div>
<input type="hidden" name="admission_number" value="<?php echo $studee->admission_number; ?>"/>

				<div class="fields"><input type="submit" value="Save Changes" name="submit"></div>
				</form>
				</fieldset>
				<?php 
				}
				else{
				?>
				
				 <fieldset>		
				<legend>Register</legend>
				<form action="students.php" method="post">
				<div class="fields">FIRST NAME</div>
				<div class="fields"><input type="text" name="first" title="characters Only" required pattern="[a-z A-Z]+"/></div>
			    <div class="fields">LAST NAME</div>
				<div class="fields"><input type="text" name="last" title="characters Only"  required pattern="[a-z A-Z]+"/></div>
				<div class="fields">ID NUMBER</div>
				<div class="fields"><input type="text" name="id" title="Numbers Only. 8 in size" required pattern="[0-9]{8}"/></div>
				<div class="fields">MOBILE NUMBER</div>
				<div class="fields"><input type="text" name="tel" title="Numbers Only.10 in size" required pattern="[0-9]{10}"/></div>	
				<div class="fields">GENDER  <select name="sex" required><option></option><option>MALE</option><option>FEMALE</option></select></div> 
				<div class="fields">PROGRAM <select name="program" required>
				<option></option>
				
				<?php foreach($prog as $prog):?>
				
				<option value="<?php echo $prog->program_id;?>"><?php echo $prog->program_name;?></option>
				
				 <?php endforeach;?>
				</select></div>
			
				<div class="fields">OPTION  <select name="option" required><option></option><option value="GSSP">GSSP</option><option value="PSSP">PSSP</option></select>
				</div>

				<div class="fields"><input type="submit" value="Register New" name="submit"></div>
				</form>
				</fieldset>
				
				
				<?php }?>
				
				</div>
			
				<div class="details">
				<fieldset>
				<legend>search</legend>
				<div class="art-textblock art-object227400126" data-left="97.5%">
    <form class="art-search" method="POST" name="Search" action="students.php">
    <input type="text"  placeholder="ADMISSION NUMBER " name="adm"  size="85"required />
    <input type="submit" value="Search" name="search" class="art-search-button" >
	</fieldset>
</form>

</div>
				<div class="details">
				
				<?php if(isset($_POST['search'])){?>
				<?php if($results){?>
				<fieldset>
				<legend>Details</legend>
				<table>
				<tr><th>#</th><th><u>ADM</u></th><th><u>NAME</u></th><th><u>PROGRAM</u></th><th><u>OPT</u></th><th><u>ID</u></th><th><u>MOBILE</u></th><th><u>SEX</u></th><th><u>ACTION</u></th></tr>
				<?php $no=1;?>
				<tr><td><?php echo $no;?></td><td><?php echo $results->admission_number;?></td><td><?php echo $results->first_name ." ".  $results->last_name ;?></td><td>
				<?php $program=Program::find_by_program_id($results->program_id); echo $program->program_name;?></td>
				<td><?php echo $results->gssp_pssp;?></td><td><?php echo $results->id_number;?></td><td><?php echo $results->telephone;?></td><td><?php echo $results->sex?></td><td><a href="students.php?admission_number=<?php echo $results->admission_number?>&action=delete"><input type="button" value="delete"></a><a href="students.php?admission_number=<?php echo $results->admission_number?>&action=edit"><input type="button" value="edit"></a></td></tr>
			    				</table>
				</fieldset>
								<?php } else{echo "<p align='center'><h3>No Results Found</h3></p>";}?>
				<?php
				}else{?>				
			   	<fieldset>
				<legend>Student List</legend>
				<table>
				<tr><th>#</th><th><u>ADM</u></th><th><u>NAME</u></th><th><u>PROGRAM</u></th><th><u>OPT</u></th><th><u>ID</u></th><th><u>MOBILE</u></th><th><u>SEX</u></th><th><u>ACTION</u></th></tr>
				<?php $no=1; foreach($std as $std): ?>
				<tr><td><?php echo $no;?></td><td><?php echo $std->admission_number;?></td><td><?php echo $std->first_name ." ".  $std->last_name ;?></td><td>
				<?php $program=Program::find_by_program_id($std->program_id); echo $program->program_name;?></td>
				<td><?php echo $std->gssp_pssp;?></td><td><?php echo $std->id_number;?></td><td><?php echo $std->telephone;?></td><td><?php echo $std->sex?></td><td><a href="students.php?admission_number=<?php echo $std->admission_number?>&action=delete"><input type="button" value="del"></a><a href="students.php?admission_number=<?php echo $std->admission_number?>&action=edit"><input type="button" value="edit"></a></td></tr>
			     <?php $no++; endforeach;?>
				</table>
				</fieldset>
				</div>
				</div>
				<?php }?>
								
								
								
								
								
							


</article></div>
                    </div>
                </div>
            </div><?php include_layout_template('footer'); ?>