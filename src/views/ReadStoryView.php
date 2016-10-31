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
        <div>
		<?php	
			echo "Author :".$data[1];
			echo "Date:".$data[3];
			$ratingList = new ratingList();
			$ratingList->render($data);
			echo $data[2];
	
       echo "</div>";
       $footer = new htmlFooter();
       $footer->render($this);
    }
}
