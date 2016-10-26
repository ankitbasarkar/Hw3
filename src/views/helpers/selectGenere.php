<?php
/**
 * Created by PhpStorm.
 * User: ankit
 * Date: 10/22/2016
 * Time: 6:36 PM
 */

namespace cool_name_for_your_group\hw3\views\helpers;
require_once HW3ROOT.'/src/views/helpers/Helper.php';
use cool_name_for_your_group\hw3\views\helpers\Helper as Helper;

class selectGenere extends Helper
{
    function render($data)
    {
        $Generes = $data;
    ?>
        <select name='GenreFilter'>
        <option selected="selected">All Genres</option>

        <?php
        try
        {
            foreach($Generes as $Genre)
            {
                echo "<option value=$Genre>$Genre</option>";
            }
        }
        catch(Exception $e){

        }
        ?></select><?php
    }
}