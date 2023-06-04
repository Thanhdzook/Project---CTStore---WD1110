<?php
    if(isset($data["message"])){
        $message = $data["message"];
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/layout/styleHP.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- <script type="text/javascript" src="/Project---CTStore---WD1110/MVC/wwwroot/js/index.js"></script> -->
</head>
<body>
    <section class="slider">
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

    </section>
    <div class="slider-product-one" >
        <div class="container">
            <div class="slider-product-one-content-title">
                <h2>Nổi bật</h2>
            </div>
            <div class="row row-cols-2 row-cols-lg-5 row-cols-md-4 row-cols-xs-1 g-2 g-lg-3">
                <?php
                    while($row = mysqli_fetch_array($data["mobilePhone"])){
                        $name_phone = $row["mobilePhone_name"];
                        $price = $row["price"];
                        $img = $row["img"];
                ?>
                
                <div class="col slider-product">
                    <div class="p-3 product">

                            <div class="product-item d-flex">
                                <img src="<?php echo $img ?>">
                            </div>
                            <div class="slider-product-one-content-item-text">
                                <li><?php echo $name_phone ?></li>
                                <li><?php echo number_format($price, 0, '', ',') ?>đ</li>
                            </div>
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
<script>
    const rightbtn = document.querySelector('.bi-chevron-right')
    const leftbtn = document.querySelector('.bi-chevron-left')
    const imgNumber = document.querySelectorAll('.slider-content-right-top img')
    const imgNumberLi = document.querySelectorAll('.slider-content-right-bottom li')
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