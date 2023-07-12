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
    <div class="container-create-mb">
        <div class="box-create-mb">
            <form method="post" action="/Project---CTStore---WD1110/Create_MobilePhone/Inpost_MobilePhone/0" enctype="multipart/form-data">
                <div class="create-mb-title">
                    <i class="fa-solid fa-arrow-left"></i>
                    <p class="create-mb-name">Thêm sản phẩm</p>
                </div>

                <div class="form-group">
                    <input type="text" class="form-style" placeholder="Tên sản phẩm" name="mobilePhone_name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-style" placeholder="Chip" name="chip">
                </div>
                <div class="form-group">
                    <input type="text" class="form-style" placeholder="Bộ nhớ" name="memory">
                </div>
                <div class="form-group">
                    <input type="text" class="form-style" placeholder="Camera" name="camera">
                </div>
                <div class="form-group">
                    <input type="text" class="form-style" placeholder="Operating System" name="operatingSystem">
                </div>
                <div class="form-group">
                    <input type="text" class="form-style" placeholder="Weight" name="weight">
                </div>
                <div class="form-group">
                    <input type="text" class="form-style" placeholder="Pin" name="pin">
                </div>
                <div class="form-group">
                    <input type="text" class="form-style" placeholder="Warranty Period" name="warrantyPeriod">
                </div>
                <div class="form-group">
                    <input type="text" class="form-style" placeholder="Amount" name="amount">
                </div>
                <div class="form-group">
                    <input type="text" class="form-style" placeholder="Price" name="price">
                </div>
                <div class="form-group">
                    <input type="text" class="form-style" placeholder="Sale" name="sale">
                </div>
                <div class="form-group">
                    <input type="text" class="form-style" placeholder="Color" name="color">
                </div>
                <div class="form-group">
                    Chọn file để upload:
                    <input id="fileupload" type="file" class="form-style" placeholder="fileupload" name="fileupload">
                    <div class="box-file-img">
                        <img id="preview-img" src="" alt="">
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

</html>