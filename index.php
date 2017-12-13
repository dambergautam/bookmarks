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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/app.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

      <!--Bookmark Tools -->
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


    <!-- Custom boomarks items -->
    <?php
    $columns = 2;
    $size = 12/$columns;
    $counter = 0;
    $total = count($custom_bookmarks);

    foreach($custom_bookmarks as $customVal) {
            
      if($counter%$columns == 0) { echo "<div class='row'>"; }
      
      echo '<div class="col-md-'.$size.'">';

        echo $customVal['title'];
        echo "<table class='table'>";      
        foreach ($customVal['items'] as $item) {
          echo "<tr>
                  <td>".$item['data']."</td>
                </tr>";
        }
        echo "</table>";

      echo '</div>';
      
      if(($counter%$columns == $columns - 1) || ($counter == $total-1)) { echo "</div>"; }
      $counter++;
    }
    ?>  


    <div class="footer">
      <hr>
      &copy; 2017 WebGautam 
      <hr>
    </div>

  </div> <!-- End .container-->


</body>
</html>
