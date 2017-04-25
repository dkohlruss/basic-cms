<?php

require('SQLFunctions.php');
require('session.php');
session_start();

$title = $_POST['ContentTitle'];
$content = nl2br(addslashes($_POST['Content']));
$id = $_POST['Content_ID'];
$order = $_POST['Display_Order'];

try {
  $link = connectDB();
  $sql = "UPDATE Content SET ContentTitle = '" . $title . "', Content = '" . $content . "', Display_Order = '" . $order . "' WHERE Content_ID = " . $id . ";";

  if (mysqli_query($link,$sql)) {
    $navsql = "UPDATE Nav SET Nav_Title = '" . $title . "', Display_Order = '" . $order . "' WHERE Nav_ID = " . $id . ";";
    if (mysqli_query($link, $navsql)) {
      $message = "Entry successfully updated";
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
