<?php

    session_start();
    echo '<script>console.log(' . $_SESSION . ')</script>';
    if (!isset($_SESSION['User_ID'])) {
        header('Location: login.php');
        exit;
    } else {
        if ($_SESSION['timeout'] + 600 < time()) {
            header('Location: logout.php');
        } else {
            $_SESSION['timeout'] = time();
            echo "<div align='right'>";
             echo "  <a href='AdminIndex.php'>Preview</a>";     
             echo "  <a href='index.php'>Home</a>";
             echo "  <a href='logout.php'>Log Out</a>";
             echo "  <a href='signup.php'>Create User</a>";
             echo "  <a href='EditNavMenu.php'>Navigation Menu</a>";
             echo "  <a href='EditContentMenu.php'>Content Menu</a>";
             echo "  <a href='SiteConfigMenu.php'>Site Config Menu</a>";
             echo "</div>";
        }
    }

?>