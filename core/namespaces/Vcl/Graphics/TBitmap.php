<?php
namespace Vcl\Graphics;

class TBitmap extends \Ct\RTTI\RTTIObject {
	
	public function __construct() {
		parent::__construct(RTTICreateObject('Vcl.Graphics.TBitmap', [], false));
	}
	
}
?>