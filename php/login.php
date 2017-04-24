<?php
session_start();
if (isset($_SESSION['message'])) {
    echo "<h3>" . $_SESSION['message'] . "</h3>";
    unset($_SESSION['message']);
}
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Simple CMS</title>
    <link href="../css/main.css" rel="stylesheet">
  </head>
  <body>
    <h1>Simple CMS</h1>
    <div class="content">
        <fieldset>
            <form action="loginSubmit.php" method="POST">
                <h3>Please login to continue</h3>
                <p>
                    <label>Username: </label>
                    <input type="text" name="username" maxlength="20" />
                </p>
                <p>
                    <label>Password: </label>
                    <input type="password" name="pwd" maxlength="20" />
                </p>
                <p>
                    <input type="submit" value="Go!" />
                </p>
                <p><a href="./signup.php">New User?</a></p>
            </form>
        </fieldset>
    </div>
  </body>
</html>
