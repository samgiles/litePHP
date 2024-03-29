<?php
class Database {
 	protected $_dbHandle;
	 protected static $_this;
	 
	 public static function GetHandle(){
	 	if (is_null(Database::$_this)){
	 		Database::$_this = new Database('', '', '', '');
	 	}
	 	
	 	return Database::$_this->getAHandle();
	 }
	 
	 private function __construct($dbhost, $dbname, $uname, $password){
	 	$this->_dbHandle = new PDO("mysql:host={$dbhost};dbname={$dbname}", $uname, $password); 
	 }
	 
	 private function getAHandle(){
	 	return $this->_dbHandle;
	 }
}