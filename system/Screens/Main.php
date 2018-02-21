<?php
namespace ide\Screens;

use FMX\Forms\TForm;
use FMX\StdCtrls\TButton;
use FMX\StdCtrls\TLabel;
use FMX\Layouts\TLayout;
use FMX\TabControl\TTabControl;
use FMX\TabControl\TTabItem;
use FMX\Objects\TRectangle;

use System\Classes\TResourceStream;

use FMX\Menus\TMainMenu;
use FMX\Menus\TMenuItem;

class Main {

	private $screen;
	private $topPanel;
	private $leftPanel;
	private $rightPanel;
	private $bottomPanel;
	
	public $footerPanel;
	
	private $menu;
	private $menuItems;

	public function __construct() {
		$screen = new TForm; 
		$screen->position = 'poScreenCenter';
		$screen->caption = DT_FULL_VERSION;
		$screen->windowState = 'wsMaximized';
		app()->setMainForm($screen);
		
		$topPanel = $this->getBevelPanel($screen, false, false, true, false);
		$topPanel->align = 'alTop';
		$topPanel->height = 32;
		
		$leftPanel = $this->getBevelPanel($screen, false, false, false, true);
		$leftPanel->align = 'alLeft';
		$leftPanel->width = 250;
		
		$rightPanel = $this->getBevelPanel($screen, false, true, false, false);
		$rightPanel->align = 'alRight';
		$rightPanel->width = 250;
		
		$bottomPanel = $this->getBevelPanel($screen, true, false, false, false);
		$bottomPanel->align = 'alBottom';
		$bottomPanel->height = 32;

		$contentTabs = new TTabControl;
		$contentTabs->parent = $screen;
		$contentTabs->align = 'alClient';
	
		$this->topPanel = $topPanel;
		$this->leftPanel = $leftPanel;
		$this->rightPanel = $rightPanel;
		$this->bottomPanel = $bottomPanel;
		$this->contentTabs = $contentTabs;
		$this->screen = $screen;
	}
	
	private function getBevelPanel($parent, $top = true, $left = true, $bottom = true, $right = true) {
		$layout = new TLayout;
		$layout->parent = $parent;
		return $layout;
	}
	
	public function showGo() {
		$screen = $this->screen;
		
		$this->topbarPanel = new TopbarPanel($this->topPanel);
		$this->footerPanel = new FooterPanel($this->bottomPanel);
	
		$this->menuBuild();
		$this->pageControlling = new MainContentMenu($this->contentTabs);
		$this->propertiesControlling = new PropertiesPanel($this->leftPanel);
		$this->componentsControlling = new ComponentsPanel($this->rightPanel);
		
		$ide->mainForm = $this;
		
		$screen->show();
	}
	
	public function destroy() {
		
	}
	
	private function menuBuild() {
		$delimeter = function() {
			$item = new TMenuItem;
			$item->text = '-';
			return $item;
		};
		
		$menu = new TMainMenu($this->screen);
		$menu->parent = $this->screen;
		$menu->images = $ide->icons->icons16;
		
		//////////////////////////////////////////////////////////////
		
		$itemFile = new TMenuItem;
		$itemFile->text = 'Файл';
		
		$itemNew = new TMenuItem;
		$itemNew->text = 'Новый';
		$itemNew->imageIndex = $ide->icons->getAsImage16('new');
		$itemFile->addObject($itemNew);
		
		$itemOpen = new TMenuItem;
		$itemOpen->text = 'Открыть';
		$itemOpen->shortCut = StringToShortCut("Ctrl+F11");
		$itemOpen->imageIndex = $ide->icons->getAsImage16('open');
		$itemFile->addObject($itemOpen);
		
		$itemClose = new TMenuItem;
		$itemClose->text = 'Закрыть';
		$itemClose->imageIndex = $ide->icons->getAsImage16('close');
		$itemFile->addObject($itemClose);
		
		$itemFile->addObject($delimeter());
		
		$itemSave = new TMenuItem;
		$itemSave->text = 'Сохранить';
		$itemSave->shortCut = StringToShortCut("Ctrl+S");
		$itemSave->imageIndex = $ide->icons->getAsImage16('save');
		$itemFile->addObject($itemSave);
		
		$itemSaveAs = new TMenuItem;
		$itemSaveAs->text = 'Сохранить как';
		$itemSaveAs->imageIndex = $ide->icons->getAsImage16('saveAs');
		$itemFile->addObject($itemSaveAs);
		
		$itemFile->addObject($delimeter());
		
		$itemExit = new TMenuItem;
		$itemExit->text = 'Выход';
		$itemExit->imageIndex = $ide->icons->getAsImage16('exit');
		$itemFile->addObject($itemExit);
		
		//////////////////////////////////////////////////////////////
		
		$itemProject = new TMenuItem;
		$itemProject->text = 'Проект';
		
		$itemPack = new TMenuItem;
		$itemPack->text = 'Собрать';
		$itemProject->addObject($itemPack);
		
		$itemRun = new TMenuItem;
		$itemRun->text = 'Запустить';
		$itemRun->shortCut = StringToShortCut("F9");
		$itemRun->imageIndex = $ide->icons->getAsImage16('run');
		$itemProject->addObject($itemRun);
		
		$itemStop = new TMenuItem;
		$itemStop->text = 'Остановить';
		$itemStop->shortCut = StringToShortCut("F10");
		$itemStop->imageIndex = $ide->icons->getAsImage16('stop');
		$itemProject->addObject($itemStop);
		
		$itemProject->addObject($delimeter());
		
		$itemSettings = new TMenuItem;
		$itemSettings->text = 'Настройки';
		$itemSettings->imageIndex = $ide->icons->getAsImage16('settings');
		$itemProject->addObject($itemSettings);
		
		/////////////////////////////////////////////////////////////////
		
		$itemIDE = new TMenuItem;
		$itemIDE->text = 'IDE';
		
		$itemSettings = new TMenuItem;
		$itemSettings->text = 'Настройки';
		$itemSettings->imageIndex = $ide->icons->getAsImage16('settings');
		$itemSettings->on("click", function($sender) {
			$settingsScreen = new Settings;
			$settingsScreen->showGo();
		});
		$itemIDE->addObject($itemSettings);
		
		//////////////////////////////////////////////////////////////
		
		$menu->addObject($itemFile);
		$menu->addObject($itemProject);
		$menu->addObject($itemIDE);
	}
	
}

class MainContentMenu {
	
	private $pages;
	private $contents = [];
	
	public function __construct($pages) {
		$this->pages = $pages;
		$pages->images = $ide->icons->icons16;
		
		for($i = 0; $i < $this->pages->tabCount; $i++) {
			$this->pages->delete($i);
		}
		
		$mainTab = $pages->add(null);
		$mainTab->text = 'Главная';
		$mainTab->imageIndex = $ide->icons->getAsImage16('home');
		$this->contents['Main'] = new StartMenu($mainTab);
	}
	
}
?>