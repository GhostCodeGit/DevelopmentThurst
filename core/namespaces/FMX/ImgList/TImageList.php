<?php
namespace FMX\ImgList;

class TImageList extends \Ct\RTTI\RTTIObject {
	
	private $helper;
	
	public function __construct() {
		parent::__construct(RTTICreateObject('FMX.ImgList.TImageList', [NULL], false));
		RTTIRegisterEventableObject($this->id);
		
		$this->helper = new \Ct\RTTI\RTTIObject(RTTICreateObject('ImageListHelper.TImageListHelper', [], false));
	}
	
	public function add($bmp) {
		$this->helper->add($this, $bmp);
	}
	
}
?>