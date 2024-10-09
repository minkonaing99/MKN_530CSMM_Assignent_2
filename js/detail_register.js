$(document).ready(function () {
  function checkInputs() {
    if (
      $("#id_num").val().trim() !== "" ||
      $("#birthday").val().trim() !== "" ||
      $("#email").val().trim() !== "" ||
      $("#ph_num").val().trim() !== ""
    ) {
      return true;
    }
    return false;
  }

  $("#id_num, #birthday, #email, #ph_num").on("keyup", function () {
    if (checkInputs()) {
      $("#saveBtn").text("SAVE");
      $("#saveBtn").addClass("btn-primary").removeClass("btn-dark");
    } else {
      $("#saveBtn").text("SKIP");
    }
  });

  $("#saveBtn").click(function () {
    var id_num = $("#id_num").val().trim();
    var birthday = $("#birthday").val().trim();
    var email = $("#email").val().trim();
    var ph_num = $("#ph_num").val().trim();
    var role = $("#role").val().trim();
    var major = $("#major").val().trim();

    $.post(
      "../api/register_details_data_insertion.php",
      {
        id_num: id_num,
        birthday: birthday,
        email: email,
        ph_num: ph_num,
        role: role,
        major: major,
      },
      function (data) {
        if (data === "Record updated successfully") {
          $("#result").text(data);
          $("#result").addClass("text-success, text-center");

          setTimeout(function () {
            window.location.href = "../app/login.php";
          }, 500);
        }
      }
    );
  });
});
