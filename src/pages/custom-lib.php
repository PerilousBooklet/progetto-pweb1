<?php

// Funzione di apertura verso il database
function mysqli_database(string $Database)
{
	$username = "foglienipw";
	$password = "";
	$Database = "my_foglienipw";
	
	$dsn = "mysql:host=localhost;dbname=$Database;charset=UTF8";

	try {
		$conn = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

		if ($conn) {
			echo "Connected to the $Database database successfully!";
		}
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

	// echo "Connessione riuscita<br>";
	// echo $conn->host_info;

	return $conn;
}


/*
0 = successo
-1 = tabella invalida
-2 = tabella vuota
*/
function table_gen(string $nometabella)
{

	// NON TOCCARE A MENO CHE NON SAI COSA STAI FACENDO
	$tabella_regione = array("sigla", "regione");
	$visualizza_regione = array("Sigla", "Regione");

	$tabella_provincia = array("sigla", "regione", "nome");
	$visualizza_provincia = array("Sigla", "Regione", "Nome");

	$tabella_comune = array("codice", "provincia", "nome");
	$visualizza_comune = array("Codice", "Provincia", "Nome");

	$tabella_autostrada = array("cod_naz", "cod_eu", "nome", "lunghezza");
	$visualizza_autostrada = array("Codice nazionale", "Codice europeo", "Nome", "Lunghezza");

	$tabella_casello = array("codice", "cod_naz", "comune", "nome", "x", "y", "is_automatico", "data_automazione");
	$visualizza_casello = array("Codice", "Codice nazionale", "Comune", "Nome", "x", "y", "Automatico", "Data automazione");


	// Selezione della tabella sulla quale lavorare
	switch ($nometabella) {
		case 'Regione':
			$tabella_default = $tabella_regione;
			$visualizza_default = $visualizza_regione;
			break;
		case 'Provincia':
			$tabella_default = $tabella_provincia;
			$visualizza_default = $visualizza_provincia;
			break;
		case 'Comune':
			$tabella_default = $tabella_comune;
			$visualizza_default = $visualizza_comune;
			break;
		case 'Autostrada':
			$tabella_default = $tabella_autostrada;
			$visualizza_default = $visualizza_autostrada;
			break;
		case 'Casello':
			$tabella_default = $tabella_casello;
			$visualizza_default = $visualizza_casello;
			break;
		default:
			return;
	}

	// Apertura connessione verso il database
	$conn = mysqli_database($nometabella);
	// Query di recupero dati dal db
	$sql = "SELECT * FROM `:$nometabella`";

	$stmt = $conn->query($sql);

	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if(empty(array_filter($result))) {
		echo "Tabella vuota";
		return;
	}

	// INIZIO STAMPA DELLA TABELLA
	echo "<table class=''>";

	// Header della tabella
	echo "<thead class=''>";

	foreach ($visualizza_default as $element) {
		echo "<th>$element</th>";
	}

	echo "</thead>";

	// Stampa delle righe della tabella
	switch ($nometabella) {
		case 'Regione':
			while_regione($result);
			break;
		case 'Provincia':
			while_provincia($result);
			break;
		case 'Comune':
			while_comune($result);
			break;
		case 'Autostrada':
			while_autostrada($result);
			break;
		case 'Casello':
			while_casello($result);
			break;
		default:
			return;
	}
	echo "</table>";

	// Chuido la connessione con il db
	$stmt = null;
	$conn = null;

	return;
}

//
// Funzioni di stampa delle righe
// Non aggiungere niente sotto queste funzioni
//
function while_regione($result)
{
	foreach ($result as $row) {
		echo "<tr>";
		echo "<td>" . $row["codice"] . "</td>";
		echo "<td>" . $row["nome"] . "</td>";
		echo "</tr>";
	}
}

function while_provincia($result)
{
	foreach ($result as $row) {
		echo "<tr>";
		echo "<td>" . $row["sigla"] . "</td>";
		echo "<td>" . $row["regione"] . "</td>";
		echo "<td>" . $row["nome"] . "</td>";
		echo "</tr>";
	}
}

function while_comune($result)
{
	foreach ($result as $row) {
		echo "<tr>";
		echo "<td>" . $row["codice"] . "</td>";
		echo "<td>" . $row["provincia"] . "</td>";
		echo "<td>" . $row["nome"] . "</td>";
		echo "</tr>";
	}
}

function while_autostrada($result)
{
	foreach ($result as $row) {
		echo "<tr>";
		echo "<td>" . $row["cod_naz"] . "</td>";
		echo "<td>" . $row["cod_eu"] . "</td>";
		echo "<td>" . $row["nome"] . "</td>";
		echo "<td>" . $row["lunghezza"] . "</td>";
		echo "</tr>";
	}
}

function while_casello($result)
{
	foreach ($result as $row) {
		echo "<tr>";
		echo "<td>" . $row["codice"] . "</td>";
		echo "<td>" . $row["cod_naz"] . "</td>";
		echo "<td>" . $row["comune"] . "</td>";
		echo "<td>" . $row["nome"] . "</td>";
		echo "<td>" . $row["x"] . "</td>";
		echo "<td>" . $row["y"] . "</td>";
		echo "<td>" . $row["is_automatico"] . "</td>";
		echo "<td>" . $row["data_automazione"] . "</td>";
		echo "</tr>";
	}
}

?>