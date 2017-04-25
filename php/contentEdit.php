<?php

require('session.php');
require('SQLFunctions.php');
session_start();

$id = $_POST['Nav_ID'];

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
        $link = connectDB();
        $sql = "SELECT * FROM Content WHERE Content_ID = '" . $id . "';";
        echo "doing the thing...";
        if ($result = mysqli_query($link, $sql)) {
          echo "if did a thing...";
          while ($row = mysqli_fetch_assoc($result)) {
            echo "things being done...";
            ?>
            <form action="contentEditUpdate.php" method="POST">
              <input type="hidden" name="Content_ID" value="<?= $id; ?>" />
              <input type="text" name="ContentTitle" value="<?= $row['ContentTitle'] ?>" />
              <input type="text" name="Content" value="<?= $row['Content'] ?>" />
              <input type="submit" value="Update" />
            </form>
            <?php
          }
        } else {
          echo "There was problem" . mysql_error($link);
        }
      } catch (Exception $e) {
        echo $e;
      }

      ?>
    </div>
  </body>
</html>
