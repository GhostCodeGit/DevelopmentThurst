<?php
namespace ct\rtti;

global $data;
$data = [];

class RTTIObject {
	
	public $classId, $className, $id;
	
	public function __construct($id) {
		$id = intval($id);
		if(RTTIIsObject($id)) {
			$this->id = $id;
			$this->classId = RTTIGetClass($this->id);
			$this->className = trim(RTTIGetClassName($this->id));
			return;
		}
		trigger_error('Object with id '.$id.' cannot be valid, called in class ' . get_called_class(), E_USER_ERROR);
	}
	
	private function __customEvents() {
		return [];
	}
	
	/*
	* For VCL
	*/
	public function setParent(RTTIObject $parent) {
		$parent->insertControl($this);
		$parent->insertComponent($this);
		$form = $this->getParentForm($parent);
		RTTISetProperty($this->id, "parent", [$parent->id]);
	}
	private function getParentForm($object) {
		if($object instanceof RTTIObject) {
			if($object->className == 'FMX.Forms.TForm')
				return $object;
			else
				return $this->getParentForm($object->parent);
		}
	}
	
	public function on($name, $callback = null) {
		if(is_string($callback))
			$callback = function()use($callback){eval($callback);};
		elseif(is_array($name)) {
			foreach($name as $nm) 
				$this->on($nm, $callback);
			return;
		} else {
			$callbackup = $callback;
			$callback = function()use($callbackup){
				global $currentForm;
				$currentForm = $this->getParentForm($this);
				
				$args = [];
				for($i = 0; $i < func_num_args(); $i++) {
					if(is_int(func_get_arg($i)) && RTTIIsObject(func_get_arg($i)))
						$args[$i] = new RTTIObject(func_get_arg($i));
                    else
						$args[$i] = func_get_arg($i);
				}
				call_user_func_array($callbackup, $args);
				
				$currentForm = null;
				unset($args, $callbackup);
			};
		}
		if(in_array(strtolower($name), $this->__customEvents()))
			$this->{__setOn.(ucfirst($name))}($callback);
		else RTTISetEvent($this->id, 'On'.ucfirst($name), $callback);
		return $this;
	}
	public function off($name) {
		RTTISetEvent($this->id, 'On'.ucfirst($name), function(){});
	}
	
	public function __set($property, $value) {
		if(property_exists($this, $property)) {
			$this->$property = $value;
		} elseif(method_exists($this, "set".$property))  {
			call_user_func_array([$this, 'set'.$property], [$value]);
		} elseif(RttiExistsProperty($this->id, $property))  {
			$is = ($value instanceof RTTIObject) ? 1 : 0;
			$value = ($value instanceof RTTIObject) ? $value->id : $value;
			RTTISetProperty($this->id, $property, [$value]);
		}
	}
	
	public function __get($property) {
		$result = null;
		if(property_exists($this, $property)) {
			$result = $this->$property;
		} elseif(method_exists($this, "get".$property)) {
			$result = call_user_func_array([$this, 'get'.$property], []);
		} elseif(RttiExistsProperty($this->id, $property)) { 
			$value = RttiGetProperty($this->id, $property);
			if(is_int($value) && (strlen($value)==8||strlen($value)==9) && $value > 0 && RttiIsObject((int)$value))
				$result = new RTTIObject((int)$value);
			else
				$result = $value;
		}
		return is_string($result) ? trim($result) : $result;
	}
	
	public function __call($method, $args) {
		$result = null;
		if(method_exists($this, $method)) {
			$result = call_user_func_array([$this, $method], $args);
		} elseif(RTTIMethodExists($this->id, $method)) {
			$args = $this->prepareValue($args);
			$value = RTTICallObjectMethod($this->id, $method, $args);
			$result = (is_int($value) && (strlen($value)==8||strlen($value)==9) && RTTIIsObject((int)$value)) ? new RTTIObject((int)$value) : $value;
		} else {
			if(substr($method, 0, 3) == 'set') {
				$setmethod = substr($method, 3, strlen($method)-3);
				$this->$setmethod = $args[0];
				$result = &$this;
			} elseif(substr($method, 0, 3) == 'get') {
				$getmethod = substr($method, 3, strlen($method)-3);
				$result = $this->__get($getmethod);
			} else {
				trigger_error("Can't find function " . $method, E_USER_ERROR);
			}
		}
		return is_string($result) ? trim($result) : $result;
	}
	public static function __callStatic($method, $args) {
		$result = null;
		if(method_exists(get_called_class(), $method)) {
			return call_user_func_array([get_called_class(), $method], $args);
		} elseif(method_exists(get_called_class(), 'getVclClassName') && RTTIStaticMethodExists(self::getVclClassName(), $method)) {
			$value = RTTICallStaticMethod(self::getVclClassName(), $method, $args);
			$result = (is_int($value) && strlen($value)==8 && RTTIIsObject((int)$value)) ? new RTTIObject((int)$value) : $value;
		} else {
			trigger_error("Can't find static function " . $method, E_USER_ERROR);
		}
		return $result;
	}
	
	private function prepareValue($value) {
		if(is_array($value)) {
			for($i = 0; $i <= count($value) - 1; $i++) {
				if(isset($value[$i]))
					$value[$i] = $this->prepareValue($value[$i]);
			}
			return $value;
		}
		return ($value instanceof RTTIObject) ? $value->id : $value;
	}
	
}
?>