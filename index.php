<!DOCTYPE html>
<html>
  <head>
    <link href="styles/style.css" rel="stylesheet">
    <meta charset="utf-8">
    <title>Darāmo lietu saraksts</title>
  </head>
  <body>
    <h1>Darāmo lietu saraksts</h1>
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

$sql = "SELECT * FROM todolist";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        $checked_string;
        if ($row[is_done]) { $checked_string = ' checked'; }
        else { $checked_string = ''; }
        
        $title = htmlEntities($row['title'], ENT_QUOTES);
        $date = htmlEntities($row['date'], ENT_QUOTES);
        $description = htmlEntities($row['description'], ENT_QUOTES);
               
        echo "<div id=$row[id] class=\"task\">".
               "<input type=\"checkbox\"".
                 $checked_string.
                 "/>".
               "<h2 class=\"title\">$title</h2>".
                "<p class=\"date\">$date</p>".
                "<p class=\"description\">$description</p>".
                "<form action=\"edit-entry.php\" method=\"post\">".
                   "<button name=\"id\" value=$row[id]>Labot</button>".
                "</form>".
              "</div>";
        //TODO: link to todo task editing page
    }
}

$conn->close();
?>

    <a href="create-new.html">
      <button id="create-new">Pievienot jaunu</button>
    </a>
  </body>
</html>
