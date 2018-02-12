<?php
namespace FMX\Menus;

class TMenuItem extends \Ct\RTTI\RTTIObject {
	
	public function __construct() {
		parent::__construct(RTTICreateObject('FMX.Menus.TMenuItem', [NULL], false));
		RTTIRegisterEventableObject($this->id);
	}
	
}
?>