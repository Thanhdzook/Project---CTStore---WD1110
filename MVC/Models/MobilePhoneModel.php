<?php 
    class MobilePhoneModel extends DB{

        public function List_MobilePhone(){
            $qr = "select * from mobilephone";
            return mysqli_query($this->con , $qr);
        }

        public function Sreach_MobilePhone_By_Value($name, $data){
            $qr = "select * from mobilephone where ".$name." = '$data'";
            return mysqli_query($this->con , $qr);
        }

        public function Count_MobilePhone_By_Value($name,$data){
            $qr = "select count(*) from mobilephone where ".$name." = '$data'";
            return mysqli_query($this->con , $qr);
        }

        public function Count_MobilePhone(){
            $qr = "select count(*) from mobilephone";
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

        public function MobilePhone_Detail($id){
            $qr = "select * from mobilephone where mobilePhone_id = '$id'";
            return mysqli_query($this->con , $qr);
        }
    }
?>