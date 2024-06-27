document.addEventListener("DOMContentLoaded", function () {
  $(".rs-row").click(function () {
    document.getElementById("editDialog").showModal();

    alert(this);
  });
});
