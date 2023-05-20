<!doctype html>
<html lang="en">
<head>
  <link rel='shortcut icon' href='../../wwwroot/img/Untitled-1.png'/>
  <title>CTstore Đăng nhập - Đăng ký</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/bootstrap-5.0.2-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/layout/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
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
            <li class="nav-item">
              <a class="nav-link" href="/Project---CTStore---WD1110/Login_Sigin/View_Login_Sigin"><span>Đăng nhập</span></a>
            </li>
          <?php 
          }
          ?>
          <?php 
          if(isset($_SESSION["email"])){
          ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" class="bi bi-person-circle">Tài khoản</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item bi bi-person-circle" href="/Project---CTStore---WD1110/Account/View_AccountInfo/<?php echo $_SESSION['email'];?>">Thông tin cá nhân</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item bi bi-box-arrow-right" href="/Project---CTStore---WD1110/Login_Sigin/Log_out">Đăng xuất</a></li>
                </ul>
            </li>
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
    
      <?php
        if(isset($data["content2"])){
          require_once "./MVC/Views/".$data["content"]."/".$data["content2"].".php";
        }
      ?>
      <?php
        if(!isset($data["content2"])){
          require_once "./MVC/Views/".$data["content"]."/".$data["content"].".php";
        }
      ?>
  <script>
    document.getElementsByClassName("bi")[4].addEventListener("click", function(){
      document.getElementsByClassName("links")[0].classList.toggle("showmyLinks");
    });
  </script>
</body>