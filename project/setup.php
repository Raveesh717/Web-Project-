<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 

// Connect but without any default database set.
$handler = mysqli_connect($servername, $username, $password);

if (!$handler) {
    die("Error connecting to database: " . mysqli_connect_error());
}

// Create our database "App".
if (mysqli_query($handler, 'CREATE DATABASE App')) {
    echo "Database created successfully\n";
} else {
    die("Error creating database: " . mysqli_error($handler));
}

// Change our default database to "App" so the subsequent queries execute
// in it.
mysqli_select_db($handler, "App");

// Create the tables in our database "contact" and "userlog".
$q0 = "CREATE TABLE contact (
    id          INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname   VARCHAR(30) NOT NULL,
    lastname    VARCHAR(30) NOT NULL,
    email       VARCHAR(50) NOT NULL,
    phone       BIGINT UNSIGNED,
    subjectname VARCHAR(30),
    messagedetail VARCHAR (1000)
);";

$q1 = "CREATE TABLE userlog (
    id          INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email       VARCHAR(50) NOT NULL,
    username    VARCHAR(30),
    password    BIGINT UNSIGNED
);";

if (mysqli_query($handler, $q0) && mysqli_query($handler, $q1)) {
    echo "Tables created successfully\n";
} else {
    die("Error creating tables. " . mysqli_error($handler));
}

?>