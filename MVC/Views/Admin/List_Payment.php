<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/Admin/list-order.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="box-customer">
        <div class="customer-list">
            <h1 class="customer-list-title">Danh sách đơn hàng</h1>
            <table class="customer-table">
                <thead class="customer-table-header">
                    <tr>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Thời gian</th>
                        <th>Trạng Thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="customer-table-content">
                    <?php
                        while($row = mysqli_fetch_array($data["order"])){
                            $id = $row["order_id"];
                            $name = $row["full_name"];
                            $date = $row["order_date"];
                            $status = $row["status"];
                    ?>
                        <tr>
                            <td><?php echo $id?></td>
                            <td><?php echo $name ?></td>
                            <td><?php echo $date ?></td>
                            <td><?php echo $status ?></td>
                            <td><button><i class="fa-solid fa-eye"></i></button></td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>