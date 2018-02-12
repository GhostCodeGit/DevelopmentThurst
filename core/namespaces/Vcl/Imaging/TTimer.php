<?php
namespace Vcl\ExtCtrls;

class TTimer extends \Ct\RTTI\RTTIObject {
	
	public function __construct() {
		parent::__construct(RTTICreateObject('Vcl.ExtCtrls.TTimer', [NULL], false));
		RTTIRegisterEventableObject($this->id);
	}
	
}
?>