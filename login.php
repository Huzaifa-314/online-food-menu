<?php include 'header.php'; ?>
<?php
// Start session

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

// Check if the user is already logged in, redirect to homepage if true
if (isset($_SESSION['user_id'])) {
    $_SESSION['loggedin'] = true;
    $previous_page = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
    header("Location: $previous_page");
    exit();
}

// Initialize variables
$username = $password = "";
$usernameErr = $passwordErr = "";
$loginErr = "";

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $usernameErr = "Please enter your username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $passwordErr = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Check for errors before attempting login
    if (empty($usernameErr) && empty($passwordErr)) {
        // Prepare SQL statement
        $sql = "SELECT id, username, password FROM users WHERE username = '$username' AND password = '$password'";
        
        // Execute SQL statement
        $result = mysqli_query($conn, $sql);

        // Check if a row is returned
        if (mysqli_num_rows($result) == 1) {
            // Fetch the row
            $row = mysqli_fetch_assoc($result);

            // Set session variables
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["loggedin"] = true;

            // Redirect user to homepage
            header("Location: index.php");
            exit();
        } else {
            $loginErr = "Invalid username or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login-style.css">
</head>
<body>

    
    <div class="login-container">
        <h2>Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($usernameErr)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="error"><?php echo $usernameErr; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($passwordErr)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="error"><?php echo $passwordErr; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p><?php echo $loginErr; ?></p>
        </form>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
