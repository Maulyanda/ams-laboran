$(document).ready(function () {
  var base_url = document.URL;

  if ($("#tbl-loans").length !== 0) {
    var url = base_url + "/data_loans";
    $("#tbl-loans").dataTable({
      dom: "Bfrtip",
      buttons: ["excel"],
      responsive: true,
      ajax: {
        url: url,
        dataSrc: "",
      },
    });
  }
});
