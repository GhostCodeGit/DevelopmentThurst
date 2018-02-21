<?php
namespace ct\rtti;

class RTTIRecord {
	
	public static function __callStatic($name, $args) {
		$recordName = trim(eval("return \\".get_called_class().'::$qualifiedName;'));
		
		if(RTTIRecordExists($recordName)) {
			if(!RTTIRecordExistsProperty($recordName, $name))
				trigger_error('Property in record '.$recordName.' not found, called in class ' . get_called_class(), E_USER_ERROR);
			else {
				return RTTIRecordGetProperty($recordName, $name);
			}
		}
		trigger_error('Record with name '.$recordName.' cannot be valid, called in class ' . get_called_class(), E_USER_ERROR);
	}
	
}
?>