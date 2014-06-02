<?php
require_once(LIB_PATH.DS.'database.php');

class Subscription extends DatabaseObject {
	
	protected static $table_name="subscription";
	protected static $db_fields = array('subscription_id','admission_number','courses','year','semester');
	protected static $primary_key="subscription_id";
		
	public $subscription_id;
	public $admission_number;
	public $courses;
	public $year;
	public $semester;
	
	
   public static function find_by_subscription_id($id=""){
   return static::find_by_primary_key($id);
   }
   
    public static function find_course_by_prog_sem_year($sem,$year,$user){	 
		$sql="SELECT * FROM `".static::$table_name."`WHERE  semester='{$sem}' AND year='{$year}' AND admission_number='{$user}'";
		$result_array = static::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;


	 }
	
 
	
	
}    

?>