<?php require_once("../includes/initialize.php");?>
<?php
if($session->is_logged_in())
{
redirect_to('index.php');
}

if(isset($_POST['submit'])){
	$username=trim($_POST['username']);
	$password=trim($_POST['password']);
	$found_admin=Administrator::authenticate($username,$password);
	print_r($found_admin);
	if($found_student){
$session->login($found_admin);
		$message=$session->username;
		log_action('login',"{$found_admin->username} logged in");
		redirect_to('admin/index.php');

		
	}
	else{
		$message_type="error";
	$message="username/password combination incorrect";
	}
}

?>
<html>
<head>
<title>login</title>
 <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="stylesheet/style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="stylesheet/style.responsive.css" media="all">

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="javascript/jquery.js"></script>
    <script src="javascript/jscript.js"></script>
    <script src="javascript/jscript.responsive.js"></script>

</head>
<body>
<div class="login_sheet">
<div class="login_pict">

<img src="images/login_photo.png" alt="login pict" width="100%"/>

</div>
<div class="login_body">

<?php if($message==""){}else if($message_type=="success"){ echo "<div class='success'>".output_message($message)."</div>";} else{ echo "<div class='error'>".output_message($message)."</div>";}?>
<br>
<form action="login.php" method="post">
<div class="label"><b>USERNAME</b></div>
<div class="field"><input type="text" name="username" required/></div>
<div class="label"><b>PASSWORD</b></div>
<div class="field"><input type="password" name="password" required/></div>
<div class="bb"><input type="submit" value="admin Login" name="submit"/><div class="admin"><a href=""><img src="images/admin.jpg"></a></div></div>
</form>
</div>
</div>
</body>
</html>
