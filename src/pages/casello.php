<!DOCTYPE html>

<html lang="it">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Database Casello</title>

	<link rel="stylesheet" href="../css/style.css" />

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap"
		rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&display=swap" rel="stylesheet">

	<!-- Icons -->
	<link rel="icon" href="../icons/road.png" type="image/x-icon" />
</head>

<body>

	<?php
	include 'custom-lib.php';
	include 'header.html';
	include 'nav.html';
	?>

	<main id="row">
		<!-- Form Menu -->
		<div id="filterPanel" class="roundedElement">
			<div id="filterPanelOptions">
				<div id="nomeCasello">
					<label for="nomeCasello">Nome Casello</label>
					<br>
					<input type="text" class="filterOptions">
				</div>

				<br>

				<div id="coordinataX">
					<label for="coordinataX">Coordinata X</label>
					<br>
					<input type="text" class="filterOptions">
				</div>

				<br>

				<div id="CoordinataY">
					<label for="CoordinataY">Coordinata Y</label>
					<br>
					<input type="text" class="filterOptions">
				</div>

				<br>

				<div id="codiceCasello">
					<label for="codiceCasello">Codice Casello</label>
					<br>
					<input type="text" class="filterOptions">
				</div>

				<br>

				<div id="ComuneCasello">
					<label for="comuneCasello">Comune Casello</label>
					<br>
					<input type="text" class="filterOptions">
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

			<?php
			include 'submitButton.html';
			?>

		</div>

		<div id="queryResult" class="roundedElement">
			<?php
			include 'mockUpTable.php';
			// table_gen("Autostrada");
			?>
		</div>

	</main>

	<?php
	include 'footer.html';
	?>

</body>

</html>