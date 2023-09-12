<?php

// create new MySQL interface object
$mysqli = new mysqli("localhost", "root", "", "projectdb");
if ($mysqli->connect_errno) {   // if there is an error, output the details
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$q = "SELECT iduser, username, password, name, privilege FROM user WHERE username = '" . $_POST['username'] . "';";

if ($res = $mysqli->query($q)) {
    if ($res->data_seek(0)) { // if there are results , i.e. , if such as user exists . . .
        while ($row = $res->fetch_assoc()) { //   fetch the associative   array  for   the  next row  
            if ($row['password']  ==   $_POST['password']) { //   if the   password is   okay. . .
                if ($row['privilege'] == '1') {
                    $cookie_id = $row['iduser'];
                    setcookie("idUser", $cookie_id,   time() + (60 * 60)); // set cookie
                }
                // Redirect to home page
                header('Location: home.php');
            } else { // otherwise give relevant message
                // Redirect to home page
        header("location:index.php?msg=failed");
            }
        }
    } else { // otherwise give relevant message
        // Redirect to home page
        header("location:index.php?msg=failed");
    }
    //   the user was not found
} else {
    echo "<h1>Something went wrong. Please contact your system administrator.</h1>\n";   // query error
}
?>