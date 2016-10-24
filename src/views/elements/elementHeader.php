<?php
/**
 * Created by PhpStorm.
 * User: ankit
 * Date: 10/22/2016
 * Time: 4:53 PM
 */

namespace cool_name_for_your_group\hw3\views\elements;
require_once HW3ROOT."/src/views/elements/Element.php";

class elementHeader extends Element
{
    public function render($data)
    {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Title of the document</title>
        </head>

        <body>
        <?php
    }
}