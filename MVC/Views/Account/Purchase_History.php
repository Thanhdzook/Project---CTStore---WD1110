<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/Account/purchase-history.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">    
</head>
<body>
	<div class="purchase-history-page">
        <div class="purchase-history-mobile">
            <div class="ct-container">
                <p class="order-title">QUẢN LÝ ĐƠN HÀNG</p>
                <div class="block-info">
                    <div class="block-info-item">
                        <i class="item-icon fa-solid fa-truck-fast"></i>
                        <p class="item-content">0 đơn hàng</p>
                    </div>
                    <div class="block-info-item ">
                        <i class="item-icon fa-solid fa-wallet"></i>
                        <p class="item-content">Đã mua 0</p></p>
                    </div>
                </div>
                <div class="order-list-container">
                    <div class="order-list-option">
                        <div class="order-list-item active">Tất cả</div>
                        <div class="order-list-item">Chờ xác nhận</div>
                        <div class="order-list-item">Đã xác nhận</div>
                        <div class="order-list-item">Đang vận chuyển</div>
                        <div class="order-list-item">Đã nhận hàng</div>
                        <div class="order-list-item">Đã hủy</div>

                    </div>
                    <?php
                        $_SESSION["check_order_id"] = 0;
                        if(isset($data["Purchase_History"])){
                            while($row = mysqli_fetch_array($data["Purchase_History"])){
                                $date = $row["order_date"];
                                $status = $row["order_date"];
                                $name = $row["mobilePhone_name"];
                                $price = $row["price"];
                                $price_sale = ($row["price"]/100)*(100 - $row["sale"]);
                                $img = $row["img"];
                                $quantity = $row["quantity"];
                                $mobilePhone_id = $row["mobilePhone_id"];
                                $order_id = $row["order_id"];
                                $total = $price_sale*$quantity;
                                // $_SESSION["check_order_id"] = $order_id;
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
                                            <button class="button-right-item-btn" style="background-color: #ee4d2d; border-color: #cd3011; color: #fff;">Đánh giá</button>
                                        </div>
                                        <div class="button-right-item">
                                            <button class="button-right-item-btn">Liên hệ người bán</button>
                                        </div>
                                        <div class="button-right-item">
                                            <button class="button-right-item-btn">Mua Lại</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- </div>  -->
                        <?php
                            }
                        ?>
                        <!-- <div class="box-order">  -->
                            <!-- <div> -->
                            <?php
                                if($_SESSION["check_order_id"] != $order_id){
                            ?>
                        <div class="box-order"> 
                            <div class="box-order-header">
                                <h2>CTSTORE</h2>
                                <div class="order-header-right">
                                    <div class="order-time"><?php echo $date ?></div>
                                    <div class="order-status">Trang thai</div>
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
                                    <p class="order-product-price"><?php echo number_format($price, 0, '', ',') ?>₫</p>
                                    <p class="order-product-price-sale"><?php echo number_format($price_sale, 0, '', ',') ?>₫</p>
                                </div>
                            </div>
                            <!-- </div> -->
                        <!-- </div>  -->
                    <?php
                        $_SESSION["check_order_id"] = $order_id;
                            }
                        }
                    ?>
                    <div class="box-order-end">
                        <div class="box-order-total">
                            <div class="order-total-title">Thành tiền: </div>
                            <div class="order-product-total"><?php echo number_format($total, 0, '', ',') ?>₫</div>
                        </div>
                        <div class="box-order-footer">
                            <div class="button-right">
                                <div class="button-right-item">
                                    <button class="button-right-item-btn" style="background-color: #ee4d2d; border-color: #cd3011; color: #fff;">Đánh giá</button>
                                </div>
                                <div class="button-right-item">
                                    <button class="button-right-item-btn">Liên hệ người bán</button>
                                </div>
                                <div class="button-right-item">
                                    <button class="button-right-item-btn">Mua Lại</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</body>
</html>
        