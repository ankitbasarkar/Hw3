<?php
/**
 * Created by PhpStorm.
 * User: ankit
 * Date: 10/23/2016
 * Time: 10:55 PM
 */

namespace cool_name_for_your_group\hw3\models;
require_once HW3ROOT.'/src/models/Model.php';

use cool_name_for_your_group\hw3\models\Model as Model;

class Story extends Model
{
    public $connection;

    //Inside story_list table
    public $Story_ID;
    public $Title;
    public $Author;
    public $Story;

    //Inside Genre_List table
    public $Genres;    //this should be initialized to a list

    //Inside Story_Statistics table
    public $Story_Total_Views;
    public $Story_Epoch;
    public $NUMBER_OF_RATINGS_SO_FAR;
    public $SUM_OF_RATINGS_SO_FAR;



}