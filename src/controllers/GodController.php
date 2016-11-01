<?php


namespace cool_name_for_your_group\hw3\controllers;
require_once HW3ROOT."/src/views/LandingView.php";
require_once HW3ROOT."/src/models/GenreModel.php";
require_once HW3ROOT."/src/models/Story_List.php";
require_once HW3ROOT."/src/views/ReadStoryView.php";
require_once HW3ROOT."/src/controllers/Controller.php";
require_once HW3ROOT."/src/models/Story.php";
require_once HW3ROOT."/src/views/WriteSomethingView.php";
use cool_name_for_your_group\hw3\controllers\Controller as Controller;
use cool_name_for_your_group\hw3\models\Story_List;
use cool_name_for_your_group\hw3\views\LandingView as LandingView;
use cool_name_for_your_group\hw3\models\Genre as Genre;

use cool_name_for_your_group\hw3\models\Story as Story;
use cool_name_for_your_group\hw3\models\Story_List as StoryList;
use cool_name_for_your_group\hw3\views\ReadStoryView;
use cool_name_for_your_group\hw3\views\WriteSomethingView;


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

    function bothFilterLandingPage($Title, $Genre)
    {
        $storyListObj = new Story_List();
        $storyListObj->initialiseBothFilterStoryList($Title, $Genre);
        $this->commonLandingPageCalls($storyListObj);
    }

    function FilterLandingPageStories()
    {
        if (empty($_REQUEST['TitleFilter']) and ($_REQUEST['GenreFilter'] == 'All Genres')) {
            $this->loadLandingPage();
            return;
        }
        if (($_REQUEST['GenreFilter'] != 'All Genres') and empty($_REQUEST['TitleFilter'])) {
            $this->genreFilterLandingPage($_REQUEST['GenreFilter']);
            return;
        }
        if (isset($_REQUEST['TitleFilter']) and ($_REQUEST['GenreFilter'] == 'All Genres')) {
            $this->titleFilterLandingPage($_REQUEST['TitleFilter']);
            return;
        }
        if (isset($_REQUEST['TitleFilter']) and ($_REQUEST['GenreFilter'] != 'All Genres')) {
            $this->bothFilterLandingPage($_REQUEST['TitleFilter'], $_REQUEST['GenreFilter']);
            return;
        }

    }

    function writeSomething()
    {
        $GenreObj = new Genre();
        $GenreArray = $GenreObj->getGeneres();
        $data['Genres'] = $GenreArray;
        $writeView = new WriteSomethingView();
        $writeView->render($data);
    }

    function ReadParticularStory($story_id, $userRatingValue)
    {
        $storyFetch = new Story();
        $storyData = $storyFetch->fetchStory($story_id, $userRatingValue);
        $readStoryView = new ReadStoryView();
        $readStoryView->render($storyData);
    }

    function processWriteSomething()
    {
        if (empty($_REQUEST['identifier']))
        {
            $GenreObj = new Genre();
            $GenreArray = $GenreObj->getGeneres();
            $data['Genres'] = $GenreArray;
            $data['title'] = $_REQUEST['title'];
            $data['author'] = $_REQUEST['author'];
            $data['identifier'] = $_REQUEST['identifier'];
            $data['GenreFilter'] = $_REQUEST['GenreFilter'];
            $data['story'] = $_REQUEST['story'];
            $data['Message'] = "No Identifier Provided";
            $writeView = new WriteSomethingView();
            $writeView->render($data);
        }
        else
        {
            if (empty($_REQUEST['title']) and empty($_REQUEST['author']) and empty($_REQUEST['GenreFilter']) and empty($_REQUEST['story']))
            {
                $storyPutFetch = new Story();
                $data2 = $storyPutFetch->fetchWrittenStory($_REQUEST['identifier']);
                $GenreObj = new Genre();
                $GenreArray = $GenreObj->getGeneres();
                $data['Genres'] = $GenreArray;
                $data['title'] = $data2[1];
                $data['author'] = $data2[2];
                $data['identifier'] = $data2[3];
                $data['GenreFilter'] = $data2[4];
                $data['story'] = $data2[5];
                $data['Message'] = "Only Identifier Selected";
                $writeView = new WriteSomethingView();
                $writeView->render($data);
                //call fetch written story
            } else {
                if (empty($_REQUEST['title']) or empty($_REQUEST['author']) or empty($_REQUEST['GenreFilter']) or empty($_REQUEST['story']))
                {
                    $GenreObj = new Genre();
                    $GenreArray = $GenreObj->getGeneres();
                    $data['Genres'] = $GenreArray;
                    $data['title'] = $_REQUEST['title'];
                    $data['author'] = $_REQUEST['author'];
                    $data['identifier'] = $_REQUEST['identifier'];
                    $data['GenreFilter'] = $_REQUEST['GenreFilter'];
                    $data['story'] = $_REQUEST['story'];
                    $data['Message'] = "Can't Leave Fields Blank";
                    $writeView = new WriteSomethingView();
                    $writeView->render($data);
                } else
                    {
                        $GenreObj = new Genre();
                        $GenreArray = $GenreObj->getGeneres();
                        $data['Genres'] = $GenreArray;
                        $data['title'] = $_REQUEST['title'];
                        $data['author'] = $_REQUEST['author'];
                        $data['identifier'] = $_REQUEST['identifier'];
                        $data['GenreFilter'] = $_REQUEST['GenreFilter'];
                        $data['story'] = $_REQUEST['story'];

                        $writeView = new WriteSomethingView();
                        $writeView->render($data);
                        print $data['story'];
                        $storyPutFetch = new Story();
                        $data[0]=$data['title'];
                        $data[1]=$data['author'];
                        $data[2]=$data['identifier'];
                        $data[3]=$data['GenreFilter'];
                        print "<br><br>";
                        print_r($data[3]);
                        print "<br><br>";
                        $data[4]=$data['story'];

//
                        $retValue = $storyPutFetch->writeStory($data);
                    if($retValue)
                        $data['Message'] = "EveryThing Inserted";
                    else
                        $data['Message'] = "Unable to Insert Try again Later";

//
//                    echo "EveryThing Inserted";
//                $data = $storyPutFetch->writeStory($data);             //inserts StoryData or Updates
                }
            }
        }
        $storyPutFetch = new Story();
    $data = $storyPutFetch->fetchWrittenstory('cat');
        print_r($data);
    }
}

//    else
//        print_r($_REQUEST['GenreFilter']);
//
//    if(empty($_REQUEST['title']))
//        echo "No Title";
//    if(empty($_REQUEST['author']))
//        echo"No AUthr";
//    if(empty($_REQUEST['identifier']))
//        echo "No Identifier";
//    if(empty($_REQUEST['story']))
//        echo "No Story";
