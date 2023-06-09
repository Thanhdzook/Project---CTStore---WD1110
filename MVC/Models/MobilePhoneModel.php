<?php 
    class MobilePhoneModel extends DB{
        public function Count_All_MobilePhone(){
            $qr = "select count(*) from mobilephone";
            return mysqli_query($this->con , $qr);
        }
        public function List_MobilePhone($next){
            $qr = "select * from mobilephone LIMIT ".$next.",5";
            return mysqli_query($this->con , $qr);
        }

        public function Sreach_MobilePhone_By_Value($name, $data , $and){
            $qr = "select * from mobilephone where ".$name." = '$data' ".$and."";
            return mysqli_query($this->con , $qr);
        }

        public function Count_MobilePhone_By_Value($name,$data , $and){
            $qr = "select count(*) from mobilephone where ".$name." = '$data' ".$and."";
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

        public function Recent_Phone($data , $name , $check){
            $qr = "SELECT ".$data."
                    FROM ".$name."
                    ORDER BY ".$check." DESC
                    LIMIT 0,5";
            return mysqli_query($this->con , $qr);
        }
    }
?>