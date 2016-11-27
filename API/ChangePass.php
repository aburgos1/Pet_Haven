<?php
//Changes the password stored in the database. URL: www.pethavenpr.com/ChangePass.php?uID=user_ID&pass='newPass' 
//where user_ID is the ID of the user currently logged in and newPass is the new password.
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
$uID = (isset($_GET["uID"]) ? $_GET["uID"] : '');
$newPass = (isset($_GET["pass"]) ? $_GET["pass"] : '');
//Hashes the password entered.
$hashed = crypt($newPass,$salt);
//Stores the hashed password in the database.
$sql = "UPDATE user SET pass = '". $hashed . "' WHERE user_ID = " . mysqli_real_escape_string($conn,$uID);

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
?>
