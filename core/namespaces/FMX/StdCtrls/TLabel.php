<?php
namespace FMX\StdCtrls;

class TLabel extends \Ct\RTTI\RTTIObject {
	
	public function __construct($text = "") {
		parent::__construct(intval(RTTICreateObject('FMX.StdCtrls.TLabel', [NULL], false)));
		RTTIRegisterEventableObject($this->id);
		$this->text = $text;
	}
	
}
?>