<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>My Pantry Book</title>
    <link rel="stylesheet" href="style.css" type="text/css" media="screen,projection" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

        <?php
        // connect to database
        $mysqli = new mysqli("localhost", "root", "", "projectdb");
        if ($mysqli->connect_errno) { // if there is an error, output the details
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        ?>

        <div class="main">
            <div class="card">
                <!-- Division to display products in the top picks section - Each product is given its own nested division to allow for the slideshow of products -->
                <div id="recipe_top_picks">
                    <h1>Top Picks For You</h1>
                    <?php
                    // get account information from the user database, store the results in $res
                    if ($res = $mysqli->query('SELECT * from recipe r WHERE NOT EXISTS 
                    (SELECT 1 FROM recipe_ingredient rp LEFT JOIN pantry p ON rp.ingredient_id = p.ingredient_id AND p.iduser = ' . $_COOKIE["idUser"] . ' 
                    WHERE rp.recipe_id = r.recipe_id AND p.ingredient_id IS NULL)')) {
                        if ($res->data_seek(0)) {
                            // loop through the results...
                            while ($row = $res->fetch_assoc()) {
                                // output heading
                                ?>
                                <div>
                                    <?php
                                    echo '<a href="recipe.php?id=' . $row['recipe_id'] . '"><img width="600" src="images/' . $row['image'] . '"></a></br>';
                                    echo "<h3> " . $row['name'] . "</h3>\n";
                                    ?>
                                </div>
                                <?php
                            }
                        } else {
                            // if there are no results
                            echo "<br>To begin seeing bespoke recipes start adding food items to your pantry";
                        }
                    } else {
                        // if there was a problem with the query
                        echo "<h1>Oops... something went wrong, please try again</h1>\n";
                    }
                    ?>
                </div>
            </div>

            <!-- Main Body division - Used on homepage to give a desciption and overview of the company -->
            <div id="main_body2">
                <br>
                <h1>Welcome to My Pantry Book</h1>
                <p>We are excited to help you create delicious meals with ease.<br>
                    Our website offers a vast collection of food recipes that cater to all taste buds.<br>
                    Whether you are a seasoned chef or a beginner cook, we have something for everyone.<br>
                    <br>But that's not all! We also offer a shopping list for when you run out of ingredients and a
                    pantry food tracker.<br> This feature allows you to keep track of the ingredients you have in your
                    pantry and suggests recipes based on what you already have.<br> Say goodbye to the hassle of going
                    to the supermarket for missing ingredients!<br>
                    <br>With My Pantry Book, you can:<br>
                    <br>- Easily add items to your shopping list and pantry
                    <br>- Create recipes to share with others
                    <br>- Browse a vast catalogue of recipes
                    <br>- Browse recipes based on what you have in your pantry
                    <br>- Save your favourite recipes
                    <br>- Browse recipes based on dietary preferences<br>
                    <br>We make cooking simple, easy, and fun. Let's get started on your culinary journey today!<br>
                    <br>Happy cooking!
                </p>

            </div>

            <div class="card">
                <!-- Division to display the products - Products are structured in a list -->
                <div id="featured_recips">
                    <div class="products">
                        <h1><br>Featured Recipes</h1>
                        <?php
                        // get account information from the user database, store the results in $res
                        if ($res = $mysqli->query('SELECT recipe_id, image FROM recipe WHERE featured = "1";')) {
                            if ($res->data_seek(0)) {
                                // loop through the results...
                                while ($row = $res->fetch_assoc()) {
                                    // output heading
                                    echo '<a href="recipe.php?id=' . $row['recipe_id'] . '"><img width="600" src="images/' . $row['image'] . '"></a>';
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
                    </div>
                </div>
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

    <script>
        $(document).ready(function () {
            /*
            Slideshow function for the recipe top picks. Recipes are dispayed for 5 seconds then fade out to the next recipe in a continuous loop
            */
            $("#recipe_top_picks > div:gt(0)").hide();
            setInterval(function () {
                $('#recipe_top_picks > div:first')
                    .fadeOut(0)
                    .next()
                    .fadeIn(500)
                    .end()
                    .appendTo('#recipe_top_picks');
            }, 5000);
        });
    </script>

</body>

</html