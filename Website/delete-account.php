    <?php
    // connect to the database
    $mysqli = new mysqli("localhost", "root", "", "projectdb");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    // create delete query
    $q = 'DELETE FROM user WHERE iduser=' . $_GET['id'] . ';';
    // execute query, and print a success/failure message
    if ($mysqli->query($q)) {
        // if it was successful, redirect to login page and print a success message
        header("location:index.php?msg3=account_deleted");
    } else {
        echo "<p>Could not delete account. Please contact your system adminstrator.</p>";
    }
    ?>
