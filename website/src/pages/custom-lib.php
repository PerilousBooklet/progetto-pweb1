<?php

// Funzione di apertura verso il database
function database_connection(string $Database)
{
	database_connection_v2();
}

//                           ↓ ultrakill reference
function database_connection_v2()
{
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


function table_gen(string $tabella)
{

	if (empty($_POST)) {
		print_no_search($tabella, true);
	} else {
		print_no_search($tabella, false);
	}

	return;
}

function print_yes_search(string $tabella)
{

	$sql_starter = "SELECT * FROM $tabella WHERE";

	switch ($tabella) {
		case 'Comune':
			$sql = "$sql_starter `nome` LIKE :nome AND `codice` LIKE :codice AND `provincia` LIKE :provincia";
			break;
		case 'Autostrada':
			$sql = "$sql_starter `cod_naz` LIKE :cod_naz AND `cod_eu` LIKE :cod_eu AND `nome` LIKE :nome AND `lunghezza` LIKE :lunghezza";
			break;
		case 'Casello':

			if (isset($_POST["is_automatico"]) && $_POST["is_automatico"] == "0") {
				$sql = "$sql_starter `cod_naz` LIKE :cod_naz AND `comune` LIKE :comune AND `nome` LIKE :nome AND `x` LIKE :x AND `y` LIKE :y AND `is_automatico` LIKE :is_automatico AND `data_automazione` IS NULL AND `codice` LIKE :codice";
			} else if (isset($_POST["is_automatico"]) && $_POST["is_automatico"] == "1") {
				$sql = "$sql_starter `cod_naz` LIKE :cod_naz AND `comune` LIKE :comune AND `nome` LIKE :nome AND `x` LIKE :x AND `y` LIKE :y AND `is_automatico` LIKE :is_automatico AND `data_automazione` LIKE :data_automazione AND `codice` LIKE :codice";
			} else {
				$sql = "$sql_starter `cod_naz` LIKE :cod_naz AND `comune` LIKE :comune AND `nome` LIKE :nome AND `x` LIKE :x AND `y` LIKE :y AND `is_automatico` LIKE :is_automatico AND `codice` LIKE :codice";
			}
			break;
		default:
			return;
	}

	return $sql;
}

function print_no_search(string $tabella, bool $is_search)
{
	// NON TOCCARE A MENO CHE NON SAI COSA STAI FACENDO
	$tabella_regione = array("sigla", "regione");
	$visualizza_regione = array("Sigla", "Regione");

	$tabella_provincia = array("sigla", "regione", "nome");
	$visualizza_provincia = array("Sigla", "Regione", "Nome");

	$tabella_comune = array("codice", "provincia", "nome");
	$visualizza_comune = array("Codice", "Provincia", "Nome");

	$tabella_autostrada = array("cod_naz", "cod_eu", "nome", "lunghezza");
	$visualizza_autostrada = array("Codice Autostrada", "Codice Europeo", "Nome", "Lunghezza");

	$tabella_casello = array("codice", "cod_naz", "comune", "nome", "x", "y", "is_automatico", "data_automazione");
	$visualizza_casello = array("Codice", "Codice Autostrada", "Codice Comune", "Nome", "Coord. X", "Coord. Y", "Automatico", "Data automazione");


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
			$tatruebella_default = $tabella_autostrada;
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
	$conn = database_connection_v2();
	// Query di recupero dati dal db

	if (!$is_search) {
		$sql = print_yes_search($tabella);
		$stmt = $conn->prepare($sql);

		$data_array = $_POST;

		if (isset($data_array["is_automatico"]) && ($data_array["is_automatico"] == "0" || $data_array["is_automatico"] == "")) {
			unset($data_array["data_automazione"]);
		}
		foreach ($data_array as &$value) {
			$value = "%$value%";
		}

		$stmt->execute($data_array);
	} else {
		$sql = "SELECT * FROM `$tabella`";
		$stmt = $conn->query($sql);
	}

	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if (empty(array_filter($result))) {
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
		echo "<tr class='rs-row'>";
		echo "<td class='rs-data'>" . $row["codice"] . "</td>";
		echo "<td class='rs-data'>" . $row["nome"] . "</td>";
		echo "</tr>";
	}
}

function while_provincia($result)
{
	foreach ($result as $row) {
		echo "<tr class='rs-row'>";
		echo "<td class='rs-data'>" . $row["sigla"] . "</td>";
		echo "<td class='rs-data'>" . $row["regione"] . "</td>";
		echo "<td class='rs-data'>" . $row["nome"] . "</td>";
		echo "</tr>";
	}
}

function while_comune($result)
{
	foreach ($result as $row) {
		echo "<tr class='rs-row'>";
		echo "<td class='rs-data'>" . $row["codice"] . "</td>";
		echo "<td class='rs-data'>" . $row["provincia"] . "</td>";
		echo "<td class='rs-data'>" . $row["nome"] . "</td>";
		echo "</tr>";
	}
}

function while_autostrada($result)
{
	foreach ($result as $row) {
		echo "<tr class='rs-row'>";
		echo "<td class='rs-data'>" . $row["cod_naz"] . "</td>";
		echo "<td class='rs-data'>" . $row["cod_eu"] . "</td>";
		echo "<td class='rs-data'>" . $row["nome"] . "</td>";
		echo "<td class='rs-data'>" . $row["lunghezza"] . "</td>";
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

		echo "<tr class='rs-row'>";
		echo "<td class='rs-data'>" . $row["codice"] . "</td>";
		echo "<td class='rs-data'>" . $row["cod_naz"] . "</td>";
		echo "<td class='rs-data'>" . $row["comune"] . "</td>";
		echo "<td class='rs-data'>" . $row["nome"] . "</td>";
		echo "<td class='rs-data'>" . $row["x"] . "</td>";
		echo "<td class='rs-data'>" . $row["y"] . "</td>";
		echo "<td class='rs-data'>" . $row["is_automatico"] . "</td>";
		echo "<td class='rs-data'>" . $row["data_automazione"] . "</td>";
		echo "</tr>";
	}
}

//
// Funzioni CRUD
//

function api()
{

	$jeson = file_get_contents("php://input");

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
		case 'rm':
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
function rimozione(string $tabella, array $data_array)
{

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
function aggiornamento(string $tabella, array $data_array)
{

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
function inserimento(string $tabella, array $data_array)
{

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

	$stmt = $conn->prepare($sql);

	$stmt->execute($data_array);

	$stmt = null;
	$conn = null;

	return;
}

function dropdown_generate(){

	$sql = "SELECT sigla FROM `Provincia`";

	// Apertura connessione verso il database
	$conn = database_connection_v2();
	// Query di recupero dati dal db

	$stmt = $conn->query($sql);

	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	echo "<option value=''></option>";

	foreach($result as $row) {
		echo "<option value='" . $row["sigla"] . "'>" . $row["sigla"] ."</option>";
	}

	// Chuido la connessione con il db
	$stmt = null;
	$conn = null;

	return;
}


?>