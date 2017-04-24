<?php

    include('config.php');

    function connectDB() {
        // mysqli(database host, database username, database pass, database name)
        $link = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME);

        if ($link->connect_error) {
            die('Connection failed: ' . $link->connect_error);
        }

        return $link;
    }

?>
