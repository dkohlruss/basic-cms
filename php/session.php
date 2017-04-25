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
             echo "  <a href='preview.php'>Preview</a> | " ;
             echo "  <a href='index.php'>Home</a> | ";
             echo "  <a href='logout.php'>Log Out</a> | ";
             echo "  <a href='signup.php'>Create User</a> | ";
             echo "  <a href='contentMenu.php'>Content Menu</a> | ";
             echo "  <a href='settingsMenu.php'>Site Config Menu</a>";
             echo "</div>";
             if (isset($_SESSION['message'])) {
                 echo "<h3>" . $_SESSION['message'] . "</h3>";
                 unset($_SESSION['message']);
             }
        }
    }

?>
