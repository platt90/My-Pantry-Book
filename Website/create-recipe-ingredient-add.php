<?php
    // connect to database
    $mysqli = new mysqli("localhost", "root", "", "projectdb");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    // create query 
    $insert = "INSERT INTO recipe_ingredient (recipe_id, ingredient_id, unit_id, amount) VALUES ((SELECT MAX(recipe_id) FROM recipe), '" . $_POST['ingredient'] . "', '" . $_POST['unit'] . "', '" . $_POST['amount'] . "')";
    $update = "UPDATE recipe_ingredient SET amount=(amount + '" . $_POST['amount'] . "') WHERE ingredient_id=('" . $_POST['ingredient'] . "')";

        if ($mysqli->query($insert)) {
            // if it was successful, print a success message
            //Redirect to home page
            header('Location: create-recipe-ingredient.php');
        } else {
            // otherwise print an error message
            echo "<h1>Oops... something went wrong, please try again</h1>\n";
        }
    $mysqli->close();
    ?>