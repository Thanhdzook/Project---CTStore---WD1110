<?php 
    class AccountModel extends DB{

        public function List_Account(){
            $qr = "select * from account";
            return mysqli_query($this->con , $qr);
        }

        public function Create_Account($full_name , $phone_number , $email , $password ){
            $qr = "insert into account (full_name, phone_number, email, password , role) values ('$full_name','$phone_number','$email','$password' , 2 )";
            $result = false;
            if(mysqli_query($this->con , $qr)){
                $result = true;
            }

            return json_encode($result);
        }

        public function List_Customer($id){
            $qr = "select * from customer where account_id = '$id'";
            return mysqli_query($this->con , $qr);
        }

        public function Check_Customer($id){
            $qr = "select count(*) from customer where account_id = '$id'";
            return mysqli_query($this->con , $qr);
        }

        public function Create_Customer($id , $name , $phone , $address){
            $qr = "insert into customer (account_id,customer_name, customer_phonenumber, customer_address) values (".$id.",'$name','$phone','$address')";
            $result = false;
            if(mysqli_query($this->con , $qr)){
                $result = true;
            }

            return json_encode($result);
        }

        public function Search_Account($email){
            $qr = "select * from account where email = '$email'";
            return mysqli_query($this->con , $qr);
        }

        public function Update_Infor_Account($full_name , $phone_number , $email , $id , $password){
            $qr = "update account set full_name = '$full_name' , phone_number = '$phone_number' , email = '$email' , password = '$password' where account_id = ".$id." ;";
            $result = false;
            if(mysqli_query($this->con , $qr)){
                $result = true;
            }

            return json_encode($result);
        }
    }
?>