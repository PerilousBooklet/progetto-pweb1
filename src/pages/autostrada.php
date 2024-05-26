<!DOCTYPE html>

<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Autostrada</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="icon" href="../icons/road.png" type="image/x-icon" />
</head>

<body>

    <?php
    include 'header.html';
    include 'nav.html';
    ?>

    <main id="row">
        <!-- Form Menu -->
        <div id="filterPanel" class="roundedElement">
            <div id="codiceNazione">
                <label for="codiceNazione">Codice Nazione</label>
                <br>
                <input type="text">
            </div>

            <br>

            <div id="codiceEuropeoAutostrada">
                <label for="codiceEuropeo">Codice Europeo</label>
                <br>
                <input type="text">
            </div>

            <br>

            <div id="nomeAutostrada">
                <label for="nomeAutostrada">Nome Autostrada</label>
                <br>
                <input type="text">
            </div>

            <br>

            <div id="lunghezzaAutostrada">
                <label for="lunghezzaAutostrada">Lunghezza Autostrada</label>
                <br>
                <input type="text">
            </div>

        </div>

        <div id="queryResult" class="roundedElement">
            <h1>Placeholder</h1>
        </div>

    </main>

    <?php
    include 'footer.html';
    ?>

</body>

</html>