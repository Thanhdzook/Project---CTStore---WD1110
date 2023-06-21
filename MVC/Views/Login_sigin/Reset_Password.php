<?php
    $check_email = $_SESSION["check_email"];
    // unset($_SESSION["check_email"]);
    // unset($_SESSION["random"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="/Project---CTStore---WD1110/MVC/wwwroot/img/t2.png" />
    <title>CTstore Infor Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/Account/change-password.css">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <?php
        if(isset($data["message"])){
        echo $data["message"];
        }
    ?>
    <div class="changeP-page">
        <div class="changeP-page-mobile">
            <div class="changeP-container">
                <div class="changeP-top">
                    <div class="changeP-top-ct">
                        <div class="changeP-top-title">Tạo mật khẩu mới</div>
                    </div>
                </div>
                <div class="changeP-content">
                    <form method="post" action="/Project---CTStore---WD1110/Login_Sigin/Check_Forgot_Password/<?php echo $check_email ?>">
                        <!-- <div class="changeP-content-form">
                            <p class="changeP-content-title">Nhập mật khẩu hiện tại</p>
                            <label value="Nhập mật khẩu hiện tại" class="active-inputCP">
                                <input class="group__item" type="password" name="password_old" placeholder="Mật khẩu hiện tại">
                            </label>
                        </div> -->
                        <div class="changeP-content-form">
                            <p class="changeP-content-title">Tạo mật khẩu mới</p>
                            <div class="form-changeP">
                                <label value="Nhập mật khẩu mới">
                                    <input class="group__item" type="password" name="password_new1" placeholder="Mật khẩu mới">
                                </label>
                                <label value="Xác nhận mật khẩu mới">
                                    <input class="group__item" type="password" name="password_new2" placeholder="Xác nhận mật khẩu mới">
                                </label>
                            </div>
                        </div>
                        <input type="submit" name="submit" value="Thay đổi mật khẩu" class="botton-submit-changeP">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>