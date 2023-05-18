<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot//bootstrap-5.0.2-dist/css/home_page.css">
    <!-- <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/home_page/style.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>
    <?php
        if(isset($data["message"])){
                $message = $data["message"];
                echo "<script type='text/javascript'>alert('$message');</script>";
        }
    ?>
    <header class="Header">
		<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top navbar-ed">
			<div class="container">
				<a class="navbar-brand" href="#" style="color: #ffeba7;">CTstore</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
					<a class="nav-link" href="#">Danh mục</a>
					</li>
				</ul>
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<form class="search-form d-flex" role="search" method="post" action="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/mobilePhone_name">
						<input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="NameMobilePhone">
						<button class="btn btn-outline-success search-btn" type="Sreach" name="Sreach">Search</button>
					</form>
					<li class="nav-item">
					<a class="nav-link" href="/Project---CTStore---WD1110/Payment/ViewCart/null">Giỏ hàng</a>
					</li>
                    <?php if($_SESSION["email"] == ""){
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/Project---CTStore---WD1110/Login_Sigin/View_Login_Sigin">
                            Đăng nhập
                        </a>
					</li>
                    <?php }?>
                    <?php if($_SESSION["email"] != ""){
                    ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tài khoản
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/Project---CTStore---WD1110/Account/View_AccountInfo/<?php echo $_SESSION['email'];?>">Thông tin cá nhân</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Đăng xuất</a></li>
                            </ul>
					    </li>
                    <?php }?>
				</ul>
			</div>
		</nav>
	</header>
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