<?php

require_once(LIB_PATH.DS.'database.php');

class Student extends DatabaseObject {
	
	protected static $table_name="student";
	protected static $db_fields = array('admission_number','first_name','last_name','sex','id_number','gssp_pssp','program_id','telephone','password','admission_year','year');
	protected static $primary_key="admission_number";
		
	public $admission_number;
	public $first_name;
	public $last_name;
    public $sex;
	public $id_number;
	public $telephone;
	public $gssp_pssp;
	public $program_id;
	public $password;
	public $user_id;
	public $admission_year;
   public $year;
	
		function __construct() {
		$this->user_id=&$this->admission_number;
	}
	
	  public static function authenticate($username="", $password="") {
    global $database;
    $username = $database->escape_value($username);
    $password = $database->escape_value($password);
    $sql  = "SELECT * FROM  ".self::$table_name." ";
    $sql .= "WHERE admission_number='{$username}'";
    $sql .= "AND password ='{$password}'";
    $sql .= "LIMIT 1";
    $result_array = self::find_by_sql($sql);
	

	
	return !empty($result_array) ? array_shift($result_array) : false;
	}
	
	
		 public static function find_by_admission_number($id=""){
   	$sql="SELECT * FROM `".static::$table_name."`WHERE admission_number='{$id}'LIMIT 1";
		$result_array = static::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
   }
   
   	public static function find_by_id_number($id=""){
   	$sql="SELECT * FROM `".static::$table_name."`WHERE id_number='{$id}'LIMIT 1";
	$result_array = static::find_by_sql($sql);
	return !empty($result_array) ? array_shift($result_array) : false;
   }
   
   
    public static function find_last_admission_year($program,$option,$year) {
	$sql="SELECT * FROM `".static::$table_name."`WHERE program_id='{$program}'AND gssp_pssp='{$option}' AND  admission_year='{$year}' ORDER BY `id` desc LIMIT 1";
		$result_array = static::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
  }
  
   public static function find_admission_year(){
   $sql="SELECT DISTINCT year FROM `".static::$table_name."`";
	 return static::find_by_sql($sql);
   }
   
   
     public static function find_student_for_report($program,$option,$year,$gender){
		if($option=="all" AND $gender=="all"){
		$sql="SELECT * FROM `".static::$table_name."`WHERE program_id='{$program}' AND  year='{$year}'";
		}	
      else if($option!="all" AND $gender=="all"){
	  $sql="SELECT * FROM `".static::$table_name."`WHERE program_id='{$program}' AND gssp_pssp='{$option}' AND  year='{$year}'";
		} 
        else if($option=="all" AND $gender!="all"){
	$sql="SELECT * FROM `".static::$table_name."`WHERE program_id='{$program}' AND sex='{$gender}' AND  year='{$year}'";
		}  
      else{
	  $sql="SELECT * FROM `".static::$table_name."`WHERE program_id='{$program}' AND gssp_pssp='{$option}' AND year='{$year}' AND sex='{$gender}'";
	  }		

	 return static::find_by_sql($sql);
   }
  
 
   
}    
	
	

?>