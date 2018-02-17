<?php
use Ide\Loader;
use Ide\Modules\Ide;
use Ide\Screens\Splash;
use Ide\Screens\Main;

require_once("system\Loader.php");
require_once("system\Screens\Splash.php");

enableWriteToConsole();
app()->initialize();

date_default_timezone_set('Europe/Moscow');

$splash = new Splash();
$splash->showGo();

Loader::loadToText($splash->getText());
$main = new Main;
setInterval(1000, function($timer)use($splash, $main) {
	if($splash->canLoad) {
		$timer->enabled = false;
	} else {
		return;
	}
	$ide = new Ide;
	$splash->destroy();
	$main->showGo();
});

/*Loader::loadToText(null);
$ide = new Ide;
$main = new Main;
$ide->mainForm = $main;
$main->showGo();*/

app()->run();
?>