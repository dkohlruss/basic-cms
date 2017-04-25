<?php
require('./admin/SQLFunctions.php');

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
    <title><?= $siteTitle; ?></title>
    <link href="./css/main.css" rel="stylesheet">
    <script src="./js/jquery-3.1.1.min.js"></script>
    <script src="https://use.fontawesome.com/6a531f5c2a.js"></script>
    <script src="./js/index.js" async></script>
  </head>
  <body>
    <a href="./admin">Admin Login</a>
    <header class="content">
      <h1 class="title-text"><?= $siteTitle; ?></h1>
      <nav class="navbar">
        <ul class="nav-list">
          <?php
          $sql = "SELECT Nav_Title FROM Nav ORDER BY Display_Order ASC";
          if ($result = mysqli_query($link,$sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
              $arr = explode(' ',trim($row['Nav_Title']));
              ?>
              <li><a href="#<?= $arr[0]; ?>"><?= $row['Nav_Title']; ?></a></li>
              <?php
            }
          } else {
            echo mysqli_error($link);
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
      $sql = "SELECT ContentTitle, Content FROM Content ORDER BY Display_Order ASC";
      if ($result = mysqli_query($link,$sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
          $contentname = explode(' ',trim($row['ContentTitle']));
          ?>
          <div class="content" id="<?= $contentname[0]; ?>">
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
