<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="/Project---CTStore---WD1110/MVC/wwwroot/img/t2.png"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/layout/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/Account/style.css">
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
                <div class="dropdown">
                    <a href="#" class="icon-item" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="icon-item-icon"><i class="bi bi-person-circle" ></i></div>
                        <div class="icon-item-content"><p class="icon-item-name" >Tài khoản</p></div>
                    </a>
                    <ul class="dropdown-menu">
                      <?php
                          if($data["content"] != "Account"){
                      ?>
                        <li><a class="dropdown-item bi bi-person-circle"  href="/Project---CTStore---WD1110/Account/View_Account_Infor">Thông tin cá nhân</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item bi bi-box-arrow-right active-out" href="/Project---CTStore---WD1110/Login_Sigin/Log_out">Đăng xuất</a></li>
                      <?php
                        }
                      ?>
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

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-6">
            <div class="single-box single-box1">
              <h1>CTSTORE</h1>
              <p>Gọi mua hàng <span>1800.2097</span></p>
              <p>Gọi bảo hành <span>1800.2097</span></p>
              <h2>Phương thức thanh toán</h2>
              <div class="card-area">
                <i class="fa-brands fa-cc-visa"></i>
                <i class="fa-brands fa-cc-paypal"></i>
                <i class="fa-solid fa-credit-card"></i>
                <i class="fa-brands fa-cc-mastercard"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="single-box">
              <h2>Thông tin và chính sách</h2>
              <ul>
                <li><a href="#">Mua hàng và thanh toán</a></li>
                <li><a href="#">Tra cứu đơn hàng</a></li>
                <li><a href="#">Xem ưu đãi CTStore</a></li>
                <li><a href="#">Tra thông tin bảo hành</a></li>
                <li><a href="#">Tra cứu hóa đơn điện tử</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-2 col-sm-6">
            <div class="single-box">
              <h2>Dịch vụ</h2>
              <ul>
                <li><a href="#">Khách hàng</a></li>
                <li><a href="#">Ưu đãi</a></li>
                <li><a href="#">Chính sách</a></li>
                <li><a href="#">Tuyển dụng</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="single-box">
              <h2>Gửi góp ý</h2>
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Nhập email" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-arrow-right-long"></i></span>
              </div>
              <h2>Follow us on</h2>
              <p class="socials">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-tiktok"></i>
              </p>

            </div>
          </div>
        </div>
      </div>
    </footer>
    <div class="end-footer">
      <div class="container content">
      <p>Công ty TNHH CTStore. Địa chỉ văn phòng: 18 Đ. Tam Trinh, Mai Động, Hai Bà Trưng, Hà Nội, Việt Nam. Điện thoại: 0123123123 </p>
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
<script type="text/javascript" src="/Project---CTStore---WD1110/MVC/wwwroot/js/index.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>