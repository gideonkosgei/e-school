<?php require_once("../../../includes/initialize.php");?>
<?php include_layout_template('header_subfolder'); 

if(!$session->is_logged_in())
{
redirect_to('login.php');
}
$student=Student::find_by_admission_number($session->user_id);
$progy=$student->program_id;
$duration=Program::find_by_program_id($progy);
if(isset($_POST['view'])){
$y1_core=Course::find_courses_by_program_year_sem_core($progy,$_POST['semester'],$_POST['year']);
$y1_elective=Course::find_courses_by_program_year_sem_elective_user($progy,$_POST['semester'],$_POST['year'],$session->user_id);
}
?>
<nav class="art-nav">
    <ul class="art-hmenu"><li><a href="../home.php" class="">Home</a></li><li><a href="#" class="active">Courses</a><ul class="active"><li><a href="../courses/select-courses.php" class="">select courses</a></li><li><a href="../courses/revise-courses.php" class="">Revise Courses</a></li><li><a href="../courses/view-my-courses.php" class="active">View My courses</a></li></ul></li><li><a href="../account.php">Account</a></li></ul> 
    
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
<ul class="art-vmenu"><li><a href="../home.php" class="">Home</a></li><li><a href="#" class="active">Courses</a><ul class="active"><li><a href="../courses/select-courses.php" class="">select courses</a></li><li><a href="../courses/revise-courses.php" class="">Revise Courses</a></li><li><a href="../courses/view-my-courses.php" class="active">View My courses</a></li></ul></li><li><a href="../account.php">Account</a></li></ul>
                
        </div>
</div></div>
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                                <div class="art-postmetadataheader">
                                        <h2 class="art-postheader">New Page</h2>
                                                            
                                    </div>
                                <div class="art-postcontent art-postcontent-0 clearfix">
								<br/>
								
								<fieldset>	
								 
				<legend>Program's Course Edit</legend>
							<form action="view-my-courses.php" method="post">
				<div class="fields">
				
				<select name="year">
				<option value="1">1st year</option>
				<option value="2">2nd year</option>
				<option value="3">3rd year</option>
				<option value="4">4th year</option>
				<?php if($duration->duration==4){
				}
				else{?>
				<option value="5">5th year</option>
				<?php }?>
							</select>
				<select name="semester"><option value="1">1st semester</option><option value="2">2nd semester</option></select>
				<input type="submit" value="click to view " name="view">
				</div>
				</form>
				</fieldset>
				<?php if(isset($_POST['view'])){?>
				<fieldset>				
				<legend>Courses</legend>
				<?php
				if($y1_core) { 
				echo "<u><h3>Core Courses</h3></u>";
				$no=1;
                foreach($y1_core as $codes){
				echo $no .".". $codes->code ."-". $codes->course_name ."<br/>";
				$no++;
				}
				}else{
				echo"<h3>No Courses Assigned</h3>";
				
				}?>
				<?php
				if($y1_elective) { 
					echo "<u><h3>Elective Courses</h3></u>";
				$no=1;
                foreach($y1_elective as $codes){
				echo $no .".". $codes->code ."-". $codes->course_name ."<br/>";
				$no++;
				}
				}else{
				echo"<h3>No Electives</h3>";
				
				}?>
				</fieldset>
				<?php } else{}?>
								
								</div>


</article></div>
                    </div>
                </div>
            </div><?php include_layout_template('footer'); ?>