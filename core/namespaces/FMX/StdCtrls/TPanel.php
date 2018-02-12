<?php
namespace FMX\StdCtrls;

class TPanel extends \Ct\RTTI\RTTIObject {
	
	public function __construct($text = "") {
		parent::__construct(intval(RTTICreateObject('FMX.StdCtrls.TPanel', [NULL], false)));
		RTTIRegisterEventableObject($this->id);
		$this->text = $text;
	}
	
}
?>