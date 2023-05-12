<?php 
    class OrderModel extends DB{

        public function List_Order($account_id){
            $qr = "select * from orders where account_id = '$account_id' and status = 1";
            return mysqli_query($this->con , $qr);
        }
        // public function List_Order_Detail($order_id){
        //     $qr = "select * from orderdetails where order_id = '$order_id' ";
        //     return mysqli_query($this->con , $qr);
        // }
        public function Create_Order($account_id){
            $date = date("Y-m-d");
            $qr = "insert into orders (account_id, order_date, status) VALUES ('$account_id', '$date', '1')";
            return mysqli_query($this->con , $qr);
        }

        public function Create_Order_Detail($order_id , $mobilephone_id , $unit_price , $quantity){
            $date = date("Y-m-d");
            $qr = "INSERT INTO orderdetails (order_id, mobilePhone_id, unit_price, quantity) VALUES ('$order_id', '$mobilephone_id', '$unit_price', '$quantity');";
            return mysqli_query($this->con , $qr);
        }

        public function Check_Orer($account_id){
            $qr = "select count(*) from orders where account_id = '$account_id' and status = 1";
            return mysqli_query($this->con , $qr);
        }

        public function Check_Orer_Detail( $name ,$order_id){
            $qr = "select count(*) from orderdetails where ".$name." = ".$order_id."";
            return mysqli_query($this->con , $qr);
        }

        public function List_Order_Detail($id){
            $qr = "select mobilephone.mobilePhone_name , mobilephone.img , orderdetails.order_id , orderdetails.unit_price , orderdetails.quantity from mobilephone , orderdetails where orderdetails.order_id = ".$id." and mobilephone.mobilePhone_id = orderdetails.mobilePhone_id";
            return mysqli_query($this->con , $qr);
        }
        public function Fix_Order_Detail($mobilePhone_id , $order_id , $maths , $data){
            $qr = "update orderdetails set quantity = quantity ".$maths." ".$data." where mobilePhone_id = ".$mobilePhone_id." and order_id = ".$order_id.";";
            return mysqli_query($this->con , $qr);
        }
    }
?>