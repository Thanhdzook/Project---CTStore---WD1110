
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="/Project---CTStore---WD1110/MVC/wwwroot/img/t2.png"/>
    <title>CTstore Infor Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/Account/info_Account.css">
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
                            <input type="text" id="name" class="group__item"  value="<?php echo $full_name ?>">
                        </div>
                    </div>
                    <div class="form__group">
                        <input type="text" id="phoneN" class="group__item" disabled="disabled" placeholder="Số điện thoại : <?php echo $phone_number ?>">
                    </div>
                    <button class="botton-change-info" type="submit" name="submit">Cập nhật thông tin</button>
                    <a class="botton-change-pass" href="/Project---CTStore---WD1110/Account/View_Fix_Password"><button>Đổi mật khẩu</button></a>
                </div>
            </div>
        </div>
    </form>
    
</body>
</html>
        