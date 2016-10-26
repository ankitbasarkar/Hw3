<?php
/**
 * Created by PhpStorm.
 * User: ankit
 * Date: 10/23/2016
 * Time: 11:18 PM
 */

namespace cool_name_for_your_group\hw3\models;
require_once HW3ROOT."/src/models/Model.php";
require_once HW3ROOT."/src/models/Story.php";
use cool_name_for_your_group\hw3\models\Model as Model;
use cool_name_for_your_group\hw3\models\Story as Story;

class Story_List extends Model
{
    public $connection;

    public $HighestRatedStoriesList;
    public $MostViewedStoriesList;
    public $NewestStoriesList;

    function __construct()
    {
        $this->connection = $this->getCOnnection();
        $this->HighestRatedStoriesList = [];
        $this->MostViewedStoriesList = [];
        $this->NewestStoriesList = [];
    }

//
//SELECT A.Story_ID,A.Title,A.Author,A.Story,B.Genre_Name,D.*
// from story_list A,Genre_List B,Story_genre_map C, Story_Statistics D
// where A.Story_ID = C.Story_ID and A.Story_ID = D.STory_ID and
// C.Genre_ID = B.Genre_ID and A.Title LIKE '%cat%' and B.Genre_NAme = 'Fiction'

//SELECT A.Story_ID,A.Title,A.Author,A.Story,B.Genre_Name,D.*,
//(D.SUM_OF_RATINGS_SO_FAR/D.NUMBER_OF_RATINGS_SO_FAR) AS AVERAGE_rATING
// from story_list A,Genre_List B,Story_genre_map C, Story_Statistics D
// where A.Story_ID = C.Story_ID and A.Story_ID = D.STory_ID and
// C.Genre_ID = B.Genre_ID and A.Title LIKE '%cat%' and
// B.Genre_NAme = 'Fiction' ORDER BY (D.SUM_OF_RATINGS_SO_FAR/D.NUMBER_OF_RATINGS_SO_FAR)

