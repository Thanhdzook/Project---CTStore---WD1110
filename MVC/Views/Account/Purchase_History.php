<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
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
                    <div class="box-order-list">
                        <div class="box-order">
                            <div>
                                <div class="box-order-header">
                                    <h2>CTSTORE</h2>
                                    <div class="order-status">Trang thai</div>
                                </div>
                                <div class="box-order-content">
                                    <div class="order-product-img">
                                        <img src="" alt="">
                                    </div>
                                    <div class="order-product-info1">
                                        <p class="order-product-name"></p>
                                        <p class="order-product-quanity"></p>
                                    </div>
                                    <div class="order-product-info2">
                                        <p class="order-product-price"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-order-end">
                            <div class="box-order-total">
                                <div class="order-total-title"></div>
                                <div class="order-product-total"></div>
                            </div>
                            <div class="box-order-footer">
                                <div class="order-time"></div>
                                <div class="button-right"></div>
                            </div>
                        </div>
                    </div>
                    <?php
                        $_SESSION["check_order_id"] = 0;
                        if(isset($data["Purchase_History"])){
                            while($row = mysqli_fetch_array($data["Purchase_History"])){
                                $date = $row["order_date"];
                                $status = $row["order_date"];
                                $mobilePhone_name = $row["mobilePhone_name"];
                                $price = ($row["price"]/100)*(100 - $row["sale"]);
                                $img = $row["img"];
                                $quantity = $row["quantity"];
                                $mobilePhone_id = $row["mobilePhone_id"];
                                $order_id = $row["order_id"];
                    ?>
                    <?php
                        if($_SESSION["check_order_id"] != $order_id){
                    ?>
                        <br>
                        <h2><?php echo $date ?></h2>
                        <h2><?php echo $mobilePhone_name ?></h2>
                    <?php
                        }
                    ?>
                    <?php
                        if($_SESSION["check_order_id"] == $order_id){
                    ?>
                    
                    <?php
                        }
                    ?>
                        

                    <?php
                        $_SESSION["check_order_id"] = $order_id;
                    ?>
                    <?php
                            }
                        }
                    ?>
                    
                </div>

                
            </div>
        </div>
	</div>
</body>
</html>
        <div>
            <?php
            if(isset($data["message"])) {
                echo $data["message"];
            }
            ?>
        </div>