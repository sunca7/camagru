<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camagru</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
<header>
    <a class="header-logo" href="index.php">
        <img src="img/insta.png" alt="logo">
    </a>
    <nav class="nav-header-main">
        <ul class="nav__links">
            <li> <a href="index.php">Home</a></li>
            <li> <a href="#">Contact</a></li>
        </ul>
    </nav>
        <div class="header-login">
        <?php
            if (isset($_SESSION['userId'])) {
                echo '<form action="includes/logout.inc.php" method="post">
                <button type="submit" name="logout-submit">Logout</button>
                </form>';
            } else {
                echo '<form action="/includes/login.inc.php" method="post">
                <input type="text" name="mailuid" value="" placeholder="Username/E-mail...">
                <input type="password" name="pwd" value="" placeholder="Password...">
                <button type="submit" name="login-submit">Login</button>
                </form>
                <a href="signup.php">Signup</a>';
            }
        ?>
        </div>
</header>