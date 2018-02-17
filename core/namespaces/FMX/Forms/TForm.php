<?php
namespace FMX\Forms;
use FMX\Controls\TStyleBook;

class TForm extends \ct\rtti\RTTIObject {
	
	private $resizeable = true;
	public $borderWidth = 0;
	public $borderHeight = 0;
	
	public function __construct($caption='') {
		parent::__construct(intval(RTTICreateObject('FMX.Forms.TForm', [NULL, 0], true)));
		RTTIRegisterEventableObject($this->id);
		$this->caption = $caption;
		
		$styleBook = new TStyleBook;
		$this->styleBook = $styleBook;
		$styleId = (OS_PLATFORM == WINDOWS_8_1 ? WINDOWS_8 : OS_PLATFORM);
		$styleId = (OS_PLATFORM == WINDOWS_10 ? 2 : $styleId);
		$this->styleBook->loadFromStream(getResource("CtStyle".$styleId));
	}
	
	public function loadFromFile($dfmFile) {
		(new \ct\rtti\RTTIObject(ApplicationID()))->loadForm($dfmFile, $this);
		return $this;
	}
	public function saveToFile($dfmFile) {
		(new \ct\rtti\RTTIObject(ApplicationID()))->saveForm($dfmFile, $this);
	}
	
	public function getResizeable() {
		return $this->resizeable;
	}
	public function setResizeable($resizeable) {
		if($resizeable)
			$this->borderStyle = 'bsSizeable';
		else $this->borderStyle = 'bsSingle';
		$this->resizeable = $resizeable ? true : false;
	}
	
}
?>