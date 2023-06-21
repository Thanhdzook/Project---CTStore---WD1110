<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="/Project---CTStore---WD1110/MVC/wwwroot/img/t2.png"/>
    <title>CTstore Danh sách đơn hàng</title>
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/Admin/list-mb.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="box-customer">
        <div class="customer-list">
            <div class="table-mb-header">
                <div class="table-mb-title"><h1 class="customer-list-title">Danh sách sản phẩm</h1></div>
                <a href="/Project---CTStore---WD1110/Create_MobilePhone/View_CreateMobilePhone" class="table-mb-button"><button class="table-mb-button-add">Thêm sản phẩm</button></a>
            </div>

            <table class="customer-table">
                <thead class="customer-table-header">
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tên sản phẩm</th>
                        <th>Thương hiệu</th>
                        <th>Số lượng</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="customer-table-content">
                    <?php
                        while($row = mysqli_fetch_array($data["mobilePhone"])){
                            $id = $row["mobilePhone_id"];
                            $name = $row["mobilePhone_name"];
                            $operatingSystem = $row["operatingSystem"];
                            $amount = $row["amount"];
                            switch($row["status"]){
                                case 0:
                                    $status = "Đã ẩn";
                                    break;
                                case 1:
                                    $status = "Đang hiện";
                                    break;
                            }
                    ?>
                        <tr>
                            <td><?php echo $id ?></td>
                            <td><?php echo $name ?></td>
                            <td><?php echo $operatingSystem ?></td>
                            <td><?php echo $amount ?></td>
                            <td><?php echo $status ?></td>
                            <td>
                                <a href="/Project---CTStore---WD1110/Admin/View_MobilePhone_Detail/<?php echo $id ?>"><button><i class="fa-solid fa-eye"></i></button></a>
                            </td>
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