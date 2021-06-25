<?php

spl_autoload_register('myautoloader');

function myautoloader($classname){

	$path='class/'.$classname.'.class.php'; 

	if(file_exists($path)){
		
		include_once($path); 
	}

	
	return false;      
}




?>