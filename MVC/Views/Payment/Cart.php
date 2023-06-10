<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/payment/cart.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="cart-container">
        <div class="cart-header">
            <p class="cart-header-title">Giỏ hàng</p>
        </div>
        <div class="cart-content">
            <?php
                if(isset($data["message"])){
                    if($data["message"] != "null"){
                        $message = $data["message"];
            ?>
            <i class="fa-solid fa-face-frown"></i>
            <p class="cart-content-notification"><?php echo $message?></p>
            <a href="/Project---CTStore---WD1110" class="cart-content-go-back">
                Quay lại trang chủ
            </a>
            <?php
                    }
            }
            ?>
        </div>
        <div class="cart-list-order">
            <?php
                if(isset($data["orderdetails"])){
            ?>
            <form method="post" action="/Project---CTStore---WD1110/Payment/ViewPay">
            <?php
                while($row = mysqli_fetch_array($data["orderdetails"])){
                    $img = $row["img"];
                    $mobilephone_id = $row["mobilePhone_id"];
                    $name = $row["mobilePhone_name"];
                    $quantity = $row["quantity"];
                    $unit_price = $row["unit_price"];
                    $price_sale = ($row["unit_price"]/100)*(100-$row["sale"]);
                    $total = ($row["quantity"])*$price_sale;
                    // echo "<br>";
                    // echo $row["quantity"]*$row["unit_price"];
                    // echo "<br>";
                ?>
                <div class="box-order-item">
                    <div class="order-item-product">
                        <input class="order-checkbox" type="checkbox" name="<?php echo $mobilephone_id;?>">
                        <div class="order-item-product-img">
                            <img src="<?php echo $img ?>" alt="">
                        </div>
                        <div class="order-item-product-info">
                            <div class="order-product-name"><?php echo $name?></div>
                            <div class="d-flex justify-content-between">
                                <div class="order-product-price">
                                    <p class="price-sale"><?php echo number_format($price_sale, 0, '', ',')?>₫</p>
                                    <p class="unit-price"><?php echo number_format($unit_price, 0, '', ',')?>₫</p>   
                                </div>
                                <div class="order-product-quanity">
                                    <p class="quanity-title">Số lượng: </p>
                                    <p class="quanity-content"><?php echo $quantity?></p>
                                </div>
                            </div>
                            <div class="box-promo">
                                <div class="promo-title">
                                    <div class="promo-title-icon"><i class="fa-solid fa-gift"></i></div>
                                    <div class="promo-title-title">Chương trình khuyến mãi</div>
                                </div>
                                <ul class="promo-info">
                                    <li class="promo-info-item">
                                        + Tặng Sim 4G Vinaphone (4GB/NGÀY) - 12 Tháng (Giá tốt liên hệ hotline: 1800.2097)</li>
                                    <li class="promo-info-item">
                                        + Giảm ngay 2.500.000đ khi tham gia thu cũ đổi mới - Giá thu tốt nhất thị trường</li>
                                    <li class="promo-info-item">
                                        + Nhiều ưu đãi khi thanh toán qua VNPAY, ONEPAY</li>
                                </ul>
                                <div class="hot-sale">
                                    <p>Chi tiết liên hệ: 19001001</p>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="btn-delete-item">
                        <i class="fa-solid fa-trash"></i>
                    </div>
                </div>
            <?php
                }
            ?>
            <div class="botton-order">
                <div class="total-box-order">
                    <p class="total-order-title">Tổng tiền tạm tính</p>
                    <p class="total-order-price"><?php echo number_format($total, 0, '', ',')?>₫</p>
                </div>
                <div class="btn-submit-order">
                    <button type="submit" name="Payment" class="btn-order-summit">Tiến hành đặt hàng</button>
                    <a href="/Project---CTStore---WD1110" class="btn-order-go-back">
                        Chọn thêm sản phẩm khác
                    </a>
                </div>
            </div>
            </form>
        <?php
            }
        ?>
        </div>

    </div>
</body>
</html>

        <?php
            if(isset($data["orderdetails"])){
        ?>
        <form method="post" action="/Project---CTStore---WD1110/Payment/ViewPay">
            <?php 
                while($row = mysqli_fetch_array($data["orderdetails"])){
                    $img = $row["img"];
                    $mobilephone_id = $row["mobilePhone_id"];
                    echo $row["mobilePhone_name"];
                    echo "<br>";
                    echo $row["order_id"];
                    echo "<br>";
                    echo $row["quantity"];
                    echo "<br>";
                    echo $row["quantity"]*$row["unit_price"];
                    echo "<br>";
                    ?>
                <div>
                    <img style="width: 100px; height: 100px;" src="<?php echo $img?>">
                </div>
                <div>
                    <input type="checkbox" name="<?php echo $mobilephone_id;?>" value="chọn">chọn
                </div>
            <?php
                }
            ?>
            <input type="submit" name="Payment" value="Mua">
        </form>
        <?php
            }
        ?>
        
