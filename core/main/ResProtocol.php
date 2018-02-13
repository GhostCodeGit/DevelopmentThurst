<?php
stream_wrapper_register("res", "ResStream");

eval("res://RequireRes.php");

class ResStream {
	
	private $resPath;
	private $mode;
	private $code;
	private $position = 0;
	
	public function stream_open($path, $mode, $options, &$opened_path) {
		$this->resPath = $path;
		$this->mode = $mode;
		$this->code = 'app()->messageBox("", "", 0);';
		return true;
	}
	
	public function stream_read($count) {
		$res = $this->code[$this->position];
		$this->position++;
		app()->messageBox($res, '', 0);
		return $res;
	}
	
	public function stream_eof() {
		return $this->position >= strlen($this->code);
	}
	
}
?>