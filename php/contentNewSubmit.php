<?php

require('SQLFunctions.php');
require('session.php');
session_start();

$title = $_POST['ContentTitle'];
$content = $_POST['Content'];

try {
  $link = connectDB();
  $sql = "SELECT * FROM Nav ORDER BY Display_Order DESC LIMIT 1;";

  if ($result = mysqli_query($link,$sql)) {
    if (mysqli_num_rows($result) < 1) {
      $order = 1;
    } else {
      while ($row = mysqli_fetch_assoc($result)) {
        $order = $row['Display_Order'] + 1;
      }
    }
  }
} catch (Exception $e) {
  $message = $e;
}

try {
  $navsqlinsert = "INSERT INTO Nav (Nav_Title, Display_Order) VALUES ('" . $title . "','" . $order . "');";
  if (mysqli_query($link,$navsqlinsert)) {
    $navsqlquery = "SELECT 1 FROM Nav ORDER BY Nav_ID DESC;";
    if ($result = mysqli_query($link,$navsqlquery)) {
      while ($row = mysqli_fetch_assoc($result)) {
        $navid = $row['Nav_ID'];
      }
      $contentsql = "INSERT INTO Content (Nav_ID, ContentTitle, Content) VALUES ('" . $navid . "','" . $title . "','" . $content . "');";
      if (mysqli_query($link, $contentsql)) {
        $message = "New record successfully created!";
      }
    }
  }
} catch (Exception $e) {
  $message = $e;
}

$_SESSION['message'] = $message;
header('Location: contentMenu.php');

 ?>
