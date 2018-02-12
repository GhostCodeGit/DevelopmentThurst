<?php
namespace FMX\Graphics;

class TBitmap extends \Ct\RTTI\RTTIObject {
	
	public function __construct() {
		parent::__construct(RTTICreateObject('FMX.Graphics.TBitmap', [], false));
	}
	
}
?>