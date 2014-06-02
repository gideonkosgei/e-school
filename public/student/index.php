<?php require_once("../../includes/initialize.php");?>
<?php include_layout_template('header');
if(!$session->is_logged_in())
{
redirect_to('login.php');
}

 ?>
<nav class="art-nav">
    <ul class="art-hmenu"><li><a href="home.php" class="active">Home</a></li><li><a href="#">Courses</a><ul><li><a href="courses/select-courses.php">select courses</a></li><li><a href="courses/revise-courses.php">Revise Courses</a></li><li><a href="courses/view-my-courses.php">View My courses</a></li></ul></li><li><a href="account.php">Account</a></li></ul> 
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
<ul class="art-vmenu"><li><a href="home.php" class="active">Home</a></li><li><a href="#">Courses</a><ul><li><a href="courses/select-courses.php">select courses</a></li><li><a href="courses/revise-courses.php">Revise Courses</a></li><li><a href="courses/retake-course.php">Retake Course</a></li><li><a href="courses/view-my-courses.php">View My courses</a></li></ul></li><li><a href="account.php">Account</a></li></ul>
                
        </div>
</div></div>
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                                <div class="art-postmetadataheader">
                                        <h2 class="art-postheader">Home</h2>
                                                            
                                    </div>
                                <div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%" >
        <p style="text-align: center;"><span style="white-space: nowrap;"><br></span></p>
    </div>
    </div>
</div>
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 50%" >
        <p><br></p>
    </div><div class="art-layout-cell layout-item-0" style="width: 50%" >
        <p><br></p>
    </div>
    </div>
</div>
</div>


</article></div>
                    </div>
                </div>
            </div><?php include_layout_template('footer'); ?>