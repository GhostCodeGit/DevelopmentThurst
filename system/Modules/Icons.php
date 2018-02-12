<?php
namespace Ide\Modules;

use FMX\ImgList\TImageList;
use FMX\Graphics\TBitmap;

class Icons {
	
	public $icons16;
	private $iconsNames16 = [];
	
	public $icons32;
	private $iconsNames32 = [];
	
	private $gifsNames = [];
	
	public function __construct() {
		$this->icons16 = new TImageList;
		$this->icons32 = new TImageList;
		
		$this->initializeImageList();
	}
	
	public function initializeImageList() {
		$x16 = glob('system/design/images/*16x16.png');
		$x32 = glob('system/design/images/*32x32.png');
		$gifs = glob('system/design/images/*.gif');
		for($i = 0; $i < count($x16); $i++) {
			$x = $x16[$i];
			
			$bmp = new TBitmap;
			$bmp->loadFromFile($x);
			$this->icons16->add($bmp);
			
			$this->iconsNames16[md5(basename($x))] = $i;
		}
		/*for($i = 0; $i < count($x32); $i++) {
			$x = $x32[$i];
			$this->icons32->addImage($x, $i);
			$this->iconsNames32[md5(basename($x))] = $i;
		}
		for($i = 0; $i < count($gifs); $i++) {
			$x = $gifs[$i];
			$this->gifsNames[md5(basename($x))] = $i;
		}*/
	}
	
	public function get($name, $size = 16) {
		$file = 'system/design/images/'.$name.$size.'x'.$size.'.png';
		if(file_exists($file)) {
			return $file;
		}
		if($name == 'error') return '';
		return $this->get('error', $size);
	}
	
	public function getGif($name, $size) {
		$file = 'system/design/images/'.$name.$size.'x'.$size.'.gif';
		if(file_exists($file)) {
			return $file;
		}
		return '';
	}
	
	public function getAsImage16($name) {
		$icon = $this->get($name, 16);
		if($icon == '') return null;
		return $this->iconsNames16[md5(basename($icon))];
	}
	
	public function getAsImage32($name) {
		$icon = $this->get($name, 32);
		if($icon == '') return null;
		return $this->iconsNames32[md5(basename($icon))];
	}
	
}
?>