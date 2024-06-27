document.addEventListener("DOMContentLoaded", function () {
  //edit row
  $(".rs-row").click(function () {
    document.getElementById("editDialog").showModal();

    $("#editDialog")[0].childNodes[3][0].value = this.childNodes[1].innerText;
    $("#editDialog")[0].childNodes[3][1].value = this.childNodes[2].innerText;
    //nel caso fare un for
  });
});
