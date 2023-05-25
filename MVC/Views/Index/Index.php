<?php
    if(isset($data["message"])){
        $message = $data["message"];
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>
        <div>
            <?php
                while($row = mysqli_fetch_array($data["mobilePhone"])){
                    echo $row["mobilePhone_name"];
                    echo "<br/>";
                    echo $row["price"];
                    echo "<br/>";
                    $img = $row["img"];
                    $id = $row["mobilePhone_id"];
            ?>
                <img style="width: 100px; height: 100px;" src="<?php echo $img?>">
                <br/>
                <a href="/Project---CTStore---WD1110/MobilePhone_Detail/ShowMobilePhoneDetail/<?php echo $id ?>"><button>xem chi tiết</button></a>
                <br/>
            <?php }?>
        </div>