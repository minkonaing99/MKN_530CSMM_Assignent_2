$(document).ready(function () {
  $(document).keydown(function (e) {
    console.log("Key pressed: " + e.key); // Log the key that was pressed

    if ($("#searchbox").is(":focus")) {
      console.log("Searchbox is focused");
      // Add handling here if necessary
    } else {
      console.log("Searchbox is not focused");
      switch (e.key) {
        case "h":
          console.log("Triggering home click");
          $("#home").trigger("click");
          break;
        case "w":
          console.log("Triggering well_beings click");
          $("#well_beings").trigger("click");
          break;
        case "a":
          console.log("Triggering announcement click");
          $("#announcement").trigger("click");
          break;
        case "b":
          console.log("Triggering about click");
          $("#about").trigger("click");
          break;
        default:
          console.log("Key not handled");
      }
    }
  });
});
