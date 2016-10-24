<?php
	namespace cdb;
	require_once 'config.php';
    echo "Hello";
	$query[] = "CREATE DATABASE IF NOT EXISTS HW3;";
	//use Databse HW3
	$query[] = "use HW3";

//	//CREATE TABLE GENERE AND INSERT VALUES INTO IT.
    $query[] = "DROP TABLE IF EXISTS genere_list;";
	$query[] = "CREATE TABLE genere_list (Genere_ID int(11) NOT NULL AUTO_INCREMENT,
                Genere_Name varchar(20) NOT NULL, PRIMARY KEY (Genere_ID)) ;";
	$query[] = "INSERT INTO genere_list VALUES (null,'FICTION');";
	$query[] = "INSERT INTO genere_list VALUES (null,'COMEDY');";
	$query[] = "INSERT INTO genere_list VALUES (null,'DRAMA');";
	$query[] = "INSERT INTO genere_list VALUES (null,'NON FICTION');";
	$query[] = "INSERT INTO genere_list VALUES (null,'HORROR');";
//
//	//Crete table Story and Insert Values into it
    $query[] = "DROP TABLE IF EXISTS story_list;";
	$query[] = "CREATE TABLE story_list (
                Story_ID int(11) NOT NULL AUTO_INCREMENT,
                Title varchar(20) NOT NULL,
                AUTHOR varchar(30) NOT NULL,
                Story varchar(5000) DEFAULT NULL,
                PRIMARY KEY (Story_ID));";


//	//Create table for mapping of story and genere
    $query[] = "DROP TABLE IF EXISTS story_genere_map;";
	$query[] = "CREATE TABLE story_genere_map (
                Story_ID int(11) NOT NULL,
                Genere_ID int(11) NOT NULL,
                PRIMARY KEY (Story_ID,Genere_ID),
                CONSTRAINT story_genere_map_ibfk_1 FOREIGN KEY (Story_ID) REFERENCES story_list (Story_ID),
                CONSTRAINT story_genere_map_ibfk_2 FOREIGN KEY (Genere_ID) REFERENCES genere_list (Genere_ID));";


	//Create table for mapping RATING AND TOTAL NUMBER OF VISITORS
    $query[] = "DROP TABLE IF EXISTS story_statistics;";
    $query[] = "CREATE TABLE story_statistics (
                Story_ID int(11) NOT NULL,
                Story_EPOCH timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                Story_Total_Views int(11) DEFAULT NULL,
                NUMBER_OF_RATINGS_SO_FAR int(11) DEFAULT NULL,
                SUM_OF_RATINGS_SO_FAR int(11) DEFAULT NULL,
                PRIMARY KEY (Story_ID),
                CONSTRAINT story_statistics_ibfk_1 FOREIGN KEY (Story_ID) REFERENCES story_list (Story_ID)); ";

	foreach($query as $que){
        if (isset($conn)) {
            if ($conn->query($que) === TRUE) {
                echo "successfully";
            } else {
                echo "Error " . $conn->error;
break;
            }
        }
	}
