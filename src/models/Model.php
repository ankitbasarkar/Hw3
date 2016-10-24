<?php
/**
 * Created by PhpStorm.
 * User: ankit
 * Date: 10/22/2016
 * Time: 1:19 PM
 */

namespace cool_name_for_your_group\hw3\models;


abstract class Model
{
    function getCOnnection()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = new \mysqli($servername, $username, $password);
        return $conn;
    }
}