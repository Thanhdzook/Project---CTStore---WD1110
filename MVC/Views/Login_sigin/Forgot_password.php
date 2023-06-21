<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="shortcut icon" href="/Project---CTStore---WD1110/MVC/wwwroot/img/t2.png" />
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/login_sigin/forgot-password123.css">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> -->
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
            <p class="number-order"><?php if (isset($_SESSION["Count_Cart"])) echo $_SESSION["Count_Cart"] ?></p>
          </div>
        </a>
      </div>
      <a href="#" class="icon-item active-bi-list" id="category">
        <div class="icon-item-icon"><i class="bi bi-list"></i></div>
        <div class="icon-item-content">
          <p class="icon-item-name">Danh mục</p>
        </div>
      </a>
      <?php
      if (!isset($_SESSION["email"])) {
      ?>
        <a href="/Project---CTStore---WD1110/Login_Sigin/View_Login_Sigin" class="icon-item">
          <div class="icon-item-content">
            <p class="icon-item-name">Đăng nhập</p>
          </div>
        </a>
      <?php
      }
      ?>
      <?php
      if (isset($_SESSION["email"])) {
      ?>
        <div class="dropdown">
          <a href="#" class="icon-item" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="icon-item-icon"><i class="bi bi-person-circle"></i></div>
            <div class="icon-item-content">
              <p class="icon-item-name">Tài khoản</p>
            </div>
          </a>
          <ul class="dropdown-menu">
            <?php
            if ($data["content"] != "Account") {
            ?>
              <li><a class="dropdown-item bi bi-person-circle" href="/Project---CTStore---WD1110/Account/View_Account_Infor">Thông tin cá nhân</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
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
    <li>
      <hr class="dropdown-divider">
    </li>
    <a href="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/operatingSystem/Iphone">Iphone</a>
    <li>
      <hr class="dropdown-divider">
    </li>
    <a href="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/operatingSystem/Sam Sung">Sam Sung</a>
    <li>
      <hr class="dropdown-divider">
    </li>
    <a href="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/operatingSystem/Oppo">Oppo</a>
  </div>
  <!-- -------------------Content----------------------------- -->
  <?php
  if (isset($data["message"])) {
    $dataMessage = $data["message"];
  }
  ?>
  <div class="fpass-container">
    <div class="fpass-header">
      <div class="fpass-header-icon">
        <a href="/Project---CTStore---WD1110/Login_Sigin/View_Login_Sigin"><i class="fa-solid fa-arrow-left"></i></a>
      </div>
      <p class="fpass-header-title">Quên mật khẩu</p>
    </div>
    <div class="fpass-content">
      <p class="fpass-content-text">Vui lòng nhập email để tìm kiếm tài khoản của bạn.</p>
      <form action="/Project---CTStore---WD1110/Login_Sigin/Forgot_Password" method="post">
        <div class="fpass-content-input">
          <input name="email" type="email" class="content-item-input">
          <button name="submit" type="submit" class="content-item-btn">Xác nhận</button>
        </div>
      </form>
    </div>
  </div>
  <?php
  if (isset($data["message"])) {
    if ($data["message"] != "null") {
      $dataMessage = $data["message"];
  ?>
      <div class="box-notification">
        <p class="notification-message"><?php echo $dataMessage ?></p>
      </div>
  <?php
    }
  }
  ?>
  <div class="box-notification" id="redirect-notification" style="display: none;">
    <p class="notification-message">Please wait, redirecting...</p>
  </div>
  <script>
    function validateInput(input) {
      var value = input.value;
      var pattern = /^[0-9]$/; // Biểu thức chính quy để chỉ cho phép nhập số từ 0 đến 9

      if (!pattern.test(value)) {
        input.value = ""; // Xóa giá trị nhập vào nếu không hợp lệ
      }
    }
    const notificationElement = document.querySelector('.box-notification');

    function hideNotification() {
      notificationElement.style.display = 'none';
    }
    setTimeout(hideNotification, 3000);
    // -----------------------------------------
    function showNotification() {
      const notificationElement = document.getElementById('redirect-notification');
      notificationElement.style.display = 'block';
    }

    // Wait for the page to load
    document.addEventListener('DOMContentLoaded', function() {
      // Get the form element
      const form = document.querySelector('form');

      // Add event listener to the form submission
      form.addEventListener('submit', function() {
        showNotification();
      });
    });
  </script>
</body>

</html>