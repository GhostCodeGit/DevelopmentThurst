<?php
namespace System\UITypes;

class TAlphaColorF extends \CT\RTTI\RTTIObject {
	
	/*public static function Create($r, $g, $b, $a = 1) {
		$color = new \Ct\RTTI\RTTIObject(RTTICreateObject("EngineController.TAlphaColorFEx", [$r, $g, $b, $a], false));
		return $color->obj;
		//var_dump($color->obj);
		//return $color->obj->toAlphaColor();
	}*/
	
	public static function getVclClassName() {
		return "EngineController.TAlphaColorFEx";
	}
	
}
?>