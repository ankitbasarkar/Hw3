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

    public $listStories;

    function __construct()
    {
        $this->connection = $this->getCOnnection();
        $this->listStories = [];
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

    function fetchHighestRatedStoryList($phraseFilter, $genreFilter)
    {
        $stmt = $this->connection->stmt_init();
        if ($stmt->prepare("Select A.STORY_ID,A.TITLE,A.AUTHOR,A.STORY,
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
                $this->listStories[]=$Story_ID.' '.$Title.' '.$Author.' '.$Story.' '.$AverageRating;
            }


        }
        return $this->listStories;
    }
}