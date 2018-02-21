<?php
namespace FMX\Objects;

class TRectangle extends \Ct\RTTI\RTTIObject {
	
	public function __construct() {
		parent::__construct(RTTICreateObject('FMX.Objects.TRectangle', [NULL], false));
		RTTIRegisterEventableObject($this->id);
	}
	
}
?>