<?php

require('session.php');
require('SQLFunctions.php');
session_start();

$id = $_POST['Nav_ID'];
$displayorder = $_POST['Display_Order'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Simple CMS</title>
    <link href="../css/main.css" rel="stylesheet">
  </head>
  <body>
    <h1 class="center_text">Site Configuration</h1>
    <div class="content">

      <?php
      try {
        $link = connectDB();
        $sql = "SELECT * FROM Content WHERE Content_ID = '" . $id . "';";
        if ($result = mysqli_query($link, $sql)) {
          while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <form action="contentEditUpdate.php" method="POST">
              <input type="hidden" name="Content_ID" value="<?= $id; ?>" />
              Title: <input type="text" name="Content" value="<?= $row['ContentTitle'] ?>" /> <br>
              Display Order: <input type="text" name="Display_Order" value=" <?= $row['Display_Order']; ?>" width="75" /> <br>
              <textarea name="Content" cols="150" rows="20"><?= $row['Content'] ?></textarea>
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
