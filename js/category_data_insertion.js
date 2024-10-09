$(document).ready(function () {
  $("#rateBtn").click(function () {
    var wl_mgmt = $("input[name='wl_mgmt']:checked").val();
    var anxiety = $("input[name='anxiety']:checked").val();
    var happiness = $("input[name='happiness']:checked").val();
    $.post(
      "../api/category_data_insertion.php",
      {
        wl_mgmt: wl_mgmt,
        anxiety: anxiety,
        happiness: happiness,
      },
      function (data) {
        console.log(data);

        if (data === "Successfully Updated") {
          $("#rateResult").html("Successfully Updated");
          location.reload();
        } else {
          $("#rateResult").html(
            "<h5 class='text-danger'>Please Rate or Differnet Rating Than before</h5>"
          );
        }
      }
    );
  });
});
