<?php
    if(isset($data["message"])){
        $message = $data["message"];
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>
<body>
    <div id="content">
        <form method="post" action="/Project---CTStore---WD1110/Account/Fix_Infor_Account">
            <label value="xác nhận mật khẩu">
                <input type="password" name="password" placeholder="Mật khẩu">
            </label>
            <input type="submit" name="submit" value="Thay đổi">
        </form>
    </div>
</body>
