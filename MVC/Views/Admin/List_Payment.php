<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/Admin/list-order.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
                            $status ="";
                            switch($row["status"]){
                                case 3:
                                    $status = "đã xác nhận đang giao hàng";
                                    break;
                                case 4:
                                    $status = "đã nhận được hàng";
                                    break;
                                case 5:
                                    $status = "đã hủy";
                                    break;
                            }
                    ?>
                        <tr>
                            <td><?php echo $id?></td>
                            <td><?php echo $name ?></td>
                            <td><?php echo $date ?></td>
                            <?php
                                if($row["status"] == 2){
                            ?>
                            <td><button>xác nhận</button></td>
                            <?php
                                }
                            ?>
                            <?php
                                if($row["status"] != 2){
                            ?>
                            <td><?php echo $status ?></td>
                            <?php
                                }
                            ?>
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