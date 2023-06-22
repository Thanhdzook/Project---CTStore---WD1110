<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create mobilephone</title>
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/Admin/create-mb.css">

</head>

<body>
    <?php
    $row = mysqli_fetch_array($data["mobilePhone"]);
    ?>
    <div class="container-create-mb">
        <div class="box-create-mb">
            <form method="post" action="/Project---CTStore---WD1110/Create_MobilePhone/Inpost_MobilePhone" enctype="multipart/form-data">
                <div class="create-mb-title">
                    <i class="fa-solid fa-arrow-left"></i>
                    <p class="create-mb-name">Sửa thông tin</p>
                </div>

                <div class="form-group">
                    <input type="text" class="form-style" placeholder="Tên sản phẩm" name="mobilePhone_name" value="Tên sản phẩm: <?php echo $row["mobilePhone_name"] ?>" readonly>
                </div>
                <div class="form-group">
                    <input type="text" class="form-style" placeholder="Chip" name="chip" value="Chip: <?php echo $row["chip"] ?>" readonly>
                </div>
                <div class="form-group">
                    <input type="text" class="form-style" placeholder="Bộ nhớ" name="memory" value="Bộ nhớ: <?php echo $row["memory"] ?>" readonly>
                </div>
                <div class="form-group">
                    <input type="text" class="form-style" placeholder="Camera" name="camera"value="Camere: <?php echo $row["camera"] ?>" readonly>
                </div>
                <div class="form-group">
                    <input type="text" class="form-style" placeholder="Operating System"  name="operatingSystem" value="Hệ điều hành: <?php echo $row["operatingSystem"] ?>" readonly>
                </div>
                <div class="form-group">
                    <input type="text" class="form-style" placeholder="Weight" name="weight" value="Cân nặng: <?php echo $row["weight"] ?>" readonly>
                </div>
                <div class="form-group">
                    <input type="text" class="form-style" placeholder="Pin" name="pin" value="Pin: <?php echo $row["pin"] ?>" readonly>
                </div>
                <div class="form-group">
                    <input type="text" class="form-style active-input" placeholder="Warranty Period" name="warrantyPeriod"  value="Thời gian bảo hành: <?php echo $row["warrantyPeriod"] ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-style active-input" placeholder="Amount" name="amount" value="Số lượng: <?php echo $row["amount"] ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-style active-input" placeholder="Price" name="price" value="Giá: <?php echo $row["price"] ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-style active-input" placeholder="Sale" name="sale" value="Khuyến mãi: <?php echo $row["sale"] ?>%">
                </div>
                <div class="form-group">
                    <input type="text" class="form-style active-input" placeholder="Color" name="color"  value="Màu sắc: <?php echo $row["color"] ?>">
                </div>
                <div class="form-group">
                    Chọn file để upload:
                    <input id="fileupload" type="file" class="form-style active-input" placeholder="fileupload" name="fileupload">
                    <div class="box-file-img">
                        <img id="preview-img" src="<?php echo $row["img"] ?>" alt="">
                    </div>
                </div>
                <input class="btn-create" type="submit" name="Create" value="Create">
            </form>
        </div>
    </div>
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
