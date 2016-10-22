<?php
/**
 * Created by PhpStorm.
 * User: ankit
 * Date: 10/22/2016
 * Time: 1:24 PM
 */

namespace cool_name_for_your_group\hw3\views\elements;


abstract class Element
{
    public $view;
    function __construct($currentView)
    {
        $this->view = $currentView;
    }
    public abstract function render($data);
}