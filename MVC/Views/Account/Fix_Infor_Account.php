<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sửa thông tin tài khoản</title>
</head>
<body>
    <div id="content">
        <form method="post" action="/Project---CTStore---WD1110/Account/Add_Address">
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
            <input type="text" name="full_name" placeholder="Họ và tên" value="<?php echo $full_name ?>">
            <input type="text" name="phone_number" placeholder="Số điện thoại" value="<?php echo $phone_number ?>" >
            <input type="text" name="email" placeholder="email" value="<?php echo $email ?>">
            <input type="submit" name="submit" value="Thay đổi">
        </form>
    </div>
</body>
</html>