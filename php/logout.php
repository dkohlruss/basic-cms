<?php

session_start();
if (isset($_SESSION['message'])) {
    echo "<h3>" . $_SESSION['message'] . "</h3>";
    unset($_SESSION['message']);
}
session_unset();
session_destroy();

header('Refresh: 1; URL=./index.php');

?>
