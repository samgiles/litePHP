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
				$dispatchValue = array("GET" => $_GET, "URI" => $uri);
				break;
			case 'HEAD':
				$dispatchValue = array("HEAD" => $_GET, "URI" => $uri);
				break;
			case 'POST':
				$dispatchValue = array("POST" => $_POST, "URI" => $uri);
				break;
			case 'DELETE':
				$dispatchValue = array("DELETE" => "", "URI" => $uri);
				break;
			case 'PUT':
				$_PUT = array();
				parse_str(file_get_contents('php://input'), $_PUT);
				$dispatchValue = array("PUT" => $_PUT, "URI" => $uri);
				break;
			default:
				// Method not allowed
				header("HTTP/1.1 405 Method Not Allowed");
				header("Allow: GET, HEAD, POST, DELETE, PUT");
		}
		
		return $dispatchValue;
	}
}