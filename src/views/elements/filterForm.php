<?php
/**
 * Created by PhpStorm.
 * User: ankit
 * Date: 10/22/2016
 * Time: 8:14 PM
 */

namespace cool_name_for_your_group\hw3\views\elements;
require_once HW3ROOT.'/src/views/helpers/selectGenere.php';
use cool_name_for_your_group\hw3\views\helpers\selectGenere as selectGenere;


class filterForm extends Element
{
    public function render($data)
    {
        ?>
        <form action="index.php">
            <input type="hidden" name="c" value="GodController">
            <input type="hidden" name="m" value="FilterLandingPageStories">
            <input type="text" name="TitleFilter" placeholder="Phrase Filter"/>
        <?php
        $selectGenere = new selectGenere();
        $selectGenere->render($data);
        ?>
            <button type="submit">Go</button>

        </form>
        <?php
    }
}