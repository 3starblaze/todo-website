<?php
// Redirect home
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

$title = $conn->real_escape_string($_POST[title]);
$description = $conn->real_escape_string($_POST['description']);
$date = date("Y-m-d");

// id | title | description | date | is_done
$query = "INSERT INTO todolist VALUES (NULL, \"$title\",".
       "\"$description\", \"$date\", FALSE)";

if($conn->query($query) === FALSE) {echo 'query failed';}
$conn->close();
?>
