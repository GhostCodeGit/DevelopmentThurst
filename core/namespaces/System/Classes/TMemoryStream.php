<?php
namespace System\Classes;

class TMemoryStream extends \ct\rtti\RTTIObject {
	
	public function __construct($caption='') {
		parent::__construct(memoryStream());
	}
	
}
?>