<?php
class Posts extends RestCollection {
	
	public function __construct($method) {
		switch($method['type']) {
			case 'GET':
				$this->getLoad();
		}
	}
	
	public function getLoad() {
		
		$sqlStatement = "SELECT post_id, title, post_date FROM posts ORDER BY post_date";
		
		$statement = Database::GetHandle()->prepare($sqlStatement);
		$statement->execute();
		
		$result = $statement->fetchAll();
		
		foreach($result as $value) {
			$post = array();
			$post["id"] = $value["post_id"];
			$post["title"] = $value["title"];
			$post["date"] = $value["post_date"];
			$this->_collection["posts/{$value['post_id']}"] = $post; // The resource URI
		}
	}
}