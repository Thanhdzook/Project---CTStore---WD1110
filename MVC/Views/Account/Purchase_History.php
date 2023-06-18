<?php $total = 0; ?>
<?php
    $t = "";
    $t1 = "";
    $t2 = "";
    $t3 = "";
    $t4 = "";
    $t5 = "";
    switch($data["t"]){
        case 0:
            $t = "active";
            break;
        case 1:
            $t1 = "active";
            break;
        case 2:
            $t2 = "active";
            break;
        case 3:
            $t3 = "active";
            break;
        case 4:
            $t4 = "active";
            break;
        case 5:
            $t5 = "active";
            break;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="/Project---CTStore---WD1110/MVC/wwwroot/img/t2.png"/>
    <title>CTstore Lịch sử mua hàng</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/Account/purchase-history.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        a{text-decoration: none}
    </style> 
</head>
<body>
	<div class="purchase-history-page">
        <div class="purchase-history-mobile">
            <div class="ct-container">
                <p class="order-title">QUẢN LÝ ĐƠN HÀNG</p>
                <div class="block-info">
                    <div class="block-info-item">
                        <i class="item-icon fa-solid fa-truck-fast"></i>
                        <p class="item-content"><?php echo $data["Order"] ?> đơn hàng</p>
                    </div>
                    <div class="block-info-item ">
                        <i class="item-icon fa-solid fa-wallet"></i>
                        <p class="item-content">Đã mua <?php echo $data["Bought"] ?></p></p>
                    </div>
                </div>
                <div class="order-list-container">
                    <div class="order-list-option">
                        <a  href="/Project---CTStore---WD1110/Order_Detail/View_Purchase_History/0"><div class="order-list-item <?php echo $t ?>">Tất cả</div></a>
                        <a  href="/Project---CTStore---WD1110/Order_Detail/View_Purchase_History/1"><div class="order-list-item <?php echo $t1 ?>">Chờ xác nhận</div></a>
                        <a  href="/Project---CTStore---WD1110/Order_Detail/View_Purchase_History/2"><div class="order-list-item <?php echo $t2 ?>">Đã xác nhận</div></a>
                        <a  href="/Project---CTStore---WD1110/Order_Detail/View_Purchase_History/3"><div class="order-list-item <?php echo $t3 ?>">Đang vận chuyển</div></a>
                        <a  href="/Project---CTStore---WD1110/Order_Detail/View_Purchase_History/4"><div class="order-list-item <?php echo $t4 ?>">Đã nhận hàng</div></a>
                        <a  href="/Project---CTStore---WD1110/Order_Detail/View_Purchase_History/5"><div class="order-list-item <?php echo $t5 ?>">Đã hủy</div></a>
                    </div>
                    <?php
                        $_SESSION["check_order_id"] = 0;
                        if(isset($data["Purchase_History"])){
                            while($row = mysqli_fetch_array($data["Purchase_History"])){
                                $date = $row["order_date"];
                                $statusabc = $row["status"];
                                $name = $row["mobilePhone_name"];
                                $price = $row["price"];
                                $price_sale = ($row["price"]/100)*(100 - $row["sale"]);
                                $img = $row["img"];
                                $quantity = $row["quantity"];
                                $mobilePhone_id = $row["mobilePhone_id"];
                                $order_id = $row["order_id"];
                                $checklink = "";
                                // $_SESSION["check_order_id"] = $order_id;
                                switch($row["status"]){
                                    case 2:
                                        $checklink = "/Order_Detail/Fix_Order/".$order_id."/5";
                                        $checkstatus = "Hủy";
                                        $status = "đang chờ xác nhận";
                                        break;
                                    case 3:
                                        $checklink = "/Order_Detail/Fix_Order/".$order_id."/4";
                                        $checkstatus = "Quay lại trang chủ";
                                        $status = "đang giao";
                                        break;
                                    case 4:
                                        $checklink = "/Show_MobilePhone/ShowMobilePhone/";
                                        $checkstatus = "Đánh Giá";
                                        $status = "đã nhận";
                                        break;
                                    case 5:
                                        $checklink = "/Show_MobilePhone/ShowMobilePhone/";
                                        $checkstatus = "Mua Lại";
                                        $status = "đã hủy";
                                        break;
                                }
                    ?>
                    <div class="box-order-list">
                        <?php
                            if($_SESSION["check_order_id"] != $order_id && $_SESSION["check_order_id"] != 0){
                        ?>
                            </div> 
                            <div class="box-order-end">
                                <div class="box-order-total">
                                    <div class="order-total-title">Thành tiền: </div>
                                    <div class="order-product-total"><?php echo number_format($total, 0, '', ',') ?>₫</div>
                                </div>
                                <div class="box-order-footer">
                                    <div class="button-right">
                                        <div class="button-right-item">
                                            <a href="/Project---CTStore---WD1110<?php echo $checklink ?>"><button class="button-right-item-btn" style="background-color: #ee4d2d; border-color: #cd3011; color: #fff;"><?php echo $checkstatus ?></button><a>
                                        </div>
                                        <div class="button-right-item">
                                            <button class="button-right-item-btn">Liên hệ người bán</button>
                                        </div>
                                        <!-- <div class="button-right-item">
                                            <button class="button-right-item-btn">Mua Lại</button>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <?php
                            }
                        ?>
                        <!-- <div class="box-order">  -->
                            <!-- <div> -->
                            <?php
                                if($_SESSION["check_order_id"] != $order_id){
                                    $total = 0;
                            ?>
                        <div class="box-order"> 
                            <div class="box-order-header">
                                <h2>CTSTORE</h2>
                                <div class="order-header-right">
                                    <div class="order-time"><?php echo $date ?></div>
                                    <div class="order-status"><?php echo $status ?></div>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                            <div class="box-order-content-wappper">
                                <div class="box-order-content">
                                    <div class="order-product-img">
                                        <img src="<?php echo $img?>" alt="">
                                    </div>
                                    <div class="order-product-info1">
                                        <p class="order-product-name"><?php echo $name?></p>
                                        <p class="order-product-quanity">x<?php echo $quantity?></p>
                                    </div>
                                </div>
                                <div class="order-product-info2">
                                    <p class="order-product-price"><?php echo number_format($price*$quantity, 0, '', ',') ?>₫</p>
                                    <p class="order-product-price-sale"><?php echo number_format($price_sale*$quantity, 0, '', ',') ?>₫</p>
                                </div>
                            </div>
                            <?php $total = $total + $price_sale*$quantity; ?>
                            <!-- </div> -->
                        <!-- </div>  -->
                    <?php
                        $_SESSION["check_order_id"] = $order_id;
                            }
                    ?>
                    </div> 
                    <div class="box-order-end">
                        <div class="box-order-total">
                            <div class="order-total-title">Thành tiền: </div>
                            <div class="order-product-total"><?php echo number_format($total, 0, '', ',') ?>₫</div>
                        </div>
                        <div class="box-order-footer">
                            <div class="button-right">
                                <div class="button-right-item">
                                    <a href="/Project---CTStore---WD1110<?php echo $checklink ?>"><button class="button-right-item-btn" style="background-color: #ee4d2d; border-color: #cd3011; color: #fff;"><?php echo $checkstatus ?></button><a>
                                </div>
                                <!-- <div class="button-right-item">
                                    <button class="button-right-item-btn" style="background-color: #ee4d2d; border-color: #cd3011; color: #fff;">Đánh giá</button>
                                </div> -->
                                <div class="button-right-item">
                                    <button class="button-right-item-btn">Liên hệ người bán</button>
                                </div>
                                <!-- <div class="button-right-item">
                                    <button class="button-right-item-btn">Mua Lại</button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
	</div>
</body>
</html>
        