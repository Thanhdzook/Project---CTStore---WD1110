<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="/Project---CTStore---WD1110/MVC/wwwroot/img/t2.png" />
    <title>CTstore Danh sách đơn hàng</title>
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/Admin/tk-detail1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="box-tk-detail">
        <div class="tk-detail-header">
            <div class="tk-detail-header-title">
                <p>Thông tin tài khoản</p>
            </div>
            <?php
                if($data["status"] == 2){
            ?>
            <div class="box-list-btn">
                <a href="/Project---CTStore---WD1110/Admin/Lock_Account/<?php echo $data["id_account"] ?>"><button class="btn-lock">Khóa</button></a>
            </div>
            <?php
                }
                else{
            ?>
            <div class="box-list-btn">
                <a href="/Project---CTStore---WD1110/Admin/UnLock_Account/<?php echo $data["id_account"] ?>"><button class="btn-lock">Mở khóa</button></a>
            </div>
            <?php
                }
            ?>
            
        </div>
        <div class="mb-detail-content">
            <ul class="box-list-info">
                <?php
                    while($row = mysqli_fetch_array($data["account"])){
                        $id = $row["account_id"];
                        $name = $row["full_name"];
                        $phoneN = $row["phone_number"];
                        $email = $row["email"];
                    }
                ?>
                <li class=".content-list-info">
                    <div class="content-info-item">
                        <p>ID</p>
                        <div><?php echo $id ?></div>
                    </div>
                </li>
                <li class=".content-list-info">
                    <div class="content-info-item">
                        <p>Tên</p>
                        <div><?php echo $name ?></div>
                    </div>
                </li>
                <li class=".content-list-info">
                    <div class="content-info-item">
                        <p>Số điện thoại</p>
                        <div><?php echo $phoneN ?></div>
                    </div>
                </li>
                <li class=".content-list-info">
                    <div class="content-info-item">
                        <p>Email</p>
                        <div><?php echo $email ?></div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="order-detail-header">
            <div class="order-detail-header-title">
                <p>Đơn hàng</p>
            </div>
        </div>
        
        <?php
            $total = 0;
            $i = 0;
            $order_id_check = 0;
            while($row = mysqli_fetch_array($data["Account_Detail"])){
                if($order_id_check != $row["order_id"]){
                    if($i != 0){
        ?>
                <li class=".content-list-info">
                    <div class="content-info-item">
                        <p>Tổng tiền</p>
                        <div><?php echo number_format($total, 0, '', ',')?>₫</div>
                    </div>
                </li>
            </ul>
        </div>
        <?php
                    }
                    $i = 1;
                    $total = 0;
                }
                $order_id = $row["order_id"];
                $order_date = $row["order_date"];
                $mobilePhone_name = $row["mobilePhone_name"];
                $memory = $row["memory"];
                $unit_price = $row["unit_price"];
                $quantity = $row["quantity"];
                $total = $total + $quantity*$unit_price;
        ?>
        <?php
            if($i == 1){
        ?>
        <div class="mb-detail-content order">
            <ul class="box-list-info">
                <li class=".content-list-info">
                    <div class="content-info-item">
                        <p>Order ID</p>
                        <div><?php echo $order_id ?></div>
                    </div>
                </li>
                <li class=".content-list-info">
                    <div class="content-info-item">
                        <p>Order date</p>
                        <div><?php echo $order_date ?></div>
                    </div>
                </li>
        <?php
            }
        ?>
                <li class=".content-list-info">
                    <div class="content-info-item">
                        <p>Tến sản phẩm <?php echo $i ?></p>
                        <div><?php echo $mobilePhone_name ?></div>
                    </div>
                </li>
                <li class=".content-list-info">
                    <div class="content-info-item">
                        <p>Giá <?php echo $i ?></p>
                        <div><?php echo number_format($unit_price, 0, '', ',')?>₫</div>
                    </div>
                </li>
                <li class=".content-list-info">
                    <div class="content-info-item">
                        <p>Số lượng <?php echo $i ?></p>
                        <div><?php echo $quantity ?></div>
                    </div>
                </li>
                <?php
                        $order_id_check = $order_id;
                        $i++;
                    }
                ?>
                <?php
                    if($i != 0){
                ?>
                <li class=".content-list-info">
                    <div class="content-info-item">
                        <p>Tổng tiền</p>
                        <div><?php echo number_format($total, 0, '', ',')?>₫</div>
                    </div>
                </li>
            </ul>
        </div>
                <?php
                    }
                    else{
                ?>
                <div>Chưa có đơn hàng nào</div>
                <?php
                    }
                ?>
                
            <!-- </ul>
        </div> -->
        
            
    </div>
</body>

</html>