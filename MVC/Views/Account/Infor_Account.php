<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<body>
	<main class="container mt-3">
        <div>
            <?php
                while($row = mysqli_fetch_array($data["account_infor"])){
                    echo $row["full_name"];
                    echo "<br/>";
                    echo $row["phone_number"];
                    echo "<br/>";
                    echo $row["email"];
                    echo "<br/>";
                }
            ?>
        </div>
        <a href="/Project---CTStore---WD1110/Account/View_Fix_Infor_Account"><button>Sửa thông tin tài khoản</button></a>
        <a href="/Project---CTStore---WD1110/Account/View_Fix_Password"><button>Đổi mật khẩu</button></a>
	</main>
</body>
</html>