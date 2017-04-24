<?php

require('SQLFunctions.php');
require('session.php');
session_start();

$name = $_POST['ConfigName'];
$value = $_POST['ShortTextValue'];

try {
  $link = connectDB();
  $sql = "SELECT * FROM SiteConfig WHERE ConfigName = '" . $name . "';";

  if ($result = mysqli_query($link,$sql)) {
    if (mysqli_num_rows($result) >= 1) {
      $message = "That setting already exists";
    } else {
      $sql = "INSERT INTO SiteConfig (ConfigName, ShortTextValue) VALUES ('" . $name . "','" . $value . "');";
        if (mysqli_query($link, $sql)) {
            $message = 'Setting Created!';
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli_error($link);
        }
    }
  }
} catch (Exception $e) {
  $message = $e;
}

$_SESSION['message'] = $message;
header('Location: ./settingsMenu.php');
mysqli_close($link);


 ?>
