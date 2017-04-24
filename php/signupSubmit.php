<?php

require('SQLFunctions.php');
session_start();

if (!isset($_POST['username'], $_POST['pwd'])) {
  $message = "Username or password is not filled in.";
} else if (strlen($_POST['username']) > 20) {
  $message = "Usernames must be less than 20 characters.";
} else if (strlen($_POST['username']) < 4) {
  $message = "Usernames must be more than 4 characters.";
} else if (strlen($_POST['pwd']) < 5) {
  $message = "Passwords must be more than 5 characters.";
} else if (strlen($_POST['pwd']) > 40) {
  $message = "Passwords must be less than 40 characters.";
} else if (ctype_alnum($_POST['username']) != true) {
  $message = "Usernames must be alphanumeric.";
} else if (ctype_alnum($_POST['pwd']) != true) {
  $message = "Passwords must be alphanumeric.";
} else {
  $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $pwd = filter_var($_POST['pwd'], FILTER_SANITIZE_STRING);

  $pwd = sha1($pwd);

  try {
    $link = connectDB();
    $sql = "SELECT 1 FROM User_Dfn WHERE username = '" . $username . "';";

    if ($result = mysqli_query($link, $sql)) {
      if (mysqli_num_rows($result) >= 1) {
        $message = 'Username already exists!';
      } else {
          $sql = "INSERT INTO User_Dfn (username, pwd) VALUES ('" . $username . "','" . $pwd . "');";

          if (mysqli_query($link, $sql)) {
              $message = 'User Created!';
          } else {
              echo "Error: " . $sql . "<br>" . $mysqli_error($link);
          }
      }
    }


  } catch(Exception $e) {
    echo "ERROR!";
    echo $e;
  }
  header('Refresh: 2; URL=./index.php');
  mysqli_close($link);

}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>LoginSubmit</title>
    </head>
    <body>
        <p><?php echo $message; ?></p>
    </body>
</html>
