<?php
//Gets the general information of a user. URL: www.pethavenpr.com/GetUser.php?uID=user_ID
//Where user_ID is the ID of the requested user.
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

$sql = "SELECT first_name, last_name, email, pnum, address FROM user WHERE user_ID = " . mysqli_real_escape_string($conn,$uID);

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
