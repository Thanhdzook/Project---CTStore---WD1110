<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/Admin/style-layout-admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <nav class="navbar">
            <div class="nav_icon" onclick="toggleSilebar()">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="navbar__left">
                <a class="active_link" href="#">Admin</a>
            </div>
            <div class="navbar__right">
                <div class="search">
                        <input type="text" placeholder="Search...">
                        <button class="btn btn-outline-success search-btn" type="Sreach" name="Sreach"><i class="bi bi-search"></i></button>
                </div>
                <a href="#">
                    <i class="fa-solid fa-circle-user"></i>
                </a>
            </div>
        </nav>
        <main>
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
        </main>
        <div class="sidebar">
            <div class="sidebar__title">
                <div class="sidebar__img">
                    <img src="" alt="">
                    
                </div>
            </div>
        </div>
        <div id="sidebar__bottom">
            <div class="sidebar__bottom-logo">
                <h2>CTSTORE</h2>
                <div class="icon-close">
                    <i class="fa fa-times" id="sidebarIcon" onclick="closeSidebar()"></i>
                </div>
            </div>
            <div class="sidebar__bottom-box">
                
                <div class="sidebar__link active-link">
                    <i class="fa fa-home "></i>
                    <a href="/Project---CTStore---WD1110/Admin/View_Index_Admin/null">Trang chủ</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa-solid fa-mobile-screen-button"></i>
                    <a href="/Project---CTStore---WD1110/Admin/View_MobilePhone/0">Sản phẩm</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa-solid fa-truck"></i>
                    <a href="#">Đơn hàng</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa-solid fa-user"></i>
                    <a href="#">Người dùng</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa-solid fa-headset"></i>
                    <a href="#">Hỗ trợ</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <a href="/Project---CTStore---WD1110/Login_Sigin/Log_out">Đăng xuất</a>
                </div>
            </div>
            
        </div>
    </div>
    <script src="/TESTCB/DashBoard/script.js"></script>
</body>
</html>
    <!-- <div class="row">
        <div class="side-menu col-3 ">
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
        <div class="container col-9 ">
            <div class="header">
                <div class="nav">
                    <div class="search">
                        <input type="text" placeholder="Search...">
                        <button class="btn btn-outline-success search-btn" type="Sreach" name="Sreach"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="content">

            </div>
        </div>
    </div>
</body>
</html> -->