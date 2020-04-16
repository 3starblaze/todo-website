<?php
header('Location: /');
$servername = "localhost";
$username = "server";
$password = "yourpassword";
$dbname = "todo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id = $conn->real_escape_string($_POST['id']);

$query = "SELECT is_done FROM todolist WHERE ID=$id";
$result = $conn->query($query)->fetch_assoc();
$value = $result['is_done'];

// Reverse boolean value
$new_value = ($value == 1 ? 0 : 1);

$query = "UPDATE todolist SET is_done=\"$new_value\" ".
       "WHERE id=\"$id\"";

if($conn->query($query) === FALSE) {echo 'query failed';}
$conn->close();
?>
