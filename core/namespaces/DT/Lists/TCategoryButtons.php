<?php
namespace DT\Lists;

use FMX\Layouts\TLayout;
use FMX\Layouts\TVertScrollBox;
use FMX\StdCtrls\TPanel;
use FMX\StdCtrls\TButton;
use FMX\Objects\TText;
use FMX\Edit\TEdit;

class TCategoryButtons extends TVertScrollBox {
	
	private $images;
	private $categories = [];
	private $searchEnabled = false;
	private $searchKeyword = '';
	
	public function __construct() {
		parent::__construct();
		$this->showScrollBars = true;
	}
	
	public function setImages($images) {
		$this->images = $images;
		$this->paint();
		app()->processMessages();
	}
	public function setSearchEnabled($searchEnabled) {
		$this->searchEnabled = $searchEnabled;
		$this->paint();
		app()->processMessages();
	}
	public function setSearchKeyword($searchKeyword) {
		$this->searchKeyword = $searchKeyword;
		$this->paint();
		app()->processMessages();
	}
	public function addCategory($categoryText, $categoryName) {
		$this->categories[$categoryName] = [$categoryText, []];
		$this->paint();
		app()->processMessages();
	}
	public function addButton($buttonText, $categoryName, $imageIndex = -1, $searchNames = []) {
		$searchNames[] = $buttonText;
		$this->categories[$categoryName][1][] = [$buttonText, $imageIndex, $searchNames];
		$this->paint();
		app()->processMessages();
	}
	
	public function paint() {
		for($i = 0; $i < $this->componentCount; $i++) {
			$component = $this->components($i);
			$component->free();
		}
		
		$totalTop = 0;
		foreach($this->categories as $category) {
			if(count($category[1]) == 0)
				continue;
			
			$categoryLayout = new TLayout;
			$categoryLayout->parent = $this;
			$categoryLayout->width = $this->width;
			$categoryLayout->height = (count($category[1])*28)+27;
			$categoryLayout->position->y = $totalTop;
			$totalTop += $categoryLayout->height;
			
			$catNameDelimeter = new TPanel;
			$catNameDelimeter->parent = $categoryLayout;
			$catNameDelimeter->width = $categoryLayout->width;
			$catNameDelimeter->height = 1;
			
			$categoryName = new TText($category[0]);
			$categoryName->parent = $categoryLayout;
			$categoryName->autoSize = true;
			$categoryName->styledSettings = '';
			$categoryName->font->size = 13;
			$categoryName->wordWrap = false;
			$categoryName->position->x = 5;
			$categoryName->position->y = 3;
			
			$catNameDelimeter = new TPanel;
			$catNameDelimeter->parent = $categoryLayout;
			$catNameDelimeter->width = $categoryLayout->width;
			$catNameDelimeter->height = 1;
			$catNameDelimeter->position->y = $categoryName->position->y + $categoryName->height + $categoryName->position->y;
			
			$filtred = 0;
			foreach($category[1] as $_button) {
				
				if($this->searchKeyword !== '') {
					if(empty($_button[2])) {
						$totalTop -= 28;
						continue;
					}
					if(!preg_match("@(".$this->searchKeyword.")@ui", implode("|", $_button[2]))) {
						$totalTop -= 28;
						$categoryLayout->height -= 30;
						$filtred++;
						continue;
					}
				}
			
				$top = isset($button)?($button->position->y+$button->height+2):($catNameDelimeter->position->y+$catNameDelimeter->height+2);
				$button = new TButton($_button[0]);
				$button->parent = $categoryLayout;
				$button->width = $categoryLayout->width - ($this->showScrollBars?21:6);
				$button->height = 26;
				$button->position->x = 3;
				$button->position->y = $top;
				$button->repaint();
				if($this->images !== null && $_button[1] !== -1) {
					$button->images = $this->images;
					$button->imageIndex = $_button[1];
				}
			}
			unset($button);
		}
			$this->repaint();
	}
	
}
?>