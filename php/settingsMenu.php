<?php

require('session.php');
require('SQLFunctions.php');
session_start();

$link = connectDB();
$sql = "SELECT SiteConfig_ID, ConfigName, ShortTextValue FROM SiteConfig";

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
            if ($result = mysqli_query($link,$sql)) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="config_entry" id="<?= $row['SiteConfig_ID']; ?>">
                        <form action="settingsMenuEdit.php" method="POST">
                            <input type='hidden' name='q' value="<?= $row['SiteConfig_ID']; ?>" />
                            <div class="config_name"><?= $row['ConfigName']; ?></div>
                            <div class="text_value"><input type="text" name="ShortTextValue" value="<?= $row['ShortTextValue']; ?>" /></div>
                            <div class="modify"><input type="submit" value="Edit" /></form> <br>
                            <form action='settingsMenuDelete.php' method = 'POST' /> <input type='hidden' name='q' value="<?= $row['SiteConfig_ID']; ?>" /><input type='Submit' value='Delete'></form>
                            </div>
                    </div>
                    <?php
                }
            }
        ?>
    </div>
    <div class="content">
        <h3>Create New Param</h3>
        <form action="settingsMenuNew.php" method="POST">
            <input type="text" name="ConfigName" />
            <input type="text" name="ShortTextValue" />
            <input type="submit" value="Create" />

        </form>
    </div>
  </body>
</html>
