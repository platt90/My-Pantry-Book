<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Account Information</title>
    <link rel="stylesheet" href="style.css" type="text/css" media="screen,projection" />
</head>

<body>
    <div id="container">
        <!-- Division for the Page Header - Contains Business Logo, Name and Background Image -->
        <header>
            <div id="header">
                <a href="home.php"><img src="Images/logo.png" alt="Logo" width="140" height="140"></a>
            </div>
        </header>

        <!-- Nav Bar Division -->
        <nav class="navbar">
            <!-- NAVIGATION MENU -->
            <ul class="nav-links">

                <!-- NAVIGATION MENUS -->
                <div class="menu">
                    <li><a href="home.php">Home</a></li>
                    <li class="services">
                        <a href="view-all-recipes.php">Recipes</a>
                        <!-- DROPDOWN MENU -->
                        <ul class="dropdown">
                            <li><a href="create-recipe.html">Create Recipe</a></li>
                            <li><a href="view-all-recipes.php">View All Recipes</a></li>
                            <li><a href="view-available-recipes.php">View Available Recipes</a></li>
                            <li><a href="view-favourite-recipes.php">View Favourite Recipes</a></li>
                            <li><a href="view-vegetarian-recipes.php">View Vegetarian Recipes</a></li>
                            <li><a href="view-vegan-recipes.php">View Vegan Recipes</a></li>
                        </ul>
                    </li>
                    <li><a href="pantry.php">Pantry</a></li>
                    <li><a href="shopping-list.php">Shopping List</a></li>
                    <li><a href="view-account.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </div>
            </ul>
        </nav>

        <!-- Main Body division - Used on homepage to give a desciption and overview of the company -->
        <div id="main_body">

            <!-- Division to display the products images - Each image is given its own nested division to allow for the images to be displayed as a slideshow -->
            <div id="recipe_top_picks">
                <div>
                    <?php
                    echo '<img src="images/user.png">';
                    ?>
                </div>
            </div>

            <?php
            // connect to database
            $mysqli = new mysqli("localhost", "root", "", "projectdb");
            if ($mysqli->connect_errno) {
                echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }

            // get account information from the user database, store the results in $res
            if ($res = $mysqli->query('SELECT iduser, username, password, name, email, creation FROM user WHERE iduser=' . $_COOKIE["idUser"] . ';')) {
                echo "<h1>Profile</h1>\n";
                if ($res->data_seek(0)) {
                    // loop through the results...
                    while ($row = $res->fetch_assoc()) {
                        // output heading
                        echo "<h3>Name: " . $row['name'] . "</h3>\n";
                        echo "<h3>Username: " . $row['username'] . "</h3>\n";
                        echo "<h3>Email Address: " . $row['email'] . "</h3>\n";
                        echo "<h3>Member Since: " . $row['creation'] . "</h3>\n";
                        // output edit and delete links
                        $delete = '<a title="Delete Account"href="delete-account.php?id=' . $row['iduser'] . '">&#10060</a>';
                        echo "<h2>" . $delete . "</h2>";
                    }
                } else {
                    // if there are no results
                    echo "<br>No Account Information Found";
                }
            } else {
                // if there was a problem with the query
                echo "<h1>Oops... something went wrong, please try again</h1>\n";
            }

            ?>
        </div>


</body>
<footer>
    <ul>
        <li>My Pantry Book Ltd 2022</li>
        <li>Contact - info@mypantrybook.co.uk</li>
    </ul>
</footer>


</html>