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

  <div id="wholePage" class="roundedElement">

    <?php
    include 'header.html';
    include 'nav.html';
    include 'footer.html';
    ?>


    <!-- Row -->
    <div id="row">
      <!-- Form Menu -->
      <div id="filterPanel" class="roundedElement">
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

      <!-- Content -->
      <div id="queryResult" class="roundedElement">
        <h1>Qua ci andrà la tabella (anche nelle altre pagine)</h1>
      </div>

    </div>

  </div>

</body>

</html>