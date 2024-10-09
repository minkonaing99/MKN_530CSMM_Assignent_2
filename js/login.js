$(document).ready(function () {
  $(document).on("keydown", function (e) {
    if (e.key === "Enter") {
      e.preventDefault();
      $("#loginBtn").trigger("click");
    }
  });
  $("#loginBtn").click(function () {
    // Clear any previous messages
    $("#response").empty();

    // Retrieve username and password
    var username = $("#username").val().trim();
    var password = $("#password").val().trim();

    // Perform the AJAX POST request
    $.post(
      "../api/login_validate.php",
      {
        username: username,
        password: password,
      },
      function (data) {
        var res = JSON.parse(data);
        console.log(res.status);
        console.log(res.last_page);

        if (res.status === "Login Successful") {
          $("#response").text(res.status);
          $("#response").addClass("text-success").removeClass("text-danger");
          setTimeout(function () {
            if (res.last_page) {
              window.location.replace(res.last_page);
            } else {
              window.location.replace("../app/welcome.php");
            }
          }, 500);
        } else {
          $("#response").text(res.status);
          $("#response").addClass("text-danger").removeClass("text-success");
        }
      }
    );
  });

  $("#togglePassword").on("click", function () {
    var passwordField = $("#password");
    var eyeIcon = $("#eyeIcon");

    if (passwordField.attr("type") === "password") {
      passwordField.attr("type", "text");
      eyeIcon.removeClass("fa-eye").addClass("fa-eye-slash");
    } else {
      passwordField.attr("type", "password");
      eyeIcon.removeClass("fa-eye-slash").addClass("fa-eye");
    }
  });
});
