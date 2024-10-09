$(document).ready(function () {
  var currLoc = $(location).attr("href");
  let inactivityTime = 0;
  var inactive = false;
  const maxInactivity = 15 * 60 * 1000;
  let inactivityInterval;

  function resetTimer() {
    inactivityTime = 0;
  }

  function updateInactivityTime() {
    inactivityTime += 1000;

    if (inactivityTime >= maxInactivity) {
      clearInterval(inactivityInterval);
      var inactive = true;

      $.ajax({
        url: "session.php",
        type: "POST",
        data: {
          inactive: inactive,
          loc: currLoc,
        },
        success: function (data) {
          console.log(data);
        },
      });

      alert("You have been inactive for too long.");
      location.reload(currLoc);
      // window.location.href = "../index.php";
    }
  }

  $(document).on("mousemove keypress click", function () {
    resetTimer();
  });
  inactivityInterval = setInterval(updateInactivityTime, 1000);
});
