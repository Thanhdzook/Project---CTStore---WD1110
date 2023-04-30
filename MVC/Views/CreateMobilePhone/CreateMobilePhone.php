<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create mobilephone</title>

</head>
<body>
    <form method="post" action="./Create_MobilePhone/Inpost_MobilePhone" enctype="multipart/form-data">
        <h4 class="mb-3 pb-3">Create mobilephone</h4>
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
            <input type="text" class="form-style" placeholder="Price" name="price">
        </div>
        <div class="form-group">
            <input type="text" class="form-style" placeholder="Amount" name="amount">
        </div>
        <div class="form-group">
            Chọn file để upload:
            <input id="fileupload" type="file" class="form-style" placeholder="fileupload" name="fileupload">
        </div>
        <input class="btn mt-4" type="submit" name="Create" value="Create">
    </form> 
</body>
</html>