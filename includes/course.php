<?php
require_once(LIB_PATH.DS.'database.php');

class Course extends DatabaseObject {
	
	protected static $table_name="courses";
	protected static $db_fields = array('course_id','code','course_name','year','semester','elective_core','units');
	protected static $primary_key="course_id";
		
	public $course_id;
	public $course_name; 
	public $code; 
	public $year; 
	public $units; 
	public $semester; 
	public $elective_core; 
	
   public static function find_by_course_id($id=""){
   return static::find_by_primary_key($id);
   }
   
   
   
   
   
   	public static function find_all_ordered() {
	$sql="SELECT * FROM `".static::$table_name."` order by year, semester asc" ;
 
		return static::find_by_sql($sql);
  }
  
  
   
   public static function find_by_course_code($code=""){
   $sql="SELECT * FROM `".static::$table_name."`WHERE code='{$code}'";
   $result_array = static::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
   }
   
     public static function find_courses_by_year_sem($year,$sem) {
	 $sql="SELECT * FROM `".static::$table_name."`WHERE year='{$year}' AND semester='{$sem}'";
	
 
		return static::find_by_sql($sql);
  }
  
  
  
    public static function find_courses_by_year($year) {
	 $sql="SELECT * FROM `".static::$table_name."`WHERE year='{$year}'";	
 
		return static::find_by_sql($sql);
  }
  
   public static function find_courses_by_sem_option($option,$sem) {
 $sql="SELECT * FROM `".static::$table_name."`WHERE elective_core='{$option}' AND semester='{$sem}'";
 
		return static::find_by_sql($sql);
  }
   public static function find_courses_by_option($option) {
 $sql="SELECT * FROM `".static::$table_name."`WHERE elective_core='{$option}'";
 
		return static::find_by_sql($sql);
  }
  public static function find_courses_by_semester($semester) {
 $sql="SELECT * FROM `".static::$table_name."`WHERE semester='{$semester}'";
 
		return static::find_by_sql($sql);
  }
   public static function find_courses_by_year_sem_option($year,$option,$sem) {
 $sql="SELECT * FROM `".static::$table_name."`WHERE semester='{$sem}' AND elective_core='{$option}' AND year='{$year}'";
 
		return static::find_by_sql($sql);
  }
 
  
 
 
 
  
  
  
  
       public static function find_courses_by_program_year_sem($prog,$sem,$year) {
	    $p_c=Program_course::find_course_by_prog_sem_year($prog,$sem,$year);
		if($p_c){
		$string=$p_c->program_course;
		$codes=substr($string,0,strlen($string)-2); 
        $codes=addQuotes($codes);
	   
	   $sql="SELECT * FROM `".static::$table_name."`WHERE code IN({$codes})";
	
		return static::find_by_sql($sql);
		}
		else{}
  }
  
        public static function find_courses_for_reporting($prog,$sem,$year) {
	    $p_c=Program_course::find_course_for_report($prog,$sem,$year);
		if($p_c){
		$string=$p_c->program_course;
		$codes=substr($string,0,strlen($string)-2); 
        $codes=addQuotes($codes);
	   
	   $sql="SELECT * FROM `".static::$table_name."`WHERE code IN({$codes})";
	
		return static::find_by_sql($sql);
		}
		else{}
  }
  
         public static function find_courses_by_program_year_sem_elective($prog,$sem,$year) {
	    $p_c=Program_course::find_course_by_prog_sem_year($prog,$sem,$year);
		if($p_c){
		$string=$p_c->program_course;
		$codes=substr($string,0,strlen($string)-2); 
        $codes=addQuotes($codes);
	   
	   $sql="SELECT * FROM `".static::$table_name."`WHERE code IN({$codes}) AND elective_core='elective'";
	
		return static::find_by_sql($sql);
		}
		else{}
  }
  
  
   public static function find_courses_by_program_year_sem_core($prog,$sem,$year) {
	   
	 $p_c=Program_course::find_course_by_prog_sem_year($prog,$sem,$year);
		if($p_c){
		$string=$p_c->program_course;
		$codes=substr($string,0,strlen($string)-2); 
        $codes=addQuotes($codes);
	   
	   $sql="SELECT * FROM `".static::$table_name."`WHERE code IN({$codes}) AND elective_core='core'";
	
		return static::find_by_sql($sql);
		}
		else{}

  }
  
   public static function find_courses_by_program_year_sem_elective_user($prog,$sem,$year,$user) {
	    $p_c=Subscription::find_course_by_prog_sem_year($sem,$year,$user);
		if($p_c){
		$string=$p_c->courses;
		$_SESSION['sub']=$p_c->subscription_id;
		$codes=substr($string,0,strlen($string)-2); 
        $codes=addQuotes($codes);
	   
	   $sql="SELECT * FROM `".static::$table_name."`WHERE code IN({$codes}) AND elective_core='elective'";
	
		return static::find_by_sql($sql);
		}
		else{}
  }
  
 
  
  
  

}    


?>