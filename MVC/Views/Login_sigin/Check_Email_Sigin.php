<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="shortcut icon" href="/Project---CTStore---WD1110/MVC/wwwroot/img/t2.png" />
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/login_sigin/forgot-password.css">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> -->
  <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/bootstrap-5.0.2-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<div class="otp-container">
    <div class="otp-header">
      <div class="otp-header-icon">
        <i class="fa-solid fa-arrow-left"></i>
      </div>
      <p class="otp-header-title">Quên mật khẩu</p>
    </div>
    <div class="otp-content">
      <p class="otp-content-text">Nhập mã OTP được gửi qua email bu******6@gmail.com</p>
      <div class="box-otp-content">
        <div class="box-otp-list">
          <div class="otp-item">
            <input min="0" max="9" maxlength="1" oninput="validateInput(this)" type="tel" class="otp-item-input">
          </div>
          <div class="otp-item">
            <input min="0" max="9" maxlength="1" oninput="validateInput(this)" type="tel" class="otp-item-input">
          </div>
          <div class="otp-item">
            <input min="0" max="9" maxlength="1" oninput="validateInput(this)" type="tel" class="otp-item-input">
          </div>
          <div class="otp-item">
            <input min="0" max="9" maxlength="1" oninput="validateInput(this)" type="tel" class="otp-item-input">
          </div>
        </div>
      </div>
      <p id="otp-countdown" class="otp-countdown">Mã OTP hết hạn sau <span>30</span> giây</p>
      <button class="methods-content-btn">Xác nhận</button>

    </div>
</div>
<script>
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
          resendLink.href = "http://localhost/Project---CTStore---WD1110/MVC/Views/Login_sigin/Forgot_password.php";
          resendLink.innerText = "Gửi lại";
          resendLink.style.color = "red";
          resendLink.style.textDecoration = "none";
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
</body>

</html>