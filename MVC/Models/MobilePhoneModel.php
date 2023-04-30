<?php 
    class MobilePhoneModel extends DB{

        public function List_MobilePhone(){
            $qr = "select * from mobilephone";
            return mysqli_query($this->con , $qr);
        }

        public function Create_MobilePhone($mobilePhone_name, $chip, $memory, $camera, $operatingSystem, $weight, $pin, $warrantyPeriod, $price, $amount, $img){
            $qr = "insert into mobilephone (mobilePhone_name, chip, memory, camera, operatingSystem, weight, pin, warrantyPeriod, price, amount, img) values ('$mobilePhone_name', '$chip', '$memory', '$camera', '$operatingSystem', '$weight', '$pin', '$warrantyPeriod', '$price', '$amount', '$img')";
            $result = false;
            if(mysqli_query($this->con , $qr)){
                $result = true;
            }

            return json_encode($result);
        }
    }
?>