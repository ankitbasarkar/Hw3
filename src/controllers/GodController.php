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
require_once HW3ROOT."/src/controllers/Controller.php";
use cool_name_for_your_group\hw3\controllers\Controller as Controller;
use cool_name_for_your_group\hw3\models\Story_List;
use cool_name_for_your_group\hw3\views\LandingView as LandingView;
use cool_name_for_your_group\hw3\models\Genre as Genre;
use cool_name_for_your_group\hw3\models\Story_List as StoryList;

class GodController extends Controller
{
    public $AvailableMethods;

    function __construct()
    {
        $this->AvailableMethods = [];
        $this->AvailableMethods[] = 'loadLandingPage';
        parent::__construct($this->AvailableMethods);
    }

    function loadLandingPage()
    {

        $GenreObj = new Genre();
        $GenreArray = $GenreObj->getGeneres();

        $storyListObj = new Story_List();
        $HighestRatedStories = $storyListObj->fetchHighestRatedStoryListNoFilter();
        $MostViewedStories = $storyListObj->fetchMostViewedStoryListNoFilter();
        $NewestStories = $storyListObj->fetchNewestStoryListNoFilter();

        $data[] = $GenreArray;
        $data[] = $HighestRatedStories;
        $data[] = $MostViewedStories;
        $data[] = $NewestStories;

        print_r($data[2]);

        $landingView = new LandingView();
        $landingView->render($data);

    }
    function FilterLandingPageStories()
    {
        echo "Lets filter stories";
    }

    function writeSomething()
    {
        echo "Writesomething";
    }
    function ReadParticularStory($story_id,$userRatingValue)
    {
		$storyFetch = new Story();
		$storyData = $storyFetch->fetchStory($story_id,$userRatingValue);
		
    }

}
