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
</head>

<body>

	<?php
	include 'custom-lib.php';
	include 'modules/header.html';
	include 'modules/nav.html';
	?>

	<main id="row">
		<!-- Form Menu -->
		<form class="filterPanel roundedElement" action="" method="POST">
			<div id="filterPanelOptions">

				<h2>Ricerca</h2>

				<div class="filterOption">
					<label for="input-cod_naz">Codice Nazionale</label>
					<br />
					<input type="text" name="cod_naz" placeholder="codice nazionale" class="filterInput" id="input-cod_naz">
				</div>

				<div class="filterOption">
					<label for="input-cod_eu">Codice Europeo</label>
					<br />
					<input type="text" name="cod_eu" placeholder="codice europeo" class="filterInput" id="input-cod_eu"/>
				</div>

				<div class="filterOption">
					<label for="input-nome">Nome</label>
					<br />
					<input type="text" name="nome" placeholder="nome autostrada" class="filterInput" id="input-nome"/>
				</div>

				<div class="filterOption">
					<label for="input-lunghezza">Lunghezza</label>
					<br />
					<input type="number" name="lunghezza" placeholder="lunghezza autostrada" class="filterInput" id="input-lunghezza" />
				</div>


			</div>

			<?php
			include 'modules/searchButtons.html';
			?>

		</form>

		<div id="queryResult" class="roundedElement">
			<?php
			// include 'modules/mockUpTable.php';
			table_gen("Autostrada");
			?>
		</div>

	</main>

	<?php
	include 'modules/footer.html';
	?>

</body>

</html>