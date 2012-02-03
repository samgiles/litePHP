<?php
class NotFoundException extends HttpException {
	public function __construct() {	
		$this->setHeaders();	
	}
	
	private function setHeaders() {
		
		if (function_exists('http_response_code')){
			http_response_code(404); 		// Using SVN version PHP
		} else {
			header('status', true, 404); 	// Appears we can set the status code using this rather than explicitly setting the header, this makes the HttpCodes class redundant.
			// Note, the first string needs to be none empty for the setting of the response code to work, the word status has no significance. php.net/manual/en/function.header.php
		}
	}
}