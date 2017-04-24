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
      $sql = "SELECT User_ID FROM User_Dfn WHERE username = '" . $username . "' AND pwd = '" . $pwd . "';";
      
      if ($result = mysqli_query($link, $sql)) {
          while ($row = mysqli_fetch_assoc($result)) {
              $userid = $row['User_ID'];
              $_SESSION['User_ID'] = $userid;
              $_SESSION['timeout'] = time();
              $message = 'You are now logged in';
              header('Refresh: 2; URL=./index.php');
          }
      } 
      
      if ($userid == false) {
          $message = 'Incorrect username or password';
          header('Refresh: 2; URL=./index.php');
      }
      
  } catch (Exception $e) {
      $message = $e;
  }
  
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