    function fetchHighestRatedStoryListBothFilter($phraseFilter, $genreFilter)
    {
        $stmt = $this->connection->stmt_init();
        if ($stmt->prepare("Select DISTINCT A.STORY_ID,A.TITLE,A.AUTHOR,A.STORY,
                           (D.SUM_OF_RATINGS_SO_FAR/D.NUMBER_OF_RATINGS_SO_FAR) AS AVERAGE_RATING 
                           from HW3.story_list A,HW3.Genre_List B,
                           HW3.Story_Genre_Map C,HW3.Story_Statistics D where
                           A.Story_ID = C.Story_ID and A.Story_ID = D.Story_ID and C.Genre_ID = B.Genre_ID and
                           A.title LIKE CONCAT('%',?,'%') and B.GENRE_NAME = ? ORDER BY AVERAGE_RATING DESC"))
        {
            $stmt->bind_param('ss', $phraseFilter,$genreFilter);
            $stmt->execute();

            $stmt->bind_result($Story_ID,$Title,$Author,$Story,$AverageRating);

            while($stmt->fetch())
            {
                $tempStory = new Story();
                $tempStory->Story_ID = $Story_ID;
                $tempStory->Title = $Title;
                $this->HighestRatedStoriesList[]=$tempStory;
            }
        }
        return $this->HighestRatedStoriesList;
    }
    function fetchHighestRatedStoryListNoFilter()
    {
        $stmt = $this->connection->stmt_init();
        if ($stmt->prepare("Select DISTINCT  A.STORY_ID,A.TITLE,A.AUTHOR,A.STORY,
                           (D.SUM_OF_RATINGS_SO_FAR/D.NUMBER_OF_RATINGS_SO_FAR) AS AVERAGE_RATING 
                           from HW3.story_list A,HW3.Genre_List B,
                           HW3.Story_Genre_Map C,HW3.Story_Statistics D where
                           A.Story_ID = C.Story_ID and A.Story_ID = D.Story_ID and C.Genre_ID = B.Genre_ID 
                          ORDER BY AVERAGE_RATING DESC"))
        {
            $stmt->execute();

            $stmt->bind_result($Story_ID,$Title,$Author,$Story,$AverageRating);

            while($stmt->fetch())
            {
                $tempStory = new Story();
                $tempStory->Story_ID = $Story_ID;
                $tempStory->Title = $Title;
                $this->HighestRatedStoriesList[]=$tempStory;
            }


        }
        return $this->HighestRatedStoriesList;
    }
    function fetchHighestRatedStoryListTitleFilter($phraseFilter)
    {
        $stmt = $this->connection->stmt_init();
        if ($stmt->prepare("Select DISTINCT A.STORY_ID,A.TITLE,A.AUTHOR,A.STORY,
                           (D.SUM_OF_RATINGS_SO_FAR/D.NUMBER_OF_RATINGS_SO_FAR) AS AVERAGE_RATING 
                           from HW3.story_list A,HW3.Genre_List B,
                           HW3.Story_Genre_Map C,HW3.Story_Statistics D where
                           A.Story_ID = C.Story_ID and A.Story_ID = D.Story_ID and C.Genre_ID = B.Genre_ID and
                           A.title LIKE CONCAT('%',?,'%') ORDER BY AVERAGE_RATING DESC"))
        {
            $stmt->bind_param('s', $phraseFilter);
            $stmt->execute();

            $stmt->bind_result($Story_ID,$Title,$Author,$Story,$AverageRating);

            while($stmt->fetch())
            {
                $tempStory = new Story();
                $tempStory->Story_ID = $Story_ID;
                $tempStory->Title = $Title;
                $this->HighestRatedStoriesList[]=$tempStory;
            }
        }
        return $this->HighestRatedStoriesList;
    }
    function fetchHighestRatedStoryListGenreFilter($genreFilter)
    {
        $stmt = $this->connection->stmt_init();
        if ($stmt->prepare("Select DISTINCT A.STORY_ID,A.TITLE,A.AUTHOR,A.STORY,
                           (D.SUM_OF_RATINGS_SO_FAR/D.NUMBER_OF_RATINGS_SO_FAR) AS AVERAGE_RATING 
                           from HW3.story_list A,HW3.Genre_List B,
                           HW3.Story_Genre_Map C,HW3.Story_Statistics D where
                           A.Story_ID = C.Story_ID and A.Story_ID = D.Story_ID and C.Genre_ID = B.Genre_ID 
                           and B.GENRE_NAME = ? ORDER BY AVERAGE_RATING DESC"))
        {
            $stmt->bind_param('s', $genreFilter);
            $stmt->execute();

            $stmt->bind_result($Story_ID,$Title,$Author,$Story,$AverageRating);

            while($stmt->fetch())
            {
                $tempStory = new Story();
                $tempStory->Story_ID = $Story_ID;
                $tempStory->Title = $Title;
                $this->HighestRatedStoriesList[]=$tempStory;
            }
        }
        return $this->HighestRatedStoriesList;
    }

    function fetchMostViewedStoryListBothFilter($phraseFilter, $genreFilter)
    {
        $stmt = $this->connection->stmt_init();
        if ($stmt->prepare("Select DISTINCT A.STORY_ID,A.TITLE,A.AUTHOR,A.STORY from 
                            HW3.story_list A,HW3.Genre_List B, HW3.Story_Genre_Map C,
                            HW3.Story_Statistics D where A.Story_ID = C.Story_ID and 
                            A.Story_ID = D.Story_ID and C.Genre_ID = B.Genre_ID 
                            and A.title LIKE CONCAT('%',?,'%') and B.GENRE_NAME = ?
                            ORDER BY D.Story_Total_Views DESC LIMIT 10"))
        {
            $stmt->bind_param('ss', $phraseFilter,$genreFilter);
            $stmt->execute();
            $stmt->bind_result($Story_ID,$Title,$Author,$Story,$AverageRating);

            while($stmt->fetch())
            {
                $tempStory = new Story();
                $tempStory->Story_ID = $Story_ID;
                $tempStory->Title = $Title;
                $this->MostViewedStoriesList[]=$tempStory;
            }
        }
        return $this->MostViewedStoriesList;
    }
    function fetchMostViewedStoryListNoFilter()
    {
        $stmt = $this->connection->stmt_init();
        if ($stmt->prepare("Select DISTINCT A.STORY_ID,A.TITLE,A.AUTHOR,A.STORY from 
                            HW3.story_list A,HW3.Genre_List B, HW3.Story_Genre_Map C,
                            HW3.Story_Statistics D where A.Story_ID = C.Story_ID and 
                            A.Story_ID = D.Story_ID and C.Genre_ID = B.Genre_ID 
                            ORDER BY D.Story_Total_Views DESC LIMIT 10"))
        {
            $stmt->execute();
            $stmt->bind_result($Story_ID,$Title,$Author,$Story,$AverageRating);

            while($stmt->fetch())
            {
                $tempStory = new Story();
                $tempStory->Story_ID = $Story_ID;
                $tempStory->Title = $Title;
                $this->MostViewedStoriesList[]=$tempStory;
            }
        }
        return $this->MostViewedStoriesList;
    }
    function fetchMostViewedStoryListTitleFilter($phraseFilter)
    {
        $stmt = $this->connection->stmt_init();
        if ($stmt->prepare("Select DISTINCT A.STORY_ID,A.TITLE,A.AUTHOR,A.STORY from 
                            HW3.story_list A,HW3.Genre_List B, HW3.Story_Genre_Map C,
                            HW3.Story_Statistics D where A.Story_ID = C.Story_ID and 
                            A.Story_ID = D.Story_ID and C.Genre_ID = B.Genre_ID 
                            and A.title LIKE CONCAT('%',?,'%')
                            ORDER BY D.Story_Total_Views DESC LIMIT 10"))
        {
            $stmt->bind_param('s', $phraseFilter);
            $stmt->execute();
            $stmt->bind_result($Story_ID,$Title,$Author,$Story,$AverageRating);

            while($stmt->fetch())
            {
                $tempStory = new Story();
                $tempStory->Story_ID = $Story_ID;
                $tempStory->Title = $Title;
                $this->MostViewedStoriesList[]=$tempStory;
            }
        }
        return $this->MostViewedStoriesList;
    }
    function fetchMostViewedStoryListGenreFilter( $genreFilter)
    {
        $stmt = $this->connection->stmt_init();
        if ($stmt->prepare("Select DISTINCT A.STORY_ID,A.TITLE,A.AUTHOR,A.STORY from 
                            HW3.story_list A,HW3.Genre_List B, HW3.Story_Genre_Map C,
                            HW3.Story_Statistics D where A.Story_ID = C.Story_ID and 
                            A.Story_ID = D.Story_ID and C.Genre_ID = B.Genre_ID 
                            and B.GENRE_NAME = ?
                            ORDER BY D.Story_Total_Views DESC LIMIT 10"))
        {
            $stmt->bind_param('s', $genreFilter);
            $stmt->execute();
            $stmt->bind_result($Story_ID,$Title,$Author,$Story,$AverageRating);

            while($stmt->fetch())
            {
                $tempStory = new Story();
                $tempStory->Story_ID = $Story_ID;
                $tempStory->Title = $Title;
                $this->MostViewedStoriesList[]=$tempStory;
            }
        }
        return $this->MostViewedStoriesList;
    }

    function fetchNewestStoryListBothFilter($phraseFilter, $genreFilter)
    {
        $stmt = $this->connection->stmt_init();
        if ($stmt->prepare("Select DISTINCT A.STORY_ID,A.TITLE,A.AUTHOR,A.STORY from 
                            HW3.story_list A,HW3.Genre_List B, HW3.Story_Genre_Map C,
                            HW3.Story_Statistics D where A.Story_ID = C.Story_ID and 
                            A.Story_ID = D.Story_ID and C.Genre_ID = B.Genre_ID 
                            and A.title LIKE CONCAT('%',?,'%') and B.GENRE_NAME = ?
                            ORDER BY D.Story_EPOCH DESC LIMIT 10"))
        {
            $stmt->bind_param('ss', $phraseFilter,$genreFilter);
            $stmt->execute();
            $stmt->bind_result($Story_ID,$Title,$Author,$Story,$AverageRating);

            while($stmt->fetch())
            {
                $tempStory = new Story();
                $tempStory->Story_ID = $Story_ID;
                $tempStory->Title = $Title;
                $this->NewestStoriesList[]=$tempStory;
            }
        }
        return $this->NewestStoriesList;
    }
    function fetchNewestStoryListNoFilter()
    {
        $stmt = $this->connection->stmt_init();
        if ($stmt->prepare("Select DISTINCT A.STORY_ID,A.TITLE,A.AUTHOR,A.STORY from 
                            HW3.story_list A,HW3.Genre_List B, HW3.Story_Genre_Map C,
                            HW3.Story_Statistics D where A.Story_ID = C.Story_ID and 
                            A.Story_ID = D.Story_ID and C.Genre_ID = B.Genre_ID 
                            ORDER BY D.Story_EPOCH DESC LIMIT 10"))
        {
            $stmt->execute();

            $stmt->bind_result($Story_ID,$Title,$Author,$Story,$AverageRating);

            while($stmt->fetch())
            {
                $tempStory = new Story();
                $tempStory->Story_ID = $Story_ID;
                $tempStory->Title = $Title;
                $this->NewestStoriesList[]=$tempStory;
            }
        }
        return $this->NewestStoriesList;
    }
    function fetchNewestStoryListTitleFilter($phraseFilter)
    {
        $stmt = $this->connection->stmt_init();
        if ($stmt->prepare("Select DISTINCT A.STORY_ID,A.TITLE,A.AUTHOR,A.STORY from 
                            HW3.story_list A,HW3.Genre_List B, HW3.Story_Genre_Map C,
                            HW3.Story_Statistics D where A.Story_ID = C.Story_ID and 
                            A.Story_ID = D.Story_ID and C.Genre_ID = B.Genre_ID 
                            and A.title LIKE CONCAT('%',?,'%')
                            ORDER BY D.Story_EPOCH DESC LIMIT 10"))
        {
            $stmt->bind_param('s', $phraseFilter);
            $stmt->execute();
            $stmt->bind_result($Story_ID,$Title,$Author,$Story,$AverageRating);

            while($stmt->fetch())
            {
                $tempStory = new Story();
                $tempStory->Story_ID = $Story_ID;
                $tempStory->Title = $Title;
                $this->NewestStoriesList[]=$tempStory;
            }
        }
        return $this->NewestStoriesList;
    }
    function fetchNewestStoryListGenreFilter($genreFilter)
    {
        $stmt = $this->connection->stmt_init();
        if ($stmt->prepare("Select DISTINCT A.STORY_ID,A.TITLE,A.AUTHOR,A.STORY from 
                            HW3.story_list A,HW3.Genre_List B, HW3.Story_Genre_Map C,
                            HW3.Story_Statistics D where A.Story_ID = C.Story_ID and 
                            A.Story_ID = D.Story_ID and C.Genre_ID = B.Genre_ID 
                            and B.GENRE_NAME = ?
                            ORDER BY D.Story_EPOCH DESC LIMIT 10"))
        {
            $stmt->bind_param('s', $genreFilter);
            $stmt->execute();
            $stmt->bind_result($Story_ID,$Title,$Author,$Story,$AverageRating);

            while($stmt->fetch())
            {
                $tempStory = new Story();
                $tempStory->Story_ID = $Story_ID;
                $tempStory->Title = $Title;
                $this->NewestStoriesList[]=$tempStory;
            }
        }
        return $this->NewestStoriesList;
    }
}