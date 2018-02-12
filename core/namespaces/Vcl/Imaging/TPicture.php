<?php
namespace Vcl\Graphics;

class TPicture extends \Ct\RTTI\RTTIObject {
	
	public function __construct() {
		parent::__construct(RTTICreateObject('Vcl.Graphics.TPicture', [], false));
	}
	
}
?>