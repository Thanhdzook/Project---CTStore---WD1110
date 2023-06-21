<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sửa Điện thoại</title>

</head>
<body>
    <?php
        $row = mysqli_fetch_array($data["mobilePhone"]);
    ?>
    <form method="post" action="/Project---CTStore---WD1110/Create_MobilePhone/Inpost_MobilePhone" enctype="multipart/form-data">
        <h4 class="mb-3 pb-3">Sửa Điện thoại</h4>
        <div class="form-group">
            <input type="text" class="form-style" placeholder="Tên sản phẩm" name="mobilePhone_name" value="<?php echo $row["mobilePhone_name"] ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-style" placeholder="Chip" name="chip" value="<?php echo $row["chip"] ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-style" placeholder="Bộ nhớ" name="memory" value="<?php echo $row["memory"] ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-style" placeholder="Camera" name="camera" value="<?php echo $row["camera"] ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-style" placeholder="Operating System" name="operatingSystem" value="<?php echo $row["operatingSystem"] ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-style" placeholder="Weight" name="weight" value="<?php echo $row["weight"] ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-style" placeholder="Pin" name="pin" value="<?php echo $row["pin"] ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-style" placeholder="Warranty Period" name="warrantyPeriod" value="<?php echo $row["warrantyPeriod"] ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-style" placeholder="Amount" name="amount" value="<?php echo $row["amount"] ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-style" placeholder="Price" name="price" value="<?php echo $row["price"] ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-style" placeholder="Sale" name="sale" value="<?php echo $row["sale"] ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-style" placeholder="Color" name="color" value="<?php echo $row["color"] ?>">
        </div>
        <div class="form-group">
            Chọn file để upload:
            <input id="fileupload" type="file" class="form-style" placeholder="fileupload" name="fileupload">
        </div>
        <input class="btn mt-4" type="submit" name="Create" value="Create">
    </form> 
</body>
</html>