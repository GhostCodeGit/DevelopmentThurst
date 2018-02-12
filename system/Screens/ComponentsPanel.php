<?php
namespace Ide\Screens;

use FMX\Forms\TForm;
use FMX\TabControl\TTabControl;
use FMX\TabControl\TTabItem;
use FMX\TreeView\TTreeView;
use FMX\TreeView\TTreeViewItem;

use DT\Lists\TCategoryButtons;

class ComponentsPanel {

	private $screen;

	public function __construct($parent = null) {
		if($parent == null) {
			$screen = new TForm; 
			$screen->position = 'poScreenCenter';
		} else $screen = $parent;
		
		$inspector = new TTreeView;
		$inspector->parent = $screen;
		$inspector->align = 'alTop';
		$inspector->height = 200;
		$inspector->images = $ide->icons->icons16;
		
		$actions = new TTabControl;
		$actions->parent = $screen;
		$actions->align = 'alClient';
		$actions->images = $ide->icons->icons16;
		
		$visual = $actions->add(null);
		$visual->text = "Компоненты";
		$visual->imageIndex = $ide->icons->getAsImage16("design");
		
		$novisual = $actions->add(null);
		$novisual->text = "Не визуальные";
		$novisual->imageIndex = $ide->icons->getAsImage16("eye-minus");
		
		$categoryButtons = new TCategoryButtons;
		$categoryButtons->parent = $visual;
		$categoryButtons->align = 'alClient';
		$categoryButtons->setImages($ide->icons->icons16);
		
		$categoryButtons->addCategory("Главное", "main");
		$categoryButtons->addButton("Дополнительно", "main", 5);
		$categoryButtons->addButton("Дополнительно2", "main", 4);
		$categoryButtons->addButton("Дополнительно3", "main", 0);
		
		$categoryButtons->addCategory("Дополнительно", "additional");
		$categoryButtons->addButton("Главное", "additional", 1);
		$categoryButtons->addButton("Главное2", "additional", 2);
		$categoryButtons->addButton("Главное3", "additional", 3);
		
		$categoryButtons->addCategory("Веб", "web");
		$categoryButtons->addButton("Дополнительно", "web", 6);
		$categoryButtons->addButton("Дополнительно2", "web", 7);
		$categoryButtons->addButton("Дополнительно3", "web", 8);
		
		$categoryButtons->addCategory("Система", "system");
		$categoryButtons->addButton("Главное", "system", 9);
		$categoryButtons->addButton("Главное2", "system", 10);
		$categoryButtons->addButton("Главное3", "system", 11);
		
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