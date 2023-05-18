<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/home_page/home_page.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>
    
    <?php
        if(isset($data["message"])){
                $message = $data["message"];
                echo "<script type='text/javascript'>alert('$message');</script>";
        }
    ?>
	<main class="container mt-3">
		<div class="block-top-home row">
			<div class="menu-tree col-md-2 col-xs-2">
                <div class="d-flex flex-column mb-3">
                        <div class="p-2">Flex item 1</div>
                        <div class="p-2">Flex item 2</div>
                        <div class="p-2">Flex item 3</div>
                        <div class="p-2">Flex item 1</div>
                </div>
            </div>
			<div class="block-slide col-md-7 col-xs-10">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner slide">
                        <div class="carousel-item active">
                        <img src="/Project---CTStore---WD1110/MVC/wwwroot//img/1.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="/Project---CTStore---WD1110/MVC/wwwroot/img/2.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="/Project---CTStore---WD1110/MVC/wwwroot/img/3.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
			<div class="banner-right col-md-3 col-xs-0">
                <div class="col-md-2">
                    <div class="d-flex flex-column mb-3">
                        <div class="pb-2"><img src="/Project---CTStore---WD1110/MVC/wwwroot/img/qc1.png" alt="anh?"></div>
                        <div class="pb-2"><img src="/Project---CTStore---WD1110/MVC/wwwroot/img/qc2.png" alt="anh?"></div>
                        <div class="pb-2"><img src="/Project---CTStore---WD1110/MVC/wwwroot/img/qc2.png" alt="anh?"></div>
                    </div>
                </div>
            </div>
		</div>
		<div class="banner">
            
		</div>

        <div>
            <?php
                while($row = mysqli_fetch_array($data["mobilePhone"])){
                    echo $row["mobilePhone_name"];
                    echo "<br/>";
                    echo $row["price"];
                    echo "<br/>";
                    // echo $_SESSION['email'];
                    $img = $row["img"];
                    $id = $row["mobilePhone_id"];
            ?>
                <img style="width: 100px; height: 100px;" src="<?php echo $img?>">
                <br/>
                <a href="/Project---CTStore---WD1110/MobilePhone_Detail/ShowMobilePhoneDetail/<?php echo $id ?>"><button>xem chi tiết</button></a>
                <br/>
            <?php }?>
        </div>
        

	</main>
	<!-- <footer class="footer">
		<p>Footer của trang web</p>
	</footer> -->
    <script src="/Project---CTStore---WD1110/MVC/wwwroot/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
</body>
</html>