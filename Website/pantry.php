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

            // Get all the ingredients from ingredient table
            $sql = "SELECT * FROM `ingredient`";
            $all_ingredients = mysqli_query($mysqli, $sql);

            // Get all the units from units table
            $sql = "SELECT * FROM `unit`";
            $all_units = mysqli_query($mysqli, $sql);
            ?>

            <div class="main">
                <!-- Main Body division - Used on homepage to give a desciption and overview of the company -->
                <div id="main_body">
                    <?php
                    if ($res = $mysqli->query('SELECT * FROM pantry INNER JOIN user USING (iduser) INNER JOIN ingredient USING (ingredient_id) INNER JOIN unit USING (unit_id) WHERE iduser=' . $_COOKIE["idUser"])) {
                        if ($res->data_seek(0)) {
                            // loop through the results...
                            echo("<h2><u>Pantry</u></h2>");
                            while ($row = $res->fetch_assoc()) {
                                // output heading
                                $ingredients = $row['amount'] . " " . $row['unit_name'] . " " . $row['ingredient_name'];
                                $remove = '<a title="Remove From Pantry"href="pantry-delete.php?id=' . $row['pantry_id'] . '">&#10060</a>';
                                echo "<h3>" . $remove . $ingredients . "</h3>";
                            }
                        } else {
                            // if there are no results
                            echo "<h1><br>Your Pantry Is Empty</h1>";
                        }
                    } else {
                        // if there was a problem with the query
                        echo "<h1>Oops... something went wrong, please try again</h1>\n";
                    }
                    ?>
                </div>
                <h2>Add An Item To Your Pantry</h2>
                <form action="pantry-add.php" method="post" enctype="multipart/form-data">

                    <select id="ingredient" name="ingredient" required>
                        <option value="">Select Ingredient</option>
                        <?php
                        // use a while loop to fetch data
                        // from the $all_categories variable
                        // and individually display as an option
                        while ($ingredient = mysqli_fetch_array(
                            $all_ingredients,
                            MYSQLI_ASSOC
                        )) :;
                        ?>
                            <option value="<?php echo $ingredient["ingredient_id"];
                                            // The value we usually set is the primary key
                                            ?>">
                                <?php echo $ingredient["ingredient_name"];

                                // To show the category name to the user
                                ?>
                            </option>
                        <?php
                        endwhile;
                        // While loop must be terminated
                        ?>
                    </select>

                    <input type="number" id="amount" name="amount" placeholder="Amount" required>

                    <select id="unit" name="unit" required>
                        <option value="">Select Unit</option>
                        <?php
                        // use a while loop to fetch data
                        // from the $all_categories variable
                        // and individually display as an option
                        while ($unit = mysqli_fetch_array(
                            $all_units,
                            MYSQLI_ASSOC
                        )) :;
                        ?>
                            <option value="<?php echo $unit["unit_id"];
                                            // The value we usually set is the primary key
                                            ?>">
                                <?php echo $unit["unit_name"];

                                // To show the category name to the user
                                ?>
                            </option>
                        <?php
                        endwhile;
                        // While loop must be terminated
                        ?>
                    </select>
                    <input type="submit" value="Add Item" name="submit">
                </form>

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