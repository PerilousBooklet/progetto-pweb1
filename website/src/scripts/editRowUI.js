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

    $("#editDialog")[0].childNodes[3].childNodes[1].childNodes[5].value = this.childNodes[1].innerText;  //Provincia
    $("#editDialog")[0].childNodes[3].childNodes[3].childNodes[5].value = this.childNodes[2].innerText;  //Nome

    //nel caso fare un for
  });
});

function rm() {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "http://foglienipw.altervista.org/src/pages/api.php");
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.send(JSON.stringify({
    "operazione":"rm",
    "tabella":"Comune",
    ":codice":codice //Codice
  }));

  location.reload();
}

function upd() {
	var xhr = new XMLHttpRequest();
	xhr.open("POST", "http://foglienipw.altervista.org/src/pages/api.php");
	xhr.setRequestHeader("Content-Type", "application/json");
	xhr.send(JSON.stringify({
	  "operazione":"upd",
	  "tabella":"Comune",
	  ":codice":codice, //Codice
	  ":provincia":document.getElementById("input-provincia").value, //provincia
	  ":nome":document.getElementById("input-nome").value //nome
	}));
  
	location.reload();
  }