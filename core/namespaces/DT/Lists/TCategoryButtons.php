<?php
namespace DT\Lists;

use FMX\Layouts\TLayout;
use FMX\Layouts\TVertScrollBox;
use FMX\StdCtrls\TPanel;
use FMX\StdCtrls\TButton;
use FMX\Objects\TText;

class TCategoryButtons extends TVertScrollBox {
	
	private $images;
	private $categories = [];
	
	public function __construct() {
		parent::__construct();
		$this->showScrollBars = true;
	}
	
	public function setImages($images) {
		$this->images = $images;
	}
	public function addCategory($categoryText, $categoryName) {
		$this->categories[$categoryName] = [$categoryText, []];
		$this->paint();
	}
	public function addButton($buttonText, $categoryName, $imageIndex = -1) {
		$this->categories[$categoryName][1][] = [$buttonText, $imageIndex];
		$this->paint();
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
			
			foreach($category[1] as $_button) {
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
	}
	
}
?>