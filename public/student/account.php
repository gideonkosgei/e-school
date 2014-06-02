<?php require_once("../../includes/initialize.php");?>
<?php include_layout_template('header'); 
if(!$session->is_logged_in())
{
redirect_to('login.php');
}
$logged_in_student=Student::find_by_admission_number($session->user_id);
if(isset($_POST['submit'])){
 
    if(trim($_POST['old_password'])!= $logged_in_student->password){
            $message_type="error";	
			$message="The Old Password You Have Provided Does Not Match With The One In The System";		
	}
	    else if($_POST['password']!=$_POST['con_password']){
		               $message_type="error";
						$message="passWord fields did not match";
		}
			else if(isset($_POST['staff_id'])){
         //change password
					$logged_in_student->password=trim($_POST['password']);
                    		
					if($logged_in_student->save()){
					$message_type="success";
					$message="Login Credentials Successfully changed";
					}
					else{
					$message_type="error";	
					$message="Nothing Has Changed.Credentials Remained The Same";
					}
		
		    }

	}

?>
<nav class="art-nav">
    <ul class="art-hmenu"><li><a href="home.php" class="">Home</a></li><li><a href="#" class="">Courses</a><ul class=""><li><a href="courses/select-courses.php" class="">select courses</a></li><li><a href="courses/revise-courses.php" class="">Revise Courses</a></li><li><a href="courses/view-my-courses.php" class="">View My courses</a></li></ul></li><li><a href="account.php" class="active">Account</a></li></ul> 
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
<ul class="art-vmenu"><li><a href="home.php" class="">Home</a></li><li><a href="#" class="">Courses</a><ul class=""><li><a href="courses/select-courses.php" class="">select courses</a></li><li><a href="courses/revise-courses.php" class="">Revise Courses</a></li><li><a href="courses/view-my-courses.php" class="">View My courses</a></li></ul></li><li><a href="account.php" class="active">Account</a></li></ul>
                
        </div>
</div></div>
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
						<?php if($message==""){}else if($message_type=="success"){ echo "<div class='success'>".$message."</div>";} else{ echo "<div class='error'>".$message."</div>";}?>
                                <div class="art-postmetadataheader">
                                        <h2 class="art-postheader">change password</h2>
                                                            
                                    </div>
                                <div class="art-postcontent art-postcontent-0 clearfix">
							
								<br/>
								
						<div class="register">				
             <fieldset>		
				<legend>Account</legend>
			
				
				<form method="post" action="account.php">
				<div class="fields">OLD PASSWORD</div>
				<div class="fields"><input type="password" name="old_password"required/></div>
				<div class="fields">NEW PASSWORD</div>
				<div class="fields"><input type="password" name="password" required/></div>
				<div class="fields">CONFIRM PASSWORD</div>
				<div class="fields"><input type="password" name="con_password" required/></div>
				<input type="hidden" name="staff_id" value="<?php $logged_in_staff->staff_id; ?>"/>
				<div class="fields"><input type="submit" value="CHANGE" name="submit"></div>
				 </form>
				 
				</fieldset>	
	            				
			</div></div>
								
							


</article></div>
                    </div>
                </div>
            </div><?php include_layout_template('footer'); ?>