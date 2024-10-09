<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Jquery UI for dataPicker -->
    <!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css"> -->
    <!-- Jquery -->
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> -->
    <!-- Jquery UI -->
    <!-- <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script> -->
    <!-- Google Chart -->
    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->

    <!-- Offline Link -->
    <!-- Jquery Offline -->
    <script src="../js/jquery-3.7.1.min.js"></script>
    <!-- Jquery UI Offline -->
    <link rel="stylesheet" href="../lib/jquery-ui.min.css">
    <script src="../lib/jquery-ui.min.js"></script>
    <script src="../lib/googlechart_loader.js"></script>
    <title>Chart</title>

    <style>
        span input {
            width: 80px;
        }

        span label {
            width: 50px;
        }
    </style>
    <script>
        function drawChart(fromDate, toDate) {
            $.post('../api/category_data_charting.php', {
                from: fromDate,
                to: toDate
            }, function(response) {
                // console.log(response);

                var data = [
                    ['Date', 'Happiness', 'Anxiety', 'Workload Management']
                ];
                $.each(response, function(index, value) {
                    var date = new Date(value.input_date);
                    var formattedDate = date.getDate() + '.' + (date.getMonth() + 1);
                    data.push([
                        formattedDate,
                        value.happiness,
                        value.anxiety,
                        value.workload_mgmt
                    ]);
                });

                var options = {
                    title: 'Well-Beings',
                    curveType: 'function',
                    legend: {
                        position: 'bottom'
                    },
                    hAxis: {
                        title: "Date",
                        slantedText: true,
                        slantedTextAngle: 90,
                        textStyle: {
                            fontSize: 14
                        }
                    },
                    chartArea: {
                        width: '90%',
                        height: '500px'
                    },
                    vAxis: {
                        viewWindow: {
                            max: 5.5,
                            min: 0.5
                        }
                    }
                };

                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                chart.draw(google.visualization.arrayToDataTable(data), options);
            }, 'json');
        }

        google.charts.load('current', {
            packages: ['corechart']
        });

        google.charts.setOnLoadCallback(function() {
            let today = $.datepicker.formatDate('yy-mm-dd', new Date());
            drawChart('2024-01-01', today);
        });

        $(document).ready(function() {
            $(function() {
                var from = $("#from").datepicker({
                    maxDate: "-5D",
                    onSelect: function(selectedDate) {
                        var date = $(this).datepicker('getDate');
                        to.datepicker("option", "minDate", date);
                    }
                });

                var to = $("#to").datepicker({
                    maxDate: "0D",
                    onSelect: function(selectedDate) {
                        var date = $(this).datepicker('getDate');
                        from.datepicker("option", "maxDate", date);
                    }
                });

                $('#filter').click(function() {
                    var fromDate = $('#from').datepicker('getDate');
                    var toDate = $('#to').datepicker('getDate');

                    var formattedFromDate = $.datepicker.formatDate('yy-mm-dd', fromDate);
                    var formattedToDate = $.datepicker.formatDate('yy-mm-dd', toDate);

                    // console.log(formattedFromDate);
                    // console.log(formattedToDate);

                    drawChart(formattedFromDate, formattedToDate);
                });
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <div class="row align-items-center my-3">
            <span class="col-auto d-flex align-items-center my-1">
                <label for="from" class="me-2 mb-0">From:</label>
                <input type="text" id="from" class="form-control">
            </span>
            <span class="col-auto d-flex align-items-center my-1">
                <label for="to" class="me-2 mb-0">To:</label>
                <input type="text" id="to" class="form-control">
            </span>
            <span class="col-auto">
                <input type="button" class="btn btn-primary" value="Filter" id="filter">
            </span>
        </div>
    </div>

    <div id="curve_chart" style="width: 100%; height: 500px;"></div>

</body>

</html>