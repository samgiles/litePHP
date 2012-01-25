<?php
/**
 * Takes a web request and dispatches appropriately.
 * @author Samuel Giles
 *
 */
class Dispatch {
	
	/**
	 * Dispatch a simple application that uses only a standard query string to identify the page.  
	 * With the controller defined by the {URI}?c={controllerName}&{restOfQueryString}
	 * @param  $requests  Typically the $_REQUESTS array.
	 * @param $posts Typically the $_POST array
	 */
	public static function get($requests, $posts){

		if (isset($requests['c'])){
			$controllerName = ((string)$requests['c'])."Controller";
			return new $controllerName();
		}
		
	}
	
	/**
	 * Dispatches a REST application.
	 */
	public static function rest(){
		
		$requestMethod = $_SERVER["REQUEST_METHOD"];
		$uri = $_SERVER["REQUEST_URI"];
		
		switch ($requestMethod) {
			case 'GET':
				$dispatchValue = array("type" => "GET", "GET" => $_GET, "URI" => $uri);
				break;
			case 'HEAD':
				$dispatchValue = array("type" => "HEAD","HEAD" => $_GET, "URI" => $uri);
				break;
			case 'POST':
				$dispatchValue = array("type" => "POST","POST" => $_POST, "URI" => $uri);
				break;
			case 'DELETE':
				$dispatchValue = array("type" => "DELETE","DELETE" => "", "URI" => $uri);
				break;
			case 'PUT':
				$_PUT = array();
				parse_str(file_get_contents('php://input'), $_PUT);
				$dispatchValue = array("type" => "PUT","PUT" => $_PUT, "URI" => $uri);
				break;
			default:
				// Method not allowed
				if (function_exists("http_response_code")){
					http_response_code(405); // Using SVN version PHP
				} else {
					header("status", true, 405); 	// Appears we can set the status code using this rather than explicitly setting the header, this makes the HttpCodes class redundant.
													// Note, the first string needs to be none empty for the setting of the response code to work. php.net/manual/en/function.header.php
				}
				
				header("Allow: GET, HEAD, POST, DELETE, PUT");
				throw new MethodNotAllowedException("Invalid HTTP Method.");
		}
		
		return $dispatchValue;
	}
	
	private static function dispatchRest(array $initialValues) {
		
	}
}