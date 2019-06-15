<?php
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

    $id = $conn->real_escape_string($_POST[id]);

    $query = "DELETE FROM todolist WHERE id=\"$id\"";

    if($conn->query($query) === FALSE) {echo 'query failed';}
    $conn->close();
?>
