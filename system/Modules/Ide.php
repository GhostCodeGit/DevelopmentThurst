<?php
namespace Ide\Modules;

class Ide {

	public $icons;
	public $api;
	public $mainForm;
	
	public function __construct() {
		$this->icons = new Icons;
		$this->api = new GhostCodeAPI($this);
	}
	
	public function message($message, $type = 0, $try_again = false) {
		if($this->mainForm == null) {
			setInterval(100, function($timer)use($message, $type, $try_again) {
				if($this->mainForm !== null) {
					$timer->enabled = false;
					$this->mainForm->footerPanel->addMessage($message, $type, $try_again);
				}
			});
		} else $this->mainForm->footerPanel->addMessage($message, $type, $try_again);
	}
	
}
?>