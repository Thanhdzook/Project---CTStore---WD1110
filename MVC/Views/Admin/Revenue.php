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
                <form action="/Project---CTStore---WD1110/Admin/View_Revenue/1" method="post">
                   <label>Tháng</label>
                    <select id="month-select" name="month">
                        <option value="1" <?php if($data["month"] == 1)echo "selected" ?> >January</option>
                        <option value="2" <?php if($data["month"] == 2)echo "selected" ?> >February</option>
                        <option value="3" <?php if($data["month"] == 3)echo "selected" ?> >March</option>
                        <option value="4" <?php if($data["month"] == 4)echo "selected" ?> >April</option>
                        <option value="5" <?php if($data["month"] == 5)echo "selected" ?> >May</option>
                        <option value="6" <?php if($data["month"] == 6)echo "selected" ?> >June</option>
                        <option value="7" <?php if($data["month"] == 7)echo "selected" ?> >July</option>
                        <option value="8" <?php if($data["month"] == 8)echo "selected" ?> >August</option>
                        <option value="9" <?php if($data["month"] == 9)echo "selected" ?> >September</option>
                        <option value="10" <?php if($data["month"] == 10)echo "selected" ?> >October</option>
                        <option value="11" <?php if($data["month"] == 11)echo "selected" ?> >November</option>
                        <option value="12" <?php if($data["month"] == 12)echo "selected" ?> >December</option>
                        <!-- Add options for other months -->
                    </select>
                    <button type="submit" name="submit">Lọc</button>
                </form>
                
            </div>
            <div id="chart"></div>
        </div>

    </div>
    <?php
        if(isset($data["Month"])){
            $i = 0;
            $money2 = "";
            $money = 0;
            $date = 0;
            $date2 = "";
            while($row = mysqli_fetch_array($data["Month"])){
                if($i == 0){
                    $date2 = $date2 . date("d",strtotime($row['order_date'])) . " , ";
                    $date = date("d-m-Y",strtotime($row['order_date']));
                    $i++;
                }
                if(date("d-m-Y",strtotime($row['order_date'])) != $date){
                    $date2 = $date2 . date("d",strtotime($row['order_date'])) . " , ";
                    $money2 = $money2 . $money . " , ";
                    $money = $row["quantity"]*$row["unit_price"];
                    $i ++;
                }
                else{
                    $money = $money + $row["quantity"]*$row["unit_price"];
                }
                $date = date("d-m-Y",strtotime($row['order_date']));
                // echo $money . " , " . $date . " ; ";
            }
            $money2 = $money2 . $money;
        }
        else{
            $money2 = "";
            $date2 = "";
        }
    ?>
    <script>
        var options = {
            series: [{
                name: 'Doanh thu',
                data: [<?php echo $money2?>]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            xaxis: {
                categories: [<?php echo rtrim($date2 , " , ") ?>]
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