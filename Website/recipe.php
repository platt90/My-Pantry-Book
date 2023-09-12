<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Pantry Book</title>
    <link rel="stylesheet" href="style.css" type="text/css" media="screen,projection" />
</head>

<body>

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

            <?php
            // connect to database
            $mysqli = new mysqli("localhost", "root", "", "projectdb");
            if ($mysqli->connect_errno) {
                echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }

            // get account information from the user database, store the results in $res
            
            if ($res = $mysqli->query('SELECT * FROM recipe INNER JOIN recipe_ingredient USING (recipe_id) WHERE recipe_id=' . $_GET['id'])) {

                if ($res->data_seek(0)) {
                    // loop through the results...
                    while ($row = $res->fetch_assoc()) {
                        // output heading
                        $name = $row['name'];
                        $image = $row['image'];
                        $description = $row['description'];
                        $method = $row['method'];
                    }
                } else {
                    // if there are no results
                    echo "<br>No Recipes Found";
                }
            } else {
                // if there was a problem with the query
                echo "<h1>Oops... something went wrong, please try again</h1>\n";
            }

            ?>
            <div id="recipe_image">
                <div>
                    <?php
                    // Show Recipe Image
                    echo '<img src="images/' . $image . '">';
                    // Favourites Button
                    $recipe_id = $_GET['id'];
                    $iduser = $_COOKIE["idUser"];
                    $query = "SELECT * FROM favourite WHERE recipe_id = '$recipe_id' AND iduser = '$iduser'";
                    $result = mysqli_query($mysqli, $query);
                    // If recipe is already saved display remove from favourites button
                    if (mysqli_num_rows($result) > 0) {
                        echo '<a title="Remove From Favourites" href="remove-favourite.php?id=' . $recipe_id . '"><h1>&#9733</h1></a>';
                        // If recipe is not already saved display add to favourites button
                    } else {
                        echo '<a title="Add To Favourites" href="add-favourite.php?id=' . $recipe_id . '"><h1>&#9734</h1></a>';
                    }
                    ?>
                </div>
            </div>

            <div class="main">
                <!-- Main Body division -->
                <div id="main_body">
                    <?php
                    echo "<h1>" . $name . "</h1><br/>";
                    echo "<h2>" . $description . "</h2><br/>";
                    //$ingredients = str_replace("\n", '<br/>', $ingredients);
                    //echo "<h2>Ingredients<br/><h3>" . $b . " " . $c . " " . $a . "</h3><br/>";
                    echo "<u><h2>Ingredients</h2></u><br/>";
                    ?>

                    <?php
                    if ($res = $mysqli->query('SELECT * FROM recipe_ingredient INNER JOIN recipe USING (recipe_id) INNER JOIN ingredient USING (ingredient_id) INNER JOIN unit USING (unit_id) WHERE recipe_id=' . $_GET['id'])) {
                        if ($res->data_seek(0)) {
                            // loop through the results...
                            while ($row = $res->fetch_assoc()) {
                                // Show Available Ingredients
                                $ingredient_id = $row['ingredient_id'];
                                $iduser = $_COOKIE["idUser"];
                                $query = "SELECT * FROM pantry WHERE ingredient_id = '$ingredient_id' AND iduser = '$iduser'";
                                $result = mysqli_query($mysqli, $query);
                                // If ingredient is present in pantry
                                if (mysqli_num_rows($result) > 0) {
                                    $available = '<a title="Ingredient In Pantry">&#9989</a>';
                                    // If ingredient is not present in pantry
                                } else {
                                    $available = '<a title="Ingredient Not In Pantry">&#10060</a>';
                                }

                                $ingredients = $row['amount'] . " " . $row['unit_name'] . " " . $row['ingredient_name'];
                                echo "<h3>" . $available . $ingredients . "</h3>";
                            }
                        } else {
                            // if there are no results
                            echo "<br>No Ingredients Found";
                        }
                    } else {
                        // if there was a problem with the query
                        echo "<h1>Oops... something went wrong, please try again</h1>\n";
                    }

                    $method = str_replace("\n", '<br/>', $method);
                    echo "<br><br><h2><u>Method</u><br/><h3><p>" . $method . "</h3>\n";

                    ?>
                </div>
            </div>

            <!-- Page Footer with company name and contact info -->
            <footer>
                <ul>
                    <li>My Pantry Book Ltd 2022</li>
                    <li>Contact - info@mypantrybook.co.uk</li>
                </ul>
            </footer>
        </div>
    </body>

</html>