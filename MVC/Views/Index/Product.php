<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/Project---CTStore---WD1110/MVC/wwwroot/img/t2.png" type="image/x-icon">
    <title>CTstore Trang chủ</title>
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/home_page/product.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="slider-product-one">
        <div class="container">
            <?php if (isset($data["mobilePhone"])) { ?>
                <div class="slider-product-one-content-title">
                    <h2>NỔI BẬT</h2>
                    <div class="list-related">
                        <a href="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/operatingSystem/Iphone" class="list-related-button">iPhone</a>
                        <a href="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/operatingSystem/Samsung" class="list-related-button">Samsung</a>
                        <a href="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/operatingSystem/Xiaomi" class="list-related-button">Xiaomi</a>
                        <a href="/Project---CTStore---WD1110" class="list-related-button">Xem tất cả</a>
                    </div>
                </div>
                <div class="row row-cols-2 row-cols-lg-5 row-cols-sm-3 row-cols-md-4 row-cols-xs-12 g-2 g-lg-3">
                    <?php
                    while ($row = mysqli_fetch_array($data["mobilePhone"])) {
                        echo "ok";
                        $id = $row["mobilePhone_id"];
                        $name_phone = $row["mobilePhone_name"];
                        $price = $row["price"];
                        $price_sale = ($row["price"] / 100) * (100 - $row["sale"]);
                        $sale = $row["sale"];
                        $img = $row["img"];
                    ?>
                        <a href="/Project---CTStore---WD1110/MobilePhone_Detail/ShowMobilePhoneDetail/<?php echo $id ?>" class="text-href">
                            <div class="col slider-product">
                                <div class="p-3 product">
                                    <div class="product-item d-flex">
                                        <img src="<?php echo $img ?>">
                                    </div>
                                    <div class="product-name">
                                        <h3><?php echo $name_phone ?></h3>
                                    </div>
                                    <div class="product-price">
                                        <p class="product-price-show"><?php echo number_format($price_sale, 0, '', ',') ?>₫</p>
                                        <?php
                                        if ($sale != 0) {
                                        ?>
                                            <p class="product-price-sale"><?php echo number_format($price, 0, '', ',') ?>₫</p>
                                            <div class="product-percent">Giảm <?php echo $sale ?>%</div>
                                        <?php } ?>
                                    </div>

                                    <div class="product-rating">
                                        <ul class="d-flex" style="padding: 0;">
                                            <li><i class="bi bi-star-fill"></i></li>
                                            <li><i class="bi bi-star-fill"></i></li>
                                            <li><i class="bi bi-star-fill"></i></li>
                                            <li><i class="bi bi-star-fill"></i></li>
                                            <li><i class="bi bi-star-fill"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php
                    } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>