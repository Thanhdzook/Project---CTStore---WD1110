<?php 
    class AccountModel extends DB{

        public function Count_Account($role){
            $qr = "select count(*) from account where role = ".$role."";
            return mysqli_query($this->con , $qr);
        }
        public function List_Account(){
            $qr = "select * from account ";
            return mysqli_query($this->con , $qr);
        }

        public function List_Account_Admin(){
            $qr = "select * from account where role != 1";
            return mysqli_query($this->con , $qr);
        }

        public function Create_Account($full_name , $phone_number , $email , $password , $role , $random_id){
            $qr = "insert into account (full_name, phone_number, email, password , role , unique_id) values ('$full_name','$phone_number','$email','$password' , ".$role." , ".$random_id." )";
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

        public function List_Customer_By_Unique($id){
            $qr = "select * from customer where unique_id = '$id'";
            return mysqli_query($this->con , $qr);
        }

        public function Check_Customer($id){
            $qr = "select count(*) from customer where account_id = '$id'";
            return mysqli_query($this->con , $qr);
        }

        public function Create_Customer($id , $name , $phone , $address , $random_id){
            // $random_id = rand(time(), 1000000000);
            $qr = "insert into customer (account_id,customer_name, customer_phonenumber, customer_address , unique_id) values (".$id.",'$name','$phone','$address' , ".$random_id.")";
            $result = false;
            if(mysqli_query($this->con , $qr)){
                $result = true;
            }
            return json_encode($result);
        }

        public function Search_Account( $name , $data){
            $qr = "select * from account where ".$name." = '$data'";
            return mysqli_query($this->con , $qr);
        }

        public function Count_Account_By_Value( $name , $data){
            $qr = "select count(*) from account where ".$name." = '$data'";
            return mysqli_query($this->con , $qr);
        }

        public function Update_Infor_Account($full_name , $email , $id , $password){
            $qr = "update account set full_name = '$full_name' ,  email = '$email' , password = '$password' where account_id = ".$id." ;";
            $result = false;
            if(mysqli_query($this->con , $qr)){
                $result = true;
            }

            return json_encode($result);
        }

        public function Lock_Account( $id ){
            $qr = "update account set role = 3 where account_id = ".$id." ;";
            $result = false;
            if(mysqli_query($this->con , $qr)){
                $result = true;
            }

            return json_encode($result);
        }
        public function UnLock_Account( $id ){
            $qr = "update account set role = 2 where account_id = ".$id." ;";
            $result = false;
            if(mysqli_query($this->con , $qr)){
                $result = true;
            }

            return json_encode($result);
        }

        public function Recent_Account($data , $name , $check){
            $qr = "SELECT ".$data."
                    FROM ".$name."
                    ORDER BY ".$check." DESC
                    LIMIT 0,5";
            return mysqli_query($this->con , $qr);
        }
        public function Account_Order($data , $name , $check){
            $qr = "SELECT ".$data."
                    FROM ".$name."
                    ORDER BY ".$check." DESC";
            return mysqli_query($this->con , $qr);
        }
    }
?>