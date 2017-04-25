<?php
require('./php/SQLFunctions.php');

$link = connectDB();
$sql = "SELECT ConfigName, ShortTextValue FROM SiteConfig";

if ($result = mysqli_query($link,$sql)) {
  while ($row = mysqli_fetch_array($result)) {
    ${$row[0]} = $row[1]; // Sets all ConfigName variables
  }
}
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SITENAME PLACEHOLDER</title>
    <link href="./css/main.css" rel="stylesheet">
    <script src="./js/jquery-3.1.1.min.js"></script>
    <script src="https://use.fontawesome.com/6a531f5c2a.js"></script>
    <script src="./js/index.js" async></script>
  </head>
  <body>
    <header class="title-bar">
      <h1 class="title-text"><?= $siteTitle; ?></h1>
      <nav class="navbar">
        <ul class="nav-list">
          <?php
          $sql = "SELECT Nav_Title FROM Content ORDER BY Display_Order DESC";
          if ($result = mysqli_query($link,$sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <li><a href="#<?= $row['Nav_Title']; ?>"><?= $row['Nav_Title']; ?></a></li>
              <?php
            }
          }
           ?>
        </ul>
      </nav>
    </header>
    <div class="socials">
      <a href="https://www.facebook.com/<?= $facebookLink; ?>" target="_blank"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
      <a href="https://www.twitter.com/<?= $twitterLink; ?>" target="_blank"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a>
    </div>
    <section class="row">
      <?php
      $sql = "SELECT ContentTitle, Content FROM Content ORDER BY Display_Order DESC";
      if ($result = mysqli_query($link,$sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <div class="content" name="<?= $row['ContentTitle']; ?>">
            <h3><?= $row['ContentTitle']; ?></h3>
            <p><?= $row['Content']; ?></p>
          </div>
          <?php
        }
      }
       ?>
    </section>
  </body>
  <script src="./js/jquery-3.1.1.min.js"></script>
  <script src="https://use.fontawesome.com/6a531f5c2a.js"></script>
  <script src="./js/index.js" async></script>
</html>
