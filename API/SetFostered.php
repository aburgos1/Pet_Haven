<?php
//Sets an animal as fostered. URL: www.pethavenpr.com?SetFostered.php?aID=animal_ID
//Where animal_ID is the ID of the animal to be set as fostered.
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


$sql = "UPDATE animal SET fostered = 1 WHERE animal_ID = " . mysqli_real_escape_string($conn,$id);


if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
?>
