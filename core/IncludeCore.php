<?php
use fmx\forms\TApplication;

spl_autoload_register(function($className){
	$all = explode('\\', $className);
	$folder = '';
	$class = '';
	for($i = 0; $i <= count($all)-2; $i++) {
		$folder .= $all[$i].'\\';
	}
	$class = $all[count($all)-1];
	
	if(file_exists(__DIR__ . '\\namespaces\\' . $folder . $class . '.php')){
		require 'namespaces\\' . $folder.'\\'.$class.'.php';
		return;
	}
	
	// Experimental function (only for mini applications using, else application don't functionally works)
	// Uncomment for use this
	// This class sensivity case,
	// Example: use Vcl\Forms\TForm instead vcl\forms\TForm;
	/*
	eval('
		namespace '.substr($folder, 0, strlen($folder)-1).';
		
		class '.$class.' extends \ct\rtti\RTTIObject {
			
			public function __construct($args) {
				if(!is_array($args)) {
					$args = [$args];
				}
				parent::__construct(RTTICreateObject("'.str_replace('\\', '.', $folder).'.'.$class.'", $args));
				RTTIRegisterEventableObject($this->id); // For events
			}
			
		}
	');
	*/
});

$APPLICATION = new TApplication();
function app() {
	return $APPLICATION;
}

if(!strncasecmp(php_uname('s'), 'windows', 7)) {
	define ('IS_WINDOWS', 1);
	define ('IS_UNIX', 0);
} else {
	define ('IS_WINDOWS', 0);
	define ('IS_UNIX', 1);
}

require __DIR__ . '/main/Constants.php';
require __DIR__ . '/main/Functions.php';
?>