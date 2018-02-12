<?php
namespace FMX\Objects;

class TText extends \Ct\RTTI\RTTIObject {
	
	public function __construct($text = '') {
		parent::__construct(RTTICreateObject('FMX.Objects.TText', [NULL], false));
		RTTIRegisterEventableObject($this->id);
		$this->text = $text;
	}
	
}
?>