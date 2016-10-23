<?php
/**
 * Created by PhpStorm.
 * User: ankit
 * Date: 10/22/2016
 * Time: 6:36 PM
 */

namespace cool_name_for_your_group\hw3\views\helpers;


class selectGenere extends Helper
{
    function render($data)
    {
        $Generes = $data;
    ?>
        <select>
        <option selected="selected">All Genres</option>

        <?php
        try
        {
            foreach($Generes as $Genre)
            {
                ?> "<option>$Genre</option>";<?php
            }
        }
        catch(Exception $e){

        }
        ?></select><?php
    }
}