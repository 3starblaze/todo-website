 <!DOCTYPE html>
<html>
  <head>
    <link href="styles/style.css" rel="stylesheet">
    <meta charset="utf-8">
    <title>Pievienot jaunu</title>
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

    $id = $conn->real_escape_string($_POST[id]);
    $query = "SELECT title, description FROM todolist WHERE ID=$id";
    $result = $conn->query($query)->fetch_assoc();
    
    $title = htmlentities($result['title']);
    $description = htmlentities($result['description']);
    $id = htmlentities($_POST[id]);

    echo "<form action=\"entry-editor.php\" method=\"post\">".
      "<label for=\"title\">Virsraksts:</label>".
      "<input type=\"text\" id=\"title\" name=\"title\" ".
        "value=\"$title\">".
      "<label for=\"description\">Apraksts:</label>".
      "<input type=\"text\" id=\"description\" name=\"description\" ".
        "value=\"$description\">".
        "<button name=\"id\" value=\"$id\">Saglabāt</button>".
      "</form>".
      "<form>".
        "<button name=\"id\" value=\"$id\">Dzēst</button>".
      "</form>".
      "<a href=\"/\"><button>Doties atpakaļ</button></a>";
        
    ?>
  </body>
</html>
