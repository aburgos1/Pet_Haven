<?php
//Sets an animal as not adopted. URL: www.pethavenpr.com?SetNotAdopted.php?aID=animal_ID
//Where animal_ID is the ID of the animal to be set as not adopted.
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


$sql = "UPDATE animal SET adopted = 0 WHERE animal_ID = " . mysqli_real_escape_string($conn,$aID);


if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
?>
