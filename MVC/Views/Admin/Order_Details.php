<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="/Project---CTStore---WD1110/MVC/wwwroot/img/t2.png" />
    <title>CTstore Danh sách đơn hàng</title>
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/Admin/order-detail1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="box-tk-detail">
        <div class="tk-detail-header">
            <div class="tk-detail-header-title">
                <i class="fa-solid fa-arrow-left"></i>
                <p>Thông tin chi tiết</p>
            </div>
            <?php
                switch($data["status"]){
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
                if($data["status"] == 2){
            ?>
            <div class="box-list-btn">
                <a href="/Project---CTStore---WD1110/Admin/Order_Confirmation/<?php echo $data["id_order"] ?>"><button class="btn-lock">Xác nhận</button></a>
            </div>
            <div class="box-list-btn">
                
                <a href="/Project---CTStore---WD1110/Admin/Order_Cancel/<?php echo $data["id_order"] ?>"><button class="btn-lock">Hủy</button></a>
            </div>
            <?php  
                }
                else{
            ?>
            <div class="<?php echo $statusClass ?>"><?php echo $status ?></div>
            <?php
                }
            ?>
            
        </div>
        <div class="mb-detail-content">
            <ul class="box-list-info">
                <li class="content-list-info">
                    <div class="content-info-title">
                        <p>Thông tin khách hàng</p>   
                    </div>
                </li>
                <li class="content-list-info">
                    <div class="content-info-item">
                        <p>Tên khách hàng</p>
                        <div><?php echo $data["customer"]["customer_name"] ?></div>
                    </div>
                </li>
                <li class="content-list-info">
                    <div class="content-info-item">
                        <p>Số điện thoại</p>
                        <div><?php echo $data["customer"]["customer_phonenumber"] ?></div>
                    </div>
                </li>
                <li class="content-list-info">
                    <div class="content-info-item">
                        <p>Địa chỉ</p>
                        <div><?php echo $data["customer"]["customer_address"] ?></div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="mb-detail-content">
            <ul class="box-list-info">
                <li class="content-list-info">
                    <div class="content-info-title">
                        <p>Thông tin sản phẩm</p>   
                    </div>
                </li>
                <?php
                    $total = 0;
                    $i = 1;
                    while($row = mysqli_fetch_array($data["order"])){
                        $total = $total + $row["unit_price"]*$row["quantity"];
                ?>
                <?php
                    if($i == 1){
                ?>
                <li class="content-list-info">
                    <div class="content-info-item">
                        <p>Mã đơn hàng</p>
                        <div><?php echo $row["order_id"] ?></div>
                    </div>
                </li>
                <li class="content-list-info">
                    <div class="content-info-item">
                        <p>Ngày đặt</p>
                        <div><?php echo $row["order_date"] ?></div>
                    </div>
                </li>
                <?php
                    }
                ?>
                <li class="content-list-info active-bottom">
                    <div class="content-info-item">
                        <p>Tên sản phẩm <?php echo $i ?></p>
                        <div><?php echo $row["mobilePhone_name"] ?></div>
                    </div>
                </li>
                <li class="content-list-info">
                    <div class="content-info-item">
                        <p>Giá sản phẩm</p>
                        <div><?php echo number_format($row["unit_price"], 0, '', ',')?>₫</div>
                    </div>
                </li>
                <li class="content-list-info">
                    <div class="content-info-item">
                        <p>Số lượng</p>
                        <div><?php echo $row["quantity"] ?></div>
                    </div>
                </li>
                <?php
                $i++;
                    }
                ?>
                <li class="content-list-info ">
                    <div class="content-info-item active-total">
                        <p>Tổng tiền thanh toán: </p>
                        <div><?php echo number_format($total, 0, '', ',')?>₫</div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>