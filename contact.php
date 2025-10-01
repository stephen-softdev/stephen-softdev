<?php
$servername = "sql302.infinityfree.com"; 
$username   = "if0_39637207";     // screenshot la irundhu
$password   = "STEPHEN2222526";   // unakku kudutha password
$dbname     = "if0_39637207_stephensoftdev"; // DB name exact-a use pannunga

// Connect
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Escape inputs (basic security)
$name    = $conn->real_escape_string($_POST['name']);
$email   = $conn->real_escape_string($_POST['email']);
$message = $conn->real_escape_string($_POST['message']);

$sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
  echo "<h2>Thanks $name! Your message is saved successfully.</h2>";
  echo "<a href='contact.html'>Go Back</a>";
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
?>
