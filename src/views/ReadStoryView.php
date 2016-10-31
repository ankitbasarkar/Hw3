<?php

namespace cool_name_for_your_group\hw3\views;
require_once HW3ROOT."/src/views/View.php";
require_once HW3ROOT.'/src/views/elements/elementHeader.php';
require_once HW3ROOT.'/src/views/elements/elementFooter.php';
require_once HW3ROOT.'/src/views/helpers/ratingList.php';
use cool_name_for_your_group\hw3\views\elements\elementHeader as htmlHeader;
use cool_name_for_your_group\hw3\views\elements\elementFooter as htmlFooter;
use cool_name_for_your_group\hw3\views\helpers\ratingList as ratingList;

class ReadStoryView extends View
{
    function render($data)
    {
        $head = new htmlHeader($this);
        $data['title'] = "Five Thousand Characters - Write Something";
        $head->render($data);
        //body here please

        ?>
        <h1>Five Thousand Characters</h1>
        	<center>
			 <div>
				<?php	
				echo "Author :".$data[1];
				echo "<br/>";
				echo "Date:".$data[3];
				echo "<br/>";
				$ratingList = new ratingList();
				$ratingList->render($data); //shows rating
				echo "<br/>";
				echo "Average Rating: &nbsp;&nbsp;".$data[4];
				echo "<br/>";
				echo $data[2]; // display Story
				echo "<br/>";
	
       			echo "</div> </center>";
       $footer = new htmlFooter();
       $footer->render($this);
    }
}
