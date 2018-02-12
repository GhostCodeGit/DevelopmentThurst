<?php
namespace Ide\Screens;

use FMX\Forms\TForm;
use FMX\StdCtrls\TButton;
use FMX\StdCtrls\TPanel;

class TopbarPanel {

	private $screen;

	public function __construct($parent = null) {
		if($parent == null) {
			$screen = new TForm; 
			$screen->position = 'poScreenCenter';
		} else $screen = $parent;
		
		$buttonSize = 26;
		$buttonsTop = ($screen->height - $buttonSize) / 2;
		$buttonCreate = new TButton;
		$buttonCreate->parent = $screen;
		$buttonCreate->width = $buttonCreate->height = $buttonSize;
		$buttonCreate->position->x = 5;
		$buttonCreate->position->y = $buttonsTop;
		$buttonCreate->images = $ide->icons->icons16;
		$buttonCreate->imageIndex = $ide->icons->getAsImage16("new");
		
		$buttonOpen = new TButton;
		$buttonOpen->parent = $screen;
		$buttonOpen->width = $buttonOpen->height = $buttonSize;
		$buttonOpen->position->x = $buttonCreate->position->x + $buttonCreate->width + 5;
		$buttonOpen->position->y = $buttonsTop;
		$buttonOpen->images = $ide->icons->icons16;
		$buttonOpen->imageIndex = $ide->icons->getAsImage16("open");
		
		$delimeter1 = $this->getMenuDelimeter();
		$delimeter1->parent = $screen;
		$delimeter1->position->x = $buttonOpen->position->x + $buttonOpen->width + 5;
		
		$buttonSave = new TButton;
		$buttonSave->parent = $screen;
		$buttonSave->width = $buttonSave->height = $buttonSize;
		$buttonSave->position->x = $delimeter1->position->x + $delimeter1->width + 5;
		$buttonSave->position->y = $buttonsTop;
		$buttonSave->images = $ide->icons->icons16;
		$buttonSave->imageIndex = $ide->icons->getAsImage16("save");
		
		$buttonSaveAs = new TButton;
		$buttonSaveAs->parent = $screen;
		$buttonSaveAs->width = $buttonSaveAs->height = $buttonSize;
		$buttonSaveAs->position->x = $buttonSave->position->x + $buttonSave->width + 5;
		$buttonSaveAs->position->y = $buttonsTop;
		$buttonSaveAs->images = $ide->icons->icons16;
		$buttonSaveAs->imageIndex = $ide->icons->getAsImage16("saveAs");
		
		$delimeter2 = $this->getMenuDelimeter();
		$delimeter2->parent = $screen;
		$delimeter2->position->x = $buttonSaveAs->position->x + $buttonSaveAs->width + 5;
		
		$buttonRun = new TButton;
		$buttonRun->parent = $screen;
		$buttonRun->width = $buttonRun->height = $buttonSize;
		$buttonRun->position->x = $delimeter2->position->x + $delimeter2->width + 5;
		$buttonRun->position->y = $buttonsTop;
		$buttonRun->images = $ide->icons->icons16;
		$buttonRun->imageIndex = $ide->icons->getAsImage16("run");
		
		$buttonStop = new TButton;
		$buttonStop->parent = $screen;
		$buttonStop->width = $buttonStop->height = $buttonSize;
		$buttonStop->position->x = $buttonRun->position->x + $buttonRun->width + 5;
		$buttonStop->position->y = $buttonsTop;
		$buttonStop->images = $ide->icons->icons16;
		$buttonStop->imageIndex = $ide->icons->getAsImage16("stop");
		
		$buttonDonations = new TButton("Пожертвования");
		$buttonDonations->parent = $screen;
		$buttonDonations->width = $buttonSize * 5;
		$buttonDonations->height = $buttonSize;
		$buttonDonations->position->x = $screen->width - $buttonDonations->width - 5;
		$buttonDonations->position->y = $buttonsTop;
		$buttonDonations->images = $ide->icons->icons16;
		$buttonDonations->imageIndex = $ide->icons->getAsImage16("wallet");
		$buttonDonations->anchors = 'akRight';
		
		$buttonQuestions = new TButton("Вопросы");
		$buttonQuestions->parent = $screen;
		$buttonQuestions->width = $buttonSize * 4;
		$buttonQuestions->height = $buttonSize;
		$buttonQuestions->position->x = $buttonDonations->position->x - $buttonQuestions->width - 5;
		$buttonQuestions->position->y = $buttonsTop;
		$buttonQuestions->images = $ide->icons->icons16;
		$buttonQuestions->imageIndex = $ide->icons->getAsImage16("help");
		$buttonQuestions->anchors = 'akRight';
		
		$this->screen = $screen;
	}
	
	private function getMenuDelimeter() {
		$pane = new TPanel;
		$pane->height = 32;
		$pane->width = 1;
		return $pane;
	}
	
	public function showGo() {
		$screen = $this->screen;
		
		if($screen->className == "FMX.Forms.TForm") $screen->show();
	}
	
	public function destroy() {
		
	}
	
}
?>