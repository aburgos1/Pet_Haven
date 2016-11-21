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
$uID = (isset($_GET["uID"]) ? $_GET["uID"] : '');
$firstName = (isset($_GET["first"]) ? $_GET["first"] : '');
$lastName = (isset($_GET["last"]) ? $_GET["last"] : '');
$email = (isset($_GET["email"]) ? $_GET["email"] : '');
$pnum = (isset($_GET["pnum"]) ? $_GET["pnum"] : '');
$address = (isset($_GET["address"]) ? $_GET["address"] : '');


$sql = "UPDATE user SET first_name = $firstName, last_name = $lastName, email = $email, pnum = $pnum, address = $address WHERE user_ID = " . mysqli_real_escape_string($conn,$uID);


if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
?>