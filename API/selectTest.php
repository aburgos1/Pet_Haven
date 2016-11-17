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
echo "Connected successfully" . "<br>";

$sql = "SELECT animal_ID, animal_name FROM animal";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "animal id: " . $row["animal_ID"]. " - animal name: " . $row["animal_name"]. " " . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>