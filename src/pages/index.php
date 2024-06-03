<!DOCTYPE html>

<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/landingPage.css" />
  <link rel="icon" href="../icons/road.png" type="image/x-icon" />
</head>

<body id="body">

  <div id="landingPageTitleMain">
    <nav class="roundedElement" id="landingPageNav">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="comune.php">Comune</a></li>
        <li><a href="casello.php">Casello</a></li>
        <li><a href="autostrada.php">Autostrada</a></li>
      </ul>
    </nav>

    <div id="landingPageTitleDiv">
      <div id="landingPageTitleInnerDiv">
        <h1 id="landingPageTitle">DATABASE AUTOSTRADE</h1>
        <!-- <h1 id="landingPageTitleShadow">DATABASE AUTOSTRADE</h1> -->
      </div>
      <div>
        <div class="ball"></div>
      </div>
    </div>




  </div>

  <?php
  include 'footer.html';
  ?>

</body>

</html>