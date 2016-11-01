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

class GenreSelector extends Helper
{
    function render($data)
    {

    ?>
        <select multiple name='GenreFilter[]'>
<!--        <option selected="selected">--><?//=$data['GenreFilter'] ?><!--</option>-->
        <?php
        try
        {
            foreach($data['Genres'] as $Genre)
            {
                if(in_array($Genre,$data['GenreFilter']))
                    echo "<option selected='selected' value=$Genre>$Genre</option>";
                else
                    echo "<option value=$Genre>$Genre</option>";
            }
        }
        catch(Exception $e){

        }
        ?></select><?php
    }
}
