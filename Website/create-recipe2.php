<?php

$target_dir = "images/";    // set target directory
$target_filename = basename($_FILES["fileToUpload"]["name"]);   // set target filename
$target_file = $target_dir . $target_filename;  // create the target file path
$fileOk = TRUE;  // variable to determine if upload was successful
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // get file type/extension

echo '<p><a href="home.php">Home</a></p>';

// Check if image file is a proper image file
if(isset($_POST["submit"])) {
    // get the image size of the temporary file
    // returns 0/false if it is not an image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    // if the check is non-zero, i.e., true, then output that the file is a (valid) image
    if($check !== FALSE) {
        echo "File is an image - " . $check["mime"] . ".";
        $fileOk = TRUE;
    } else {
        echo "File is not an image.";
        $fileOk = FALSE;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Error: file already exists.";
    $fileOk = FALSE;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 10000000) {  // if larger than 10 MB, do not allow
    echo "Error: file is too large.";
    $fileOk = FALSE;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Error: only JPG, JPEG, PNG & GIF files are allowed.";
    $fileOk = FALSE;
}

// Check if $fileOk was set to FALSE by an error
if (!$fileOk) {
    echo "Failure: your file was not uploaded.";
} else { // if everything is ok, move the file from the temporary location to its permanent location
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
        echo "Error: there was an error uploading your file.";
    }
}

// if file is okay, then add its name to the database
if ($fileOk) {
    // connect to database
    $mysqli = new mysqli("localhost", "root", "", "projectdb");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    
    // create query 
    $name = mysqli_real_escape_string($mysqli, $_POST['recipeName']);
    $description = mysqli_real_escape_string($mysqli, $_POST['recipeDescription']);
    $method =  mysqli_real_escape_string($mysqli, $_POST['recipeMethod']);
    $vegetarian = mysqli_real_escape_string($mysqli, $_POST['vegetarian']);
    $vegan = mysqli_real_escape_string($mysqli, $_POST['vegan']);
    $q = "INSERT INTO recipe (name, image, description, method, vegetarian, vegan) VALUES ('" . $name . "', '" . $target_filename . "', '" . $description . "', '" . $method . "', '" . $vegetarian . "', '" . $vegan . "')";
    
    // execute query 
    if ($mysqli->query($q)) {
        // if it was successful, print a success message
        //Redirect to home page
        header('Location: create-recipe-ingredient.php');
    }
    else {
        // otherwise print an error message
        echo "<p>Something went wrong. Please contact your system administrator.</p>";
    }
}
?>