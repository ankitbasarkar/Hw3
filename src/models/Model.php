<?php
/**
 * Created by PhpStorm.
 * User: ankit
 * Date: 10/22/2016
 * Time: 1:19 PM
 */

namespace cool_name_for_your_group\hw3\models;
require_once HW3ROOT.'/src/configs/config.php';
use cool_name_for_your_group\myconfig\config;

abstract class Model
{
    function getCOnnection()
    {
        $servername = config::Servername;//"localhost";
        $username = config::Username;//"root";
        $password = config::Password;//"";

        $conn = new \mysqli($servername, $username, $password);
        return $conn;
    }
}