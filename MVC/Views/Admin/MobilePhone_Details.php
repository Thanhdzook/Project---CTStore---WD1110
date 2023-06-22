<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="/Project---CTStore---WD1110/MVC/wwwroot/img/t2.png" />
    <title>CTstore Danh sách đơn hàng</title>
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/Admin/mb-detail112.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="box-mb-detail">
        <div class="mb-detail-header">
            <div class="mb-detail-header-title">
                <p>Thông tin điện thoại di dộng</p>
            </div>
            <div class="box-list-btn">
                <?php
                    $row = mysqli_fetch_array($data["mobilePhone"]);
                    $status = "Hiện";
                    $link = "UnLock_MB/".$row["mobilePhone_id"];
                    if($row["status"] == 1){
                        $status = "Ẩn";
                        $link = "Lock_MB/".$row["mobilePhone_id"];
                    }
                ?>
                <a href="/Project---CTStore---WD1110/Admin/<?php echo $link ?>"><button class="btn-hide"><?php echo $status ?></button></a>
                <a href ="/Project---CTStore---WD1110/Create_MobilePhone/View_Fix_MobilePhone/<?php echo $row["mobilePhone_id"] ?>"><button class="btn-update">Sửa</button></a>
            </div>
        </div>
        <div class="mb-detail-content">
            <ul class="box-list-info">
                <li class=".content-list-info">
                    <div class="content-info-item">
                        <p>Tên sản phẩm</p>
                        <div><?php echo $row["mobilePhone_name"] ?></div>
                    </div>
                </li>
                <li class=".content-list-info">
                    <div class="content-info-item">
                        <p>Chip</p>
                        <div><?php echo $row["chip"] ?></div>
                    </div>
                </li>
                <li class=".content-list-info">
                    <div class="content-info-item">
                        <p>Bộ nhớ</p>
                        <div><?php echo $row["memory"] ?></div>
                    </div>
                </li>
                <li class=".content-list-info">
                    <div class="content-info-item">
                        <p>Camera</p>
                        <div><?php echo $row["camera"] ?></div>
                    </div>
                </li>
                <li class=".content-list-info">
                    <div class="content-info-item">
                        <p>Hãng</p>
                        <div><?php echo $row["operatingSystem"] ?></div>
                    </div>
                </li>
                <li class=".content-list-info">
                    <div class="content-info-item">
                        <p>Màn hình</p>
                        <div><?php echo $row["weight"] ?></div>
                    </div>
                </li>
                <li class=".content-list-info">
                    <div class="content-info-item">
                        <p>Dung lượng Pin</p>
                        <div><?php echo $row["pin"] ?></div>
                    </div>
                </li>
                <li class=".content-list-info">
                    <div class="content-info-item">
                        <p>Bảo hành</p>
                        <div><?php echo $row["warrantyPeriod"] ?></div>
                    </div>
                </li>
                <li class=".content-list-info">
                    <div class="content-info-item">
                        <p>Giá</p>
                        <div><?php echo number_format($row["price"], 0, '', ',')?>₫</div>
                    </div>
                </li>
                <li class=".content-list-info">
                    <div class="content-info-item">
                        <p>Số lượng</p>
                        <div><?php echo $row["amount"] ?></div>
                    </div>
                </li>
                <li class=".content-list-info">
                    <div class="content-info-item">
                        <p>Sale</p>
                        <div><?php echo $row["sale"] ?></div>
                    </div>
                </li>
                <li class=".content-list-info">
                    <div class="content-info-item">
                        <p>Màu</p>
                        <div><?php echo $row["color"] ?></div>
                    </div>
                </li>
                <li class=".content-list-info">
                    <div class="content-info-item">
                        <p>Ảnh</p>
                        <div class="content-info-img"><img src="<?php echo $row["img"] ?>" ></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>