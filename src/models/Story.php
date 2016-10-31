<?php


namespace cool_name_for_your_group\hw3\models;
require_once HW3ROOT.'/src/models/Model.php';

use cool_name_for_your_group\hw3\models\Model as Model;

class Story extends Model
{
    public $connection;

    //Inside story_list table
    public $Story_ID;
    public $Title;
    public $Author;
    public $Story;

    //Inside Genre_List table
    public $Genres;    //this should be initialized to a list

    //Inside Story_Statistics table
    public $Story_Total_Views;
    public $NUMBER_OF_RATINGS_SO_FAR;
    public $SUM_OF_RATINGS_SO_FAR;

    function __construct()
    {
        $this->connection = $this->getCOnnection();
        if ($this->connection->connect_error) {
            echo "Failed to connect";
        }
        else
            echo "Connection made";
    }

    function fetchStory($story_id, $userRatingValue){
		$cookieValue = "Story_id".$story_id;
		$allData = array();
		$query1 = $this->connection->query("select Author, Story, Story_EPOCH from HW3.story_list where Story_ID ='".$story_id."'");
		$result = mysqli_fetch_assoc($query1);
		$allData[] = $story_id;
		$allData[] = $result['Author'];
		$allData[] = $result['Story'];
		$allData[] = $result['Story_EPOCH'];
		
		$query2 = $this->connection->query("select Story_Total_Views, Sum_Of_Ratings_So_Far, Number_Of_Ratings_So_Far, Story_Total_Views from HW3.story_statistics where Story_ID = '".$story_id."'");
		$result = mysqli_fetch_assoc($query2);		
			
		if(!isset($_COOKIE[$cookieValue])){
			if($result){
				$SUM_OF_RATINGS_SO_FAR = $result['Sum_Of_Ratings_So_Far'];
				$NUMBER_OF_RATINGS_SO_FAR = $result['Number_Of_Ratings_So_Far'];
				$Story_Total_Views = $result['Story_Total_Views'];
				if($userRatingValue ==0){
					if($SUM_OF_RATINGS_SO_FAR ==0){
						$allData[] = 0;// no average rating available
					}
					else{
						$Average = $SUM_OF_RATINGS_SO_FAR/$NUMBER_OF_RATINGS_SO_FAR;
						$allData[] = $Average;
					}
					//Code to Increment the number of views
					$Story_Total_Views = $Story_Total_Views + 1;
					$res = $this->connection->query("update HW3.story_statistics SET Story_Total_Views = '".$Story_Total_Views."' where Story_ID = '".$story_id."'");
				}
				else{
					$SUM_OF_RATINGS_SO_FAR = $SUM_OF_RATINGS_SO_FAR+$userRatingValue;
					$NUMBER_OF_RATINGS_SO_FAR = $NUMBER_OF_RATINGS_SO_FAR+1;
					$this->connection->query("UPDATE HW3.story_statistics SET Sum_Of_Ratings_So_Far ='".$userRatingValue."', Number_Of_Ratings_So_Far = '".$NUMBER_OF_RATINGS_SO_FAR."' WHERE Story_ID='".$story_id."'");
					$Average = $SUM_OF_RATINGS_SO_FAR/$NUMBER_OF_RATINGS_SO_FAR;
					$allData[] = $Average; // AVERAGE VALUE OF RATING AVAILABLE SO FAR.
					
					setcookie($cookieValue, $userRatingValue,time()+(86400*30));
					
				}
				$allData[] = $userRatingValue; // save user rating provided
									
			}		
			else{
				$allData[] = 0; // no average rating available
				//no  story exist yet;
				$this->connection->query("Insert into HW3.story_statistics Values('".$story_id."','1','0','0')");
			}
		}
		else{
			$userRatingValue = $_COOKIE[$cookieValue];
			$SUM_OF_RATINGS_SO_FAR = $result['Sum_Of_Ratings_So_Far'];
			$NUMBER_OF_RATINGS_SO_FAR = $result['Number_Of_Ratings_So_Far'];
			$Story_Total_Views = $result['Story_Total_Views'];
			$Average = $SUM_OF_RATINGS_SO_FAR/$NUMBER_OF_RATINGS_SO_FAR;
			$allData[] = $Average;
			$allData[] = $userRatingValue; // user rating returned;
			//Code to Increment the number of views
			$Story_Total_Views = $Story_Total_Views + 1;
			$res = $this->connection->query("update HW3.story_statistics SET Story_Total_Views = '".$Story_Total_Views."' where Story_ID = '".$story_id."'");
		}
			
		
		return $allData;
		
	}

}
