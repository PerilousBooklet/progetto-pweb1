<!DOCTYPE html>

<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Database Home</title>
  <link rel="stylesheet" href="./style.css">
  </link>
</head>

<body>

  <?php
  include 'header.html';
  include 'nav.html';
  include 'footer.html';
  ?>
  
  <!-- Row -->
  <div class="row">
    <!-- Form Menu -->
    <div class="filterPanel">
      <div>
        <h2>Placeholder</h2>
      </div>

      <div>
        <h2>Placeholder</h2>
      </div>

      <div>
        <h2>Placeholder</h2>
      </div>

    </div>

    <!-- Content: Query Output -->
    <?php
      include 'queryOutput.php'
    ?>
  </div>

</body>

</html>
