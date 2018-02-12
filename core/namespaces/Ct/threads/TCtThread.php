<?php
namespace ct\threads;

use ct\rtti\RTTIObject;

class TCtThread extends RTTIObject {
	
	public function __construct() {
		parent::__construct(RTTICreateObject('CtThread.TCtThread', []));
		RTTIRegisterEventableObject($this->id);
	}

}
?>