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
                        <div class="icon-case">
                            <img src="#" alt="">
                        </div>
                    </div>
                    <div class="card">
                        <div class="box">
                            <h1>
                                <?= $data["order"] ?>
                            </h1>
                            <h3>Đơn hàng</h3>
                        </div>
                        <div class="icon-case">
                            <img src="#" alt="">
                        </div>
                    </div>
                    <div class="card">
                        <div class="box">
                            <h1>
                                <?= $data["mobilephone"] ?>
                            </h1>
                            <h3>Sản phẩm</h3>
                        </div>
                        <div class="icon-case">
                            <img src="#" alt="">
                        </div>
                    </div>
                    <div class="card">
                        <div class="box">
                            <h1>
                                <?= $data['count_admin'] ?>
                            </h1>
                            <h3>Account Admin</h3>
                        </div>
                        <div class="icon-case">
                            <img src="#" alt="">
                        </div>
                    </div>
                </div>
                <div class="content-2 text-center">
                    <div class="recent-payment">
                        <div class="title">
                            <h2>Customer Information</h2>
                            <a href="#" class="btn">View All</a>
                        </div>
                        <table>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
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
                                    <td><a href="#" class="btn">View</a></td>
                                </tr>
                            <?php
                                }
                            ?>
                        </table>
                    </div>
                    <div class="new-student">
                        <div class="title">
                            <h2>Recent Payment</h2>
                            <a href="#" class="btn">View All</a>
                        </div>
                        <table>
                            <tr>
                                <th>Order Id</th>
                                <th>User Name</th>
                                <th>Date</th>
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
                                    <td><a href="#" class="btn">View</a></td>
                                </tr>
                            <?php
                                }
                            ?>
                            
                            <!-- <tr>
                                <td><img src="images/user1.jpg" alt=""></td>
                                <td>Son</td>
                                <td><img src="images/info.png" alt=""></td>
                            </tr>
                            <tr>
                                <td><img src="images/user1.jpg" alt=""></td>
                                <td>Ky</td>
                                <td><img src="images/info.png" alt=""></td>
                            </tr>
                            <tr>
                                <td><img src="images/user1.jpg" alt=""></td>
                                <td>Quan</td>
                                <td><img src="images/info.png" alt=""></td>
                            </tr> -->
                        </table>
                    </div>
                </div>
            </div>
<a href="/Project---CTStore---WD1110/Messages/View_chat_box">chat-box</a>