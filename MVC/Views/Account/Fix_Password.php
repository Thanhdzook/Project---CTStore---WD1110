<?php
    if(isset($data["message"])){
        $message = $data["message"];
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>
<body>
    <div id="content">
        <form method="post" action="/Project---CTStore---WD1110/Account/Fix_Password">
            <label value="Nhập mật khẩu hiện tại">
                <input type="password" name="password_old" placeholder="Mật khẩu hiện tại">
            </label>
            <label value="Nhập mật khẩu mới">
                <input type="password" name="password_new1" placeholder="Mật khẩu mới">
            </label>
            <label value="Xác nhận mật khẩu mới">
                <input type="password" name="password_new2" placeholder="Xác nhận mật khẩu mới">
            </label>
            <input type="submit" name="submit" value="Thay đổi">
        </form>
    </div>
</body>
