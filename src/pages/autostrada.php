<!DOCTYPE html>

<html lang="it">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Database Autostrada</title>

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
	?>

	<dialog id="editDialog" class="roundedElement">

		<h2>Modifica</h2>

		<form id="updateForm">

			<?php
			include 'modules/optionListAutostrada.html';
			?>

			<?php
			include 'modules/editButtons.html';
			?>

		</form>

	</dialog>

	<main id="row">
		<!-- Form Menu -->
		<form class="filterPanel roundedElement" action="" method="POST">
			<div id="filterPanelOptions">

				<h2>Ricerca</h2>

				<div class="filterOption">
					<label for="codiceNazione">Codice Nazione</label>
					<br />
					<input type="text" name="codiceNazione" placeholder="ID nazione" class="filterInput">
				</div>

				<?php
				include 'modules/optionListAutostrada.html';
				?>

			</div>

			<?php
			include 'modules/searchButtons.html';
			?>

		</form>

		<div id="queryResult" class="roundedElement">
			<?php
			table_gen("Autostrada");
			// include 'modules/mockUpTable.php';
			?>
		</div>

	</main>

	<?php
	include 'modules/footer.html';
	?>

</body>

</html>