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
  <div class="fpass-container">
    <div class="fpass-header">
      <!-- <div class="fpass-header-icon">
        <i class="fa-solid fa-arrow-left"></i>
      </div> -->
      <!-- <p class="fpass-header-title">Quên mật khẩu</p> -->
    </div>
    <div class="fpass-content">
      <p class="fpass-content-text">Mã xác nhận đã được gửi qua email</p>
      <div class="fpass-content-methods">
        <div class="box-methods">
          <div class="box-methods-icon">
            <i class="fa-solid fa-envelope"></i>
          </div>
          <div class="box-methods-content">
            <p class="methods-content-name">Email</p>
            <p class="methods-content-email"><?php echo $data["email"] ?></p>
          </div>

        </div>
        <!-- <button class="methods-content-btn">Tiếp tục</button> -->
      </div>
    </div>
  </div>
  <form method="post" action="/Project---CTStore---WD1110/Login_Sigin/Check_Send_Email/<?php echo $data["check"] ?>">
    <div class="otp-container">
      <div class="otp-header">
        <!-- <div class="otp-header-icon">
        <i class="fa-solid fa-arrow-left"></i>
      </div> -->
        <!-- <p class="otp-header-title">Quên mật khẩu</p> -->
      </div>
      <div class="otp-content">
        <p class="otp-content-text">Nhập mã OTP được gửi qua email <?php echo $data["email"] ?></p>
        <div class="box-otp-content">
          <div class="box-otp-list">
            <div class="otp-item">
              <input min="0" max="9" maxlength="1" oninput="validateInput(this); focusNextInput(this, 'tel2');" type="tel" name="tel1" class="otp-item-input">
            </div>
            <div class="otp-item">
              <input min="0" max="9" maxlength="1" oninput="validateInput(this); focusNextInput(this, 'tel3');" type="tel" name="tel2" class="otp-item-input">
            </div>
            <div class="otp-item">
              <input min="0" max="9" maxlength="1" oninput="validateInput(this); focusNextInput(this, 'tel4');" type="tel" name="tel3" class="otp-item-input">
            </div>
            <div class="otp-item">
              <input min="0" max="9" maxlength="1" oninput="validateInput(this);" type="tel" name="tel4" class="otp-item-input">
            </div>
          </div>
        </div>
        <p id="otp-countdown" class="otp-countdown">Mã OTP hết hạn sau <span>60</span> giây</p>
        <button type="submit" name="submit" class="methods-content-btn">Xác nhận</button>
      </div>
    </div>
  </form>
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
  <script>
    const notificationElement = document.querySelector('.box-notification');

    function hideNotification() {
      notificationElement.style.display = 'none';
    }
    setTimeout(hideNotification, 3000);

    function validateInput(input) {
      var value = input.value;
      var pattern = /^[0-9]$/; // Biểu thức chính quy để chỉ cho phép nhập số từ 0 đến 9

      if (!pattern.test(value)) {
        input.value = ""; // Xóa giá trị nhập vào nếu không hợp lệ
      }
    }
    // otp-countdown-----------------------------------------------
    var countdownElement = document.querySelector("#otp-countdown span");
    var countdownValue = parseInt(countdownElement.innerText);
    var countdown;

    function startCountdown() {
      countdown = setInterval(function() {
        countdownValue -= 1;

        if (countdownValue <= 0) {
          clearInterval(countdown);
          var resendLink = document.createElement("a");
          resendLink.href = "#";
          resendLink.innerText = "Gửi lại";
          resendLink.style.color = "red";
          resendLink.style.textDecoration = "none";
          resendLink.addEventListener('click', function() {
            location.reload();
            resendLink.addEventListener("click", startCountdown);
          });
          resendLink.addEventListener("click", startCountdown); // Gắn sự kiện click để bắt đầu đếm ngược lại

          var countdownParent = document.querySelector("#otp-countdown");
          countdownParent.innerHTML = 'Mã OTP đã hết hạn. ';
          countdownParent.appendChild(resendLink);
        } else {
          countdownElement.innerText = countdownValue;
        }
      }, 1000);
    }

    startCountdown(); // Khởi đầu đếm ngược ban đầu
  </script>
    <script>
    // Function to validate input and focus on the next input field
    function focusNextInput(input, nextInputName) {
      const value = input.value;
      const maxLength = parseInt(input.getAttribute('maxlength'));

      if (value.length >= maxLength) {
        const nextInput = document.getElementsByName(nextInputName)[0];
        nextInput.focus();
      }
    }

    // Function to validate input
    function validateInput(input) {
      const value = input.value;
      const pattern = /^[0-9]$/; // Regular expression to allow only numbers from 0 to 9

      if (!pattern.test(value)) {
        input.value = ''; // Clear the input value if it is invalid
      }
    }
  </script>
</body>

</html>