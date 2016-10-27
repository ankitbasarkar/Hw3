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
require_once HW3ROOT."/src/models/Story.php";
use cool_name_for_your_group\hw3\controllers\Controller as Controller;
use cool_name_for_your_group\hw3\models\Story_List;
use cool_name_for_your_group\hw3\views\LandingView as LandingView;
use cool_name_for_your_group\hw3\models\Genre as Genre;

class GodController extends Controller
{
    public $AvailableMethods;

    function __construct()
    {
        $this->AvailableMethods = [];
        $this->AvailableMethods[] = 'loadLandingPage';
        parent::__construct($this->AvailableMethods);
    }

    function commonLandingPageCalls($storyListObj)
    {
        $GenreObj = new Genre();
        $GenreArray = $GenreObj->getGeneres();

        $HighestRatedStories = $storyListObj->HighestRatedStoriesList;
        $MostViewedStories = $storyListObj->MostViewedStoriesList;
        $NewestStories = $storyListObj->NewestStoriesList;

        $data[] = $GenreArray;
        $data[] = $HighestRatedStories;
        $data[] = $MostViewedStories;
        $data[] = $NewestStories;

        $landingView = new LandingView();
        $landingView->render($data);

    }

    function loadLandingPage()
    {
        $storyListObj = new Story_List();
        $storyListObj->initialiseStoryListNofilter();
        $this->commonLandingPageCalls($storyListObj);
    }
    function genreFilterLandingPage($Genre)
    {
        $storyListObj = new Story_List();
        $storyListObj->initialiseGenreFilterStoryList($Genre);
        $this->commonLandingPageCalls($storyListObj);
    }
    function titleFilterLandingPage($Title)
    {
        $storyListObj = new Story_List();
        $storyListObj->initialiseTitleFilterStoryList($Title);
        $this->commonLandingPageCalls($storyListObj);
    }
    function bothFilterLandingPage($Title,$Genre)
    {
        $storyListObj = new Story_List();
        $storyListObj->initialiseBothFilterStoryList($Title,$Genre);
        $this->commonLandingPageCalls($storyListObj);
    }

    function FilterLandingPageStories()
    {
        if(empty($_REQUEST['TitleFilter']) and ($_REQUEST['GenreFilter']=='All Genres'))
        {
            $this->loadLandingPage();
            return;
        }
        if(($_REQUEST['GenreFilter']!='All Genres') and empty($_REQUEST['TitleFilter']))
        {
            $this->genreFilterLandingPage($_REQUEST['GenreFilter']);
            return;
        }
        if(isset($_REQUEST['TitleFilter']) and ($_REQUEST['GenreFilter']=='All Genres'))
        {
            $this->titleFilterLandingPage($_REQUEST['TitleFilter']);
            return;
        }
        if(isset($_REQUEST['TitleFilter']) and ($_REQUEST['GenreFilter']!='All Genres'))
        {
            $this->bothFilterLandingPage($_REQUEST['TitleFilter'],$_REQUEST['GenreFilter']);
            return;
        }

    }

    function writeSomething()
    {
        echo "Writesomething";
    }
    function ReadParticularStory()
    {

    }

}