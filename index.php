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
            <div class="menu_cat">
            <?php
                $sql = "SELECT * FROM category";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    // Output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        $cat_id = $row["id"];
                        $cat_name = $row["name"];
                        $cat_description = $row["description"];
                        $cat_image = $row["image"];
                ?>
                        <div class="cat_item">
                            <a href="single_menu.php?menu=<?php echo strtolower(str_replace(' ', '_', $cat_id)); ?>" class="card">
                                <div class="cat_image"><img src="img/cat/<?php echo $cat_image; ?>" alt="<?php echo $cat_name; ?>"></div>
                                <div class="details">
                                    <div class="cat_sub_details">
                                        <div class="title"><?php echo $cat_name; ?></div>
                                        <div class="cat_description"><?php echo $cat_description; ?></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                <?php
                    }
                }
                ?>

            </div>
        </div>
    </section>
    <?php include 'footer.php';?>
</body>
</html>