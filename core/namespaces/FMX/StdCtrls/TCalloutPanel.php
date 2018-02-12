<?php
namespace FMX\StdCtrls;

class TCalloutPanel extends \Ct\RTTI\RTTIObject {
	
	public function __construct() {
		parent::__construct(intval(RTTICreateObject('FMX.StdCtrls.TCalloutPanel', [NULL], false)));
		RTTIRegisterEventableObject($this->id);
	}
	
}
?>