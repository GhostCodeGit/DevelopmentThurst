<?php
namespace FMX\Edit;

class TEdit extends \Ct\RTTI\RTTIObject {
	
	public function __construct($text = "") {
		parent::__construct(RTTICreateObject('FMX.Edit.TEdit', [NULL], false));
		RTTIRegisterEventableObject($this->id);
		$this->text = $text;
	}
	
}
?>