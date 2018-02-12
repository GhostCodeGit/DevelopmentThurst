<?php
namespace Ide;

class Loader {
	
	public static function loadToText($textObject) {
		$root = glob("system\*.php");
		$modules = glob("system\Modules\*.php");
		$screens = glob("system\Screens\*.php");
		$files = array_merge_recursive($root, $screens, $modules);
		
		foreach($files as $file) {
			//if($textObject !== null)
			//	$textObject->text = 'Загрузка: ' . $file;
			require_once($file);
		}
		//if($textObject !== null)
			//$textObject->text = 'Загрузка завершена';
	}
	
}
?>