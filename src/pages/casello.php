<!DOCTYPE html>

<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Casello</title>
    <link rel="stylesheet" href="../css/style.css">
    </link>
    <script src="../js/script.js"></script>
</head>

<body>

    <?php
    include 'header.html';
    include 'nav.html';
    ?>

    <main id="row">
        <!-- Form Menu -->
        <div id="filterPanel" class="roundedElement">
            <div id="nomeCasello">
                <label for="nomeCasello">Nome Casello</label>
                <br>
                <input type="text">
            </div>

            <br>

            <div id="coordinataX">
                <label for="coordinataX">Coordinata X</label>
                <br>
                <input type="text">
            </div>

            <br>

            <div id="CoordinataY">
                <label for="CoordinataY">Coordinata Y</label>
                <br>
                <input type="text">
            </div>

            <br>

            <div id="codiceCasello">
                <label for="codiceCasello">Codice Casello</label>
                <br>
                <input type="text">
            </div>

            <br>

            <div id="ComuneCasello">
                <label for="comuneCasello">Comune Casello</label>
                <br>
                <input type="text">
            </div>

            <br>

            <div id="tipoCasello">
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

        <div id="queryResult" class="roundedElement">
            <h1>Placeholder</h1>
        </div>

    </main>

    <?php
    include 'footer.html';
    ?>

</body>

</html>