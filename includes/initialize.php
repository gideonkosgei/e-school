<?php

$os = PHP_OS;
switch($os)
{
    case "Linux": define("DS", "/"); break;
    case "Windows": define("DS", "\\"); break;
	case "WINNT": define("DS", "/"); break;
    default: define("DS", "/"); break;
}

 
defined('SITE_ROOT') ? null : 
define('SITE_ROOT', 'C:'.DS.'xampp'.DS.'htdocs'.DS.'school');



defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');

// load config file first
require_once(LIB_PATH.DS.'config.php');

// load basic functions next so that everything after can use them
require_once(LIB_PATH.DS.'functions.php');


// load core objects
require_once(LIB_PATH.DS.'session.php');
require_once(LIB_PATH.DS.'database.php');
require_once(LIB_PATH.DS.'database_object.php');
require_once(LIB_PATH.DS.'pagination.php');
require_once(LIB_PATH.DS.'fpdf.php');
require_once(LIB_PATH.DS.'PDF.php');

require_once(LIB_PATH.DS.'administrator.php');
require_once(LIB_PATH.DS.'department.php');
require_once(LIB_PATH.DS.'student.php');
require_once(LIB_PATH.DS.'program_course.php');
require_once(LIB_PATH.DS.'course.php');
require_once(LIB_PATH.DS.'program.php');
require_once(LIB_PATH.DS.'subscription.php');




?>