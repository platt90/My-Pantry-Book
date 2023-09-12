<?php
    // connect to the database
    $mysqli = new mysqli("localhost", "root", "", "projectdb");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    // create delete query
    $q = "DELETE FROM favourite WHERE iduser = '" . $_COOKIE["idUser"] . "' AND recipe_id = '" . $_GET['id'] . "'";
    
    // execute query, and print a success/failure message
    if ($mysqli->query($q)) {
        header("Location: recipe.php?id=" . $_GET['id']);
    } else {
        echo "<p>Could not delete account. Please contact your system adminstrator.</p>";
    }
    ?>