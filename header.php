<?php
// Start session
session_start();
?>

<header>
    <a href="index.php"><div class="logo">Food Menu</div></a>
    <section style="display: flex;">
        <div class="menu">
            <form action="search.php" method="GET">
                <input type="text" name="query" placeholder="Search...">
                <button type="submit">Search</button>
            </form>
        </div>
        <?php
        // Check if the user is logged in
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            // User is logged in, show logout button
            echo '<div class="menu"><a href="logout.php"><button>Logout</button></a></div>';
        } else {
            // User is not logged in, show login button
            echo '<div class="menu"><a href="login.php"><button>Login</button></a></div>';
        }
        ?>
        <div class="menu"><a href="add_recipe.php"><button>Add recipe</button></a></div>
        <div class="menu"><a href="admin"><button>Admin</button></a></div>
    </section>
</header>
