<?php 
    $total = 0; 
    $_SESSION["count"] = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/payment/payment1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div id="content" class="payment-container">
        <div class="payment-header">
            <p class="payment-header-title">Thông tin đặt hàng</p>
        </div>
        <form method="post" action="/Project---CTStore---WD1110/Payment/Pay">
            <?php
                while($row2 = mysqli_fetch_array($data["customer"])){
                    $phoneN = $row2["phone_number"];
                    $nameC = $row2["full_name"];
                    // $addressC = $row2["customer_address"];
            ?>
            <?php
                }
            ?>
            <div class="ct-payment-content">
                <div class="block-customer">
                    <p class="block-customer-title">Thông tin khách hàng</p>
                    <div class="block-customer-info">
                        <input name="name" value="<?php echo $nameC ?>" type="text" placeholder="Họ và tên (bắt buộc)" maxlength="50" autocomplete="off" class="customer-info-input">
                        <input name="phoneN" value="<?php echo $phoneN ?>" type="text" placeholder="Số điện thoại (bắt buộc)" maxlength="10" autocomplete="off" class="customer-info-input">
                    </div>
                </div>
                <div class="block-payment">
                    <p class="block-payment-title">Chọn cách thức giao hàng</p>
                    <div class="box-radio">
                        <div class="radio-container">
                            <input type="radio" name="radio" id="radio1" value="check1">
                            <label for="radio1"><div class="radio-button"></div>Nhận tại cửa hàng</label>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="radio" id="radio2" value="check2" checked>
                            <label for="radio2"><div class="radio-button"></div>Giao hàng tận nơi</label>
                        </div>
                    </div>
                </div>
                <!-- <div class="block-address">
                    </select> 
                </div> -->
                <div class="block-note">
                    <input name="addres" type="text" placeholder="Địa chỉ">
                </div>
            </div>
            <?php
            $i = 0;
                while($row = mysqli_fetch_array($data["orderdetails"])){
                    $_SESSION["count"] = $i;
                    $img = $row["img"];
                    $mobilephone_id = $row["mobilePhone_id"];
                    $name = $row["mobilePhone_name"];
                    $quantity = $row["quantity"];
                    $unit_price = $row["price"];
                    $price_sale = $row["unit_price"];
                    $total = $total + ($price_sale*$quantity);
                    $_SESSION["mobilePhone_id"][$i] = $mobilephone_id;
                    $i++;
                }
            ?>
            <div class="botton-order">
                <div class="total-box-order">
                    <p class="total-order-title">Tổng tiền tạm tính</p>
                    <p class="total-order-price" id="totalPrice"><?php echo number_format($total, 0, '', ',')?>₫</p>
                </div>
                <div class="btn-submit-order">
                    <!-- <button type="submit" name="Payment" class="btn-order-summit">Tiến hành đặt hàng</button> -->
                    <input type="submit" name="Payment" value="Tiến hành đặt hàng" class="btn-order-summit">
                    <a href="/Project---CTStore---WD1110" class="btn-order-go-back">
                        Chọn thêm sản phẩm khác
                    </a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
        <!-- <option value="<?php echo $row2["customer_address"] ?>"><?php echo $row2["customer_address"] ; echo $row2["customer_name"] ; echo $row2["customer_phonenumber"] ?></option>
        <input type="submit" name="Payment" value="Mua">
        <a href="/Project---CTStore---WD1110/Account/View_Add_Address"><button value="them dia chi">them dia chi</a> -->