<?php
use ct\rtti\RTTIObject;
use fmx\forms\TApplication;

function enableWriteToConsole() {
	runkit_function_copy("print_r", "__print_r__");
	runkit_function_copy("var_dump", "__var_dump__");

	runkit_function_redefine("print_r", '$value, $return = false', '
		if($return)
			return __print_r__($value, true);
		else writeLn(__print_r__($value, true));
	');
	runkit_function_redefine("var_dump", '...$expression', '
		ob_start();
		__var_dump__($expression);
		write(ob_get_clean());
	');
}

function getResource($resourceName, $asText = false) {
	if(findResource(app()->getHInstance(), $resourceName, RT_RCDATA) <> 0) {
		$stream = new \System\Classes\TResourceStream(HInstance, $resourceName, RT_RCDATA);
		if(!$asText)
			return $stream;
		$strings = new \System\Classes\TStringList;
		$strings->loadFromStream($stream);
		$text = $strings->text;
		$stream->destroy();
		$strings->destroy();
		return $text;
	} else
		trigger_error("Resource '".$resourceName."' not found");
}

function rinclude($file) {
	if(substr($file, 0, 6) == "res://") {
		$file = substr($file, 6);
		$stream = new \System\Classes\TResourceStream(HInstance, $file, RT_RCDATA);
		$strings = new \System\Classes\TStringList;
		$strings->loadFromStream($stream);
		file_put_contents(getenv("tmp").md5($strings->text), $strings->text);
		include getenv("tmp").md5($strings->text);
	} else {
		include $file;
	}
}

function disableWriteToConsole() {
	if(!function_exists("__print_r__"))
		return;
	
	runkit_function_remove("print_r");
	runkit_function_remove("var_dump");
	
	runkit_function_rename("__print_r__", "print_r");
	runkit_function_rename("__var_dump__", "var_dump");
}

function setInterval($interval, $callback) {
	$tmr = new \Vcl\ExtCtrls\TTimer;
	$tmr->interval = $interval;
	$tmr->on("Timer", $callback)->enabled = true;
}
function setTimeout($timeout, $callback) {
	$tmr = new \Vcl\ExtCtrls\TTimer;
	$tmr->interval = $timeout;
	$tmr->on("Timer", function($sender)use($callback){$sender->enabled=false;$callback($sender);})->enabled = true;
}

function alert($message) {
	app()->messageBox($message, "", 0);
}
function pre(...$v) {
	ob_start();
	var_dump(...$v);
	$out2 = ob_get_contents();
	ob_end_clean();
	app()->messageBox($out2, '', 0);
}

function obj($name = "") {
	global $currentForm;
	$screen = app()->getScreen();
	$object = null;
	$parts = explode("->", $name);
	if(count($parts) == 0 && $currentForm !== null)
		return $currentForm;
	for($i = 0; $i < $screen->formCount; $i++) {
		$form = $screen->forms($i);
		if(is_int($form))
			$form = new \ct\rtti\RTTIObject($form);
		if(!is_object($form))
			continue;
		if(strtolower($form->name) == strtolower($parts[0])) {
			$object = $form;
			break;
		}
	}
	if($object == null && $currentForm !== null)
		$object = $currentForm;
	else array_shift($parts);
	if(count($parts) == 0) 
		return $object;
	for($i = 0; $i < count($parts); $i++) {
		$component = $object->findComponent($parts[$i]);
		if($component == null)
			return null;
		$object = $component;
	}
	if(is_int($object) && RTTIIsObject($object))
		$object = new \ct\rtti\RTTIObject($object);
	return $object;
}
function c($obj = "") {
	return obj($obj);
}
function xcopy($source, $dest, $permissions = 0755)
{
    // Check for symlinks
    if (is_link($source)) {
        return symlink(readlink($source), $dest);
    }

    // Simple copy for a file
    if (is_file($source)) {
        return copy($source, $dest);
    }

    // Make destination directory
    if (!is_dir($dest)) {
        mkdir($dest, $permissions);
    }

    // Loop through the folder
    $dir = dir($source);
    while (false !== $entry = $dir->read()) {
        // Skip pointers
        if ($entry == '.' || $entry == '..') {
            continue;
        }

        // Deep copy directories
        xcopy("$source/$entry", "$dest/$entry", $permissions);
    }

    // Clean up
    $dir->close();
    return true;
}
function formatNumber( $number, $decimals=2, $dec_point=".", $thousands_sep=",") {
    $nachkomma = abs($in - floor($in));
    $strnachkomma = number_format($nachkomma , $decimals, ".", "");
 
    for ($i = 1; $i <= $decimals; $i++) {
        if (substr($strnachkomma, ($i * -1), 1) != "0") {
            break;
        }
    }
   
    return number_format($in, ($decimals - $i +1), $dec_point, $thousands_sep);
}

function removeAllFiles($dir) {
	foreach(scandir($dir) as $file) {
		if($file == '.' || $file == '..')
			continue;
		is_dir($dir."\\".$file) ? removeAllFiles($dir."\\".$file) : (function_exists("shell_exec_th")?shell_exec_th('del "'.$dir."\\".$file.'"'):shell_exec('del "'.$dir."\\".$file.'"'));
	}
	if(count(scandir($dir)) !== 2)
		return false;
	function_exists("shell_exec_th") ? shell_exec_th('rmdir "'.$dir.'"') : shell_exec('rmdir "'.$dir.'"');
	return true;
}
?>