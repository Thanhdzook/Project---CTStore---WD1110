<?php
  $check1 = "";
  $check2 = "";
  $check3 = $data["content2"];
  switch($check3){
    case "Purchase_History":
      $check2 = "active1";
      break;
    case "Infor_Account":
      $check1 = "active1";
      break;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="/Project---CTStore---WD1110/MVC/wwwroot/img/t2.png"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/Account/style-layout-account.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<header class="header">
          <div class="logo d-flex">
              <a href="/Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone" class="logoC">CTSTORE</a>
              <ul class="d-flex">
                <li class="connect">Kết nối</li>
                <li><a href="https://www.facebook.com/profile.php?id=100093042024390" class=""><i class="bi bi-facebook"></i></a></li>
                <li><a href="https://www.instagram.com/ctstore_18/?igshid=NTc4MTIwNjQ2YQ%3D%3D" class=""><i class="bi bi-instagram"></i></a></li>
              </ul>
          </div>
          <div class="search">
            <form class="search-form d-flex" role="search" method="post" action="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone_By_Name/mobilePhone_name">
              <input class="form-control" type="text" placeholder="Bạn cần tìm gì?" aria-label="Search" name="NameMobilePhone">
              <button class="btn btn-outline-success search-btn" type="Sreach" name="Sreach"><i class="bi bi-search"></i></button>
            </form>
          </div>
          <div class="icons">
            <div class="box-icon-cart">
              <a href="/Project---CTStore---WD1110/Payment/ViewCart/null">
                <div class="icon-cart"><i class="fa-solid fa-bag-shopping"></i></div>
                <div class="box-number-order" onmouseover="this.style.color = 'red';" onmouseout="this.style.color = '#1a955c';">
                  <p class="number-order"><?php if(isset($_SESSION["Count_Cart"])) echo $_SESSION["Count_Cart"] ?></p>
                </div>
              </a>
            </div>
              <a href="#" class="icon-item active-bi-list" id="category">
                  <div class="icon-item-icon"><i class="bi bi-list" ></i></div>
                  <div class="icon-item-content"><p class="icon-item-name" >Danh mục</p></div>
              </a>
              <?php
                if(!isset($_SESSION["email"])){
              ?>
                <a href="/Project---CTStore---WD1110/Login_Sigin/View_Login_Sigin" class="icon-item">
                  <div class="icon-item-content"><p class="icon-item-name" >Đăng nhập</p></div>
                </a>
              <?php 
              }
              ?>
              <?php 
              if(isset($_SESSION["email"])){
              ?>
                <div class="nav-item dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <a href="#" class="icon-item">
                      <div class="icon-item-icon"><i class="bi bi-person-circle" ></i></div>
                      <div class="icon-item-content"><p class="icon-item-name" ><?php echo $_SESSION["FullName"] ?></p></div>
                  </a>
                    <ul class="dropdown-menu">
                      <?php
                        if($data["content"] != "Account"){
                      ?>
                        <li><a class="dropdown-item bi bi-person-circle" href="/Project---CTStore---WD1110/Account/View_Account_Infor"><span> Thông tin cá nhân</span></a></li>
                        <li><hr class="dropdown-divider"></li>
                      <?php
                      }
                      ?>

                      <li><a class="dropdown-item bi bi-box-arrow-right active-out" href="/Project---CTStore---WD1110/Login_Sigin/Log_out"><span> Đăng xuất</span></a></li>
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
    <div class="container">
        <div class="left-col">
            <div class="block-menu">
              <div id="div1" class="block-menu-item <?php echo $check1 ?>">
                <a  href="/Project---CTStore---WD1110/Account/View_Account_Infor">
                  <div class="block-menu__item-icon"><i class="fa-solid fa-circle-user"></i></div>
                  <div class="block-menu__item-name">Tài khoản của bạn</div>
                </a>
              </div>
              <div id="div2" class="block-menu-item <?php echo $check2 ?>">
                <a href="/Project---CTStore---WD1110/Order_Detail/View_Purchase_History/0">
                  <div class="block-menu__item-icon">
                    <i class="fa-solid fa-truck-fast"></i>
                  </div>
                  <div class="block-menu__item-name">Đơn hàng của bạn</div>
                </a>
              </div>
              <div class="block-menu-item">
                <a href="/Project---CTStore---WD1110/Login_Sigin/Log_out">
                  <div class="block-menu__item-icon"><i class="fa-solid fa-right-from-bracket"></i></div>
                  <div class="block-menu__item-name">Thoát tài khoản</div>
                </a>
              </div>  
            </div>
        </div>
        <div class="right-col">
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
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var iconItem = document.querySelector('.active-bi-list');
          iconItem.addEventListener('click', function() {
            document.getElementsByClassName("links")[0].classList.toggle("showmyLinks");
          });
        });
    </script>
</body>
</html>