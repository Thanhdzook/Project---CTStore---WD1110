<?php $total = 0; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/payment/cart1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="cart-container">
        <div class="cart-header">
            <p class="cart-header-title">Giỏ hàng</p>
        </div>
        <div class="cart-content">
            <?php
                if(isset($data["message"])){
                    if($data["message"] != "null"){
                        $message = $data["message"];
            ?>
            <i class="fa-solid fa-face-frown"></i>
            <p class="cart-content-notification"><?php echo $message?></p>
            <a href="/Project---CTStore---WD1110" class="cart-content-go-back">
                Quay lại trang chủ
            </a>
            <?php
                    }
            }
            ?>
        </div>
        <div class="cart-list-order">
            <?php
                if(isset($data["orderdetails"])){
            ?>
            <form method="post" action="/Project---CTStore---WD1110/Payment/ViewPay">
            <?php
                while($row = mysqli_fetch_array($data["orderdetails"])){
                    $img = $row["img"];
                    $mobilephone_id = $row["mobilePhone_id"];
                    $name = $row["mobilePhone_name"];
                    $quantity = $row["quantity"];
                    $unit_price = $row["price"];
                    $price_sale = $row["unit_price"];
            ?>
            <div class="item" data-price="<?php echo $price_sale ?>">
                <div class="box-order-item">
                    <div class="order-item-product">
                        <input type="checkbox" class="discountCheckbox" name="<?php echo $mobilephone_id;?>" value="chọn">
                        <div class="order-item-product-img">
                            <img src="<?php echo $img ?>" alt="">
                        </div>
                        <div class="order-item-product-info">
                            <div class="order-product-name"><?php echo $name?></div>
                            <div class="d-flex justify-content-between">
                                <div class="order-product-price">
                                    <p class="price-sale"><?php echo number_format($price_sale, 0, '', ',')?>₫</p>
                                    <p class="unit-price"><?php echo number_format($unit_price, 0, '', ',')?>₫</p>   
                                </div>
                                <div class="quantity-container">
                                    <input type="button" class="quantity-btn-left quantity-btn decrease-btn" onclick="decreaseQuantity()" value="-"></input>
                                    <input type="number" id="quantity-input" class="quantityInput" name="<?php echo $mobilephone_id ?>" value="<?php echo $quantity?>" min="1">
                                    <input type="button" class="quantity-btn-right quantity-btn increase-btn" onclick="increaseQuantity()" value="+"></input>
                                </div>
                            </div>
                            <div class="box-promo">
                                <div class="promo-title">
                                    <div class="promo-title-icon"><i class="fa-solid fa-gift"></i></div>
                                    <div class="promo-title-title">Chương trình khuyến mãi</div>
                                </div>
                                <ul class="promo-info">
                                    <li class="promo-info-item">
                                        + Tặng Sim 4G Vinaphone (4GB/NGÀY) - 12 Tháng (Giá tốt liên hệ hotline: 1800.2097)</li>
                                    <li class="promo-info-item">
                                        + Giảm ngay 2.500.000đ khi tham gia thu cũ đổi mới - Giá thu tốt nhất thị trường</li>
                                    <li class="promo-info-item">
                                        + Nhiều ưu đãi khi thanh toán qua VNPAY, ONEPAY</li>
                                </ul>
                                <div class="hot-sale">
                                    <p>Chi tiết liên hệ: 19001001</p>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="btn-delete-item">
                        <a href="/Project---CTStore---WD1110/Order_Detail/Delete_Order_Details/<?php echo $mobilephone_id ?>/<?php echo $data["order_id"] ?>"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
            <div class="botton-order">
                <div class="total-box-order">
                    <p class="total-order-title">Tổng tiền tạm tính</p>
                    <p class="total-order-price" id="totalPrice"><?php echo number_format($total, 0, '', ',')?>₫</p>
                </div>
                <div class="btn-submit-order">
                    <!-- <button type="submit" name="Payment" class="btn-order-summit">Tiến hành đặt hàng</button> -->
                    <input type="submit" name="Payment" value="Tiến hành đặt hàng" class="btn-order-summit">
                    <a href="/Project---CTStore---WD1110" class="btn-order-go-back">
                        Chọn thêm sản phẩm khác
                    </a>
                </div>
            </div>
            </form>
        <?php
            }
        ?>
        </div>
    </div>

<!-- <script>

    var decreaseButtons = document.getElementsByClassName('decrease-btn');
    var increaseButtons = document.getElementsByClassName('increase-btn');

    for (var i = 0; i < decreaseButtons.length; i++) {
        decreaseButtons[i].addEventListener('click', decreaseQuantity);
    }

    for (var i = 0; i < increaseButtons.length; i++) {
        increaseButtons[i].addEventListener('click', increaseQuantity);
    }

    function decreaseQuantity() {
        var quantityInput = this.parentNode.querySelector('.quantityInput');
        var quantity = parseInt(quantityInput.value);

        if (quantity > 1) {
            quantityInput.value = quantity - 1;
        }
    }

    function increaseQuantity() {
        var quantityInput = this.parentNode.querySelector('.quantityInput');
        var quantity = parseInt(quantityInput.value);

        quantityInput.value = quantity + 1;
    }
</script>    

<script>
    const items = Array.from(document.getElementsByClassName('item'));
    const totalPriceElement = document.getElementById('totalPrice');

    function updateTotalPrice() {
        let totalPrice = 0;

        items.forEach(item => {
            const quantityInput = item.querySelector('.quantityInput');
            const discountCheckbox = item.querySelector('.discountCheckbox');
            const totalPriceValue = item.querySelector('.price-sale');
            const pricePerUnit = parseInt(item.dataset.price);
            const quantity = parseInt(quantityInput.value);
            let totalItemPrice = quantity * pricePerUnit;
            if (discountCheckbox.checked) {
                totalPrice += totalItemPrice;
            }
            const config = { style: 'currency', currency: 'VND', maximumFractionDigits: 9}
            const formated_item = new Intl.NumberFormat('vi-VN', config).format(totalItemPrice);
            totalPriceValue.textContent = formated_item;
        });
            const config = { style: 'currency', currency: 'VND', maximumFractionDigits: 9}
            const formated_total = new Intl.NumberFormat('vi-VN', config).format(totalPrice);
            totalPriceElement.textContent = formated_total;
    }
        items.forEach(item => {
            const quantityInput = item.querySelector('.quantityInput');
            const discountCheckbox = item.querySelector('.discountCheckbox');

            quantityInput.addEventListener('input', updateTotalPrice);
            discountCheckbox.addEventListener('change', updateTotalPrice);
        });

</script> -->

<script>
        var decreaseButtons = document.getElementsByClassName('decrease-btn');
        var increaseButtons = document.getElementsByClassName('increase-btn');
        var items = Array.from(document.getElementsByClassName('item'));
        var totalPriceElement = document.getElementById('totalPrice');
      
        for (var i = 0; i < decreaseButtons.length; i++) {
          decreaseButtons[i].addEventListener('click', decreaseQuantity);
        }
      
        for (var i = 0; i < increaseButtons.length; i++) {
          increaseButtons[i].addEventListener('click', increaseQuantity);
        }
      
        items.forEach(item => {
          const quantityInput = item.querySelector('.quantityInput');
          const discountCheckbox = item.querySelector('.discountCheckbox');
      
          quantityInput.addEventListener('input', updateTotalPrice);
          discountCheckbox.addEventListener('change', updateTotalPrice);
        });
      
        function decreaseQuantity() {
          var quantityInput = this.parentNode.querySelector('.quantityInput');
          var quantity = parseInt(quantityInput.value);
      
          if (quantity > 1) {
            quantityInput.value = quantity - 1;
          }
          updateTotalPrice();
        }
      
        function increaseQuantity() {
          var quantityInput = this.parentNode.querySelector('.quantityInput');
          var quantity = parseInt(quantityInput.value);
      
          quantityInput.value = quantity + 1;
          updateTotalPrice();
        }
      
        function updateTotalPrice() {
          let totalPrice = 0;
      
          items.forEach(item => {
            const quantityInput = item.querySelector('.quantityInput');
            const discountCheckbox = item.querySelector('.discountCheckbox');
            const totalPriceValue = item.querySelector('.price-sale');
            const pricePerUnit = parseInt(item.dataset.price);
            const quantity = parseInt(quantityInput.value);
            let totalItemPrice = quantity * pricePerUnit;
            if (discountCheckbox.checked) {
              totalPrice += totalItemPrice;
            }
            const config = { style: 'currency', currency: 'VND', maximumFractionDigits: 9 }
            const formated_item = new Intl.NumberFormat('vi-VN', config).format(totalItemPrice);
            totalPriceValue.textContent = formated_item;
          });
      
          const config = { style: 'currency', currency: 'VND', maximumFractionDigits: 9 }
          const formated_total = new Intl.NumberFormat('vi-VN', config).format(totalPrice);
          totalPriceElement.textContent = formated_total;
        }
    </script>
</body>
</html>
        
