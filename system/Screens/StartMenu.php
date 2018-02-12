<?php
namespace Ide\Screens;

use FMX\Forms\TForm;
use FMX\StdCtrls\TLabel;
use FMX\StdCtrls\TButton;
use FMX\StdCtrls\TSpeedButton;

class StartMenu {

	private $screen;

	public function __construct($parent = null) {
		if($parent == null) {
			$screen = new TForm; 
			$screen->position = 'poScreenCenter';
		} else {
			$screen = $parent;
		}
		
		$projectControlling = new TLabel;
		$projectControlling->parent = $screen;
		$projectControlling->position->x = 10;
		$projectControlling->position->y = 5;
		$projectControlling->width = 250;
		$projectControlling->autoSize = true;
		$projectControlling->text = 'Управление проектами';
		$projectControlling->styledSettings = '';
		$projectControlling->font->size = 17;
		
		$projectNew = new TButton("Создать проект");
		$projectNew->parent = $screen;
		$projectNew->position->y = $projectControlling->position->y + $projectControlling->height + 5;
		$projectNew->position->x = 15;
		$projectNew->width = 200;
		$projectNew->height = 38;
		$projectNew->margins->left = 14;
		$projectNew->styledSettings = '';
		$projectNew->textSettings->horzAlign = 'taLeading';
		$projectNew->font->size = 14;
		$projectNew->images = $ide->icons->icons16;
		$projectNew->imageIndex = $ide->icons->getAsImage16("new");
		$projectNew->styleLookup = 'custom_color';
		
		$projectOpen = new TButton("Открыть проект");
		$projectOpen->parent = $screen;
		$projectOpen->position->y = $projectNew->position->y + $projectNew->height + 5;
		$projectOpen->position->x = 15;
		$projectOpen->width = 200;
		$projectOpen->height = 38;
		$projectOpen->styledSettings = '';
		$projectOpen->textSettings->horzAlign = 'taLeading';
		$projectOpen->font->size = 14;
		$projectOpen->images = $ide->icons->icons16;
		$projectOpen->imageIndex = $ide->icons->getAsImage16("open");
		
		$projectClose = new TButton("Закрыть проект");
		$projectClose->parent = $screen;
		$projectClose->position->y = $projectOpen->position->y + $projectOpen->height + 5;
		$projectClose->position->x = 15;
		$projectClose->width = 200;
		$projectClose->height = 38;
		$projectClose->styledSettings = '';
		$projectClose->textSettings->horzAlign = 'taLeading';
		$projectClose->font->size = 14;
		$projectClose->images = $ide->icons->icons16;
		$projectClose->imageIndex = $ide->icons->getAsImage16("close");
		
		new DonationsPanel($screen, $projectClose);
		
		$this->screen = $screen;
	}
	
	public function showGo() {
		$screen = $this->screen;
		
		if($screen->className == "FMX.Forms.TForm") 
			$screen->show();
	}
	
	public function destroy() {
		
	}
	
}
?>