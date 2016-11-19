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

$name = (isset($_GET["name"]) ? $_GET["name"] : '');
$species = (isset($_GET["species"]) ? $_GET["species"] : '');
$size = (isset($_GET["size"]) ? $_GET["size"] : '');
$age = (isset($_GET["age"]) ? $_GET["age"] : '');
$color = (isset($_GET["color"]) ? $_GET["color"] : '');
$gender = (isset($_GET["gender"]) ? $_GET["gender"] : '');
$bio = (isset($_GET["bio"]) ? $_GET["bio"] : '');
$adopted = (isset($_GET["adopted"]) ? $_GET["adopted"] : '');
$fostered = (isset($_GET["fostered"]) ? $_GET["fostered"] : '');
$ready_to_adopt = (isset($_GET["ready_to_adopt"]) ? $_GET["ready_to_adopt"] : '');
$date_vaccinated = (isset($_GET["date_vaccinated"]) ? $_GET["date_vaccinated"] : '');
$surgery = (isset($_GET["surgery"]) ? $_GET["surgery"] : '');

$sql = "INSERT INTO animal (animal_name, species, size, age, color, gender, bio, adopted, fostered, ready_to_adopt, date_vaccinated, surgery)
        VALUES ($name, $species, $size, $age, $color, $gender, $bio, $adopted, $fostered, $ready_to_adopt, $date_vaccinated, $surgery)";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
?>