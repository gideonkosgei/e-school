<?php
require_once(LIB_PATH.DS.'database.php');

class Program_course extends DatabaseObject {
	
	protected static $table_name="program_course";
	protected static $db_fields = array('program_course_id','program_id','semester','year','program_course');
	protected static $primary_key="program_course_id";
		
	public $program_course_id;
	public $program_id;
	public $semester;
	public $year;
	public $program_course;	
	
	 public static function find_by_program_course_id($id=""){
   return static::find_by_primary_key($id);
   }
   

	   public static function find_course_by_prog_sem_year($prog,$sem,$year){	 
		$sql="SELECT * FROM `".static::$table_name."`WHERE program_id='{$prog}' AND semester='{$sem}' AND year='{$year}'";
		$result_array = static::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;


	 }
	 
	  public static function find_course_for_report($prog,$sem,$year){	
	  
	  if($sem=="all" AND $year=="all"){
		echo $sql="SELECT * FROM `".static::$table_name."`WHERE program_id='{$prog}'";
		}
		else if($sem!="all" AND $year=="all"){
		echo $sql="SELECT * FROM `".static::$table_name."`WHERE program_id='{$prog}' AND semester='{$sem}'";
		}
		else{
		echo $sql="SELECT * FROM `".static::$table_name."`WHERE program_id='{$prog}' AND year='{$year}'";
		}
		
		$result_array = static::find_by_sql($sql);
		
		return !empty($result_array) ? array_shift($result_array) : false;


	 }
	 
	 
	public static function find_by_program_course_by_Prog_id($prog=""){
   $sql="SELECT * FROM `".static::$table_name."`WHERE program_id='{$prog}'";
   	return static::find_by_sql($sql);
   }
 }

	
	

	
	
    

?>