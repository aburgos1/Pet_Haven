<?php
// URL: http://www.pethavenpr.com/connTest.php
$servername = "a2ss23.a2hosting.com";
$username = "pethaven_user";
$password = "havenpet.";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>
