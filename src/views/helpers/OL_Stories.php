<?php
/**
 * Created by PhpStorm.
 * User: ankit
 * Date: 10/24/2016
 * Time: 8:35 PM
 */

namespace cool_name_for_your_group\hw3\views\helpers;
require_once HW3ROOT.'/src/views/helpers/Helper.php';
use cool_name_for_your_group\hw3\views\helpers\Helper as Helper;

class OL_Stories extends Helper
{
    //here data should be an array of Story Objects with id and title initialised
    function render($StoriesArray)
    {
        if(empty($StoriesArray))
        {
            echo "<h5 class='Error'>No Story to Display under this Category or Filtering removed it</h5>";
        }
        echo "<ol>";
        foreach ($StoriesArray as $StoryObj)
        {
            $href = "index.php?c=GodController&m=ReadParticularStory&Story_ID=$StoryObj->Story_ID";
            echo "<li><a href=$href>$StoryObj->Title</a></li>";
        }
        echo"</ol>";
    }
}