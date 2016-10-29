<?php
define('HW3ROOT','c:/xampp/htdocs/Hw3');

require_once HW3ROOT."/src/controllers/GodController.php";
use cool_name_for_your_group\hw3\controllers\GodController as GodController;

$controller = new GodController();
if(empty($_REQUEST))
{
    $controller->loadLandingPage();
}
if($_REQUEST['m']=='FilterLandingPageStories')
{
    $controller->FilterLandingPageStories();
}
if($_REQUEST['m']=='writeSomething')
{
    $controller->writeSomething();
}
if($_REQUEST['m'] =='ReadParticularStory'){
	$userRatingValue = 0;
	$story_id = $_REQUEST['Story_ID'];
	if(empty($_REQUEST['cValue'])){
		$CONTROLLER->ReadParticularStory($story_id,$userRatingValue);
	}
	else{
		$userRatingValue = $_REQUEST['cValue'];
		$CONTROLLER->ReadParticularStory($story_id, $userRatingValue);
	}
	
}
