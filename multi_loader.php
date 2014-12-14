<?php
/*
* I normally have this in my index file
*
* Function will auto load class with different extensions in different
* directories. You can change $myarray to the directories of your choice.
*/

define('DS', DIRECTORY_SEPARATOR);
define ('ROOT', dirname(dirname(__FILE__)));


function multi_autoloader($class) {
   // an array of directories to loop through,
   // change to your needs.
	$myarray = array ('routers', 'models', 'controllers', 'templates', 'libs');
	
	foreach ($myarray as $value) {
	
		     // loop through directories looking for classes with '.class.php' or '.php' extensions.
		$file = ROOT . DS . $value . DS . strtolower($class) . '.class.php';
			
			if ( file_exists($file) ) {
                   include ($file);
			}
			else {
				
				$file = ROOT . DS . $value . DS . strtolower($class) . '.php';
				
				   if ( file_exists($file) ) {
				       include ($file);
				   }
				   
			}
					
      }
    
}
    

// call it:
spl_autoload_register('multi_autoloader');

?>
