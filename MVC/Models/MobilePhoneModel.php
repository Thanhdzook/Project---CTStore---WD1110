<?php 
    class MobilePhoneModel extends DB{

        public function List_MobilePhone(){
            $qr = "select * from mobilephone";
            return mysqli_query($this->con , $qr);
        }

        // public function Create_Account($full_name , $phone_number , $email , $password ){
        //     $qr = "insert into account (full_name, phone_number, email, password , role) values ('$full_name','$phone_number','$email','$password' , 2 )";
        //     $result = false;
        //     if(mysqli_query($this->con , $qr)){
        //         $result = true;
        //     }

        //     return json_encode($result);
        // }
    }
?>