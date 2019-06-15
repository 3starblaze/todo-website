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
    
    $title = $conn->real_escape_string($_POST[title]);
    $description = $conn->real_escape_string($_POST['description']);

    echo "<form action=\"\" method=\"post\">".
      "<label for=\"title\">Virsraksts:</label>".
      "<input type=\"text\" id=\"title\" name=\"title\" ".
        "value=$title>".
      "<label for=\"description\">Apraksts:</label>".
      "<input type=\"text\" id=\"description\" name=\"description\" ".
        "value=$description>".
        "<button>Saglabāt</button>".
        "</form>";
    ?>
  </body>
</html>
