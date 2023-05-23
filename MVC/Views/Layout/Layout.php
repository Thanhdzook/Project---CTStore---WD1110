<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Document</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/layout/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<header class="header row">
      <div class="logo col-md-3">
          <a href="/Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone" class="logoC">CTSTORE</a>
      </div>
      <div class="search col-md-4">
        <form class="search-form d-flex" role="search" method="post" action="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/mobilePhone_name">
          <input class="form-control" type="text" placeholder="Bạn cần tìm gì?" aria-label="Search" name="NameMobilePhone">
          <button class="btn btn-outline-success search-btn" type="Sreach" name="Sreach"><i class="bi bi-search"></i></button>
        </form>
      </div>
      <div class="icons col-md-5">

        <a href="/Project---CTStore---WD1110/Payment/ViewCart/null" class="bi bi-basket3-fill"><span> Giỏ hàng</span></a>
          <?php
            if(!isset($_SESSION["email"])){
          ?>
            <div class="nav-item">
              <a class="nav-link" href="/Project---CTStore---WD1110/Login_Sigin/View_Login_Sigin"><span>Đăng nhập</span></a>
            </div>
          <?php 
          }
          ?>
          <?php 
          if(isset($_SESSION["email"])){
          ?>
            <div class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" class="bi bi-person-circle">Tài khoản</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item bi bi-person-circle" href="/Project---CTStore---WD1110/Account/View_AccountInfo/<?php echo $_SESSION['email'];?>">Thông tin cá nhân</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item bi bi-box-arrow-right" href="/Project---CTStore---WD1110/Login_Sigin/Log_out">Đăng xuất</a></li>
                </ul>
          </div>
          <?php
          }
          ?>
        <a href="#" class="bi bi-list" id="category"><span> Danh mục</span></a>
      </div>
    </header>
    <div class="links">
      <li><hr class="dropdown-divider"></li>
        <a href="#">Danh mục sản phẩm</a>
        <li><hr class="dropdown-divider"></li>
        <a href="#">SamSung</a>
        <li><hr class="dropdown-divider"></li>
        <a href="#">Iphone</a>
        <li><hr class="dropdown-divider"></li>
        <a href="#">SamSung</a>
        <li><hr class="dropdown-divider"></li>
        <a href="#">Iphone</a>
        <li><hr class="dropdown-divider"></li>
        <a href="#">SamSung</a>
        <li><hr class="dropdown-divider"></li>
    </div>

<script>
    document.getElementsByClassName("bi")[4].addEventListener("click", function(){
      document.getElementsByClassName("links")[0].classList.toggle("showmyLinks");
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>