<?php
/**
 * Created by PhpStorm.
 * User: ankit
 * Date: 10/22/2016
 * Time: 3:43 PM
 */

namespace cool_name_for_your_group\hw3\controllers;
require_once HW3ROOT."/src/views/LandingView.php";
require_once HW3ROOT."/src/models/GenreModel.php";
require_once HW3ROOT."/src/models/Story_List.php";
use cool_name_for_your_group\hw3\models\Story_List;
use cool_name_for_your_group\hw3\views\LandingView as LandingView;
use cool_name_for_your_group\hw3\models\Genre as Genre;
use cool_name_for_your_group\hw3\models\Story_List as StoryList;

class LandingController
{
    function loadLandingPage()
    {

        $GenereObj = new Genre();
        $GenereArray = $GenereObj->getGeneres();

        $storyListObj = new Story_List();
        $stories = $storyListObj->fetchHighestRatedStoryList('cat','Fiction');

        $data[] = $GenereArray;
        $data[] = $stories;

        $landingView = new LandingView();
        $landingView->render($data);

    }
}