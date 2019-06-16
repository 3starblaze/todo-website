 <!DOCTYPE html>
<html>
  <head>
    <link href="styles/style.css" rel="stylesheet">
    <link href="styles/style-edit-entry.css" rel="stylesheet">
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Labot</title>
  </head>
  <body>
    <h1>Darāmo lietu saraksts</h1>
    <h2>Labot</h2>
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

    echo "<form action=\"entry-editor.php\" method=\"post\" ".
        "class=\"edit-form\">".
        "<div class=\"form-group\">".
      "<label for=\"title\">Virsraksts:</label>".
      "<input type=\"text\" id=\"title\" name=\"title\" ".
        "value=\"$title\" class=\"form-control col-5\" ".
        "required minlength=\"1\">".
        "</div>".
        "<div class=\"form-group\">".
      "<label for=\"description\">Apraksts:</label>".
      "<textarea type=\"text\" id=\"description\" name=\"description\" ".
        "class=\"form-control col-11\">".
        "$description".
        "</textarea>".
        "</div>".
        "<button name=\"id\" class=\"btn btn-success\" ".
        "value=\"$id\">Saglabāt</button>".
      "</form>".
      "<div id=\"second-box\">".
      "<form action=\"entry-deleter.php\" method=\"post\">".
        "<button name=\"id\" class=\"btn btn-danger\" ".
        "value=\"$id\">Dzēst</button>".
      "</form>".
        "<a href=\"/\"><button class=\"btn btn-secondary\">".
        "Doties atpakaļ</button></a>".
        "</div>";

    if($conn->query($query) === FALSE) {echo 'query failed';}
    $conn->close();
    ?>
  </body>
</html>
