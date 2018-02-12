<?php
namespace Ide\Screens;

use FMX\Forms\TForm;
use FMX\TabControl\TTabControl;
use FMX\TabControl\TTabItem;
use FMX\TreeView\TTreeView;
use FMX\TreeView\TTreeViewItem;

class PropertiesPanel {

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
		
		$properties = $actions->add(null);
		$properties->text = "Свойства";
		$properties->imageIndex = $ide->icons->getAsImage16("control");
		
		$events = $actions->add(null);
		$events->text = "События";
		$events->imageIndex = $ide->icons->getAsImage16("mouse");
		
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