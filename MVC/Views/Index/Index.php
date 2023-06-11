<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/home_page/hone_page1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- <script type="text/javascript" src="/Project---CTStore---WD1110/MVC/wwwroot/js/index.js"></script> -->
</head>
<body>
    <?php
        if(isset($data["message"])){
            if($data["message"] != "null"){
                $message = $data["message"]; 
    ?>
    <li class="alert"><?php echo $message?></li>
    <?php
            }
        }   
    ?>
    <section class="slider">
        <div class="slider-content-right-top-container">
            <div class="slider-content-right-top">
                <a href=""><img src="/Project---CTStore---WD1110/MVC/wwwroot/img/banner1.png" alt=""></a>
                <a href=""><img src="/Project---CTStore---WD1110/MVC/wwwroot/img/banner2.png" alt=""></a>
                <a href=""><img src="/Project---CTStore---WD1110/MVC/wwwroot/img/banner3.png" alt=""></a>
                <a href=""><img src="/Project---CTStore---WD1110/MVC/wwwroot/img/banner4.png" alt=""></a>
                <a href=""><img src="/Project---CTStore---WD1110/MVC/wwwroot/img/banner5.png" alt=""></a>
            </div>
            <div class="slider-content-right-top-btn">
                <i class="bi bi-chevron-left"></i>
                <i class="bi bi-chevron-right"></i>
            </div>
        </div>
        <div class="slider-content-right-bottom">
            <li class="active">GALAXY S23 SERIES<br>Deal hot bùng nổ</li>
            <li>GALAXY S23 SERIES<br>Deal hot bùng nổ</li>
            <li>GALAXY S23 SERIES<br>Deal hot bùng nổ</li>
            <li>GALAXY S23 SERIES<br>Deal hot bùng nổ</li>
            <li>GALAXY S23 SERIES<br>Deal hot bùng nổ</li>
        </div>
    </section>
    
    <div class="slider-product-one" >
        <div class="container">
            <?php if(isset($data["phone_outstanding"])){ ?>
            <div class="slider-product-one-content-title">
                <h2>NỔI BẬT</h2>
                <div class="list-related">
                    <a href="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/operatingSystem/Iphone" class="list-related-button">iPhone</a>
                    <a href="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/operatingSystem/Iphone" class="list-related-button">Samsung</a>
                    <a href="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/operatingSystem/Iphone" class="list-related-button">Xiaomi</a>
                    <a href="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/operatingSystem/Iphone" class="list-related-button">OPPO</a>
                    <a href="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/operatingSystem/Iphone" class="list-related-button">Xem tất cả</a>
                </div>
            </div>
            <div class="row row-cols-2 row-cols-lg-5 row-cols-md-4 row-cols-xs-1 g-2 g-lg-3">
                <?php
                    while($row = mysqli_fetch_array($data["phone_outstanding"])){
                        $id = $row["mobilePhone_id"];
                        $name_phone = $row["mobilePhone_name"];
                        $price = $row["price"];
                        $price_sale = ($row["price"]/100)*(100-$row["sale"]);
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
                                    if($sale != 0){
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
                }?>
            </div>
            <?php } ?>
        </div>
        <div class="slider-product-two" >
        <div class="container">
            <div class="slider-product-one-content-title">
                <h2>DANH SÁCH SẢN PHẨM</h2>
                <div class="list-related">
                    <a href="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/operatingSystem/Iphone" class="list-related-button">iPhone</a>
                    <a href="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/operatingSystem/Iphone" class="list-related-button">Samsung</a>
                    <a href="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/operatingSystem/Iphone" class="list-related-button">Xiaomi</a>
                    <a href="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/operatingSystem/Iphone" class="list-related-button">OPPO</a>
                    <a href="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/operatingSystem/Iphone" class="list-related-button">Xem tất cả</a>
                </div>
            </div>
            <div class="row row-cols-2 row-cols-lg-5 row-cols-md-4 row-cols-xs-1 g-2 g-lg-3">
                <?php
                    while($row = mysqli_fetch_array($data["mobilePhone"])){
                        $id = $row["mobilePhone_id"];
                        $name_phone = $row["mobilePhone_name"];
                        $price = $row["price"];
                        $price_sale = ($row["price"]/100)*(100-$row["sale"]);
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
                                    if($sale != 0){
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
                <?php } ?>
            </div>
        </div>
        <div class="icons__pre-next">
            <?php
                if($_SESSION["next"] != 0){
            ?>
                <a href="/Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone_message/null/<?php echo ($_SESSION["next"]-5) ?>">
                <button><i class="fa-solid fa-circle-left" style="font-size: 32px;"></i></button></a>
            <?php } ?>
            <?php
                if($_SESSION["next"] < $_SESSION["count_mobilephone"]-5){
            ?>
                <a href="/Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone_message/null/<?php echo ($_SESSION["next"]+5) ?>">
                <button><i class="fa-solid fa-circle-right" style="font-size: 32px;"></i></button></a>
            <?php } ?>                           
        </div>
    </div>
    <a href="/Project---CTStore---WD1110/Messages/View_chat/123">chat</a>
<script>
    const rightbtn = document.querySelector('.bi-chevron-right')
    console.log(rightbtn)
    const leftbtn = document.querySelector('.bi-chevron-left')
    console.log(leftbtn)
    const imgNumber = document.querySelectorAll('.slider-content-right-top a img')
    console.log(imgNumber)
    const imgNumberLi = document.querySelectorAll('.slider-content-right-bottom li')
    console.log(imgNumberLi)
    let index = 0

    rightbtn.addEventListener("click",function(){
        index = index + 1
        if (index>imgNumber.length-1) {
            index = 0
        }
        removeActive ()
        document.querySelector(".slider-content-right-top").style.right = index * 100+'%'
        imgNumberLi[index].classList.add("active")
    });
    leftbtn.addEventListener("click",function(){
        index = index - 1
        if (index<=0) {
            index = imgNumber.length-1
        }
        removeActive ()
        document.querySelector(".slider-content-right-top").style.right = index * 100+'%'
        imgNumberLi[index].classList.add("active")
    });
    imgNumberLi.forEach(function(image,index){
        image.addEventListener("click",function(){
            removeActive ()
            document.querySelector(".slider-content-right-top").style.right = index * 100+'%'
            image.classList.add("active")
        })
    })
    function removeActive (){
        let imgactive = document.querySelector('.active');
        imgactive.classList.remove("active")
    }
    function imgAuto(){
        index = index +1
        if (index>imgNumber.length-1) {
            index = 0
        }
        removeActive ()
        document.querySelector(".slider-content-right-top").style.right = index * 100+'%'
        imgNumberLi[index].classList.add("active")
    }
    setInterval(imgAuto,6000)
</script>


</body>
</html>
<!-- <section class="slider">
        <div class="container">
            <div class="slider-content row d-flex">
                <div class="slider-content-left col-md-3">
                    <ul>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"></a></li>
                    </ul>
                </div>
                <div class="slider-content-right col-md-9">
                    <div class="slider-content-right-top-container">
                        <div class="slider-content-right-top">
                            <a href=""><img src="/Project---CTStore---WD1110/MVC/wwwroot/img/banner1.png" alt=""></a>
                            <a href=""><img src="/Project---CTStore---WD1110/MVC/wwwroot/img/banner2.png" alt=""></a>
                            <a href=""><img src="/Project---CTStore---WD1110/MVC/wwwroot/img/banner3.png" alt=""></a>
                            <a href=""><img src="/Project---CTStore---WD1110/MVC/wwwroot/img/banner4.png" alt=""></a>
                            <a href=""><img src="/Project---CTStore---WD1110/MVC/wwwroot/img/banner5.png" alt=""></a>
                        </div>
                        <div class="slider-content-right-top-btn">
                            <i class="bi bi-chevron-left"></i>
                            <i class="bi bi-chevron-right"></i>
                        </div>
                    </div>
                    <div class="slider-content-right-bottom">
                        <li class="active">Tieu de 1</li>
                        <li>Tieu de 1</li>
                        <li>Tieu de 1</li>
                        <li>Tieu de 1</li>
                        <li>Tieu de 1</li>
                    </div>
                </div>
            </div>
        </div>
    </section> -->