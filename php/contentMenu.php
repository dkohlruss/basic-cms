<?php
require('session.php');
require('SQLFunctions.php');
session_start();

$link = connectDB();
$sql = "SELECT Nav_ID, Nav_Title, Display_Order FROM Nav ORDER BY Display_Order, Nav_Title;";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Simple CMS</title>
    <link href="../css/main.css" rel="stylesheet">
  </head>
  <body>
    <h1>Site Configuration</h1>
    <div class="content">
        <?php
        try {
          if ($result = mysqli_query($link, $sql)) {
          while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <form action="contentEdit.php" method="POST">
              <input type="hidden" name="Nav_ID" value="<?= $row['Nav_ID']; ?>" />
              <div><input type="text" name="Display_Order" value="<?= $row['Display_Order'] ?>" /></div>
              <div><input type="text" name="Nav_Title" value="<?= $row['Nav_Title'] ?>" /></div>
              <input type="submit" value="Edit" />
            </form> <?php
          }
        }
      } catch (Exception $e) {
        echo $e;
      }
 ?>
    </div>
  </body>
</html>
