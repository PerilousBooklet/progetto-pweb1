<!DOCTYPE html>

<html lang="it">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Database Comune</title>

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

		<div id="updateForm">

			<div class="filterOption">
				<label for="input-provincia-modal">Provincia</label>
				<br />
				<input id="input-provincia-modal" type="text" name="provincia" placeholder="ID provincia"
					class="filterInput" />
			</div>

			<div class="filterOption">
				<label for="input-nome-modal">Nome</label>
				<br />
				<input id="input-nome-modal" type="text" name="nome" placeholder="nome comune" class="filterInput" />
			</div>


			<?php
			include 'modules/editButtons.html';
			?>

		</div>

	</dialog>

	<!-- Row -->
	<main id="row">
		<!-- Form Menu -->
		<form class="filterPanel roundedElement" action="" method="POST">
			<div id="filterPanelOptions">

				<h2>Ricerca</h2>

				<div class="filterOption">
					<label for="input-codice-search">Codice</label>
					<br />
					<input id="input-codice-search" type="text" name="codice" placeholder="codice comune"
						class="filterInput">
				</div>

				<div class="filterOption">
					<label for="input-provincia-search">Codice Provincia</label>
					<br />
					<select id="input-provincia-search" type="text" name="provincia" class="filterInput">
					</select>
				</div>

				<div class="filterOption">
					<label for="input-nome-search">Nome</label>
					<br />
					<input id="input-nome-search" type="text" name="nome" placeholder="nome comune"
						class="filterInput" />
				</div>


			</div>

			<div id="submitDiv">
				<button id="submitSearchButton" class="button leftButton" type="submit">
					Cerca
				</button>
				<button id="InsertNewRowButton" class="button rightButton" type="button" onclick="ins()">
					Inserisci
				</button>
			</div>
			<div>
				<button id="clearSearchButton" class="button" type="reset">
					Svuota
				</button>
			</div>


		</form>

		<!-- Content -->
		<div id="queryResult" class="roundedElement">
			<?php
			// include 'modules/mockUpTable.php';
			table_gen("Comune");
			?>
		</div>

	</main>

	<?php
	include 'modules/footer.html';
	?>

</body>

</html>