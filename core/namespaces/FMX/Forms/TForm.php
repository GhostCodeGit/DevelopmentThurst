<?php
namespace FMX\Forms;

class TForm extends \ct\rtti\RTTIObject {
	
	public function __construct($caption='') {
		parent::__construct(intval(RTTICreateObject('FMX.Forms.TForm', [NULL, 0], true)));
		RTTIRegisterEventableObject($this->id);
		$this->caption = $caption;
	}
	
	public function loadFromFile($dfmFile) {
		(new \ct\rtti\RTTIObject(ApplicationID()))->loadForm($dfmFile, $this);
		return $this;
	}
	public function saveToFile($dfmFile) {
		(new \ct\rtti\RTTIObject(ApplicationID()))->saveForm($dfmFile, $this);
	}
	
}
?>