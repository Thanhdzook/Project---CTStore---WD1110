<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="/Project---CTStore---WD1110/MVC/wwwroot/img/t2.png" />
    <title>CTstore Danh sách đơn hàng</title>
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/Admin/list-orderr1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .cho-xac-nhan {
            color: yellow;
        }

        .da-xac-nhan {
            color: green;
        }

        .thanh-cong {
            color: orange;
        }

        .da-huy {
            color: red;
        }
    </style>
</head>

<body>
    <div class="box-customer">
        <div class="customer-list">
            <h1 class="customer-list-title">Danh sách đơn hàng</h1>
            <table class="customer-table">
                <thead class="customer-table-header">
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Khách hàng</th>
                        <th>Sản phẩm</th>
                        <th>Thời gian</th>
                        <th>Trạng Thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="customer-table-content">
                    <?php
                    while ($row = mysqli_fetch_array($data["order"])) {
                        $id = $row["order_id"];
                        $name = $row["full_name"];
                        $date = $row["order_date"];
                        $status = "";
                        switch ($row["status"]) {
                            case 2:
                                $status = "Chờ xác nhận";
                                $statusClass = "status-pending";
                                break;
                            case 3:
                                $status = "Đã xác nhận";
                                $statusClass = "status-confirmed";
                                break;
                            case 4:
                                $status = "Thành công";
                                $statusClass = "status-success";
                                break;
                            case 5:
                                $status = "Đã hủy";
                                $statusClass = "status-cancelled";
                                break;
                            default:
                                $status = "Không xác định";
                                $statusClass = "";
                                break;
                        }
                    ?>
                        <tr>
                            <td><?php echo $id ?></td>
                            <td><?php echo $name ?></td>
                            <td>iphone</td>
                            <td><?php echo $date ?></td>
                            <td class="<?php echo $statusClass ?>"><?php echo $status ?></td>
                            <td><a href="/Project---CTStore---WD1110/Admin/View_Order_Detail/<?php echo $id ?>"><button><i class="fa-solid fa-eye"></i></button></a></td>
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