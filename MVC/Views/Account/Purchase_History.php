<?php
    if(isset($data["message"])){
        $message = $data["message"];
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>
        <div>
            <?php
            foreach ($data["history"] as $e1) {
                echo "<br/>";
                foreach ($e1 as $e2) {
                    echo "<br/>";
                    foreach ($e2 as $e3) {
                        echo "$e3\n";
                    }
                }
            }
            ?>
        </div>