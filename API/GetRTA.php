<?php
//Gets the name, gender and size of all the animals that are ready to adopt. URL: www.pethavenpr.com/GetRTA.php
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

$sql = "SELECT animal_ID, animal_name, gender, size, species FROM animal WHERE ready_to_adopt = 1";
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
