<?php
namespace Ide\Modules;

class GhostCodeAPI {
	
	private $gcSite = 'https://ghostcode.ru';
	private $ch = null;
	private $enabled = true;
	
	public function __construct($ideThis) {
		if(!extension_loaded("curl")) {
			$this->enabled = false;
		} else {
			$testAPI = curl_init($this->gcSite."/api.php");
			curl_setopt($testAPI, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($testAPI, CURLOPT_HEADER, 1);
			curl_setopt($testAPI, CURLOPT_NOBODY, 1);
			$status = trim(explode("\n", curl_exec($testAPI))[0]);
			curl_close($testAPI);
			if(stripos($status, "404 Not Found") !== false)
				$this->enabled = false;
		}
		if($this->enabled)
			$ideThis->message("Сервисы Ghost Code не доступны. Возможно сайт ghostcode.ru недоступен.", 0);
	}
	
}
?>