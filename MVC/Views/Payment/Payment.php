<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/payment/payment.css">
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
                    $phoneN = $row2["customer_phonenumber"];
                    $nameC = $row2["customer_name"];
                    $addressC = $row2["customer_address"];
            ?>
            <div class="ct-payment-content">
                <div class="block-customer">
                    <p class="block-customer-title"></p>
                    <div class="block-customer-info">
                        <input value="<?php echo $nameC ?>" type="text" placeholder="Họ và tên (bắt buộc)" maxlength="50" autocomplete="off" class="mb-2">
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </form>
    </div>
</body>
</html>
        <!-- <option value="<?php echo $row2["customer_address"] ?>"><?php echo $row2["customer_address"] ; echo $row2["customer_name"] ; echo $row2["customer_phonenumber"] ?></option>
        <input type="submit" name="Payment" value="Mua">
        <a href="/Project---CTStore---WD1110/Account/View_Add_Address"><button value="them dia chi">them dia chi</a> -->