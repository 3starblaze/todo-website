<!DOCTYPE html>
<html>
  <head>
    <link href="styles/style.css" rel="stylesheet">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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
               "<form action=\"status-editor.php\" method=\"post\">".
                 "<button class=\"check\" name=\"id\" ".
                 "value=$row[id]>".
                 "<input type=\"checkbox\"".
                   $checked_string.
                  "/>".
                  "</button>".
               "</form>".
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
