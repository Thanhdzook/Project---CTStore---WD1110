
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
	<div class="user-info-page">
        <div class="user-info-mobile">
            <div class="ct-container">
                <div class="user-info-avatar"></div>
                <p class="user-info-avatar-name">bui cuong</p>
                <!-- <div class="form__group"> -->
                    <div class="field" id="info">
                        <input type="text" id="name" class="group__item" disabled="disabled">
                        <label for="name">Họ và tên: Bùi Cường</label>
                        <div class="icon-edit">
                            <i id="editButton" class="fa-solid fa-pen-to-square"></i>
                            
                        </div>
                        <button id="cancelButton" style="display: none;">Hủy</button>
                    </div>
                    
                    <div id="editForm" style="display: none;">
                    <input type="text" id="nameInput">
                    </div>
                <!-- </div> -->
                <!-- <div id="info">
                    <span id="name">John Doe</span>
                    <button id="editButton">Chỉnh sửa</button>
                    </div>

                    <div id="editForm" style="display: none;">
                    <input type="text" id="nameInput">  
                    <button id="saveButton">Lưu</button>
                </div> -->
                <!-- <form>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter your password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form> -->
            </div>
        </div>
	</div>
    <script>
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

  // Gán giá trị hiện tại vào các trường chỉnh sửa
  nameInput.value = document.getElementById('name').textContent;
  ageInput.value = document.getElementById('age').textContent;
});

// Xử lý sự kiện khi nhấn nút "Hủy"
cancelButton.addEventListener('click', function() {
  // Hiển thị lại thông tin và ẩn form chỉnh sửa
  infoContainer.style.display = 'block';
  editForm.style.display = 'none';
  cancelButton.style.display = 'none';
});

// Xử lý sự kiện khi nhấn nút "Lưu"
saveButton.addEventListener('click', function() {
  // Lấy giá trị từ các trường chỉnh sửa
  const newName = nameInput.value;
  const newAge = ageInput.value;

  // Cập nhật thông tin hiển thị
  document.getElementById('name').textContent = newName;
  document.getElementById('age').textContent = newAge;

  // Hiển thị lại thông tin và ẩn form chỉnh sửa
  infoContainer.style.display = 'block';
  editForm.style.display = 'none';
  cancelButton.style.display = 'none';
});

    </script>
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
        