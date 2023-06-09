<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="/Project---CTStore---WD1110/MVC/wwwroot/img/t2.png"/>
    <title>CTstore Admin</title>
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/Admin/main1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <main>
        <div class="main__container">
            <div class="main__title">
                <img src="" alt="">
                <div class="main__greeting">
                    <p>Welcome Admin account</p>
                </div>
            </div>
            <div class="main__cards">
                <div class="card">
                    <i class="fa-solid fa-user fa-2x text-lightblue"></i>
                    <div class="card__inner">
                        <p class="text-primary-p">Người dùng</p></p>
                        <span class="font-bold text-title"><?php echo $data["Account"] ?></span>
                    </div>
                </div>
                <div class="card">
                    <i class="fa-solid fa-truck fa-2x text-red"></i>
                    <div class="card__inner">
                        <p class="text-primary-p">Đơn  hàng</p>
                        <span class="font-bold text-title"><?php echo $data["Order"] ?></span>
                    </div>
                </div>
                <div class="card">
                    <i class="fa-solid fa-mobile-screen-button fa-2x text-green"></i>
                    <div class="card__inner">
                        <p class="text-primary-p">Sản phảm</p>
                        <span class="font-bold text-title"><?php echo $data["mobilephone"] ?></span>
                    </div>
                </div>
                <div class="card">
                    <i class="fa-solid fa-headset  fa-2x text-blue"></i>
                    <div class="card__inner">
                        <p class="text-primary-p">Hỗ trợ</p>
                        <span class="font-bold text-title"><?php echo $data["count_admin"] ?></span>
                    </div>
                </div>
            </div>
            <div class="charts">
                <div class="charts__left">
                    <div class="customer__info">
                        <div class="customer__info-title">
                            <h2>Tài khoản khách hàng</h2>
                            <a href="/Project---CTStore---WD1110/Admin/View_List_Account" class="">View All</a>
                        </div>
                        <table class="customer__info-table">
                            <thead>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                            </thead>
                            <?php
                                while($row = mysqli_fetch_array($data["Recent Account"])){
                            ?>
                            <tbody>
                                <td><?php echo $row["full_name"] ?></td>
                                <td><?php echo $row["email"] ?></td>
                                <td><?php echo $row["phone_number"] ?></td>
                            </tbody>
                            <?php
                                }
                            ?>
                        </table>
                    </div>
                </div>
                <div class="charts__right">
                    <div class="order__info">
                            <div class="order__info-title">
                                <h2>Đơn hàng</h2>
                                <a href="/Project---CTStore---WD1110/Admin/View_Payment/;" class="">View All</a>
                            </div>
                            <table class="order__info-table">
                                <thead>
                                    <th>Mã đơn hàng</th>
                                    <th>Khách hàng</th>
                                    <th>Trạng thái</th>
                                </thead>
                                <?php
                                while($row = mysqli_fetch_array($data["Recent Payment"])){
                                    switch($row["status"]){
                                        case 2:
                                            $status = "chờ xác nhận";
                                            break;
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
                                <tbody>
                                    <td><?php echo $row["order_id"] ?></td>
                                    <td><?php echo $row["full_name"] ?></td>
                                    <td><?php echo $status ?></td>
                                </tbody>
                                <?php
                                    }
                                ?>
                            </table>
                    </div>

                </div>
            </div>
        </div>
    </main>
</body>
</html>