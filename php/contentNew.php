<?php

require('session.php');
require('SQLFunctions.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Simple CMS</title>
    <link href="../css/main.css" rel="stylesheet">
  </head>
  <body>
    <div class="content">
        <h3 class="center_text">Create New Content</h3>
        <form action="contentNewSubmit.php" method="POST">
            <input type="text" name="ContentTitle" width="75" />
            <textarea name="Content" cols="150" rows="20" /> </textarea>
            <input type="submit" value="Create" />
        </form>
    </div>
  </body>
</html>
