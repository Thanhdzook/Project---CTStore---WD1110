<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/Admin/styleadmin.css">
    <!-- <link rel="shortcut icon" href="images/logo.jpg"> -->
    <title>CTStore</title>
</head>

<body>

    <div class="row">
        <div class="side-menu col-3 ">
            <div class="brand-name">
                <h1><a href="index.php">CTStore</a></h1>
            </div>
            <ul>
                <li><a href="?controller=admin">Dashboard</a></li>
                <li><a href="?controller=admin&redirect=user">Thành viên</a></li>
                <li><a href="?controller=admin&redirect=product">Sản phẩm</a></li>
                <li><a href="#">Đơn hàng</a></li>
                <li><a href="?controller=admin&redirect=category">Danh mục</a></li>
                <li><a href="?controller=login&action=logout">Logout</a></li>

            </ul>
        </div>

        <div class="container col-9">
            <div class="header">
                <div class="nav">
                    <div class="search">
                        <input type="text" placeholder="Search...">
                        <button type="submit"><img src="images/search.png" alt=""></button>
                    </div>
                    <!-- <div class="user">
                        <a href="#" class="btn"> Add new</a>
                        <img src="images/notification.png" alt="">
                        <div class="img-case">
                            <img src="images/user.png" alt="">
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="content">
            <?php
            if(isset($data["content2"])){
              require_once "./MVC/Views/".$data["content"]."/".$data["content2"].".php";
            }
            ?>
            <?php
                if(!isset($data["content2"])){
                require_once "./MVC/Views/".$data["content"]."/".$data["content"].".php";
                }
            ?>
            </div>
        </div>
    </div>
</body>

</html>