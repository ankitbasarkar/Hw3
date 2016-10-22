<?php
	namespace cdb;
	require 'config.php';
	$query[] = "CREATE DATABASE HW3;";
	//use Databse HW3
	$query[] = "use HW3";
	
	//CREATE TABLE GENERE AND INSERT VALUES INTO IT.
	$query[] = "CREATE TABLE Genere(G_ID INT AUTO_INCREMENT PRIMARY KEY, GenereDescription VARCHAR(20) NOT NULL);";
	$query[] = "INSERT INTO Genere VALUES (null,'FICTION');";
	$query[] = "INSERT INTO Genere VALUES (null,'COMEDY');";
	$query[] = "INSERT INTO Genere VALUES (null,'DRAMA');";
	$query[] = "INSERT INTO Genere VALUES (null,'NON FICTION');";
	$query[] = "INSERT INTO Genere VALUES (null,'HORROR');";
	 
	//Crete table Story and Insert Values into it 
	$query[] = "CREATE TABLE WriteSomething(ST_ID INT AUTO_INCREMENT PRIMARY KEY, Title VARCHAR(20) NOT NULL, 
				AUTHOR VARCHAR(30) NOT NULL, DESCRIPTION VARCHAR(5000) );";
				
	//Create table for mapping of story and genere
	$query[] = "CREATE TABLE ST_GEN_MAP(ST_ID INT, G_ID INT, CONSTRAINT FOREIGN KEY(ST_ID) REFERENCES WriteSomething(ST_ID), 
				CONSTRAINT FOREIGN KEY(G_ID) REFERENCES Genere(G_ID),
				CONSTRAINT ST_G_PK PRIMARY KEY (ST_ID, G_ID));";
	
	//Create table for mapping RATING AND TOTAL NUMBER OF VISITORS
	$query[] = "CREATE TABLE ST_RATING(ST_RATING_ID INT AUTO_INCREMENT PRIMARY KEY, ST_ID INT, ST_AVG_RATING INT, ST_TotalVisitor INT,  CONSTRAINT FOREIGN KEY(ST_ID) REFERENCES WriteSomething(ST_ID));";
	
	foreach($query as $que){
		if ($conn->query($que) === TRUE) {
			echo "successfully";
		} else {
			echo "Error " . $conn->error;
			break;
		}
	}
