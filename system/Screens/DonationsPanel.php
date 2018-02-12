<?php
namespace Ide\Screens;

use FMX\Forms\TForm;
use FMX\StdCtrls\TLabel;

class DonationsPanel {

	private $screen;

	public function __construct($parent = null, $alignOf) {
		if($parent == null) {
			$screen = new TForm; 
			$screen->position = 'poScreenCenter';
		} else $screen = $parent;
		
		$label = new TLabel('Андрей Кусов - 490 рублей');
		$label->parent = $screen;
		$label->position->x = 10;
		$label->visible = false;
		$label->width = $alignOf->width;
		$label->position->y = $alignOf->position->y + $alignOf->height + 5;
		
		$this->screen = $screen;
	}
	
	public function showGo() {
		$screen = $this->screen;
		
		if($screen->className == "FMX.Forms.TForm") $screen->show();
	}
	
	public function destroy() {
		
	}
	
}
?>