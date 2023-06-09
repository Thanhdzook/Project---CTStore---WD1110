<?php 
    class OrderModel extends DB{
        public function Count_All_Order(){
            $qr = "select count(*) from orders where status = 4";
            return mysqli_query($this->con , $qr);
        }
        public function List_Order($account_id , $and){
            $qr = "select * from orders where account_id = ".$account_id." $and";
            return mysqli_query($this->con , $qr);
        }
        public function Create_Order($account_id){
            $date = date("Y-m-d");
            $qr = "insert into orders (account_id, order_date, status) VALUES ('$account_id', '$date', '1')";
            return mysqli_query($this->con , $qr);
        }

        public function Create_Order_Detail($order_id , $mobilephone_id , $unit_price , $quantity){
            $qr = "INSERT INTO orderdetails (order_id, mobilePhone_id, unit_price, quantity) VALUES ('$order_id', '$mobilephone_id', '$unit_price', '$quantity');";
            return mysqli_query($this->con , $qr);
        }
        
        public function Check_Order($account_id , $and){
            $qr = "select count(*) from orders where account_id = '$account_id' ".$and."";
            return mysqli_query($this->con , $qr);
        }

        public function Check_Order_Detail( $name ,$data , $id){
            $qr = "select count(*) from orderdetails where ".$name." = ".$data." and order_id = ".$id."";
            return mysqli_query($this->con , $qr);
        }

        public function List_Order_Detail($id){
            $qr = "select mobilephone.mobilePhone_id , mobilephone.mobilePhone_name , mobilephone.img , orderdetails.order_id , orderdetails.unit_price , orderdetails.quantity from mobilephone , orderdetails where orderdetails.order_id = ".$id." and mobilephone.mobilePhone_id = orderdetails.mobilePhone_id";
            return mysqli_query($this->con , $qr);
        }

        public function List_Payment($id , $data){
            $qr = "select mobilephone.mobilePhone_id , mobilephone.mobilePhone_name , mobilephone.img , orderdetails.order_id , orderdetails.unit_price , orderdetails.quantity from mobilephone , orderdetails where orderdetails.order_id = ".$id." and (".$data.") and mobilephone.mobilePhone_id = orderdetails.mobilePhone_id";
            return mysqli_query($this->con , $qr);
        }
        
        public function Fix_Order_Detail($mobilePhone_id , $order_id , $maths , $data){
            $qr = "update orderdetails set quantity = quantity ".$maths." ".$data." where mobilePhone_id = ".$mobilePhone_id." and order_id = ".$order_id.";";
            return mysqli_query($this->con , $qr);
        }

        public function Pay( $account_id , $data){
            $data2 = [
                "Order" => $this->List_Order($account_id , "and status = 1")
            ];
            while($row2 = mysqli_fetch_array($data2["Order"])){
                $order_id2 = $row2["order_id"];
            }
            $date = date('Y-m-d H:i:s');
            $qr= "update orders set status = 2 ,  order_date = '$date' where account_id = ".$account_id." and order_id = ".$order_id2." ";
            mysqli_query($this->con , $qr);
            $this->Create_Order($account_id);
            $row = mysqli_fetch_array($this->List_Order($account_id , "and status = 1"));
            $order_id = $row['order_id'];
            $qr2 = "update orderdetails set order_id = ".$order_id." where (order_id = ".$order_id2.") and (".$data.")";
            // return $qr2;
            $result = false;
            if(mysqli_query($this->con , $qr2)){
                $result = true;
            }
            return json_encode($result);
        }
        
        public function Recent_Payment($data , $name , $check){
            $qr = "SELECT ".$data."
                    FROM ".$name."
                    ORDER BY ".$check." DESC
                    LIMIT 0,5";
            return mysqli_query($this->con , $qr);
        }

        // public function Purchase_History($data){
        //     $qr = "select mobilephone.mobilePhone_name , mobilephone.price , mobilephone.img , mobilephone.sale ,orderdetails.quantity , mobilephone.mobilePhone_id , orderdetails.order_id
        //     FROM orderdetails , mobilephone 
        //     WHERE (".$data.") and mobilephone.mobilePhone_id = orderdetails.mobilePhone_id";
        //     return mysqli_query($this->con , $qr);
        // }
        public function Purchase_History($data){
            $qr = "select orders.order_date , orders.status , mobilephone.mobilePhone_name , mobilephone.price , mobilephone.img , mobilephone.sale ,orderdetails.quantity , mobilephone.mobilePhone_id , orderdetails.order_id 
            FROM orders , orderdetails , mobilephone 
            WHERE (".$data.") 
            and mobilephone.mobilePhone_id = orderdetails.mobilePhone_id and orders.order_id = orderdetails.order_id";
            return mysqli_query($this->con , $qr);
        }
    }
?>