<?php

// connect to database
$mysqli = new mysqli("localhost", "root", "", "projectdb");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

// create query 
$q = 'DELETE FROM shopping_list WHERE shopping_list_id=' . $_GET['id'] . ';';
// execute query 
if ($mysqli->query($q)) {
    // if it was successful, print a success message
    // Redirect to shopping list page
    header('Location: shopping-list.php');
    //echo '<a href="view-account.php?id=' . $id . '">View Account Information</a>';
}
else {
    // otherwise print an error message
    echo "<h1>Oops... something went wrong, please try again</h1>\n";
}

?>