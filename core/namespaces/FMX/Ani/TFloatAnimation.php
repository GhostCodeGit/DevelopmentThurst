<?php
namespace FMX\Ani;

class TFloatAnimation extends \ct\rtti\RTTIObject {
	
	public function __construct($aniIn = NULL) {
		parent::__construct(intval(RTTICreateObject('FMX.Ani.TFloatAnimation', [$aniIn], false)));
		RTTIRegisterEventableObject($this->id);
	}
	
}
?>