<?php
namespace serverBros;
//import the config class to access the variables
require_once('config.php');


//Check connection 
if($connection-> connect_error) {
    die("connection failed: " . $connection->connect_error);
}
//create db within the connection
$sql = "CREATE DATABASE MovieReviewDB";

if(mysqli_query($connection, $sql)){
    echo "Database for moview reviews created successfully";
}
else {
    echo "error creating database: " . $connection->error;
}


//Use this command to switch to using the MovieReviewDB 
$useMovieDB = "use MovieReviewDB";

if(mysqli_query($connection, $useMovieDB)){
    echo "Now using the Movie Reviews DB \n";
}
else{
    echo "error switching to Moview Review DB" . $connection->error;

}


//create genre table
//primary key id 
//fields: name
$createGenreTable = "CREATE TABLE Genres(
    genreId int NOT NULL AUTO_INCREMENT,
    name varchar(30) NOT NULL,
    PRIMARY KEY(genreId))";

//create reviews table 
//primary key is review ID 
//fields: title, content, genreID, date
//when inserting a review, the genre that it belongs to will be inserted into genreID
$createReviewTable = "CREATE TABLE Reviews(
    reviewId int NOT NULL AUTO_INCREMENT,
    genreId INT(6) UNSIGNED,
    title varchar(30) NOT NULL,
    content TEXT NOT NULL,
    insertDate DATE,
    PRIMARY KEY(reviewId))";

//run query for creating genres table 
if(mysqli_query($connection, $createGenreTable)) {
    echo "Genre table created successfully";
}
else {
    echo "Error creating table: " . mysqli_error($connection);
}

//run query for creating review table 
if(mysqli_query($connection, $createReviewTable)) {
    echo "review table created successfully";
}
else {
    echo "Error creating table: " . mysqli_error($connection);
}


