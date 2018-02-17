<?php
namespace Ide\Screens;

use FMX\Forms\TForm;
use FMX\TreeView\TTreeView;
use FMX\TreeView\TTreeViewItem;
use FMX\StdCtrls\TButton;
use FMX\StdCtrls\TPanel;
use FMX\StdCtrls\TCheckBox;

class Settings {

	private $screen;

	public function __construct() {
		$screen = new TForm; 
		$screen->borderStyle = 'bsSingle';
		$screen->clientWidth = 650;
		$screen->clientHeight = 400;
		$screen->caption = 'Настройки DevelopmentThurst';
		$screen->left = app()->getScreen()->width / 2 - ($screen->clientWidth / 2);
		$screen->top = app()->getScreen()->height / 2 - ($screen->clientHeight / 2);
		
		$treeSettings = new TTreeView;
		$treeSettings->parent = $screen;
		$treeSettings->images = $ide->icons->icons16;
		$treeSettings->position->x = 5;
		$treeSettings->position->y = 5;
		$treeSettings->width = ($screen->clientWidth / 3) - $treeSettings->position->x;
		$treeSettings->height = $screen->clientHeight - ($treeSettings->position->y * 2) + 10;
		$treeSettings->on("change", function($sender)use(&$panelContent) {
			$item = $sender->selected;
			for($i = 0; $i < $panelContent->componentCount; $i++) {
				$panelContent->components($i)->free();
			}
			switch(md5($item->text)) {
				case md5("Основное"): {
					$checkupdates = new TCheckBox('Проверять обновления');
					$checkupdates->parent = $panelContent;
					$checkupdates->position->x = 5;
					$checkupdates->position->y = 5;
					$checkupdates->width = $panelContent->width / 2;
					$checkupdates->wordWrap = false;
					break;
				}
			}
		});
		
		$panelContent = new TPanel;
		$panelContent->parent = $screen;
		$panelContent->width = $screen->clientWidth - $treeSettings->width - $treeSettings->position->x;
		$panelContent->height = $treeSettings->height - (80/3) - 5;
		$panelContent->position->x = $treeSettings->position->x + $treeSettings->width + 5;
		$panelContent->position->y = $treeSettings->position->y;
		
		$rMain = new TTreeViewItem;
		$rMain->text = 'Основное';
		$rMain->imageIndex = $ide->icons->getAsImage16("home");
		
		// Редактор кода
		$rSourceEditor = new TTreeViewItem;
		$rSourceEditor->text = 'Редактор кода';
		$rSourceEditor->imageIndex = $ide->icons->getAsImage16("edit");
		$rSourceEditorLanguages = new TTreeViewItem;
		$rSourceEditorLanguages->text = 'Синтаксисы';
		$rSourceEditorLanguages->imageIndex = $ide->icons->getAsImage16("folding");
		$rSourceEditor->addObject($rSourceEditorLanguages);
		$rSourceEditorLanguagesPHP = new TTreeViewItem;
		$rSourceEditorLanguagesPHP->text = 'PHP';
		$rSourceEditorLanguagesPHP->imageIndex = $ide->icons->getAsImage16("php");
		$rSourceEditorLanguages->addObject($rSourceEditorLanguagesPHP);
		
		$treeSettings->addObject($rMain);
		$treeSettings->addObject($rSourceEditor);
		$treeSettings->expandAll();
		
		$buttonSave = new TButton("ОК");
		$buttonSave->parent = $screen;
		$buttonSave->width = 80;
		$buttonSave->height = $buttonSave->width / 3;
		$buttonSave->position->x = ($screen->clientWidth - $buttonSave->width - 10) + ($screen->width-$screen->clientWidth);
		$buttonSave->position->y = ($screen->clientHeight - $buttonSave->height - 2) + (($screen->height-$screen->clientHeight) - $buttonSave->height);
		$buttonSave->images = $ide->icons->icons16;
		$buttonSave->imageIndex = $ide->icons->getAsImage16("save");
		
		$treeSettings->selected = $rMain;
		
		$this->screen = $screen;
	}
	
	public function showGo() {
		$screen = $this->screen;
		
		$screen->showModal();
		$this->destroy();
	}
	
	public function destroy() {
		$this->screen->destroy();
	}
	
}
?>