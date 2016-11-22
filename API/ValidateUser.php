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
$email = (isset($_GET["email"]) ? $_GET["email"] : '');
$entered_pass = (isset($_GET["pass"]) ? $_GET["pass"] : '');

$sql = "SELECT pass FROM user WHERE email = " . $email ;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
     
  
   $stored_pass;
    while($row = $result->fetch_row()) {
              $stored_pass = $row[0];
    }
   
  
    echo(crypt($entered_pass,$salt));
    echo("<br>".$stored_pass."<br>");
    echo(crypt($entered_pass,$salt) === $stored_pass ? "TRUE" : "FALSE");

} else {
	echo "Invalid email";
}

$conn->close();
?>