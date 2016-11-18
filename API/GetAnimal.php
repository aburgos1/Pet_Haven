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

$id = (isset($_GET["id"]) ? $_GET["id"] : '');

$sql = "SELECT animal_ID, animal_name, species, size, age, color, gender, bio, adopted, fostered, ready_to_adopt, date_vaccinated, surgery FROM animal WHERE animal_ID = " . mysqli_real_escape_string($conn,$id);

$result = $conn->query($sql);

if ($result->num_rows > 0) {
     
    $resultarr = array();

    while($row = $result->fetch_row()) {
              $resultarr[] = $row;
    }

    echo json_encode($resultarr);
        

} else {
    echo "0 results";
}
$conn->close();
?>