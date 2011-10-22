<?php
/**
 * Takes a web request and dispatches appropriately.
 * @author Samuel Giles
 *
 */
class Dispatch {
	
	public static function get($requests, $posts){
		
		if (isset($requests['c'])){
			$controllerName = ((string)$requests['c'])."Controller";
			return new $controllerName();
		}
		
	}
}