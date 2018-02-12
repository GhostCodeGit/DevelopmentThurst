<?php
namespace System\UITypes;

class TAlphaColorF {
	
	public static function Create($r, $g, $b, $a = 1) {
		return new \Ct\RTTI\RTTIObject(RTTICreateObject("EngineController.TAlphaColorFEx", [$r, $g, $b, $a], false));
	}
	
}
?>