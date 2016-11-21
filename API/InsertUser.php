<?php

$servername = "a2ss23.a2hosting.com";
$username = "pethaven_user";
$password = "havenpet.";
$dbname = "pethaven_data";
$salt = "Skngeriujuo48dfslkjn";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully" . "<br>";

$firstName = (isset($_GET["first"]) ? $_GET["first"] : '');
$lastName = (isset($_GET["last"]) ? $_GET["last"] : '');
$email = (isset($_GET["email"]) ? $_GET["email"] : '');
$pnum = (isset($_GET["pnum"]) ? $_GET["pnum"] : '');
$address = (isset($_GET["address"]) ? $_GET["address"] : '');
$pass = (isset($_GET["pass"]) ? $_GET["pass"] : '');
$hashed = crypt($pass,$salt);
//echo($hashed);

$sql = "INSERT INTO user (first_name, last_name, email, pnum, address, pass) VALUES ($firstName, $lastName, $email, $pnum, $address, '". $hashed ."')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
?>