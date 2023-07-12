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
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/payment/payment123.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div id="content" class="payment-container">
        <div class="payment-header">
            <div class="payment-header-back">
                <a href="/Project---CTStore---WD1110/Payment/ViewCart/null" class="payment-header-back-link">
                    <i class="fa-solid fa-chevron-left"></i>
                    <p class="payment-header-back1">Trở về</p>
                </a>
            </div>
            <p class="payment-header-title">Thông tin đặt hàng</p>
        </div>
        <form method="post" action="/Project---CTStore---WD1110/Payment/Pay">
            <?php
            while ($row2 = mysqli_fetch_array($data["customer"])) {
                $phoneN = $row2["phone_number"];
                $nameC = $row2["full_name"];
            ?>
            <?php
            }
            ?>
            <div class="ct-payment-content">
                <div class="block-customer">
                    <p class="block-customer-title">Thông tin khách hàng</p>
                    <div class="block-customer-info">
                        <input name="name" value="<?php echo $nameC ?>" type="text" placeholder="Họ và tên (bắt buộc)" maxlength="50" autocomplete="off" class="customer-info-input">
                        <input name="phoneN" value="<?php echo $phoneN ?>" type="text" placeholder="Số điện thoại (bắt buộc)" maxlength="10" autocomplete="off" class="customer-info-input">
                    </div>
                </div>
                <div class="block-address1">
                    <p class="block-payment-title">Chọn cách thức giao hàng</p>
                    <div class="box-radio">
                        <div class="radio-container">
                            <input type="radio" name="radio" id="radio1" value="check1" onclick="toggleAddressInput(false)">
                            <label for="radio1">
                                <div class="radio-button"></div>Nhận tại cửa hàng
                            </label>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="radio" id="radio2" value="check2" checked onclick="toggleAddressInput(true)">
                            <label for="radio2">
                                <div class="radio-button"></div>Giao hàng tận nơi
                            </label>
                        </div>
                    </div>
                </div>
                <div class="block-note">
                    <input name="address" id="addressInput" type="text" placeholder="Địa chỉ" value="18 Đ. Tam Trinh, Mai Động, Hai Bà Trưng, Hà Nội, Việt Nam." disabled>
                </div>
                <div class="block-payment">
                    <p class="block-payment-title">Chọn cách thức thanh toán</p>
                    <div class="payment-wapper">
                        <div class="box-payment-CH" onclick="highlightPayment(this)">
                            <div class="payment-CH">
                                <i class="fa-solid fa-money-check-dollar"></i>
                                <p class="payment-CH-title">Thanh toán tại cửa hàng</p>
                            </div>
                        </div>

                        <div class="box-payment-CK" onclick="highlightPayment(this), togglePaymentImage()">
                            <div class="payment-CK">
                                <i class="fa-solid fa-landmark"></i>
                                <p class="payment-CH-title">Thanh toán trực tuyến</p>
                            </div>
                        </div>
                        <!-- <div id="payment-qrcode" class="payment-qrcode">
                            <img id="qrcode-image" src="/Project---CTStore---WD1110/MVC/wwwroot/img/qrcode.jpg" alt="">
                            <div class="form-group">
                                Tải ảnh giao dịch thành công:
                                <input id="fileupload" type="file" class="form-style" placeholder="fileupload" name="fileupload">
                                <div class="box-file-img">
                                    <img id="preview-img" src="" alt="">
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($data["orderdetails"])) {
                $_SESSION["count"] = $i;
                $img = $row["img"];
                $mobilephone_id = $row["mobilePhone_id"];
                $name = $row["mobilePhone_name"];
                $quantity = $row["quantity"];
                $unit_price = $row["price"];
                $price_sale = $row["unit_price"];
                $total = $total + ($price_sale * $quantity);
                $_SESSION["mobilePhone_id"][$i] = $mobilephone_id;
                $i++;
            }
            ?>
            <div class="botton-order">
                <div class="total-box-order">
                    <p class="total-order-title">Tổng tiền tạm tính</p>
                    <p class="total-order-price" id="totalPrice"><?php echo number_format($total, 0, '', ',') ?>₫</p>
                </div>
                <div class="btn-submit-order">
                    <!-- <button type="submit" name="Payment" class="btn-order-summit">Tiến hành đặt hàng</button> -->
                    <input type="submit" name="Payment" value="Tiếp tục" class="btn-order-summit">
                    <a href="/Project---CTStore---WD1110" class="btn-order-go-back">
                        Chọn thêm sản phẩm khác
                    </a>
                </div>
            </div>
        </form>
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

        function togglePaymentImage() {
            var paymentQrcode = document.getElementById('payment-qrcode');
            paymentQrcode.style.display = (paymentQrcode.style.display === 'none') ? 'block' : 'none';
        }
    </script>
    <script>
        // Lắng nghe sự kiện "change" trên phần tử input file
        var fileInput = document.getElementById('fileupload');
        fileInput.addEventListener('change', function(event) {
            // Lấy danh sách các tệp đã chọn
            var files = event.target.files;

            if (files && files.length > 0) {
                var file = files[0];
                var reader = new FileReader();

                // Đọc nội dung của tệp ảnh được chọn
                reader.addEventListener('load', function(e) {
                    // Cập nhật hình ảnh trong phần tử div.box-file-img
                    var previewImg = document.getElementById('preview-img');
                    previewImg.src = e.target.result;
                });

                // Đọc tệp ảnh dưới dạng URL dữ liệu
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>