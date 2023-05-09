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
            <?php 
                while($row = mysqli_fetch_array($data["mobilePhone"])){
                    $img = $row['img'];
                    echo $row["mobilePhone_id"];
                    echo "<br>";
                    ?>
            <div>
                <img src="<?php echo $img ?>">
            </div>
            <div>
                <a href="./MobilePhone_Detail/ShowMobilePhoneDetail/<?php echo $row["mobilePhone_id"]; ?>"><button>DETAIL</button></a>
            </div>
            <?php
                }
            ?>
    </div>
    <div>
        <form method="post" action="./Show_MobilePhone/SreachMobilePhone/mobilePhone_name">
            <input type="text" class="form-style" placeholder="sreach" name="NameMobilePhone">
            <input class="btn mt-4" type="submit" name="Sreach" value="Sreach">
        </form>
    </div>
    <div>ok</div>
    <div id="footer"></div>
</body>
</html>