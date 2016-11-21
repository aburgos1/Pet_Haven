<?php

$servername = "a2ss23.a2hosting.com";
$username = "pethaven_user";
$password = "havenpet.";
$dbname = "pethaven_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully" . "<br>";
$aID = (isset($_GET["aID"]) ? $_GET["aID"] : '');
$name = (isset($_GET["name"]) ? $_GET["name"] : '');
$species = (isset($_GET["species"]) ? $_GET["species"] : '');
$size = (isset($_GET["size"]) ? $_GET["size"] : '');
$age = (isset($_GET["age"]) ? $_GET["age"] : '');
$color = (isset($_GET["color"]) ? $_GET["color"] : '');
$gender = (isset($_GET["gender"]) ? $_GET["gender"] : '');
$bio = (isset($_GET["bio"]) ? $_GET["bio"] : '');
$date_vaccinated = (isset($_GET["date_vaccinated"]) ? $_GET["date_vaccinated"] : '');
$surgery = (isset($_GET["surgery"]) ? $_GET["surgery"] : '');

$sql = "UPDATE animal SET animal_name = $name, species = $species, size = $size, age = $age, color = $color, gender = $gender, bio = $bio, 
date_vaccinated = $date_vaccinated, surgery = $surgery WHERE animal_ID = " . mysqli_real_escape_string($conn,$aID);



if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
?>