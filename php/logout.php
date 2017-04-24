<?php

session_start();
session_unset();
session_destroy();

header('Refresh: 2; URL=./index.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Logout</title>
    </head>
    <body>
        <h1>You have logged out</h1>
    </body>
</html>