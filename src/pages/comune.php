<!DOCTYPE html>

<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Database Comune</title>
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="icon" href="../icons/road.png" type="image/x-icon" />
</head>

<body>

  <?php
  include 'custom-lib.php';
  include 'header.html';
  include 'nav.html';
  ?>

  <!-- Row -->
  <main id="row">
    <!-- Form Menu -->
    <div id="filterPanel" class="roundedElement">
      <div id="filterPanelOptions">
        <div id="codiceComune">
          <label for="codiceComune">Codice Comune</label>
          <br>
          <input type="text">
        </div>

        <br>

        <div id="provinciaComune">
          <label for="provinciaComune">Provincia Comune</label>
          <br>
          <input type="text">
        </div>

        <br>

        <div id="nomeComune">
          <label for="nomeComune">Nome Comune</label>
          <br>
          <input type="text">
        </div>
      </div>

      <div id="submitDiv">
        <input id="submit" type="submit">
      </div>
    </div>

    <!-- Content -->
    <div id="queryResult" class="roundedElement">
      <h2>Risultato:</h2>
      <?php
      table_gen("Autostrada");
      ?>
    </div>

  </main>

  <?php
  include 'footer.html';
  ?>

</body>

</html>