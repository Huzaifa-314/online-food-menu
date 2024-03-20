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
    <?php include 'header.php';?>

    <section class="food_menu">
        <div class="menu_container">
            <div class="menu_items">
                <?php
                // Check if menu category ID is provided in the URL
                if (isset($_GET['menu'])) {
                            $menu_category_id = $_GET['menu'];

                    // Fetch items for the specified category ID
                    $item_sql = "SELECT * FROM item WHERE cat_id = $menu_category_id";
                    $item_result = mysqli_query($conn, $item_sql);

                    // Check if any items exist for this category
                    if (mysqli_num_rows($item_result) > 0) {
                        // Output data of each item
                        while ($item_row = mysqli_fetch_assoc($item_result)) {
                            $item_id = $item_row["id"];
                            $item_name = $item_row["name"];
                            $item_image = $item_row["image"];
                    ?>
                            <div class="item">
                                <a href="recipe.php?item=<?php echo strtolower(str_replace(' ', '_', $item_id)); ?>" class="item_card">
                                    <img class="item_image" src="img/item/<?php echo $item_image; ?>" alt="<?php echo $item_name; ?>">
                                    <div class="details">
                                        <div class="title"><?php echo $item_name; ?></div>
                                    </div>
                                </a>
                            </div>
                    <?php
                        }
                    } else {
                        echo "No items found for this category.";
                    }
                }
                ?>
            </div>

        </div>
    </section>
    <?php include 'footer.php';?>

</body>
</html>