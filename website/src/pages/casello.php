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
	include 'modules/header.html';
	include 'modules/nav.html';
	include 'modules/editUICasello.html';
	?>

	<main id="row">
		<!-- Form Menu -->
		<form class="filterPanel roundedElement" action="" method="POST">

			<div id="filterPanelOptions">

				<h2>Ricerca</h2>

				<div class="filterOption">

					<label for="input-id">ID</label>

					<br />

					<input type="text" placeholder="ID" name="codice" class="filterInput" id="input-id">

				</div>

				<div class="filterOption">
					<label for="input-cod_naz">Codice Nazionale</label>
					<br />
					<input type="text" placeholder="codice nazionale" name="cod_naz" id="input-cod_naz"
						class="filterInput" />
				</div>

				<div class="filterOption">
					<label for="input-comune">Nome Comune</label>
					<br />
					<input type="text" placeholder="comune" name="comune" id="input-comune" class="filterInput" />
				</div>

				<div class="filterOption">
					<label for="input-casello">Nome Casello</label>
					<br />
					<input type="text" placeholder="casello" name="nome" id="input-casello" class="filterInput" />
				</div>

				<div class="filterOption">
					<label for="input-c_x">Coordinata X</label>
					<br />
					<input placeholder="coordinata x" name="x" id="input-c_x" class="filterInput" />
				</div>

				<div class="filterOption">
					<label for="input-c_y">Coordinata Y</label>
					<br />
					<input placeholder="coordinata y" name="y" id="input-c_y" class="filterInput" />
				</div>

				<div class="filterOption">

					<label for="tipoCasello">Tipo Casello</label>

					<br />

					<input id="input-auto-false" type="radio" name="is_automatico" value="0">

					<label for="input-auto-false">Presenziato</label>

					<br />

					<input id="input-auto-true" type="radio" name="is_automatico" value="1">

					<label for="input-auto-true">Automatico</label>

					<br />

					<input id="input-auto-null" type="radio" name="is_automatico" value="" checked>

					<label for="input-auto-null">Tutti</label>

				</div>

				<div class="filterOption">
					<label for="input-data">Data</label>
					<input type="date" name="data_automazione" id="input-data" class="filterInput" />
				</div>

			</div>

			<?php
			include 'modules/searchButtons.html';
			?>

		</form>

		<div id="queryResult" class="roundedElement">
			<?php
			// include 'modules/mockUpTable.php';
			table_gen("Casello");
			?>
		</div>

	</main>

	<?php
	include 'modules/footer.html';
	?>

</body>

</html>