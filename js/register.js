$(document).ready(function () {
  function toggleCheckButton() {
    var username = $("#username").val().trim();
    $("#checkBtn").attr("disabled", username.length === 0);
  }

  function resetCheckButton() {
    if (
      $("#checkBtn").hasClass("btn-success") ||
      $("#checkBtn").hasClass("btn-danger")
    ) {
      $("#checkBtn")
        .removeClass("btn-success btn-danger")
        .addClass("btn-secondary");
      $("#checkBtn").text("Check");
      $("#invalid").text("");
      $("#username").removeClass("form-control-plaintext ms4");
      $("#invalid_username").text("");
    }
  }

  $("#username").on("input", function () {
    toggleCheckButton();
    resetCheckButton();
  });

  $("#checkBtn").click(function () {
    var username = $("#username").val();
    $.post(
      "../api/register_username_check.php",
      {
        username: username,
      },
      function (response) {
        var result = JSON.parse(response);
        if (result.exists && result !== "") {
          $("#invalid_username").text("Username already exists");
          $("#checkBtn").removeClass("btn-success").addClass("btn-danger");
          $("#checkBtn").html('<i class="fa-solid fa-xmark"></i>');
          $("#username").addClass("border-alert");
        } else {
          $("#invalid_username").text("");
          $("#username").addClass("form-control-plaintext ms4");
          $("#checkBtn").removeClass("btn-danger").addClass("btn-success");
          $("#checkBtn").html('<i class="fa-solid fa-check"></i>');
        }
      }
    );
  });

  $("#name").on("keyup", function () {
    var name = $("#name").val().toLowerCase().replace(/\s+/g, "");
    $("#username").val(name);
    toggleCheckButton();
    resetCheckButton();
  });

  $("#username, #password, #confirm_password, #name").on("keyup", function () {
    var username = $("#username").val().trim();
    var password = $("#password").val().trim();
    var confirm_password = $("#confirm_password").val().trim();
    var name = $("#name").val().trim();

    if (!username || !password || !confirm_password || !name) {
      $("#invalid").text("All fields are required.");
    } else if (password.length <= 8) {
      $("#password").addClass("border-alert");
      $("#invalid").text("Password must be more than 8 characters.");
    } else if (password !== confirm_password) {
      $("#password,#confirm_password").addClass("border-alert");
      $("#invalid").text("Passwords do not match.");
    } else {
      $("#invalid").text("");
    }
    $("#username, #password, #confirm_password").removeClass("border-alert");
  });

  toggleCheckButton();

  $("#togglePassword").on("click", function () {
    if ($("#password").attr("type") === "password") {
      $("#eyeIcon").removeClass("fa-eye").addClass("fa-eye-slash");
      $("#password").attr("type", "text");
      $("#confirm_password").attr("type", "text");
    } else {
      $("#eyeIcon").removeClass("fa-eye-slash").addClass("fa-eye");
      $("#password").attr("type", "password");
      $("#confirm_password").attr("type", "password");
    }
  });

  $("#registerBtn").click(function (event) {
    event.preventDefault(); // Prevent form submission

    var username = $("#username").val().trim();
    var password = $("#password").val().trim();
    var name = $("#name").val().trim();
    var confirm_password = $("#confirm_password").val().trim();
    // console.log(username);
    // console.log(name);
    // console.log(password);

    $("#username, #password, #confirm_password").removeClass("border-alert");
    $("#invalid").text("").removeClass("border-alert");

    if (!username || !password || !confirm_password || !name) {
      $("#invalid").text("All fields are required.");
      if (!username) {
        $("#username").addClass("border-alert");
      }
      if (!password) {
        $("#password").addClass("border-alert");
      }
      if (!confirm_password) {
        $("#confirm_password").addClass("border-alert");
      }
      if (!name) {
        $("#name").addClass("border-alert");
      }
    } else if (password.length <= 8) {
      $("#invalid").text("Password must be more than 8 characters.");
      $("#password").addClass("border-alert");
    } else if (password !== confirm_password) {
      $("#invalid").text("Passwords do not match.");
      $("#password, #confirm_password").addClass("border-alert");
    } else if (!$("#checkBtn").hasClass("btn-success")) {
      $("#invalid").text("Please check the username availability.");
    } else {
      $.post(
        "../api/register_data_insertion.php",
        {
          username: username,
          name: name,
          password: password,
          confirm_password: confirm_password,
        },
        function (data) {
          $("#invalid").text(data);
          if (data === "New record created successfully") {
            $("#invalid").html(
              "<div class='text-success text-center'>New record created successfully</div>"
            );
            window.location.href = "../app/details_register.php";
          }
        }
      );
    }
  });
});
