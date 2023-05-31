<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/layout/layout.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="/Project---CTStore---WD1110/MVC/wwwroot/js/index.js" ></script>
</head>
<body>

<header class="header">
      <div class="logo d-flex">
          <a href="/Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone" class="logoC">CTSTORE</a>
          <ul class="d-flex">
            <li class="connect">Kết nối</li>
            <li><a href="#" class=""><i class="bi bi-facebook"></i></a></li>
            <li><a href="#" class=""><i class="bi bi-instagram"></i></a></li>
          </ul>
      </div>
      <div class="search">
        <form class="search-form d-flex" role="search" method="post" action="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone_By_Name/mobilePhone_name">
          <input class="form-control" type="text" placeholder="Bạn cần tìm gì?" aria-label="Search" name="NameMobilePhone">
          <button class="btn btn-outline-success search-btn" type="Sreach" name="Sreach"><i class="bi bi-search"></i></button>
        </form>
      </div>
      <div class="icons">

        <a href="/Project---CTStore---WD1110/Payment/ViewCart/null" class="bi bi-basket3-fill"><span> Giỏ hàng</span></a>
        <a href="#" class="bi bi-list" id="category"><span> Danh mục</span></a>
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
              <a class="nav-link bi bi-person-circle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="margin-top:2px"><span> Tài khoản</span></a>
                <ul class="dropdown-menu">
                  <?php
                    if($data["content"] != "Account"){
                  ?>
                    <li><a class="dropdown-item bi bi-person-circle" href="/Project---CTStore---WD1110/Account/View_Account_Infor"><span> Thông tin cá nhân</span></a></li>
                    <li><hr class="dropdown-divider"></li>
                  <?php
                  }
                  ?>

                  <li><a class="dropdown-item bi bi-box-arrow-right" href="/Project---CTStore---WD1110/Login_Sigin/Log_out"><span> Đăng xuất</span></a></li>
                </ul>
          </div>
          <?php
          }
          ?>

      </div>
    </header>
    <div class="links">
      <li><hr class="dropdown-divider"></li>
      <a href="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/operatingSystem/Iphone">Iphone</a>
      <li><hr class="dropdown-divider"></li>
      <a href="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/operatingSystem/Sam Sung">Sam Sung</a>
      <li><hr class="dropdown-divider"></li>
      <a href="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/operatingSystem/Oppo">Oppo</a>
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
<script type="text/javascript" src="/Project---CTStore---WD1110/MVC/wwwroot/js/index.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>