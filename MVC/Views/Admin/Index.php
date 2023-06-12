<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/Admin/main1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<?php
    if($data["message"] != "null"){
        $message = $data["message"];
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>
    <div class="content">
        <div class="cards">
            <div class="card">
                <div class="box">
                    <h1>
                        <?= $data["account"] ?>
                    </h1>
                    <h3>Người dùng</h3>
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <h1>
                        <?= $data["order"] ?>
                    </h1>
                    <h3>Đơn hàng</h3>
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <h1>
                        <?= $data["mobilephone"] ?>
                    </h1>
                    <h3>Sản phẩm</h3>
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <h1>
                        <?= $data['count_admin'] ?>
                    </h1>
                    <h3>Hỗ trợ</h3>
                </div>
            </div>
        </div>
        <div class="content-2 text-center">
            <div class="customer-info">
                <div class="title">
                    <h2>Tài khoản khách hàng</h2>
                    <a href="/Project---CTStore---WD1110/Admin/View_List_Account" class="btn">View All</a>
                </div>
                <table>
                    <tr>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                    </tr>
                    <?php
                        while($row = mysqli_fetch_array($data["Recent Account"])){
                            $id = $row["account_id"];
                            $name = $row["full_name"];
                            $email = $row["email"];
                            $phoneN = $row["phone_number"];
                    ?>
                        <tr>
                            <td><?php echo $name ?></td>
                            <td><?php echo $email ?></td>
                            <td><?php echo $phoneN ?></td>
                            <!-- <td><a href="#" class="btn">View</a></td> -->
                        </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
            <div class="recent-payment">
                <div class="title">
                    <h2>Đơn hàng gần đây</h2>
                    <a href="/Project---CTStore---WD1110/Admin/View_Payment/;" class="btn">View All</a>
                </div>
                <table>
                    <tr>
                        <th>Order Id</th>
                        <th>Khách hàng</th>
                        <th>Thời gian</th>
                    </tr>
                    <?php
                        while($row = mysqli_fetch_array($data["Recent Payment"])){
                            $id = $row["order_id"];
                            $full_name = $row["full_name"];
                            $date = $row["order_date"];
                    ?>
                        <tr>
                            <td><?php echo $id ?></td>
                            <td><?php echo $full_name ?></td>
                            <td><?php echo $date ?></td>
                            <!-- <td><a href="#" class="btn">View</a></td> -->
                        </tr>
                    <?php
                        }
                    ?>
                    
                    
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<a href="/Project---CTStore---WD1110/Messages/View_chat_box">chat-box</a>