<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "foodmenu";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Menu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <section class="container">
        <?php 
        // Check if item_id is provided in the URL
        if (isset($_GET['item'])) {
            $item_id = $_GET['item'];

            // Fetch the name of the item
            $item_sql = "SELECT name FROM item WHERE id = $item_id";
            $item_result = mysqli_query($conn, $item_sql);
            $item_row = mysqli_fetch_assoc($item_result);
            $item_name = $item_row['name'];
            ?> 
            <div class="item_name_for_recipe">Recipes for <?php echo $item_name;?></div>
            <?php
            

            // Fetch all recipes corresponding to the provided item_id
            $sql = "SELECT * FROM recipe WHERE item_id = $item_id";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Output data of each recipe
                $counter = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    $recipe_title = $row["title"];
                    $recipe_image = $row["image"];
                    $recipe_description = $row["description"];
                    ?>
                    <div class="recipe_item">
                        <div class="recipe_title">Recipe <?php echo $counter; ?>: <?php echo $recipe_title; ?></div>
                        <div class="recipe_image"><img src="<?php echo $recipe_image; ?>" alt="<?php echo $recipe_title; ?>"></div>
                        <div class="recipe_description">
                            <?php echo $recipe_description; ?>
                        </div>
                    </div>
                    <?php
                    $counter++;
                }
            } else {
                echo "No recipe found for this item.";
            }
        }
        ?>
    </section>
    <?php include 'footer.php'; ?>
</body>
</html>
