<?php
$total = 0;
$_SESSION["count"] = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/Project---CTStore---WD1110/MVC/wwwroot/img/t2.png" />
    <title>CTstore Thanh toán</title>
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/payment/payment233.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div id="content" class="payment-container">
        <div class="payment-header">
            <div class="payment-header-back">
                <a href="#" class="payment-header-back-link">
                    <i class="fa-solid fa-chevron-left"></i>
                    <p class="payment-header-back1">Quay lại</p>
                </a>
            </div>
            <p class="payment-header-title">Thông tin đặt hàng</p>
        </div>
    </div>
    <script>
        function toggleAddressInput(enable) {
            var addressInput = document.getElementById('addressInput');
            addressInput.disabled = !enable;
        }
        // payment
        let previousPayment = null;

        function highlightPayment(element) {
            // Xóa vòng đỏ trên phần tử trước đó (nếu có)
            if (previousPayment !== null) {
                previousPayment.classList.remove('highlight');
            }

            // Thêm vòng đỏ vào phần tử hiện tại
            element.classList.add('highlight');

            // Lưu phần tử hiện tại để sử dụng cho lần nhấp tiếp theo
            previousPayment = element;
        }
    </script>
</body>

</html>