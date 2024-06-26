<?php

// Funzione di apertura verso il database
function database_connection(string $Database)
{
	database_connection_v2();
}

function database_connection_v2() {
	$username = "foglienipw";
	$password = "";
	$Database = "my_foglienipw";
	$host = "localhost";
	
	$dsn = "mysql:host=$host;dbname=$Database;charset=UTF8";

	try {
		$conn = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

		if ($conn) {
			//echo "Connected to the $Database database successfully!";
		}
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

	return $conn;
}

/*
0 = successo
-1 = tabella invalida
-2 = tabella vuota
*/
function table_gen(string $tabella)
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
	switch ($tabella) {
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
	$conn = database_connection_v2($tabella);
	// Query di recupero dati dal db
	$sql = "SELECT * FROM `$tabella`";

	$stmt = $conn->query($sql);

	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if(empty(array_filter($result))) {
		echo "Tabella vuota";
		return;
	}

	// INIZIO STAMPA DELLA TABELLA
	echo "<table class=''>";

	// Header della tabella
	echo "<thead class='rs-head'>";

	foreach ($visualizza_default as $element) {
		echo "<th class='rs-header'>$element</th>";
	}

	echo "</thead>";

	// Stampa delle righe della tabella
	switch ($tabella) {
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
		echo "<tr class'rs-row'>";
		echo "<td class'rs-data'>" . $row["codice"] . "</td>";
		echo "<td class'rs-data'>" . $row["nome"] . "</td>";
		echo "</tr>";
	}
}

function while_provincia($result)
{
	foreach ($result as $row) {
		echo "<tr class'rs-row'>";
		echo "<td class'rs-data'>" . $row["sigla"] . "</td>";
		echo "<td class'rs-data'>" . $row["regione"] . "</td>";
		echo "<td class'rs-data'>" . $row["nome"] . "</td>";
		echo "</tr>";
	}
}

function while_comune($result)
{
	foreach ($result as $row) {
		echo "<tr class'rs-row'>";
		echo "<td class'rs-data'>" . $row["codice"] . "</td>";
		echo "<td class'rs-data'>" . $row["provincia"] . "</td>";
		echo "<td class'rs-data'>" . $row["nome"] . "</td>";
		echo "</tr>";
	}
}

function while_autostrada($result)
{
	foreach ($result as $row) {
		echo "<tr class'rs-row'>";
		echo "<td class'rs-data'>" . $row["cod_naz"] . "</td>";
		echo "<td class'rs-data'>" . $row["cod_eu"] . "</td>";
		echo "<td class'rs-data'>" . $row["nome"] . "</td>";
		echo "<td class'rs-data'>" . $row["lunghezza"] . "</td>";
		echo "</tr>";
	}
}

function while_casello($result)
{
	foreach ($result as $row) {

		if ($row["is_automatico"] == 0) {
			$row["is_automatico"] = "No";
		} else {
			$row["is_automatico"] = "Si";
		}

		echo "<tr class'rs-row'>";
		echo "<td class'rs-data'>" . $row["codice"] . "</td>";
		echo "<td class'rs-data'>" . $row["cod_naz"] . "</td>";
		echo "<td class'rs-data'>" . $row["comune"] . "</td>";
		echo "<td class'rs-data'>" . $row["nome"] . "</td>";
		echo "<td class'rs-data'>" . $row["x"] . "</td>";
		echo "<td class'rs-data'>" . $row["y"] . "</td>";
		echo "<td class'rs-data'>" . $row["is_automatico"] . "</td>";
		echo "<td class'rs-data'>" . $row["data_automazione"] . "</td>";
		echo "</tr>";
	}
}

//
// Funzioni CRUD
//

function api(String $jeson) {
	$jeson_decoded = json_decode($jeson, true);

	$tabella = $jeson_decoded["tabella"];

	$lista_tabelle = ["Casello", "Comune", "Autostrada"];

	if (!in_array($tabella, $lista_tabelle)) {
		return;
	}

	unset($jeson_decoded["tabella"]);

	$operazione = $jeson_decoded["operazione"];
	unset($jeson_decoded["operazione"]);

	switch ($operazione) {
		case 'del':
			rimozione($tabella, $jeson_decoded);
			break;
		case 'upd':
			aggiornamento($tabella, $jeson_decoded);
			break;
		case 'ins':
			inserimento($tabella, $jeson_decoded);
			break;
		default:
			return;
	}

	
}

// RIMOZIONE
function rimozione(String $tabella, Array $data_array) {

	$sql_starter = "DELETE FROM $tabella WHERE";

	switch ($tabella) {
		case 'Comune':
			$sql = "$sql_starter `codice` = :codice";
			break;
		case 'Autostrada':
			$sql = "$sql_starter `cod_naz` = :cod_naz";
			break;
		case 'Casello':
			$sql = "$sql_starter `codice` = :codice";
			break;
		default:
			return;
	}

	// Esecuzione query
	$conn = database_connection_v2();

	$stmt = $conn->prepare($sql);

	$stmt->execute($data_array);

	$stmt = null;
	$conn = null;

	return;
}

// AGGIORNAMENTO
function aggiornamento(String $tabella, Array $data_array) {

	$sql_starter = "UPDATE `$tabella` SET";

	switch ($tabella) {
		case 'Comune':
			$sql = "$sql_starter `provincia` = :provincia, `nome` = :nome WHERE `codice` = :codice";
			break;
		case 'Autostrada':
			$sql = "$sql_starter `cod_eu` = :cod_eu, `nome` = :nome, `lunghezza` = :lunghezza WHERE `cod_naz` = :cod_naz";
			break;
		case 'Casello':
			$sql = "$sql_starter `cod_naz` = :cod_naz, `comune` = :comune, `nome` = :nome, `x` = :x, `y` = :y, `is_automatico` = :is_automatico, `data_automazione` = :data_automazione WHERE `codice` = :codice";
			break;
		default:
			return;
	}

	// Esecuzione query
	$conn = database_connection_v2();

	$stmt = $conn->prepare($sql);

	$stmt->execute($data_array);

	$stmt = null;
	$conn = null;

	return;
}

// INSERIMENTO
function inserimento(String $tabella, Array $data_array) {

	$sql_starter = "INSERT INTO $tabella";

	switch ($tabella) {
		case 'Comune':
			$sql = "$sql_starter (`codice`, `provincia`, `nome`) VALUES (:codice, :provincia, :nome)";
			break;
		case 'Autostrada':
			$sql = "$sql_starter (`cod_naz`, `cod_eu`, `nome`, `lunghezza`) VALUES (:cod_naz, :cod_eu, :nome, :lunghezza)";
			break;
		case 'Casello':
			$sql = "$sql_starter (`codice`, `cod_naz`, `comune`, `nome`, `x`, `y`, `is_automatico`, `data_automazione`) VALUES (:codice, :cod_naz, :comune, :nome, :x, :y, :is_automatico, :data_automazione)";
			break;
		default:
			return;
	}

	// Esecuzione query
	$conn = database_connection_v2();

	echo "$sql<br/>";

	$stmt = $conn->prepare($sql);

	$stmt->execute($data_array);

	$stmt = null;
	$conn = null;

	return;
}


?>