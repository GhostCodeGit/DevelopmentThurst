<?php
namespace FMX\StdCtrls;

class TButton extends \Ct\RTTI\RTTIObject {
	
	public function __construct($text = "") {
		parent::__construct(RTTICreateObject('FMX.StdCtrls.TButton', [NULL], false));
		RTTIRegisterEventableObject($this->id);
		$this->text = $text;
		$this->textSettings->horzAlign = 'taLeading';
	}
	
}
?>