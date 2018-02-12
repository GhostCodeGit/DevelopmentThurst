<?php
namespace FMX\Menus;

class TMainMenu extends \Ct\RTTI\RTTIObject {
	
	public function __construct() {
		parent::__construct(RTTICreateObject('FMX.Menus.TMainMenu', [NULL], false));
		RTTIRegisterEventableObject($this->id);
	}
	
}
?>