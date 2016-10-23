<?php
/**
 * Created by PhpStorm.
 * User: ankit
 * Date: 10/22/2016
 * Time: 3:43 PM
 */

namespace cool_name_for_your_group\hw3\controllers;
require_once $_SERVER['DOCUMENT_ROOT'].'/Hw3/src/views/LandingView.php';

require_once $_SERVER['DOCUMENT_ROOT'].'/Hw3/src/models/GenreModel.php';
use cool_name_for_your_group\hw3\views\LandingView as LandingView;
use cool_name_for_your_group\hw3\models\Genre as Genre;

class LandingController
{
    function loadLandingPage()
    {
        echo "jdsak";
//        $GenereObj = new Genre();
//        $GenereArray = $GenereObj->getGeneres();
//        $landingView = new LandingView();
//        $landingView->render($GenereArray);
    }
}