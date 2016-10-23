<?php
namespace cool_name_for_your_group\hw3\models;

    class Genre extends Model
    //the constructor of
    {
        public $generes;
        public $connection;
        function __construct()
        {
            $connection = $this->getCOnnection();
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