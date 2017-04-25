<?php

require('SQLFunctions.php');
require('session.php');
session_start();

$title = $_POST['ContentTitle'];
$content = $_POST['Content'];

try {
  $link = connectDB();
  $sql = "SELECT 1 FROM Nav ORDER BY Display_Order;";

  if ($result = mysqli_query($link,$sql)) {
    if (mysqli_num_rows($result) < 1) {
      $order = 1;
    } else {
      while ($row = mysqli_fetch_assoc($result)) {
        $order = $row['Display_Order'] + 1;
      }
    }
    echo $order;
  }
} catch (Exception $e) {
  $message = $e;
}

 ?>
