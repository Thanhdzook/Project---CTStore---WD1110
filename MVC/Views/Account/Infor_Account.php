
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/Account/info_Account1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <form method="post" action="/Project---CTStore---WD1110/Account/Fix_Infor_Account/Check password/Check password">
        <?php
            while($row = mysqli_fetch_array($data["account_infor"])){
                $full_name = $row["full_name"];
                echo "<br/>";
                $phone_number = $row["phone_number"];
                echo "<br/>";
                $email = $row["email"];
                "<br/>";
            }
        ?>
        <div class="user-info-page">
            <div class="user-info-mobile">
                <div class="ct-container">
                    <div class="user-info-avatar"></div>
                    <p class="user-info-avatar-name"><?php echo $full_name ?></p>
                    <div class="form__group">
                        <div class="field" id="info">
                            <!-- <input type="text" id="name" class="group__item" disabled="disabled" value="<?php echo $full_name ?>"> -->
                            <input type="text" id="name" class="group__item"  value="<?php echo $full_name ?>">
                            <!-- <div class="field-label"><label for="name"></label></div> -->
                            <!-- <div class="icon-edit">
                                <i id="editButton" class="fa-solid fa-pen-to-square"></i>
                            </div> -->
                        </div>
                    </div>
                    <!-- <div id="editForm" style="display: none;">
                        <input type="text" id="nameInput" class="group__item1">
                        <div class="editForm-p">
                            <p class="title-top-input">Họ và tên</p>
                        </div>
                        <div class="editForm-btn-x">
                            <button id="cancelButton" style="display: none;" class="fa-solid fa-xmark"></button>
                        </div>
                    </div> -->
                    <div class="form__group">
                        <input type="text" id="phoneN" class="group__item" disabled="disabled" placeholder="Số điện thoại : <?php echo $phone_number ?>">
                    </div>
                    <button class="botton-change-info" type="submit" name="submit">Cập nhật thông tin</button>
                    <a class="botton-change-pass" href="/Project---CTStore---WD1110/Account/View_Fix_Password"><button>Đổi mật khẩu</button></a>
                </div>
            </div>
        </div>
    </form>
    <!-- <script>
        // Lấy các phần tử DOM
        const infoContainer = document.getElementById('info');
        const editButton = document.getElementById('editButton');
        const cancelButton = document.getElementById('cancelButton');
        const editForm = document.getElementById('editForm');
        const nameInput = document.getElementById('nameInput');
        const ageInput = document.getElementById('ageInput');
        const saveButton = document.getElementById('saveButton');

        // Xử lý sự kiện khi nhấn nút "Chỉnh sửa"
        editButton.addEventListener('click', function() {
        // Ẩn thông tin hiển thị và hiển thị form chỉnh sửa
        infoContainer.style.display = 'none';
        editForm.style.display = 'block';
        cancelButton.style.display = 'inline-block';
        nameInput.focus();
        });

        // Xử lý sự kiện khi nhấn nút "Hủy"
        cancelButton.addEventListener('click', function() {
        // Hiển thị lại thông tin và ẩn form chỉnh sửa
        infoContainer.style.display = 'block';
        editForm.style.display = 'none';
        cancelButton.style.display = 'none';
        });

        // // Xử lý sự kiện khi nhấn nút "Lưu"
        // saveButton.addEventListener('click', function() {
        // // Lấy giá trị từ các trường chỉnh sửa
        // const newName = nameInput.value;
        // const newAge = ageInput.value;

        // Hiển thị lại thông tin và ẩn form chỉnh sửa
        infoContainer.style.display = 'block';
        editForm.style.display = 'none';
        cancelButton.style.display = 'none';
    </script> -->
</body>
</html>
<?php
                // while($row = mysqli_fetch_array($data["account_infor"])){
                //     echo $row["full_name"];
                //     echo "<br/>";
                //     echo $row["phone_number"];
                //     echo "<br/>";
                //     echo $row["email"];
                //     echo "<br/>";
                // }
?>
        <!-- <a href="/Project---CTStore---WD1110/Account/View_Fix_Infor_Account"><button>Sửa thông tin tài khoản</button></a>
        <a href="/Project---CTStore---WD1110/Account/View_Fix_Password"><button>Đổi mật khẩu</button></a>
        <a href="/Project---CTStore---WD1110/Order_Detail/View_Purchase_History"><button>Lịch sử mua hàng</button></a> -->
        