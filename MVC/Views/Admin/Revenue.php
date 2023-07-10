<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="/Project---CTStore---WD1110/MVC/wwwroot/img/t2.png" />
    <title>CTstore Danh sách người dùng</title>
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/Admin/revenue.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.28.3/dist/apexcharts.min.js"></script>
</head>

<body>
    <div class="box-customer">
        <div class="customer-list">
            <h1 class="customer-list-title">Doanh thu</h1>
            <div class="box-time">
                <select id="month-select">
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <!-- Add options for other months -->
                </select>
            </div>
            <div id="chart"></div>
        </div>

    </div>

    <script>
        var options = {
            series: [{
                name: 'Doanh thu',
                data: [500, 700, 600, 300, 750, 620, 500, 700, 600, 300, 750, 620] // Thay thế dữ liệu này bằng dữ liệu thực tế của bạn
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            xaxis: {
                categories: ['1/2023', '2/2023', '3/2023', '4/2023', '5/2023', '6/2023','7/2023', '8/2023', '9/2023', '10/2023', '11/2023', '12/2023'] // Thay thế dữ liệu này bằng dữ liệu thực tế của bạn
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
    <script>
        const monthSelect = document.getElementById('month-select');
        monthSelect.addEventListener('change', function() {
            const selectedMonth = monthSelect.value;
            // Perform actions based on the selected month
            console.log('Selected Month:', selectedMonth);
        });
    </script>
</body>

</html>