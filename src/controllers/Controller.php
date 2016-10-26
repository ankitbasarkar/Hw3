<?php

namespace cool_name_for_your_group\hw3\controllers;
abstract class Controller
{
    public $AvailableMethods;
    function __construct($MethodsFromChild)
    {
        $this->AvailableMethods = $MethodsFromChild;
    }

    //This comes from forms where we have action set as index.php?c=controllerName&method=methodNAme
    function checkMethods($MethodName)
    {
        if(in_array($MethodName,$this->AvailableMethods))
        {
            return True;
        }
        else
        {
            return False;
        }
    }
}

?>