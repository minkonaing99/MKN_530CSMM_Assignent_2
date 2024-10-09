$(document).ready(function () {
  $.ajax({
    url: "../data/dictionary.json",
    dataType: "json",
    success: function (data) {
      autocomplete($("#myInput")[0], data);
    },
    error: function () {
      console.error("Could not load countries data.");
    },
  });

  function autocomplete(inp, arr) {
    let currentFocus;
    $(inp).on("input", function () {
      let val = this.value;
      closeAllLists();
      if (!val) return false;
      currentFocus = -1;

      let a = $("<div></div>", {
        id: this.id + "autocomplete-list",
        class: "autocomplete-items",
      }).appendTo($(this).parent());

      let count = 0; // Counter for the number of suggestions
      arr.forEach((item) => {
        if (item.toUpperCase().startsWith(val.toUpperCase()) && count < 8) {
          count++; // Increment the counter
          $("<div></div>")
            .html(
              `<strong>${item.substr(0, val.length)}</strong>${item.substr(
                val.length
              )}`
            )
            .append(`<input type='hidden' value='${item}'>`)
            .on("click", function () {
              inp.value = $(this).find("input").val();
              closeAllLists();
            })
            .appendTo(a);
        }
      });
    });

    $(inp).on("keydown", function (e) {
      let x = $("#" + this.id + "autocomplete-list div");
      if (e.keyCode == 40) currentFocus++;
      if (e.keyCode == 38) currentFocus--;
      if (e.keyCode == 13) e.preventDefault();
      if (currentFocus >= 0) x.eq(currentFocus).click();
      addActive(x);
    });

    function addActive(x) {
      if (!x) return false;
      removeActive(x);
      if (currentFocus >= x.length) currentFocus = 0;
      if (currentFocus < 0) currentFocus = x.length - 1;
      x.eq(currentFocus).addClass("autocomplete-active");
    }

    function removeActive(x) {
      x.removeClass("autocomplete-active");
    }

    function closeAllLists(elmnt) {
      $(".autocomplete-items").not(elmnt).remove();
    }

    $(document).on("click", function (e) {
      closeAllLists(e.target);
    });
  }
});
