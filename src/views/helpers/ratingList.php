<?php
namespace cool_name_for_your_group\hw3\views\helpers;
require_once HW3ROOT.'/src/views/helpers/Helper.php';
use cool_name_for_your_group\hw3\views\helpers\Helper as Helper;

class ratingList extends Helper
{
    //here data should be an array of Story Objects with id and title initialised
    function render($userRatingValue){
        echo "Your Rating:&nbsp;&nbsp;";
        if($userRatingValue[5] ==0){
		for($index = 1; $index<6; $index++){
				$href = "index.php?c=GodController&m=ReadParticularStory&Story_ID=".$userRatingValue[0]."&cValue=".$index."";
				$linkValue = "<a href=".$href.">".$index."&nbsp;&nbsp;&nbsp;</a>";
				echo $linkValue;
		}
	}
	else{
		for($index = 1; $index<6; $index++){
			if($index == $userRatingValue[5]){
				echo "<b>".$index."&nbsp;&nbsp;</b>";
			}
			else
				echo $index."&nbsp;&nbsp;";
			
		}
	}
     }
}
