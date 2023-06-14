<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/Project---CTStore---WD1110/MVC/wwwroot/img/t2.png" type="image/x-icon">
    <title>CTstore Trang chủ</title>
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/home_page/home_page.css">
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
    <div class="block-top-home">
        <div class="banner-left"></div>
        <div class="slider">
            <div id="carouselExample" class="carousel slide slider-content-right-top-container">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://cdn2.cellphones.com.vn/690x300,webp,q100/https://dashboard.cellphones.com.vn/storage/hs-s23-512-09016.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item ">
                        <img src="https://cdn2.cellphones.com.vn/690x300,webp,q100/https://dashboard.cellphones.com.vn/storage/mo-ban-huawei-band-8.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://cdn2.cellphones.com.vn/690x300,webp,q100/https://dashboard.cellphones.com.vn/storage/sli-note-12-th66666.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://cdn2.cellphones.com.vn/690x300,webp,q100/https://dashboard.cellphones.com.vn/storage/mo-ban-huawei-band-8.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://cdn2.cellphones.com.vn/690x300,webp,q100/https://dashboard.cellphones.com.vn/storage/ip14-prm-th6.png" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="slider-content-right-bottom">
                <div class="right-bottom-item active-slide">
                    GALAXY S23 SERIES <br> Deal hot bùng nổ
                </div>
                <div class="right-bottom-item">
                    IPHONE 14 PRO MAX <br> Giá siêu ưu đãi
                </div>
                <div class="right-bottom-item">
                    REDMI NOTE 12 SERIES <br> Deal hời giá tốt
                </div>
                <div class="right-bottom-item">
                    IPHONE 13 PRO MAX <br> Deal nóng bỏng tay
                </div>
                <div class="right-bottom-item">
                    OPPO RENO 8 5G <br> Giá tốt chốt ngay
                </div>
            </div>
            <div class="slider-content-right-bottom-circle">
                <div class="bottom-circle-item active-slide1"></div>
                <div class="bottom-circle-item"></div>
                <div class="bottom-circle-item"></div>
                <div class="bottom-circle-item"></div>
                <div class="bottom-circle-item"></div>
            </div>
        </div>
    </div>
    <div class="slider-product-one" >
        <div class="container">
            <?php if(isset($data["phone_outstanding"])){ ?>
            <div class="slider-product-one-content-title">
                <h2>NỔI BẬT</h2>
                <div class="list-related">
                    <a href="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/operatingSystem/Iphone" class="list-related-button">iPhone</a>
                    <a href="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/operatingSystem/Iphone" class="list-related-button">Samsung</a>
                    <a href="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/operatingSystem/Iphone" class="list-related-button">Xiaomi</a>
                    <a href="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/operatingSystem/Iphone" class="list-related-button">Xem tất cả</a>
                </div>
            </div>
            <div class="row row-cols-2 row-cols-lg-5 row-cols-sm-3 row-cols-md-4 row-cols-xs-12 g-2 g-lg-3">
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
                                <ul class="d-flex" style="padding: 0; list-style: none;">
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
                <a href="/Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone_message/null/<?php echo ($_SESSION["next"]-10) ?>">
                <button><i class="fa-solid fa-circle-left" style="font-size: 32px;"></i></button></a>
            <?php } ?>
            <?php
                if($_SESSION["next"] < $_SESSION["count_mobilephone"]-10){
            ?>
                <a href="/Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone_message/null/<?php echo ($_SESSION["next"]+10) ?>">
                <button><i class="fa-solid fa-circle-right" style="font-size: 32px;"></i></button></a>
            <?php } ?>                           
        </div>
    </div>
    <a href="/Project---CTStore---WD1110/Messages/View_chat/123">chat</a>
    <script>
        const rightbtn = document.querySelector('.carousel-control-next-icon')        
        const leftbtn = document.querySelector('.carousel-control-prev-icon')
        const imgNumber = document.querySelectorAll('.carousel-item img')
        // console.log(imgNumber)
        const imgNumberLi = document.querySelectorAll('.slider-content-right-bottom .right-bottom-item')
        const imgNumberLi1 = document.querySelectorAll('.slider-content-right-bottom-circle .bottom-circle-item')
        // console.log(imgNumberLi1)
        // console.log(imgNumberLi)
        let index = 0

        rightbtn.addEventListener("click",function(){
            index = index + 1
            if (index>imgNumber.length-1) {
                index = 0
            }
            removeActive ()
            removeActive1 ()
            imgNumberLi[index].classList.add("active-slide")
            imgNumberLi1[index].classList.add("active-slide1")
            // console.log(imgNumberLi1)
        });
        leftbtn.addEventListener("click",function(){
            index = index - 1
            if (index<0) {
                index = imgNumber.length-1
            }
            removeActive ()
            removeActive1 ()
            imgNumberLi[index].classList.add("active-slide")
            imgNumberLi1[index].classList.add("active-slide1")
        });
        // Get the active slide element
        var rightBottomItems = document.querySelectorAll('.right-bottom-item');
        var rightBottomItems1 = document.querySelectorAll('.bottom-circle-item');
        var carouselItems = document.querySelectorAll('.carousel-item');

        // Loop through each right-bottom-item element
        for (var i = 0; i < rightBottomItems.length; i++) {
        // Add a click event listener to each right-bottom-item element
        rightBottomItems[i].addEventListener('click', function() {
            console.log(rightBottomItems[i])
            // Remove the "active" class from all carousel items
            for (var j = 0; j < carouselItems.length; j++) {
            carouselItems[j].classList.remove('active');
            }
            
            // Get the index of the clicked right-bottom-item element
            var clickedIndex = Array.prototype.indexOf.call(this.parentNode.children, this);
            console.log(clickedIndex)
            
            // Add the "active" class to the corresponding carousel item
            if (carouselItems[clickedIndex]) {
                console.log(carouselItems[clickedIndex])
            carouselItems[clickedIndex].classList.add('active');
            }
        });
        }
        for (var i = 0; i < rightBottomItems1.length; i++) {
        // Add a click event listener to each right-bottom-item element
        rightBottomItems1[i].addEventListener('click', function() {
            console.log(rightBottomItems1[i])
            // Remove the "active" class from all carousel items
            for (var j = 0; j < carouselItems.length; j++) {
            carouselItems[j].classList.remove('active');
            }
            
            // Get the index of the clicked right-bottom-item element
            var clickedIndex = Array.prototype.indexOf.call(this.parentNode.children, this);
            console.log(clickedIndex)
            
            // Add the "active" class to the corresponding carousel item
            if (carouselItems[clickedIndex]) {
                console.log(carouselItems[clickedIndex])
            carouselItems[clickedIndex].classList.add('active');
            }
        });
        }

        imgNumberLi.forEach(function(image,index){
            image.addEventListener("click",function(){
                removeActive ()
                image.classList.add("active-slide")
            })
        })
        imgNumberLi1.forEach(function(image,index){
            image.addEventListener("click",function(){
                removeActive1 ()
                image.classList.add("active-slide1")
            })
        })
        function removeActive (){
            let imgactive = document.querySelector('.active-slide');
            imgactive.classList.remove("active-slide")
        }
        function removeActive1 (){
            let imgactive1 = document.querySelector('.active-slide1');
            imgactive1.classList.remove("active-slide1")
        }
    </script>
</body>
</html>