<?php
define('HW3ROOT','c:/xampp/htdocs/Hw3');
/**
 * Created by PhpStorm.
 * User: ankit
 * Date: 10/17/2016
 * Time: 3:25 PM
 */

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
if($_REQUEST['m']=='ReadParticularStory')
{
//    $_REQUEST['Story_ID']
}

print_r($_REQUEST);