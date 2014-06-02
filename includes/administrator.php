<?php
require_once(LIB_PATH.DS.'database.php');

class Administrator extends DatabaseObject {
	
	protected static $table_name="administrator";
	protected static $db_fields = array('admin_id','username','password');
	protected static $primary_key="admin_id";	
	public $username;
	public $password; 
	public $admin_id; 

	
		function __construct() {
		$this->username;
	}
	
	  public static function authenticate($username="", $password="") {
    global $database;
    $username = $database->escape_value($username);
    $password = $database->escape_value($password);
    $sql  = "SELECT * FROM  ".self::$table_name." ";
    $sql .= "WHERE username='{$username}'";
    $sql .= "AND password ='{$password}'";
    $sql .= "LIMIT 1";
    $result_array = self::find_by_sql($sql);
	

	
	return !empty($result_array) ? array_shift($result_array) : false;
	}
	
	
	 public static function find_by_administrator_id($id=""){
   return static::find_by_primary_key($id);
   }
	
	
}    

?>