<!DOCTYPE html>

<html lang="it">

<head>
		eta charset="UTF-8">
		eta name="viewport" content="width=device-width, initial-scale=1.0">
		itle>Database Autostrada</title>

		ink rel="stylesheet" href="../css/style.css" />

		-- Fonts -->
		ink rel="preconnect" href="https://fonts.googleapis.com">
		ink rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		ink href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap"
				"stylesheet">
		ink href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&display=swap" rel="stylesheet">

		-- Icons -->
		ink rel="icon" href="../icons/road.png" type="image/x-icon" />
</head>

<body>

		php
		clude 'custom-lib.php';
		clude 'header.html';
		clude 'nav.html';
		

		ain id="row">
				 Form Menu -->
				 id="filterPanel" class="roundedElement">

						d="filterPanelOptions">
								"codiceNazione">
										="codiceNazione">Codice Nazione</label>
										
										e="text" class="filterOptions">
								

								

								"codiceEuropeoAutostrada">
										="codiceEuropeo">Codice Europeo</label>
										
										e="text" class="filterOptions">
								

								

								"nomeAutostrada">
										="nomeAutostrada">Nome Autostrada</label>
										
										e="text" class="filterOptions">
								

								

								"lunghezzaAutostrada">
										="lunghezzaAutostrada">Lunghezza Autostrada</label>
										
										e="text" class="filterOptions">
								
						
						
						e 'submitButton.html';
						
				v>

				 id="queryResult" class="roundedElement">
						
						e 'mockUpTable.php';
						le_gen("Autostrada");
						
				v>

		</main>

		<?php
		include 'footer.html';
		?>

</body>

</html>