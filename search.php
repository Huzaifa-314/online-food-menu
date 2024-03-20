<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

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

// Check if query parameter is provided
if (isset($_GET['query'])) {
    $search_query = $_GET['query'];

    // Prepare SQL statement to search through recipe title, recipe description, and item title
    $sql = "SELECT recipe.*, item.name AS item_name FROM recipe
            LEFT JOIN item ON recipe.item_id = item.id
            WHERE recipe.title LIKE '%$search_query%' 
            OR recipe.description LIKE '%$search_query%'
            OR item.name LIKE '%$search_query%'";

    // Execute SQL statement
    $result = mysqli_query($conn, $sql);

    // Include header
    include 'header.php';

    echo '<section class="container">';
    
    if (mysqli_num_rows($result) > 0) {
        // Output data of each recipe
        while ($row = mysqli_fetch_assoc($result)) {
            $recipe_title = $row["title"];
            $recipe_description = $row["description"];
            $item_name = $row["item_name"];
            $recipe_image = $row["image"];
            ?>
            <div class="recipe_item">
                <div class="recipe_title">Recipe Title: <?php echo $recipe_title; ?></div>
                <div class="item_name">Item: <?php echo $item_name; ?></div>
                <div class="recipe_image"><img src="<?php echo $recipe_image; ?>" alt="<?php echo $recipe_title; ?>"></div>
                <div class="recipe_description">Description: <?php echo $recipe_description; ?></div>
            </div>
            <?php
        }
    } else {
        echo "No results found.";
    }

    echo '</section>';

    // Include footer
    include 'footer.php';
} else {
    // No search query provided
    echo "No search query provided.";
}

// Close connection
mysqli_close($conn);
?>

</body>
</html>
