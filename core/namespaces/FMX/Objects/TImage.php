<?php
namespace FMX\Objects;

class TImage extends \Ct\RTTI\RTTIObject {
	
	public function __construct() {
		parent::__construct(intval(RTTICreateObject('FMX.Objects.TImage', [NULL], false)));
		RTTIRegisterEventableObject($this->id);
	}
	
}
?>