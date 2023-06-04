
        <div>
            <?php
            if(isset($data["history"])){
                foreach ($data["history"] as $e1) {
                    echo "<br/>";
                    foreach ($e1 as $e2) {
                        echo "<br/>";
                        foreach ($e2 as $e3) {
                            echo "$e3\n";
                        }
                    }
                }
            }
            else if(isset($data["message"])) {
                echo $data["message"];
            }
            ?>
        </div>