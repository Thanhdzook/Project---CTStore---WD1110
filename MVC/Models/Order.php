<?php 
    class OderModel extends DB{

        public function List_Order($account_id){
            $qr = "select * from orders where account_id = '$account_id'";
            return mysqli_query($this->con , $qr);
        }

        public function Create_Order(){
            return 0;
        }
    }
?>