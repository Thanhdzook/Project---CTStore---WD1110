<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="/Project---CTStore---WD1110/MVC/wwwroot/img/t2.png"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/Admin/style-layout-admin12.css">
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
                <form method="POST" action="/Project---CTStore---WD1110/Admin/Search">
                    <div class="search">
                        <input name="Search" type="text" placeholder="Search...">
                        <button class="btn btn-outline-success search-btn" type="submit" name="Submit"><i class="bi bi-search"></i></button>
                    </div>
                </form>
                <a href="">
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
                    <a href="/Project---CTStore---WD1110/Admin/View_Payment/;">Đơn hàng</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa-solid fa-user"></i>
                    <a href="/Project---CTStore---WD1110/Admin/View_List_Account">Người dùng</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa-solid fa-headset"></i>
                    <a href="/Project---CTStore---WD1110/Admin/Messages/null">Hỗ trợ</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <a href="/Project---CTStore---WD1110/Login_Sigin/Log_out">Đăng xuất</a>
                </div>
            </div>
            
        </div>
    </div>
    <script src="/TESTCB/DashBoard/script.js"></script>
    <script>
//         // Lấy danh sách tất cả các liên kết trong thanh bên
// // Lấy danh sách tất cả các liên kết trong thanh bên
// var sidebarLinks = document.querySelectorAll('.sidebar__link');

// // Lặp qua từng liên kết
// sidebarLinks.forEach(function(link) {
//   // Gắn sự kiện click vào từng liên kết
//   link.addEventListener('click', function(event) {
//     // Ngăn chặn hành vi mặc định của liên kết (chẳng hạn chuyển trang)
//     event.preventDefault();

//     // Loại bỏ lớp "active-link" khỏi tất cả các liên kết
//     sidebarLinks.forEach(function(link) {
//       link.classList.remove('active-link');
//     });

//     // Thêm lớp "active-link" vào liên kết được nhấp
//     link.classList.add('active-link');

//     // Lấy đường dẫn của liên kết
//     var linkHref = link.getAttribute('href');

//     // Chuyển hướng sang trang mới
//     window.location.href = linkHref;
//   });
// });
    </script>
</body>
</html>