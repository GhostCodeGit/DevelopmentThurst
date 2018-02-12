<?php
namespace FMX\TreeView;

class TTreeViewItem extends \Ct\RTTI\RTTIObject {
	
	public function __construct($text = "") {
		parent::__construct(RTTICreateObject('FMX.TreeView.TTreeViewItem', [NULL], false));
		RTTIRegisterEventableObject($this->id);
		$this->text = $text;
	}
	
}
?>