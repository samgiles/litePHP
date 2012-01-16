<?php
/**
 * @author user
 *
 */
class Application {
	
	protected static $_view;
	protected static $_controller;
	

	public static function run($rest){
		
		if ($rest) {
			print_r(Dispatch::rest());
			return;
		}
		
		// Dispatch the application.
		Application::$_controller = Dispatch::get($_GET, $_POST);
		
		// Create a view from the controller association.
		$this->_view = new View($this->_controller);
		$this->_view->render();
	}
	
}