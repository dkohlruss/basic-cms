<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

define('DB_HOST', substr($url["path"], 1)); /*Database Server*/
define('DB_NAME', 'heroku_c0930732318d46a'); /*Database Name*/
define('DB_USER', $url["user"]); /*Database Username*/
define('DB_PWD',  $url["pass"]); /*Database Password*/
?>
