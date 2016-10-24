<?php
/**
 * Created by PhpStorm.
 * User: ankit
 * Date: 10/22/2016
 * Time: 3:55 PM
 */

namespace cool_name_for_your_group\hw3\views;
require_once HW3ROOT."/src/views/View.php";
require_once HW3ROOT.'/src/views/elements/elementHeader.php';
require_once HW3ROOT.'/src/views/elements/elementFooter.php';
require_once HW3ROOT.'/src/views/elements/filterForm.php';
use cool_name_for_your_group\hw3\views\elements\elementHeader as htmlHeader;
use cool_name_for_your_group\hw3\views\elements\elementFooter as htmlFooter;
use cool_name_for_your_group\hw3\views\elements\filterForm as filterForm;

class LandingView extends View
{
    //here data has array of generes and highestRatedStories Array
    function render($data)
    {
        $head = new htmlHeader(__FILE__);
        $head->render(__FILE__);
        //body here please

        ?>
        <h1>Five Thousand Characters</h1>
        <a href="writeSomething.php">Write Something!</a>
        <h2>Check out what people are writing...</h2>
        <?php

        $filterForm = new filterForm(__FILE__);
        $filterForm->render($data[0]);
        ?>
        <h3>Highest Rated</h3>
        <?php
        
        foreach ($data[1] as $story)
            echo "<br>$story<br>";
        ?>
        <h3>Most Viewed</h3>

        <h3>Newest</h3>
        <?php

        $end = new htmlFooter(__FILE__);
        $end->render(__FILE__);
    }
}