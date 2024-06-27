<!DOCTYPE html>

<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <link rel="stylesheet" href="../css/style.css" />
  <!-- Fonts -->
  <link rel="stylesheet" href="../css/landingPage.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&display=swap" rel="stylesheet">
  <!-- Icons -->
  <link rel="icon" href="../icons/road.png" type="image/x-icon" />
</head>

<body id="body">
  <nav class="roundedElement" id="landingPageNav">
    <ul>
      <li><a href="comune.php">Comune</a></li>
      <li><a href="casello.php">Casello</a></li>
      <li><a href="autostrada.php">Autostrada</a></li>
    </ul>
  </nav>

  <main>
    <div id="landingPageTitleDiv">
      <h1 id="landingPageTitle" class="kode-mono-title">DATABASE AUTOSTRADE</h1>
    </div>
    <div id="ballDiv">
      <div class="ball"></div>
    </div>
  </main>

  <?php
  include 'modules/footer.html';
  ?>

</body>

</html>