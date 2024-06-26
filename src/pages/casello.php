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

	<!-- Scripts -->
	<script src="../libraries/jquery-3.7.1.min.js"></script>

	<script src="../scripts/editRowUI.js"></script>
</head>

<body>

	<?php
	include 'custom-lib.php';
	include 'modules/header.html';
	include 'modules/nav.html';
	include 'modules/editUICasello.html';
	?>

	<dialog id="editDialog" class="roundedElement">

		<h2>Modifica</h2>

		<form id="updateForm" action="" method="POST">
			<?php
			include 'modules/optionListCasello.html';
			?>

			<div class="filterOption">
				<label for="automatico">Automatico</label>
				<input type="checkbox" name="is_automatico" id="input-automatico" />
			</div>

			<div class="filterOption">
				<label for="data">Data</label>
				<input type="data_automazione" name="data" id="input-data" />
			</div>

			<?php
			include 'modules/editButtons.html';
			?>

		</form>

	</dialog>

	<main id="row">
		<!-- Form Menu -->
		<form class="filterPanel roundedElement">

			<div id="filterPanelOptions">

				<h2>Ricerca</h2>

				<div class="filterOption">

					<label for="IDCasello">ID</label>

					<br />

					<input type="text" placeholder="ID" class="filterInput">

				</div>

				<?php
				include 'modules/optionListCasello.html';
				?>

				<div class="filterOption">

					<label for="tipoCasello">Tipo Casello</label>

					<br />

					<input type="radio" name="casello">

					<label for="presenziato">Presenziato</label>

					<br />

					<input type="radio" name="casello">

					<label for="automatico">Automatico</label>

					<br />

					<input type="radio" name="casello" checked>

					<label for="tutti">Tutti</label>

				</div>

			</div>

			<?php
			include 'modules/searchButtons.html';
			?>

		</form>

		<div id="queryResult" class="roundedElement">
			<?php
			table_gen("Casello");
			// include 'modules/mockUpTable.php';
			?>
		</div>

	</main>

	<?php
	include 'modules/footer.html';
	?>

</body>

</html>