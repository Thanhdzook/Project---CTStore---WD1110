<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/MBDetail/mb-detail.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="card-wrapper">
        <div class="card">
            <!-- card-left -->
            <div class="product-imgs">
                <div class="img-display">
                    <div class="img-showcase">
                        <?php 
                            while($row = mysqli_fetch_array($data["mobilePhone"])){
                                $img = $row['img'];
                                $nameP = $row["mobilePhone_name"];
                                $price_main = $row["price"];
                                $price_sale_main = ($row["price"]/100)*(100-$row["sale"]);
                                $sale_main = $row["sale"];
                                $_id = $row["mobilePhone_id"];
                                $_amount = $row["amount"];
                        ?>
                        <img class="imgP" style="" src="<?php echo $img?>">
                        <img class="imgP" style="" src="<?php echo $img?>">
                        <img class="imgP" style="" src="<?php echo $img?>">
                        <img class="imgP" style="" src="<?php echo $img?>">
                        <?php } ?>
                    </div>
                </div>
                <div class="img-select">
                    <div class="img-item">
                        <a href="#" data-id="1">
                            <img class="imgP" style="" src="<?php echo $img?>">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="#" data-id="2">
                            <img class="imgP" style="" src="<?php echo $img?>">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="#" data-id="3">
                            <img class="imgP" style="" src="<?php echo $img?>">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="#" data-id="4">
                            <img class="imgP" style="" src="<?php echo $img?>">
                        </a>
                    </div>
                </div>
            </div>
            <!-- card-right -->
            <div class="product-content">
                <h2 class="product-nameP"><?php echo $nameP?></h2>
                <div class="product-rating">
                    <ul class="d-flex" style="padding: 0;">
                        <li><i class="bi bi-star-fill"></i></li>
                        <li><i class="bi bi-star-fill"></i></li>
                        <li><i class="bi bi-star-fill"></i></li>
                        <li><i class="bi bi-star-fill"></i></li>
                        <li><i class="bi bi-star-fill"></i></li>
                    </ul>
                </div>
                <?php
                    if(isset($data["sreach_by_memory"])){
                ?>
                <div class="box-memory row">
                    <?php
                        while($row = mysqli_fetch_array($data["sreach_by_memory"])){
                        $id = $row["mobilePhone_id"];
                        $memory = $row["memory"];
                        $price_sale = ($row["price"]/100)*(100-$row["sale"]);
                    ?>
                    <?php
                        if(isset($_SESSION["While_memory"])){
                            if($_SESSION["While_memory"] != $memory){
                    ?>
                    <a href="/Project---CTStore---WD1110/MobilePhone_Detail/ShowMobilePhoneDetail/<?php echo $id ?>" class="col-lg-3 col-md-6 col-xs-12">
                        <div class="menory-item-content">
                            <div class="menory-item"><?php echo $memory ?></div>
                            <div class="menory-item-price"><?php echo number_format($price_sale, 0, '', ',') ?>₫</div>
                        </div>
                    </a>
                    <?php
                            }
                        }
                    ?>
                    <?php
                        $_SESSION["While_memory"] = $memory;
                    }
                    ?>
                </div>
                <?php } ?>
                <?php
                    if(isset($data["sreach_by_memory"])){
                ?>
                <div class="box-color">
                    <div class="box-color-title">
                        <p>Chọn màu để xem giá</p>
                    </div>
                    <div class="box-color-content row">
                        <?php
                            while($row = mysqli_fetch_array($data["sreach_by_color"])){
                                $id = $row["mobilePhone_id"];
                                $color = $row["color"];
                                $price_sale = ($row["price"]/100)*(100-$row["sale"]);
                                $img = $row["img"];
                        ?>
                        <a href="/Project---CTStore---WD1110/MobilePhone_Detail/ShowMobilePhoneDetail/<?php echo $id ?>" class="col-xs-12">
                            <img class="imgP" style="" src="<?php echo $img?>">
                            <div class="color-item-content">
                                <div class="color-item-content-name"><?php echo $color; ?></div>
                                <div><?php echo number_format($price_sale, 0, '', ',') ?>₫</div>
                            </div>
                        </a>
                        <?php
                        }
                        ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="detail-product-price">
                    <p class="detail-product-price-show"><?php echo number_format($price_sale_main, 0, '', ',') ?>₫</p>
                    <?php
                        if($sale_main != 0){
                    ?>
                        <p class="detail-product-price-sale"><?php echo number_format($price_main, 0, '', ',') ?>₫</p>
                </div>
                <?php } ?>
                <div class="product-detail">
                    <p class="product-detail-title">Tính năng nổi bật</p>       
                    <ul class="product-detail-content">
                        <li class="product-detail-item">Hiệu năng vượt trội - Chip Apple A15 Bionic mạnh mẽ, hỗ trợ mạng 5G tốc độ cao</li>
                        <li class="product-detail-item">Trải nghiệm điện ảnh đỉnh cao - Camera kép 12MP, hỗ trợ ổn định hình ảnh quang học</li>
                        <li class="product-detail-item">Tối ưu điện năng - Sạc nhanh 20 W, đầy 50% pin trong khoảng 30 phút</li>
                    </ul>
                </div>
                <div class="box-order-button">
                    <form class="order-button" method="POST" action="/Project---CTStore---WD1110/Order_Detail/Check_Pay_Now/<?php echo $_id ?>/<?php echo $price_sale_main ?>/yes">
                        <button class="order-button-submit" type="submit" name="Order">MUA NGAY</button>
                    </form>
                    <form method="POST" action="/Project---CTStore---WD1110/Order_Detail/Check_Pay_Now/<?php echo $_id ?>/<?php echo $price_sale_main ?>/no">
                        <button type="submit" class="add-to-cart-button" name="Order">
                            <div class="cart-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                            <p>Thêm vào giỏ</p>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>