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
              <p>Title: <input type="text" name="ContentTitle" value="<?= $row['ContentTitle'] ?>" /> </p>
              <p>Display Order: <input type="text" name="Display_Order" value=" <?= $displayorder; ?>" width="75" /> </p>
              <p>Content: <br>
                <textarea name="Content" cols="150" rows="20"><?= $row['Content'] ?></textarea></p>
              <p><input type="submit" value="Update" /></p>
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
