<?php
namespace FMX\TreeView;

class TTreeView extends \Ct\RTTI\RTTIObject {
	
	public function __construct() {
		parent::__construct(RTTICreateObject('FMX.TreeView.TTreeView', [NULL], false));
		RTTIRegisterEventableObject($this->id);
	}
	
}
?>