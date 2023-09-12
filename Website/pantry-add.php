<?php
    // connect to database
    $mysqli = new mysqli("localhost", "root", "", "projectdb");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    // create query 
    $insert = "INSERT INTO pantry (iduser, ingredient_id, unit_id, amount) VALUES ('" . $_COOKIE["idUser"] . "', '" . $_POST['ingredient'] . "', '" . $_POST['unit'] . "', '" . $_POST['amount'] . "')";
    $update = "UPDATE pantry SET amount=(amount + '" . $_POST['amount'] . "') WHERE ingredient_id=('" . $_POST['ingredient'] . "') AND iduser=('" . $_COOKIE['idUser'] . "')";

    $result = $mysqli->query("SELECT amount FROM pantry WHERE ingredient_id = '" . $_POST['ingredient'] . "' AND iduser=" . $_COOKIE["idUser"]);
    if ($result->num_rows == 0) {
        if ($mysqli->query($insert)) {
            // if it was successful, print a success message
            //Redirect to home page
            header('Location: pantry.php');
        } else {
            // otherwise print an error message
            echo "<h1>Oops... something went wrong, please try again</h1>\n";
        }
    } else {
        if ($mysqli->query($update)) {
            header('Location: pantry.php');
        }
    }
    $mysqli->close();
    ?>