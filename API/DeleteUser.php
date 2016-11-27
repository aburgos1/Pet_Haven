<?php
//Deletes a user from the database. URL: www.pethavenpr.com/DeleteUser.php?uID=user_ID.
//Where user_ID is the ID of the user to be deleted.
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


$sql = "DELETE FROM user WHERE user_ID = $uID";


if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
?>
