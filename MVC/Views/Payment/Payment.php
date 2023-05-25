
    <div id="header"></div>
    <div id="content">
        <form method="post" action="/Project---CTStore---WD1110/Payment/Pay">
            <?php 
                $i = 0;
                while($row = mysqli_fetch_array($data["payment"])){
                    $img = $row["img"];
                    $mobilephone_id = $row["mobilePhone_id"];
                    $_SESSION["mobilePhone_id"][$i] = $mobilephone_id;
                    $_SESSION["count"] = $i;
                    $i++;
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
            <?php
                }
            ?>
            
            <select name="address">
            <?php
                    while($row2 = mysqli_fetch_array($data["customer"])){
            ?>
                <option value="<?php echo $row2["customer_address"] ?>"><?php echo $row2["customer_address"] ; echo $row2["customer_name"] ; echo $row2["customer_phonenumber"] ?></option>
            <?php
                    }
            ?>
            </select>
            <input type="submit" name="Payment" value="Mua">
        </form>
    </div>
