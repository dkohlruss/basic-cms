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
      <span class="center_text"><a href="contentNew.php">Create new content</a></span>

      <table class="config_entry">
        <tr>
          <td class="config_name">Order</td>
          <td class="text_value">Title</td>
          <td class="modify">Modify</td>
        </tr>
        <?php
        try {
          if ($result = mysqli_query($link, $sql)) {
          while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td class="config_name"><?= $row['Display_Order'] ?></td>
                <td class="text_value"><?= $row['Nav_Title'] ?></td>
                <td class="modify">
                  <form action="contentEdit.php" method="POST">
                    <input type="hidden" name="Nav_ID" value="<?= $row['Nav_ID']; ?>" />
                    <input type="hidden" name="Display_Order" value="<?= $row['Display_Order'] ?>" />
                    <input type="submit" value="Edit" class="btn" />
                  </form>
                  <form action="contentDelete.php" method="POST">
                    <input type="hidden" name="Nav_ID" value="<?= $row['Nav_ID']; ?>" />
                    <input type="submit" value="Delete" class="btn" />
                  </form>
                </td>
            </tr> <?php
          }
        }
      } catch (Exception $e) {
        echo $e;
      }
 ?>
      </table>
    </div>
  </body>
</html>
