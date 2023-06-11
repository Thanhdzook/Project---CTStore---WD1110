<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/Admin/styleadmin1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="row">
        <div class="side-menu col-3">
            <div class="brand-name">
                <h1 class="brand-name-title"><a href="/Project---CTStore---WD1110/Admin/View_Index_Admin/null">CTStore</a></h1>
            </div>
            <ul class="list-item">
                <li class="item-text active">
                <a href="">
                    <div class="item-icon"><i class="fa-solid fa-house"></i></div>
                    <p>Trang chủ</p>
                </a></li>
                <li class="item-text">
                <a href="">
                    <div class="item-icon"><i class="fa-solid fa-mobile-screen-button"></i></div>
                    <p>Sản phẩm</p>
                </a></li>
                <li class="item-text">
                <a href="">
                    <div class="item-icon"><i class="fa-solid fa-truck"></i></div>
                    <p>Đơn hàng</p>
                </a></li>
                <li class="item-text">
                <a href="/Project---CTStore---WD1110/Login_Sigin/Log_out">
                    <div class="item-icon"><i class="fa-solid fa-right-from-bracket"></i></div>
                    <p>Đăng xuất</p>
                </a></li>
            </ul>
        </div>
        <div class="container col-9">
            <div class="header">
                <div class="nav">
                    <div class="search">
                        <input type="text" placeholder="Search...">
                        <button class="btn btn-outline-success search-btn" type="Sreach" name="Sreach"><i class="bi bi-search"></i></button>
                    </div>
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