<?php


require('SQLFunctions.php');
session_start();

$id = $_POST['q'];
$value = $_POST['ShortTextValue'];

try {
  $link = connectDB();
  $sql = "UPDATE SitConfig SET ShortTextValue = '" . $value . "' WHERE SiteConfig_ID = " . $id . ";";

  if (mysqli_query($link,$sql)) {
    $message = "Record updated successfully";
  }


} catch (Exception $e) {
  $message = $e;
}

$_SESSION['message'] = $message;
header('Location: ./index.php');
mysqli_close($link);

 ?>
