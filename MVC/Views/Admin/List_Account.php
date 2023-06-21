<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="/Project---CTStore---WD1110/MVC/wwwroot/img/t2.png"/>
    <title>CTstore Danh sách người dùng</title>
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/Admin/list-acc111.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="box-customer">
        <div class="customer-list">
            <h1 class="customer-list-title">Danh sách tài khoản</h1>
            <table class="customer-table">
                <thead class="customer-table-header">
                    <tr>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Trạng Thái</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody class="customer-table-content">
                    <?php
                        while($row = mysqli_fetch_array($data["account"])){
                            $id = $row["account_id"];
                            $name = $row["full_name"];
                            $email = $row["email"];
                            $phoneN = $row["phone_number"];
                            switch($row["role"]){
                                case 2:
                                    $status = "Đang mở";
                                    $statusClass = "status-open";
                                    break;
                                case 3:
                                    $status = "Đang khóa";
                                    $statusClass = "status-locked";
                                    break;
                            }
                    ?>
                        <tr>
                            <td><?php echo $name ?></td>
                            <td><?php echo $email ?></td>
                            <td><?php echo $phoneN ?></td>
                            <td class="<?php echo $statusClass ?>"><?php echo $status ?></td>
                            <td><a href="/Project---CTStore---WD1110/Admin/View_Account_Order/<?php echo $id ?>"><button><i class="fa-solid fa-eye"></i></button></a></td>
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