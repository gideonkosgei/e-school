<?php require_once("../../../includes/initialize.php");?>
<?php include_layout_template('header_subfolder'); 
if(!$session->is_logged_in())
{
redirect_to('login.php');
}
$std=Student::find_by_admission_number($session->user_id);
$prog=$std->program_id;
$duration=Program::find_by_program_id($prog);
$course=Course::find_all();
$course_y_s=null;

if(isset($_POST['view'])){
$sem=$_POST['semester'];
$y=$_POST['year'];
$course_y_s=Course::find_courses_by_program_year_sem_elective($prog,$sem,$y);
if(empty($course_y_s)){
$message_type="error";
$message="There Are No Elective Courses For The Option Provided. You Only Do Core Courses";
}
}
	
	

if(isset($_POST['assign'])){
if(empty($_POST['code'])){
$message_type="error";
$message="You Must Select Alleast One Course.Process Failed";
}
else{
$p_c=new Subscription();
$code_array=$_POST['code'];
$source="";
foreach($code_array as $one_code){
$source .=$one_code.", ";
}
$p_c->semester=$_POST['semester'];
$p_c->year=$_POST['year'];
$p_c->admission_number=$session->user_id;
$p_c->courses=$source;

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
    <ul class="art-hmenu"><li><a href="../home.php" class="">Home</a></li><li><a href="#" class="active">Courses</a><ul class="active"><li><a href="../courses/select-courses.php" class="active">select courses</a></li><li><a href="../courses/revise-courses.php">Revise Courses</a></li><li><a href="../courses/view-my-courses.php">View My courses</a></li></ul></li><li><a href="../account.php">Account</a></li></ul> 
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
<ul class="art-vmenu"><li><a href="../home.php" class="">Home</a></li><li><a href="#" class="active">Courses</a><ul class="active"><li><a href="../courses/select-courses.php" class="active">select courses</a></li><li><a href="../courses/revise-courses.php">Revise Courses</a></li><li><a href="../courses/view-my-courses.php">View My courses</a></li></ul></li><li><a href="../account.php">Account</a></li></ul>
                
        </div>
</div></div>
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
						<?php if($message==""){}else if($message_type=="success"){ echo "<div class='success'>".$message."</div>";} else{ echo "<div class='error'>".$message."</div>";}?>
                                <div class="art-postmetadataheader">
                                        <h2 class="art-postheader">Select Elective Courses</h2>
                                                            
                                    </div>
                                <div class="art-postcontent art-postcontent-0 clearfix"><br/>
								
								
								<div class="register">	

				 <fieldset>		
				<legend>Register</legend>
				<form action="select-courses.php" method="post">
				<div class="fields">YEAR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <select name="year">
				<option value="1">1st</option>
				<option value="2">2nd</option>
				<option value="3">3rd</option>
				<option value="4">4th</option>
				<?php if($duration->duration==4){
				}
				else{?>
				<option value="5">5th year</option>
				<?php }?>
				
			
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
								
				<?php if($course_y_s AND isset($_POST['view'])){ ?>
				<div class="details">	
	            <fieldset>				
				<legend>Courses</legend>
				<br/>
				<form action="select-courses.php" method="post">
				
				<u><H4>Select Elective Courses </H4></u>
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
				<?php } 
				else{}
				?>				
								
			
								</div>


</article></div>
                    </div>
                </div>
            </div><?php include_layout_template('footer'); ?>