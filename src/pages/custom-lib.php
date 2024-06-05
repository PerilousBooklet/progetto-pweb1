<?php

// Funzione di apertura verso il database
function mysqli_database(string $Database)
{
	$username = "foglienipw@localhost";
	$pasword = "";
	//se il sistema è UNIX based, per usare una porta diversa dall 3306 come hostname va inserito l'ip di loopback 127.0.0.1
	$conn = new mysqli("127.0.0.1", $username, $pasword, $Database);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	return $conn;
}

// Funzione di rimozione delle injection, dovrebbe rimuovere la maggior parte delle cose
function remove_injections(string $string)
{
	$t = $string;
	$specChars = array(
		'!' => '',
		'"' => '',
		'&' => '',
		'\'' => '',
		'(' => '',
		')' => '',
		'*' => '',
		'+' => '',
		'/-' => '',
		';' => '',
		'<' => '',
		'=' => '',
		'>' => '',
		'--' => '',
		'\\' => '',
		'_' => '',
		'`' => '',
		'|' => '',
		'/_' => '',
		'#' => '',
		'truncate' => '',
		'delete' => '',
		'update' => ''
	);

	foreach ($specChars as $k => $v) {
		$t = str_ireplace($k, $v, $t);
	}

	return $t;
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
	$visualizza_autostrada = array("Codice nazionale", "Codice europeo", "Nome", "Lunghezzaa");

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
			return -1;
	}

	// Apertura connessione verso il database
	$conn = mysqli_database($nometabella);
	// Query di recupero dati dal db
	$sql = "SELECT * FROM `" . $nometabella . "`";
	// Salvo il risultato della query
	$result = mysqli_query($conn, $sql);
	// Chuido la connessione con il db
	mysqli_close($conn);

	// Controllo se la query è vuota
	if (mysqli_num_rows($result) == 0) {
		echo "La tabella e vuota";
		return -2;
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
			return -1;
	}
	echo "</table>";
}

//
// Funzioni di stampa delle righe
// Non aggiungere niente sotto queste funzioni
//
function while_regione($result)
{
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>" . $row["codice"] . "</td>";
		echo "<td>" . $row["nome"] . "</td>";
		echo "</tr>";
	}
}

function while_provincia($result)
{
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>" . $row["sigla"] . "</td>";
		echo "<td>" . $row["regione"] . "</td>";
		echo "<td>" . $row["nome"] . "</td>";
		echo "</tr>";
	}
}

function while_comune($result)
{
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>" . $row["codice"] . "</td>";
		echo "<td>" . $row["provincia"] . "</td>";
		echo "<td>" . $row["nome"] . "</td>";
		echo "</tr>";
	}
}

function while_autostrada($result)
{
	while ($row = mysqli_fetch_assoc($result)) {
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
	while ($row = mysqli_fetch_assoc($result)) {
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