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
$email = (isset($_GET["email"]) ? $_GET["email"] : '');
$pnum = (isset($_GET["pnum"]) ? $_GET["pnum"] : '');
$address = (isset($_GET["address"]) ? $_GET["address"] : '');
$purpose = (isset($_GET["purpose"]) ? $_GET["purpose"] : '');
$date = (isset($_GET["date"]) ? $_GET["date"] : '');

$sql = "INSERT INTO form (user_ID, email, pnum, address, purpose, date, date_submitted)
        VALUES ($uID, $email, $pnum, $address, $purpose, $date, CURRENT_DATE)";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
?>