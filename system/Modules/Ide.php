<?php
namespace Ide\Modules;

class Ide {

	public $icons;
	public $api;
	public $mainForm;
	public $sqlite;
	
	public function __construct() {
		$this->icons = new Icons;
		$this->api = new GhostCodeAPI($this);
		$this->sqlite = new \SQLite3("settings.db");
		
		if($this->sqlite->querySingle("SELECT name FROM sqlite_master WHERE type='table' AND name= 'dt'") == null) {
			$this->message("Настройки не обнаружены, создаем новые...", 1);
			$this->sqlite->query("CREATE TABLE dt (name TEXT NOT NULL, value TEXT NOT NULL, value_additional VARCHAR(30) NOT NULL)");
		}
		if($this->sqlite->querySingle("SELECT COUNT(*) FROM dt") == 0) {
			$this->sqlite->query("
			INSERT INTO dt (name, value, value_additional) VALUES(
				'version', '".DT_VERSION."', ''
			);
			INSERT INTO dt (name, value, value_additional) VALUES(
				'isStable', '".(DT_IS_STABLE?1:0)."', ''
			);
			INSERT INTO dt (name, value, value_additional) VALUES(
				'isRelease', '".(DT_IS_RELEASE?1:0)."', ''
			);
			INSERT INTO dt (name, value, value_additional) VALUES(
				'ctVersion', '".DT_CT_VERSION."', ''
			);
			INSERT INTO dt (name, value, value_additional) VALUES(
				'fullVersionName', '".DT_FULL_VERSION."', ''
			);
			");
		}
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