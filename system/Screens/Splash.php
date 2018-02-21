<?php
namespace Ide\Screens;

use FMX\Forms\TForm;
use FMX\StdCtrls\TLabel;
use FMX\Objects\TImage;
use Vcl\Graphics\TPicture;
use Vcl\Graphics\TBitmap;
use Vcl\Imaging\pngimage\TPngImage;

class Splash {

	private $screen;
	private $processText;
	public $canLoad = false;

	public function __construct() {
		$screen = new TForm; 
		$screen->borderStyle = 'bsNone';
		$screen->transparency = true;
		$screen->position = 'poScreenCenter';
		
		$image = new TImage;
		$image->parent = $screen;
		$image->bitmap->loadFromFile("splash.png");
		$image->width = $image->bitmap->width;
		$image->height = $image->bitmap->height;
		$image->opacity = 0;
		$screen->width = $image->width;
		$screen->height = $image->height;
		
		$processText = new TLabel('Загрузка файлов IDE...');
		$processText->parent = $screen;
		$processText->position->x = 105;
		$processText->position->y = 198;
		$processText->styleSettings = '';
		$processText->font->size = 14;
		$processText->width = 300;
		$processText->opacity = 0;
		
		$image->fadeIn("medium");
		$processText->fadeIn("medium", function() {
			$this->canLoad = true;
		});
		
		$this->processText = $processText;
		$this->screen = $screen;
	}
	
	public function showGo($callback = null) {
		$screen = $this->screen;
		
		$screen->show();
		if(is_callable($callback))
			$callback($this);
	}
	
	public function destroy() {
		$this->screen->destroy();
	}
	
	public function getText() {
		return $this->processText;
	}
	
}
?>