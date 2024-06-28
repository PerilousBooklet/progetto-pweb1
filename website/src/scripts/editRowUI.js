var codice = "";
var provincia = "";
var nome = "";

document.addEventListener("DOMContentLoaded", function () {
  //edit row
  $(".rs-row").click(function () {
    document.getElementById("editDialog").showModal();

    console.log($("#editDialog"));

    codice = this.childNodes[0].innerText;
    provincia = this.childNodes[1].innerText;
    nome = this.childNodes[2].innerText;

    $("#editDialog")[0].childNodes[3].childNodes[1].childNodes[5].value =
      this.childNodes[1].innerText; //Provincia
    $("#editDialog")[0].childNodes[3].childNodes[3].childNodes[5].value =
      this.childNodes[2].innerText; //Nome

    //nel caso fare un for
  });
});

function rm() {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "http://foglienipw.altervista.org/src/pages/api.php", false);
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.send(
    JSON.stringify({
      operazione: "rm",
      tabella: "Comune",
      ":codice": codice //Codice
    })
  );

  location.reload();
}

function upd() {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "http://foglienipw.altervista.org/src/pages/api.php", false);
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.send(
    JSON.stringify({
      operazione: "upd",
      tabella: "Comune",
      ":codice": codice, //Codice
      ":provincia": document.getElementById("input-provincia-modal").value, //provincia
      ":nome": document.getElementById("input-nome-modal").value //nome
    })
  );

  location.reload();
}

function ins() {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "http://foglienipw.altervista.org/src/pages/api.php", false);
  xhr.setRequestHeader("Content-Type", "application/json");

  console.log(document.getElementById("input-codice-search").value);
  console.log(document.getElementById("input-provincia-search").value);
  console.log(document.getElementById("input-nome-search").value);

  var codice_search = document.getElementById("input-codice-search").value;
  var provincia_search = document.getElementById(
    "input-provincia-search"
  ).value;
  var nome_search = document.getElementById("input-nome-search").value;

  document.cookie = JSON.stringify({
    "codice": codice_search,
    "provincia": provincia_search,
    "nome": nome_search
  });


  xhr.send(
    JSON.stringify({
      operazione: "ins",
      tabella: "Comune",
      ":codice": codice_search, //Codice
      ":provincia": provincia_search, //provincia
      ":nome": nome_search //nome
    })
  );

  location.reload();
}

function search() {
  var codice_search = document.getElementById("input-codice-search").value;
  var provincia_search = document.getElementById(
    "input-provincia-search"
  ).value;
  var nome_search = document.getElementById("input-nome-search").value;

  document.cookie = JSON.stringify({
    "codice": codice_search,
    "provincia": provincia_search,
    "nome": nome_search
  });
}

function populate() {
  document.getElementById("input-codice-search").value = JSON.parse($.cookie('codice'));
  document.getElementById("input-provincia-search").value = JSON.parse($.cookie('provincia'));
  document.getElementById("input-nome-search").value = JSON.parse($.cookie('nome'));
}
