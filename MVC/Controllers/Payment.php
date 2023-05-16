<?php
    class Payment extends Controller{
        public $order;
        function __construct(){
            $this->order = $this->model("OrderModel");
            // $this->mobilephone = $this->model("MobilePhoneModel");
        }
        
        function ViewCart(){
            if($_SESSION['account_id'] == null){
                header("Location: /Project---CTStore---WD1110/Login_Sigin/View_Login_Sigin");
            }
            $row = mysqli_fetch_array($this->order->List_Order($_SESSION['account_id']));
            $order_id = $row["order_id"];
            
            $this->view2("Payment" , "Cart" ,["orderdetails" => $this->order->List_Order_Detail($order_id)]);
        }

        function ViewPay(){
            $row = mysqli_fetch_array($this->order->List_Order($_SESSION['account_id']));
            $order_id = $row["order_id"];
            $data = [
                "id" => $this->order->List_Order_Detail($order_id)
            ];
            
            if(isset($_POST["Payment"])){
                while($row2 = mysqli_fetch_array($data["id"])){
                    $mobilephone_id = $row2["mobilePhone_id"];
                    if(isset($_POST[$mobilephone_id])){
                        $data2 = [
                            "mobilePhone_id" => $mobilephone_id
                        ];
                    }
                }
            }
            $this->view("Payment"  ,["payment" => $this->order->List_Order_Detail($order_id)]);

        }
    }
?>