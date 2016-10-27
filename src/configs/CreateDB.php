<?php
	namespace cdb;
	$link = mysqli_connect('localhost', 'root', 'password');
	if (!$link) {
    		die('Not connected : ' );	
	}
	else{
		
	//require_once 'config.php';
    	$query[] = "CREATE DATABASE IF NOT EXISTS HW3;";
	//use Databse HW3
	$query[] = "use HW3";

//	//CREATE TABLE GENRE AND INSERT VALUES INTO IT.
    $query[] = "DROP TABLE IF EXISTS genre_list;";
	$query[] = "CREATE TABLE genre_list (Genre_ID int(11) NOT NULL AUTO_INCREMENT,
                Genre_Name varchar(20) NOT NULL, PRIMARY KEY (Genre_ID)) ;";
	$query[] = "INSERT INTO genre_list VALUES (null,'FICTION');";
	$query[] = "INSERT INTO genre_list VALUES (null,'COMEDY');";
	$query[] = "INSERT INTO genre_list VALUES (null,'DRAMA');";
	$query[] = "INSERT INTO genre_list VALUES (null,'NON FICTION');";
	$query[] = "INSERT INTO genre_list VALUES (null,'HORROR');";
//
//	//Crete table Story and Insert Values into it
    $query[] = "DROP TABLE IF EXISTS story_list;";
	$query[] = "CREATE TABLE story_list (
                Story_ID int(11) NOT NULL AUTO_INCREMENT,
                Title varchar(20) NOT NULL,
                Author varchar(30) NOT NULL,
		Identifier varchar(30) NOT NULL,
                Story varchar(5000) DEFAULT NULL,
		Story_EPOCH timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (Story_ID));";


//	//Create table for mapping of story and genre
    $query[] = "DROP TABLE IF EXISTS story_genre_map;";
	$query[] = "CREATE TABLE story_genre_map (
                Story_ID int(11) NOT NULL,
                Genre_ID int(11) NOT NULL,
                PRIMARY KEY (Story_ID,Genre_ID),
                CONSTRAINT story_genre_map_ibfk_1 FOREIGN KEY (Story_ID) REFERENCES story_list (Story_ID),
                CONSTRAINT story_genre_map_ibfk_2 FOREIGN KEY (Genre_ID) REFERENCES genre_list (Genre_ID));";


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
            if (mysqli_query($link, $que)) {
                echo "successfully";
            } 
        }
	}
