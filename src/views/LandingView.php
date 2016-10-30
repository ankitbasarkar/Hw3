<?php
/**
 * Created by PhpStorm.
 * User: ankit
 * Date: 10/22/2016
 * Time: 3:55 PM
 */

namespace cool_name_for_your_group\hw3\views;
require_once HW3ROOT."/src/views/View.php";
// <<<<<<< Updated upstream
require_once HW3ROOT.'/src/views/elements/elementHeader.php';
require_once HW3ROOT.'/src/views/elements/elementFooter.php';
require_once HW3ROOT.'/src/views/elements/filterForm.php';
require_once HW3ROOT.'/src/views/helpers/OL_Stories.php';
// =======
require_once HW3ROOT.'/src/views/elements/elementHeader.php';
require_once HW3ROOT.'/src/views/elements/elementFooter.php';
require_once HW3ROOT.'/src/views/elements/filterForm.php';
// >>>>>>> Stashed changes
use cool_name_for_your_group\hw3\views\elements\elementHeader as htmlHeader;
use cool_name_for_your_group\hw3\views\elements\elementFooter as htmlFooter;
use cool_name_for_your_group\hw3\views\elements\filterForm as filterForm;
use cool_name_for_your_group\hw3\views\helpers\OL_Stories as OL_Stories;
class LandingView extends View
{
    //here data has
    //1 array of generes and
    //2 highestRatedStories Array
    //3 most viewed Stories Array
    //4 newest Stories Array
    //for stories array the data within these are objects of Story class
    //with story_Id and Title initialized.
    function render($data)
    {
        $head = new htmlHeader($this);
        $head->render($this);
        //body here please

        ?>
        <h1>Five Thousand Characters</h1>
        <a href="index.php?c=GodController&m=writeSomething">Write Something!</a>
        <h2>Check out what people are writing...</h2>
        <?php

        $filterForm = new filterForm($this);
        $filterForm->render($data[0]);
        ?>
        <h3>Highest Rated</h3>
        <?php
// <<<<<<< Updated upstream
        $OLS=new OL_Stories();
        $OLS->render($data[1]);

// =======

        foreach ($data[1] as $story)
            echo "<br>$story<br>";
// >>>>>>> Stashed changes
        ?>
        <h3>Most Viewed</h3>
        <?php
        $OLS=new OL_Stories();
        $OLS->render($data[2]);

        ?>
        <h3>Newest</h3>
        <?php
        $OLS=new OL_Stories();
        $OLS->render($data[3]);

        $end = new htmlFooter(__FILE__);
        $end->render(__FILE__);
    }
}
