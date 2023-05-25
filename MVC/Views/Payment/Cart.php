
    <div id="header"></div>
    <div id="content">
        <?php
            if($data["message"] != "null"){
                $message = $data["message"];
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        ?>
        <form method="post" action="/Project---CTStore---WD1110/Payment/ViewPay">
            <?php 
                while($row = mysqli_fetch_array($data["orderdetails"])){
                    $img = $row["img"];
                    $mobilephone_id = $row["mobilePhone_id"];
                    echo $row["mobilePhone_name"];
                    echo "<br>";
                    echo $row["order_id"];
                    echo "<br>";
                    echo $row["quantity"];
                    echo "<br>";
                    echo $row["quantity"]*$row["unit_price"];
                    echo "<br>";
                    ?>
                <div>
                    <img style="width: 100px; height: 100px;" src="<?php echo $img?>">
                </div>
                <div>
                    <input type="checkbox" name="<?php echo $mobilephone_id;?>" value="chọn">chọn
                </div>
            <?php
                }
            ?>
            <input type="submit" name="Payment" value="Mua">
        </form>
        
    </div>
