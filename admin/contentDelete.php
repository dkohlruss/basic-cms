<?php

require('SQLFunctions.php');
require('session.php');
session_start();

$id = $_POST['Nav_ID'];

try {
  $link = connectDB();
  $sql = "DELETE FROM Content WHERE Content_ID = " . $id . ";";

  if (mysqli_query($link,$sql)) {
    $navsql = "DELETE FROM Nav WHERE Nav_ID = " . $id . ";";
    if (mysqli_query($link, $navsql)) {
      $message = "Entry successfully deleted";
    } else {
      $message = mysqli_error($link);
    }
  } else {
    $message = mysqli_error($link);
  }
} catch (Exception $e) {
  $message = $e;
}

$_SESSION['message'] = $message;
header('Location: ./contentMenu.php');
mysqli_close($link);

?>
