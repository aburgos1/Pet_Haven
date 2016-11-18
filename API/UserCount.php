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

$sql = "SELECT COUNT(*) FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     
   $count = $result->fetch_row();  
   echo $count[0];
        

} else {
    echo "0 results";
}
$conn->close();
?>