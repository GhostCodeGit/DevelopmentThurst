<?php
namespace FMX\Layouts;

class TVertScrollBox extends \Ct\RTTI\RTTIObject {
	
	public function __construct() {
		parent::__construct(RTTICreateObject('FMX.Layouts.TVertScrollBox', [NULL], false));
		RTTIRegisterEventableObject($this->id);
	}
	
}
?>