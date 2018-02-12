<?php
namespace ceffmx;

class TChromiumFMX extends \ct\rtti\RTTIObject {
	
	public function __construct() {
		parent::__construct(intval(RTTICreateObject('ceffmx.TChromiumFMX', [NULL], false)));
		RTTIRegisterEventableObject($this->id);
	}
	
}
?>