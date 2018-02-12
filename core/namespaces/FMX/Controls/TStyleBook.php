<?php
namespace FMX\Controls;

class TStyleBook extends \Ct\RTTI\RTTIObject {
	
	public function __construct() {
		parent::__construct(RTTICreateObject('FMX.Controls.TStyleBook', [NULL], false));
		RTTIRegisterEventableObject($this->id);
	}
	
}
?>