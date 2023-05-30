<?php
    if(isset($data["message"])){
        $message = $data["message"];
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/layout/home_page.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<body>
    <section class="slider">
        <div class="container">
            <div class="slider-content row d-flex">
                <div class="slider-content-left col-md-3">
                    <ul>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                    </ul>
                </div>
                <div class="slider-content-right col-md-9">
                    <div class="slider-content-right-top">
                        <img src="https://cdn2.cellphones.com.vn/690x300,webp,q100/https://dashboard.cellphones.com.vn/storage/GTS%204.png" alt="">
                    </div>
                    <div class="slider-content-right-bottom">
                        <li>Tieu de 1</li>
                        <li>Tieu de 1</li>
                        <li>Tieu de 1</li>
                        <li>Tieu de 1</li>
                        <li>Tieu de 1</li>
                    </div>
                </div>
            </div>
        </div>
        <?php 
                while($row = mysqli_fetch_array($data["mobilePhone"])){
                    $img = $row["img"];
                    $mobilephone_id = $row["mobilePhone_id"];
                    $price = $row["price"];
                    echo $row["mobilePhone_name"];
                    echo "<br>";
                    echo $row["mobilePhone_id"];
                    echo "<br>";
                    echo $row["amount"];
                    echo "<br>";
                    ?>
                <div>
                    <img style="width: 100px; height: 100px;" src="<?php echo $img?>">
                </div>
                <div>
                    <form method="post" action="/Project---CTStore---WD1110/MobilePhone_Detail/ShowMobilePhoneDetail/<?php echo $mobilephone_id ?>">
                        <input type="submit" name="Order" value="mua">
                    </form>
                </div>
            <?php
                }
            ?>
    </section>
</body>
</html>