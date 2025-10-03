<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "sql302.infinityfree.com"; 
$username   = "if0_39637207";
$password   = "00000000"; 
$dbname     = "if0_39637207_stephensoftdev";

// Connect
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Escape inputs
$name    = $conn->real_escape_string($_POST['name']);
$email   = $conn->real_escape_string($_POST['email']);
$message = $conn->real_escape_string($_POST['message']);

// Insert query
$sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    // Message save aagiduchu nu alert
    echo "<script>
            alert('Thanks $name! Your message is saved successfully.');
            window.location.href='contact.html';
          </script>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
