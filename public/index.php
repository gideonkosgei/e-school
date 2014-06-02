<?php
require_once("../includes/initialize.php");
?>


<?php
if($session->is_logged_in()){
redirect_to('student/index.php');
}

else{
redirect_to('login.php');
}


?>