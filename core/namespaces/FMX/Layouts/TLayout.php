<?php
namespace FMX\Layouts;

class TLayout extends \Ct\RTTI\RTTIObject {
	
	public function __construct() {
		parent::__construct(RTTICreateObject('FMX.Layouts.TLayout', [NULL], false));
		RTTIRegisterEventableObject($this->id);
	}
	
}
?>