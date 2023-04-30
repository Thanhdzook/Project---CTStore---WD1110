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
        <?php
            }
        ?>
    </div>
    <div id="footer"></div>
</body>
</html>