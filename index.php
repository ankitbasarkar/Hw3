<?php
require_once __DIR__.'/src/configs/config.php';
use cool_name_for_your_group\myconfig\config;
define('HW3ROOT',config::HW3root);

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

if($_REQUEST['m'] =='ReadParticularStory')
{
	$userRatingValue = 0;
	$story_id = $_REQUEST['Story_ID'];
	if(empty($_REQUEST['cValue']))
	{
        $controller->ReadParticularStory($story_id,$userRatingValue);
	}
	else
    {
		$userRatingValue = $_REQUEST['cValue'];
        $controller->ReadParticularStory($story_id, $userRatingValue);
	}
}
if($_REQUEST['m']=='processWriteSomething')
{
    $controller->processWriteSomething();
}
if($_REQUEST['m']=='loadLandingPage')
{
    $controller->loadLandingPage();
}

