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
            <p>
              Title: <input type="text" name="ContentTitle" width="75" />
            </p>
            <p>
              Content: <br>
              <textarea name="Content" cols="150" rows="20" /> </textarea>
            </p>
            <input type="submit" value="Create" />
        </form>
    </div>
  </body>
</html>
