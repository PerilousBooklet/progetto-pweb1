<!DOCTYPE html>

<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Casello</title>
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
            <div class="nomeCasello">
                <label for="nomeCasello">Nome Casello</label>
                <br>
                <input type="text">
            </div>

            <br>

            <div class="coordinataX">
                <label for="coordinataX">Coordinata X</label>
                <br>
                <input type="text">
            </div>

            <br>

            <div class="CoordinataY">
                <label for="CoordinataY">Coordinata Y</label>
                <br>
                <input type="text">
            </div>

            <br>

            <div class="codiceCasello">
                <label for="codiceCasello">Codice Casello</label>
                <br>
                <input type="text">
            </div>

            <br>

            <div class="tipoCasello">
                <label for="tipoCasello">Tipo Casello</label>

                <br>

                <input type="radio" name="casello">
                <label for="presenziato">Presenziato</label>

                <br>

                <input type="radio" name="casello">
                <label for="automatico">Automatico</label>

                <br>

                <input type="radio" name="casello" checked>
                <label for="tutti">Tutti</label>
            </div>


        </div>

    </div>

</body>

</html>