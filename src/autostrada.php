<!DOCTYPE html>

<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Autostrada</title>
    <link rel="stylesheet" href="./style.css">
    </link>
</head>

<body>

    <?php
    include 'header.html';
    include 'nav.html';
    include 'footer.html';
    ?>

    <div class="row">
        <!-- Form Menu -->
        <div class="filterPanel">
            <div class="codiceNazione">
                <label for="codiceNazione">Codice Nazione</label>
                <br>
                <input type="text">
            </div>

            <br>

            <div class="codiceEuropeoAutostrada">
                <label for="codiceEuropeo">Codice Europeo</label>
                <br>
                <input type="text">
            </div>

            <br>

            <div class="nomeAutostrada">
                <label for="nomeAutostrada">Nome Autostrada</label>
                <br>
                <input type="text">
            </div>

            <br>

            <div class="lunghezzaAutostrada">
                <label for="lunghezzaAutostrada">Lunghezza Autostrada</label>
                <br>
                <input type="text">
            </div>

        </div>

    </div>

</body>

</html>