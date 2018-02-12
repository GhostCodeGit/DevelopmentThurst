<?php
namespace System\Classes;

class TResourceStream extends \ct\rtti\RTTIObject {
	
	public function __construct($instance, $resName, $resType) {
		parent::__construct(resourceStream($instance, $resName, $resType));
	}
	
}
?>