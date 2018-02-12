<?php
namespace FMX\TabControl;

class TTabControl extends \Ct\RTTI\RTTIObject {
	
	public function __construct($text = "") {
		parent::__construct(RTTICreateObject('FMX.TabControl.TTabControl', [NULL], false));
		RTTIRegisterEventableObject($this->id);
		$this->text = $text;
	}
	
}
?>