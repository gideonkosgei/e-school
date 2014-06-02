<?php
require_once(LIB_PATH.DS.'database.php');

class Program extends DatabaseObject {
	
	protected static $table_name="programs";
	protected static $db_fields = array('program_id','program_name','duration','program_prefix','department_id');
	protected static $primary_key="program_id";
		
	public $program_id;
	public $program_name;
	public $duration;
	public $program_prefix;
	public $department_id;	
	
	 public static function find_by_program_id($id=""){
   return static::find_by_primary_key($id);
   }
	public static function find_by_program_id_one_object($id=""){
   $result_array = static::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;

   }
   
   public static function find_by_program_prefix($prefix="",$name=""){
     	$sql="SELECT * FROM `".static::$table_name."` WHERE program_prefix='{$prefix}' OR program_name='{$name}' LIMIT 1";
		$result_array = static::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;

   }
   public static function find_programs_by_department($dept) {
	$sql="SELECT * FROM `".static::$table_name."` WHERE department_id='{$dept}'" ;
 
		return static::find_by_sql($sql);
  }
	
	

	
	
}    

?>