<?php
namespace FMX\forms;

class TApplication extends \ct\rtti\RTTIObject {
	
	public function __construct() {
		parent::__construct(ApplicationID());
	}
	
}
?>