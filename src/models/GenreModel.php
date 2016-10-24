<?php
namespace cool_name_for_your_group\hw3\models;
use cool_name_for_your_group\hw3\models\Model as Model;
require_once HW3ROOT."/src/models/Model.php";

class Genre extends Model
    //the constructor of
    {
        public $generes;
        public $connection;
        function __construct()
        {
            $this->connection = $this->getCOnnection();
            $this->generes = [];
        }
        function getGeneres()
        {
            $resultSet = $this->connection->query("Select GenereDescription from hw3.genere");
            if($resultSet->num_rows>0){
                while ($row = $resultSet->fetch_array()){
                    $this->generes[] =  $row['0'];
                }
            }
            return $this->generes;
        }


    }