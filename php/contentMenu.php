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
    <h1 class="center_text">Site Configuration</h1>
    <div class="content">
      <a href="contentNew.php">Create new content</a>
      <div class="config_entry">
        <div class="config_name">Order</div>
        <div class="text_value">Title</div>
        <div class="modify">Modify</div>
      </div>
        <?php
        try {
          if ($result = mysqli_query($link, $sql)) {
          while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="config_entry">
              <form action="contentEdit.php" method="POST">
                <input type="hidden" name="Nav_ID" value="<?= $row['Nav_ID']; ?>" />
                <input type="hidden" name="Display_Order" value="<?= $row['Display_Order'] ?>" />
                <div class="config_name"><?= $row['Display_Order'] ?></div>
                <div class="text_value"><?= $row['Nav_Title'] ?></div>
                <div class="modify"><input type="submit" value="Edit" /></div>
              </form>
            </div> <?php
          }
        }
      } catch (Exception $e) {
        echo $e;
      }
 ?>
    </div>
  </body>
</html>
