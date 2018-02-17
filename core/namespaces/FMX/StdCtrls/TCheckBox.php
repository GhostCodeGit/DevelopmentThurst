<?php
namespace FMX\StdCtrls;

class TCheckBox extends \Ct\RTTI\RTTIObject {
	
	public function __construct($text = "") {
		parent::__construct(intval(RTTICreateObject('FMX.StdCtrls.TCheckBox', [NULL], false)));
		RTTIRegisterEventableObject($this->id);
		$this->text = $text;
	}
	
}
?>