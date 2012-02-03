<?php
class MethodNotAllowedException extends HttpException {
	public function __construct() {	
		$this->setHeaders();	
	}
	
	private function setHeaders() {
		
		if (function_exists('http_response_code')){
			http_response_code(405); 		// Using SVN version PHP
		} else {
			header('status', true, 405); 	// Appears we can set the status code using this rather than explicitly setting the header, this makes the HttpCodes class redundant.
											// Note, the first string needs to be none empty for the setting of the response code to work, the word status has no significance. php.net/manual/en/function.header.php
		}
		
		header('Allow: GET, HEAD, POST, DELETE, PUT'');
	}
}