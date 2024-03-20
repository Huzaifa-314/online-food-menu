<?php include 'header.php'; ?>
<?php

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect user to login page
    header("Location: login.php");
    exit;
}

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form submission
    $item_id = $_POST['item_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    // File upload handling
    $target_dir = "img/recipe/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, there was an error uploading your file.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Insert the recipe into the database
            $insert_sql = "INSERT INTO recipe (item_id, title, image, description) VALUES ('$item_id', '$title', '$target_file', '$description')";

            if (mysqli_query($conn, $insert_sql)) {
                // Recipe added successfully
                // Get the ID of the newly inserted recipe
                $recipe_id = mysqli_insert_id($conn);
                // Redirect to the recipe details page with the item parameter set to the item_id of the recipe
                header("Location: recipe.php?item=$item_id");
                exit;
            } else {
                echo "Error: " . $insert_sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Menu</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="add-recipe-style.css">
</head>
<body>

    <section class="food_menu">
        <div class="menu_container">
            <div class="menu">
                <form method="POST" enctype="multipart/form-data" class="add-recipe-form">
                    <h2>Add Recipe</h2>
                    <select name="item_id">
                        <option value="">Select Item</option>
                        <?php
                        // Fetch items from the database
                        $item_sql = "SELECT * FROM item";
                        $item_result = mysqli_query($conn, $item_sql);
                        while ($item_row = mysqli_fetch_assoc($item_result)) {
                            $item_id = $item_row['id'];
                            $item_name = $item_row['name'];
                            echo "<option value='$item_id'>$item_name</option>";
                        }
                        ?>
                    </select><br>
                    <input type="text" name="title" placeholder="Recipe Title" required><br>
                    <input type="file" name="image" accept="image/*" required><br>
                    <textarea name="description" placeholder="Recipe Description" required></textarea><br>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

</body>
</html>
