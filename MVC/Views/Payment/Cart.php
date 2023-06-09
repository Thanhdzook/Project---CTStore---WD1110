<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/layout/layout.css">
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
            <i class="fa-solid fa-face-frown"></i>
            <?php
                if(isset($data["message"])){
                    if($data["message"] != "null"){
                        $message = $data["message"];
            ?>
            <p class="cart-content-notification"><?php echo $message?></p>
            <?php
                    }
            }
            ?>
            <a href="/Project---CTStore---WD1110" class="cart-content-go-back">
                Quay lại trang chủ
            </a>
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
        
        
    </div>
