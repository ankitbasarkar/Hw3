<?php
/**
 * Created by PhpStorm.
 * User: ankit
 * Date: 10/22/2016
 * Time: 3:55 PM
 */

namespace cool_name_for_your_group\hw3\views;
require_once 'elements/elementHeader.php';
require_once 'elements/elementFooter.php';
use cool_name_for_your_group\hw3\views\elements\elementHeader as htmlHeader;
use cool_name_for_your_group\hw3\views\elements\elementFooter as htmlFooter;
use cool_name_for_your_group\hw3\views\elements\filterForm as filterForm;

class LandingView extends View
{
    //here data has array of generes
    function render($data)
    {
        $head = new htmlHeader();
        $head->render();
        //body here please

        ?>
        <h1>Five Thousand Characters</h1>
        <a href="writeSomething.php">Write Something!</a>
        <h2>Check out what people are writing...</h2>
        <?php

        $filterForm = new filterForm();
        $filterForm->render();
        ?>
        <h3>Highest Rated</h3>
        <h3>Most Viewed</h3>
        <h3>Newest</h3>
        <?php

        $end = new htmlFooter();
        $end->render();
    }
}