<?php 
    class AccountModel extends DB{

        public function List_Account(){
            $qr = "select * from account";
            return mysqli_query($this->con , $qr);
        }
    }
?>