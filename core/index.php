<?php 
/*
 * This is the index file for the framework.  It provides an entry point to the application.
 */

$dn = dirname(__FILE__);

$psdn = PATH_SEPARATOR . $dn; // Path separator and dn

// Set up the include paths.
$path = $dn . '/../auth' . $psdn . '/../db' . $psdn . '/../session' . $psdn . '/controllers'  . $psdn . '/models';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
// Include the AutoLoad function.
require_once ("AutoLoad.php");

// Set error level
ini_set('display_errors', 1); 

/*
 * Run the application.
 */
Application::run(true);