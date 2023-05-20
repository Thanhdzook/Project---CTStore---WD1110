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
    <header class="header">
      <div class="logo">
          <a href="#">CTSTORE</a>
      </div>
      <div class="search">
        <form action="">
          <input type="text" placeholder="Bạn cần tìm gì?">
        </form>
      </div>
      <div class="icons">
        <a href="#" class="bi bi-telephone-fill"></a>
        <a href="#" class="bi bi-geo-alt-fill"></a>
        <a href="#" class="bi bi-basket3-fill"></a>
        <a href="#" class="bi bi-person-circle"></a>
      </div>
    </header>
    <div class="links">
        <a href="#">Danh mục sản phẩm</a>
        <a href="#">SamSung</a>
        <a href="#">Iphone</a>
        <a href="#">SamSung</a>
        <a href="#">Iphone</a>
        <a href="#">SamSung</a>
    </div>
    <!-- <header class="Header sticky-top">
        <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-ed ">
          <div class="container">
            <a class="navbar-brand" href="/Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone" style="color: #ffeba7;">CTstore</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="color: #ffeba7;"><i class="bi bi-border-width"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
              <a class="nav-link" href="#"><i class="bi bi-card-list"></i> Danh mục</a>
              </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <form class="search-form d-flex" role="search" method="post" action="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/mobilePhone_name">
                <input class="form-control me-2" type="text" placeholder="Bạn cần tìm gì?" aria-label="Search" name="NameMobilePhone">
                <button class="btn btn-outline-success search-btn" type="Sreach" name="Sreach"><i class="bi bi-search"></i></button>
              </form>
              <li class="nav-item">
              <a class="nav-link" href="/Project---CTStore---WD1110/Payment/ViewCart/null"><i class="bi bi-cart"></i> Giỏ hàng</a>
              </li>
                        <?php
                          // if(!isset($_SESSION["email"])){
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="/Project---CTStore---WD1110/Login_Sigin/View_Login_Sigin">
                                Đăng nhập
                            </a>
                        </li>
                        <?php 
                        //}
                        ?>
                        <?php 
                        //if(isset($_SESSION["email"])){
                        ?>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle"></i> Tài khoản</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/Project---CTStore---WD1110/Account/View_AccountInfo/<?php echo $_SESSION['email'];?>"><i class="bi bi-person-circle"></i> Thông tin cá nhân</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="/Project---CTStore---WD1110/Login_Sigin/Log_out"><i class="bi bi-box-arrow-right"></i> Đăng xuất</a></li>
                </ul>
                </li>
                        <?php
                         //}
                        ?>
            </ul>
          </div>
        </nav>
      </header> -->
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
</body>