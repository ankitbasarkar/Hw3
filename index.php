<?php
define('HW3ROOT','c:/xampp/htdocs/Hw3');
/**
 * Created by PhpStorm.
 * User: ankit
 * Date: 10/17/2016
 * Time: 3:25 PM
 */

require_once HW3ROOT.'/src/controllers/LandingController.php';
use cool_name_for_your_group\hw3\controllers\LandingController as LandingController;

$controller = new LandingController();

$controller->loadLandingPage();
