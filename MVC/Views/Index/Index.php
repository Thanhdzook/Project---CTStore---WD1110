<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <style>
    div{padding:20px}
    #header, #footer{background-color:yellow}
    </style>
</head>
<body>
    <div id="header"></div>
    <div id="content">
        <div>
            <a href="/Project---CTStore---WD1110/Login_Sigin/View_Login_Sigin"><button>dang nhap</button></a>
        </div>
        <div>
            <a href="/Project---CTStore---WD1110/Payment/ViewCart"><button>giỏ hàng</button></a>
        </div>
        <br>
        <?php 
            while($row = mysqli_fetch_array($data["mobilePhone"])){
                $img = $row['img'];
                echo $row["mobilePhone_id"];
                echo "<br>";
                ?>
        <div>
            <img style="width: 100px; height: 100px;" src="<?php echo $img?>">
        </div>
        <div>
            <a href="/Project---CTStore---WD1110/MobilePhone_Detail/ShowMobilePhoneDetail/<?php echo $row["mobilePhone_id"]; ?>"><button>DETAIL</button></a>
        </div>
        <?php
            }
        ?>
    </div>
    <div>
        <form method="post" action="/Project---CTStore---WD1110/Show_MobilePhone/SreachMobilePhone/mobilePhone_name">
            <input type="text" class="form-style" placeholder="sreach" name="NameMobilePhone">
            <input class="btn mt-4" type="submit" name="Sreach" value="Sreach">
        </form>
    </div>
    <div id="footer"></div>
</body>
</html>