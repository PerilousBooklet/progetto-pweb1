<!DOCTYPE html>

<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Database Comune</title>
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
      <div class="codiceComune">
        <label for="codiceComune">Placeholder 1</label>
        <br>
        <input type="text">
      </div>

      <br>

      <div class="provinciaComune">
        <label for="provinciaComune">Placeholder 2</label>
        <br>
        <input type="text">
      </div>

      <br>

      <div class="nomeComune">
        <label for="nomeComune">Placeholder 3</label>
        <br>
        <input type="text">
      </div>

    </div>

    <!-- Content: Query Output -->
    <div class="queryResult">
      <h1>Placeholder 4</h1>
    </div>
  </div>

</body>

</html>
