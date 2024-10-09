$(document).ready(function () {
  function checkAverage(avgAnxiety, avgHappiness, avgWorkloadMgmt) {
    if (avgAnxiety < 1.5 || avgHappiness < 1.5 || avgWorkloadMgmt < 1.5) {
      $(".form-popup").show();
    }
  }

  function closeForm() {
    $(".form-popup").hide();
  }
  $.post(
    "../api/category_average_check.php",
    function (response) {
      console.log(response);

      var avgAnxiety = parseFloat(parseFloat(response.avg_anxiety).toFixed(1));
      var avgHappiness = parseFloat(
        parseFloat(response.avg_happiness).toFixed(1)
      );
      var avgWorkloadMgmt = parseFloat(
        parseFloat(response.avg_workload_mgmt).toFixed(1)
      );

      var average = (
        (avgAnxiety + avgHappiness + avgWorkloadMgmt) /
        3.0
      ).toFixed(1);

      checkAverage(avgAnxiety, avgHappiness, avgWorkloadMgmt);
      $(".cancel").on("click", closeForm);

      $("#average_score").text(average);

      $("#anxiety-score").text(avgAnxiety);
      $("#happiness-score").text(avgHappiness);
      $("#workload-score").text(avgWorkloadMgmt);

      if (avgAnxiety < 1.5) {
        $("#anxietyBox")
          .addClass("glow-danger")
          .removeClass("glow-warning")
          .removeClass("glow-primary");
      } else if (avgAnxiety >= 1.5 && avgAnxiety < 3.5) {
        $("#anxietyBox")
          .addClass("glow-warning")
          .removeClass("glow-danger")
          .removeClass("glow-primary");
      } else {
        $("#anxietyBox")
          .addClass("glow-primary")
          .removeClass("glow-danger")
          .removeClass("glow-warning");
      }
      if (avgHappiness < 1.5) {
        $("#happinessBox")
          .addClass("glow-danger")
          .removeClass("glow-warning")
          .removeClass("glow-primary");
      } else if (avgHappiness >= 1.5 && avgHappiness < 3.5) {
        $("#happinessBox")
          .addClass("glow-warning")
          .removeClass("glow-danger")
          .removeClass("glow-primary");
      } else {
        $("#happinessBox")
          .addClass("glow-primary")
          .removeClass("glow-danger")
          .removeClass("glow-warning");
      }
      if (avgWorkloadMgmt < 1.5) {
        $("#workloadBox")
          .addClass("glow-danger")
          .removeClass("glow-warning")
          .removeClass("glow-primary");
      } else if (avgWorkloadMgmt >= 1.5 && avgWorkloadMgmt < 3.5) {
        $("#workloadBox")
          .addClass("glow-warning")
          .removeClass("glow-danger")
          .removeClass("glow-primary");
      } else {
        $("#workloadBox")
          .addClass("glow-primary")
          .removeClass("glow-danger")
          .removeClass("glow-warning");
      }
      if (average < 1.5) {
        $("#consult")
          .addClass("text-danger")
          .removeClass("text-success")
          .removeClass("text-warning");
        $("#average_score")
          .addClass("text-danger")
          .removeClass("fs-2")
          .addClass("fs-1");

        $("#consult").html(
          "<div class='container' style='width:96%'><div class='alert alert-danger mt-md-4 mt-3 text-center' role='alert'><h4>It seems like you're struggling. Consider reaching out to a professional for support.<br><br>Please Contact the School Consultant + 959 123456789</h4></div></div > "
        );
      } else if (average >= 1.5 && average < 3.5) {
        $("#consult")
          .addClass("text-black")
          .removeClass("text-danger")
          .removeClass("text-success");
        $("#average_score")
          .removeClass("text-danger")
          .removeClass("fs-1")
          .addClass("fs-2");

        $("#consult").html(
          "<h4>You're doing okay, but there's room for improvement. Keep an eye on your well-being and seek support if needed.</h4>"
        );
      } else {
        $("#consult")
          .addClass("text-success")
          .removeClass("text-warning")
          .removeClass("text-danger");
        $("#average_score")
          .removeClass("text-danger")
          .removeClass("fs-1")
          .addClass("fs-2");
        $("#consult").html("<h4>You're doing well! Keep it up!</h4>");
      }
    },
    "json"
  );
});
