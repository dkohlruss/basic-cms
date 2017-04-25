<?php

require('SQLFunctions.php');
require('session.php');
session_start();

$title = addslashes($_POST['ContentTitle']);
$content = addslashes($_POST['Content']);

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
    $navsqlquery = "SELECT * FROM Nav ORDER BY Nav_ID DESC LIMIT 1;";
    if ($result = mysqli_query($link,$navsqlquery)) {
      while ($row = mysqli_fetch_assoc($result)) {
        $navid = $row['Nav_ID'];
      }
      $contentsql = "INSERT INTO Content (Content_ID, Nav_ID, ContentTitle, Content, Display_Order) VALUES ('" . $navid . "','" . $navid . "','" . $title . "','" . $content . "','" . $order . "');";
      if (mysqli_query($link, $contentsql)) {
        $message = "New record successfully created!";
      } else {
        $message = "Problem creating record: " . mysqli_error($link);
      }
    }
  }
} catch (Exception $e) {
  $message = $e;
}

$_SESSION['message'] = $message;
header('Location: contentMenu.php');
mysqli_close($link);

 ?>
