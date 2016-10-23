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

class LandingView extends View
{
    function render($data)
    {
        $head = new htmlHeader();
        $head->render();
        //body here please

        $end = new htmlFooter();
        $end->render();
    }
}