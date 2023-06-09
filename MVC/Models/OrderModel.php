<?php 
    class OrderModel extends DB{
        public function Count_All_Order(){
            $qr = "select count(*) from orders where status != 1";
            return mysqli_query($this->con , $qr);
        }

        public function List_All_Order($and){
            $qr = "select * from orders ".$and."";
            return mysqli_query($this->con , $qr);
        }

        public function List_Order( $name , $data , $and){
            $qr = "select * from orders where ".$name." = ".$data." ".$and."";
            return mysqli_query($this->con , $qr);
        }
        public function Create_Order($account_id){
            $date = date("Y-m-d");
            $qr = "insert into orders (account_id, order_date, status , unique_id) VALUES ('$account_id', '$date', '1' , '0')";
            return mysqli_query($this->con , $qr);
        }

        public function Create_Order_Detail($order_id , $mobilephone_id , $unit_price , $quantity){
            $qr = "INSERT INTO orderdetails (order_id, mobilePhone_id, unit_price, quantity) VALUES ('$order_id', '$mobilephone_id', '$unit_price', '$quantity');";
            return mysqli_query($this->con , $qr);
        }
        
        public function Check_Order( $name , $account_id , $and){
            $qr = "select count(*) from orders where ".$name." = '$account_id' ".$and."";
            return mysqli_query($this->con , $qr);
        }

        public function Check_Order_Detail( $name ,$data , $id){
            $qr = "select count(*) from orderdetails where ".$name." = ".$data." and order_id = ".$id."";
            return mysqli_query($this->con , $qr);
        }

        public function List_Order_Detail($id){
            $qr = "select account.account_id , account.full_name , account.phone_number , account.email , mobilephone.mobilePhone_id , mobilephone.amount , 
            mobilephone.price , mobilephone.mobilePhone_name , mobilephone.img , orderdetails.order_id , orderdetails.unit_price , 
            orderdetails.quantity, mobilephone.sale , orders.unique_id , orders.order_date , orders.order_id , orders.status
            from mobilephone , orderdetails , orders , account
            where orderdetails.order_id = ".$id." and mobilephone.mobilePhone_id = orderdetails.mobilePhone_id and account.account_id = orders.account_id and orders.order_id = orderdetails.order_id";
            return mysqli_query($this->con , $qr);
        }
        public function List_Payment($id , $data){
            $qr = "select mobilephone.mobilePhone_id , mobilephone.price , mobilephone.mobilePhone_name , mobilephone.img , orderdetails.order_id , orderdetails.unit_price , orderdetails.quantity from mobilephone , orderdetails where orderdetails.order_id = ".$id." and (".$data.") and mobilephone.mobilePhone_id = orderdetails.mobilePhone_id";
            return mysqli_query($this->con , $qr);
        }
        
        public function Fix_Order_Detail($mobilePhone_id , $order_id , $maths , $data , $data2){
            $qr = "update orderdetails set ".$data2." = ".$data2." ".$maths." ".$data." where mobilePhone_id = ".$mobilePhone_id." and order_id = ".$order_id.";";
            return mysqli_query($this->con , $qr);
        }

        public function Fix_Order($id , $status){
            $qr = "update orders set status = ".$status." where order_id = ".$id."";
            return mysqli_query($this->con , $qr);
        }

        public function Pay( $account_id , $data , $delivery){
            $data2 = [
                "Order" => $this->List_Order( "account_id" , $account_id , "and status = 1")
            ];
            while($row2 = mysqli_fetch_array($data2["Order"])){
                $order_id2 = $row2["order_id"];
            }
                $orM = $this->List_Order_Detail($order_id2);
            while($rowM = mysqli_fetch_array($orM)){
                $quantity = $rowM["quantity"];
                for($i = 0 ; $i<= $_SESSION["count"] ; $i++){
                    if($_SESSION["mobilePhone_id"][$i] == $rowM["mobilePhone_id"]){
                        $updateM = "update mobilephone set amount = amount - ".$quantity." where mobilePhone_id = ".$_SESSION["mobilePhone_id"][$i]."";
                        mysqli_query($this->con , $updateM);
                    }
                }
            }
            if($delivery != 0){
                $date = date('Y-m-d H:i:s');
                $qr= "update orders set status = 2 ,  order_date = '$date' , unique_id = ".$delivery." where account_id = ".$account_id." and order_id = ".$order_id2." ";
                mysqli_query($this->con , $qr);
            }
            elseif($delivery == 0){
                $date = date('Y-m-d H:i:s');
                $qr= "update orders set status = 2 ,  order_date = '$date' where account_id = ".$account_id." and order_id = ".$order_id2." ";
                mysqli_query($this->con , $qr);
            }
            
            $this->Create_Order($account_id);
            $row = mysqli_fetch_array($this->List_Order( "account_id" , $account_id , "and status = 1"));
            $order_id = $row['order_id'];
            $qr2 = "update orderdetails set order_id = ".$order_id." where (order_id = ".$order_id2.") and (".$data.")";
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

        public function Purchase_History($data){
            $qr = "select orders.order_date , orders.status , mobilephone.mobilePhone_name , mobilephone.price , mobilephone.img , mobilephone.sale ,orderdetails.quantity , mobilephone.mobilePhone_id , orderdetails.order_id 
            FROM orders , orderdetails , mobilephone 
            WHERE (".$data.") 
            and mobilephone.mobilePhone_id = orderdetails.mobilePhone_id and orders.order_id = orderdetails.order_id";
            return mysqli_query($this->con , $qr);
        }

        public function Delete_Order_Details($mobilePhone_id , $order_id){
            $qr = "delete FROM orderdetails WHERE order_id = ".$order_id." and mobilePhone_id = ".$mobilePhone_id."";
            return mysqli_query($this->con , $qr);
        }

        public function Order_Account($data){
            $qr = "select orders.order_id , orders.order_date , orders.status , account.full_name from account , orders 
            where orders.account_id = account.account_id and orders.status != 1 ".$data."";
            return mysqli_query($this->con , $qr);
        }
        public function Cancel_Order($id , $data){
            $qr = "update mobilephone SET amount = amount + ".$data." WHERE mobilePhone_id = '$id'";
            $result = false;
            if(mysqli_query($this->con , $qr)){
                $result = true;
            }
            return json_encode($result);
        }
        public function Revenue($data){
            $qr = "select orders.order_date , orderdetails.quantity , orderdetails.order_id , orderdetails.unit_price
            FROM orders , orderdetails
            WHERE (".$data.") 
            and orders.order_id = orderdetails.order_id and orders.status = 5 ORDER BY order_date asc";
            return mysqli_query($this->con , $qr);
        }
    }
?>