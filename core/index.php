<?php 
/*
 * This is the index file for the framework.  It provides an entry point to the application.
 */

// Set up the include paths.
$path = dirname(__FILE__) . "/../liteFramework" . PATH_SEPARATOR . dirname(__FILE__) . "/models" . PATH_SEPARATOR . dirname(__FILE__) . "/controllers";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

// Include the AutoLoad function.
require_once ("AutoLoad.php");

// Set error level
ini_set('display_errors', 1); 

/*
 * Run the application.
 */
Application::run();