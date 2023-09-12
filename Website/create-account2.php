    <?php
    // connect to database
    $mysqli = new mysqli("localhost", "root", "", "projectdb");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    // create query 
    $q = "INSERT INTO user (username, password, name, privilege, email) VALUES ('" . $_POST['username'] . "', '" . $_POST['password'] . "', '" . $_POST['name'] . "', '" . "1" . "', '" . $_POST['email'] . "')";

    // execute query 
    if ($mysqli->query($q)) {
        // if it was successful, print a success message
        header("location:index.php?msg2=account_created");
        //echo '<a href="view-account.php?id=' . $id . '">View Account Information</a>';
    } else {
        // otherwise print an error message
        echo "<h1>Oops... something went wrong, please try again</h1>\n";
    }
    ?>
