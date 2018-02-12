<?php
namespace FMX\Memo;

class TMemo extends \Ct\RTTI\RTTIObject {
	
	public function __construct($text = "") {
		parent::__construct(RTTICreateObject('FMX.Memo.TMemo', [NULL], false));
		RTTIRegisterEventableObject($this->id);
		$this->text = $text;
	}
	
}
?>