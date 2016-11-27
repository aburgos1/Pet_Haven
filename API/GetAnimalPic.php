<?php
//Gets the picture of an animal. URL: www.pethavenpr.com/GetAnimalPic.php?aID=animal_ID
//Where animal_ID is the ID of the desired animal.
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

$sql = "SELECT pic FROM animal WHERE animal_ID = " . mysqli_real_escape_string($conn,$aID);

$result = $conn->query($sql);

$img = mysqli_fetch_array($result, MYSQLI_BOTH);

echo '<img src ="data:image/jpeg;base64,'.base64_encode($img['pic']).'"/>';


$conn->close();
?>
