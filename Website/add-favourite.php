    <?php
    // connect to the database
    $mysqli = new mysqli("localhost", "root", "", "projectdb");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    // create add query
    $q = "INSERT INTO favourite (iduser, recipe_id) VALUES ('" . $_COOKIE["idUser"] . "', '" . $_GET['id'] . "')";
    // execute query, and print a success/failure message
    if ($mysqli->query($q)) {
        // if it was successful, redirect to login page and print a success message
        header("Location: recipe.php?id=" . $_GET['id']);
    } else {
        echo "<p>Could not add. Please contact your system adminstrator.</p>";
    }
    ?>