<?php
require_once 'class/class.bookmarks.php';
require_once 'inc.controller.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bookmark Items</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/app.css">
  <script src="/js/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
</head>
  <body>
  <div class="container">
    <div class="header">
      <h1>Firefox Bookmarks</h1>
      <span>Version 1.0</span>
    </div>
    <div class="row">
      <!-- Bookmark Menu -->
      <div class="col-md-6">
          <h2>APNIC Bookmarks</h2>
            <table class='table'>
            <?php
            foreach ($bookmark_menu as $bmKey => $bmVal) {
              echo "<tr>
                      <td>".$bmVal['data']."</td>
                    </tr>";
            }
            ?>
            </table>
      </div>

      <!--Other bookmark -->
      <div class="col-md-6">
        <h2>Other Bookmarks</h2>
          <table class='table'>
            <?php
            foreach ($other_bookmark as $bmKey => $bmVal) {
              echo "<tr>
                      <td>".$bmVal['data']."</td>
                    </tr>";
            }
            ?>
            </table>
      </div>
    </div>

    <div class="row">
      <!-- WebDevStudy Bookmark -->
      <div class="col-md-6">
          <h2>WebDevStudy</h2>
            <table class='table'>
            <?php
            foreach ($webdevstudy_bookmark as $bmKey => $bmVal) {
              echo "<tr>
                      <td>".$bmVal['data']."</td>
                    </tr>";
            }
            ?>
            </table>
      </div>

      <!--Damber Bookmark -->
      <div class="col-md-6">
        <h2>Damber</h2>
          <table class='table'>
            <?php
            foreach ($damber_bookmark as $bmKey => $bmVal) {
              echo "<tr>
                      <td>".$bmVal['data']."</td>
                    </tr>";
            }
            ?>
            </table>
      </div>
    </div>

    <div>
        To update the bookmark list manually, run below command <br />
        <i style="color:red;">bash /Users/damber/Sites/damber/firefox_bookmarks/build/generate_bookmark.sh<i>
    </div>
    <div class="footer">
      <hr>
      &copy; 2017 WebGautam
      <hr>
    </div>

  </div> <!-- End .container-->
</body>
</html>
