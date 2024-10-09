$(document).ready(function () {
  let quotes = [];
  var result = [];

  function initializeQuoteOfDay() {
    let today = new Date();
    let startday = new Date(today.getFullYear(), 0, 0);
    let diff = today - startday;
    let oneDay = 1000 * 60 * 60 * 24;
    let day = Math.floor(diff / oneDay);
    return day % 119;
  }

  function displayQuote(index) {
    $("blockquote p:first-child").text(quotes[index].quote);
    $("blockquote p:last-child").text("- " + quotes[index].author);
    // console.log(quotes[index]);
  }

  function clearSearch() {
    $("#searchbox").val("");
    $("#resultsContainer").empty();
    $("#searchBtn i").removeClass("fa-xmark").addClass("fa-magnifying-glass");
  }

  let index = initializeQuoteOfDay();
  // let index = 0;
  // let index = 118;
  $.getJSON("../data/quotes.json", function (data) {
    console.log(data.quotes);

    result = data.quotes;
    var previous = index - 1;
    if (index - 1 == -1) {
      previous = 118;
    }
    var next = index + 1;
    if (index + 1 == 119) {
      next = 0;
    }
    quotes.push(data.quotes[previous]);
    quotes.push(data.quotes[index]);
    quotes.push(data.quotes[next]);
    let arr_index = 1;
    if (arr_index == 2) {
      $("#nextBtn").html("<i class='fa-solid fa-xmark'></i>");
    } else if (arr_index == 0) {
      $("#previousBtn").html("<i class='fa-solid fa-xmark'></i>");
    }
    displayQuote(arr_index);
    $("#nextBtn").click(function () {
      arr_index = arr_index + 1;
      if (arr_index > 2) {
        arr_index = 2;
      }
      displayQuote(arr_index);
      if (arr_index == 2) {
        $("#nextBtn").html("<i class='fa-solid fa-xmark'></i>");
      } else {
        $("#nextBtn").html("<i class='fa-solid fa-angles-right'></i> ");
      }
      if (arr_index == 0) {
        $("#previousBtn").html("<i class='fa-solid fa-xmark'></i>");
      } else {
        $("#previousBtn").html("<i class='fa-solid fa-angles-left'></i>");
      }
    });
    $("#previousBtn").click(function () {
      arr_index = arr_index - 1;
      if (arr_index < 0) {
        arr_index = 0;
      }
      displayQuote(arr_index);
      if (arr_index == 0) {
        $("#previousBtn").html("<i class='fa-solid fa-xmark'></i>");
      } else {
        $("#previousBtn").html("<i class='fa-solid fa-angles-left'></i>");
      }
      if (arr_index == 2) {
        $("#nextBtn").html("<i class='fa-solid fa-xmark'></i>");
      } else {
        $("#nextBtn").html("<i class='fa-solid fa-angles-right'></i>");
      }
    });
    $(document).keydown(function (e) {
      if (!$("#searchbox").is(":focus")) {
        switch (e.key) {
          case "ArrowRight":
            $("#nextBtn").click();
            break;
          case "ArrowLeft":
            $("#previousBtn").click();
            break;
        }
      }
    });
  });
  $("#searchBtn").click(function () {
    var icon = $("#searchBtn i");
    if (icon.hasClass("fa-xmark")) {
      clearSearch();
    } else if (icon.hasClass("fa-magnifying-glass")) {
      performSearch();
    }
    $(".autocomplete-items").remove();
  });

  function performSearch() {
    var input = $("#searchbox").val().toLowerCase();
    if (input) {
      var filter = result.filter(
        (object) =>
          object.quote.toLowerCase().includes(input) ||
          object.author.toLowerCase().includes(input)
      );

      // console.log("Filter results:", filter);

      if (filter.length > 0) {
        displayResults(filter);
      } else {
        displayResults("No Results");
      }

      $("#searchBtn i").removeClass("fa-magnifying-glass").addClass("fa-xmark");
      $("#searchbox").blur();
    } else {
      clearSearch();
    }
  }

  function displayResults(filter) {
    $("#resultsContainer").empty();

    if (filter === "No Results") {
      $("#resultsContainer").append(`
                <div class="d-flex mb-2 justify-content-end me-md-5" style="width: 98%;">
                <figure class="shadowBox p-4">
                <div class="blockquote text-end">
                <p>No Results Found</p>
                </div>
                </figure>
                </div>`);
    } else {
      filter.forEach(function (element) {
        $("#resultsContainer").append(`
                <div class="d-flex mb-2 justify-content-end me-md-5" style="width: 98%;">
                <figure class="shadowBox p-4">
                <div class="blockquote text-end">
                <p>${element.quote}</p>
                </div>
                <figcaption class="blockquote-footer text-end">
                <cite title="Source Title">${element.author}</cite>
                </figcaption>
                </figure>
                </div>`);
      });
    }
  }

  $(document).keydown(function (e) {
    if ($("#searchbox").is(":focus")) {
      switch (e.key) {
        case "Enter":
          e.preventDefault();
          performSearch();
          $(".autocomplete-items").remove();
          break;
        case "Escape":
          $("#searchbox").blur();
          clearSearch();
          break;
      }
    } else {
      switch (e.key) {
        case "/":
          e.preventDefault();
          $("#searchbox").focus();
          break;
        case "c":
          clearSearch();
          break;
      }
    }
  });
  $.ajax({
    url: "../data/dictionary.json",
    dataType: "json",
    success: function (data) {
      autocomplete($("#searchbox")[0], data);
    },
    error: function () {
      console.error("Could not load dictionary data.");
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

      let count = 0;
      arr.forEach((item) => {
        if (item.toUpperCase().startsWith(val.toUpperCase()) && count < 8) {
          count++;
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
