<?php
    class Order_Detail extends Controller{
        public $order;
        function __construct(){
            $this->order = $this->model("OrderModel");
        }

        function Create_Order_Detail($mobilephone_id , $unit_price){
            if(isset($_POST["Order"])){
                $quantity = $_POST["quantity"];
                if(mysqli_fetch_column($this->order->Check_Orer($_SESSION['account_id'])) != 0){
                    $row = mysqli_fetch_array($this->order->List_Order($_SESSION['account_id']));
                    $order_id = $row["order_id"];
                    if(mysqli_fetch_column($this->order->Check_Orer_Detail( "mobilePhone_id", $mobilephone_id)) != 0){
                        $this->order->Fix_Order_Detail($mobilephone_id , $order_id , "+" , $quantity);
                        header("Location: /Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone_message/Đã thêm vào giỏ hàng thành công !");
                    }
                    else{
                        $row = mysqli_fetch_array($this->order->List_Order($_SESSION['account_id']));
                        $this->order->Create_Order_Detail($row["order_id"] , $mobilephone_id , $unit_price , $quantity);
                        header("Location: /Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone_message/Đã thêm vào giỏ hàng thành công !");

                    }
                }
                else{
                    $this->order->Create_Order($_SESSION["account_id"]);
                    $row = mysqli_fetch_array($this->order->List_Order($_SESSION['account_id']));
                    $this->order->Create_Order_Detail($row["order_id"] , $mobilephone_id , $unit_price , $quantity);
                    header("Location: /Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone_message/Đã thêm vào giỏ hàng thành công !");

                }
            }
        }
    }
?>