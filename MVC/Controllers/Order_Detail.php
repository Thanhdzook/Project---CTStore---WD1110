<?php
    class Order_Detail extends Controller{
        public $order;
        public $mobilephone;
        function __construct(){
            $this->order = $this->model("OrderModel");
            $this->mobilephone = $this->model("MobilePhoneModel");
        }

        function Create_Order_Detail($mobilephone_id , $unit_price){
            if(isset($_POST["Order"])){
                $quantity = $_POST["quantity"];
                if(mysqli_fetch_column($this->order->Check_Order($_SESSION['account_id'] , "and status = 1")) != 0){
                    $row = mysqli_fetch_array($this->order->List_Order($_SESSION['account_id'] , "and status = 1"));
                    $order_id = $row["order_id"];
                    if(mysqli_fetch_column($this->order->Check_Order_Detail( "mobilePhone_id", $mobilephone_id , $order_id)) != 0){
                        $this->order->Fix_Order_Detail($mobilephone_id , $order_id , "+" , $quantity);
                        header("Location: /Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone_message/Đã thêm vào giỏ hàng thành công !");
                    }
                    else{
                        $row = mysqli_fetch_array($this->order->List_Order($_SESSION['account_id'] , "and status = 1"));
                        $this->order->Create_Order_Detail($row["order_id"] , $mobilephone_id , $unit_price , $quantity);
                        header("Location: /Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone_message/Đã thêm vào giỏ hàng thành công !");
                    }
                }
                else{
                    $this->order->Create_Order($_SESSION["account_id"]);
                    $row = mysqli_fetch_array($this->order->List_Order($_SESSION['account_id'] , "and status = 1"));
                    $this->order->Create_Order_Detail($row["order_id"] , $mobilephone_id , $unit_price , $quantity);
                    header("Location: /Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone_message/Đã thêm vào giỏ hàng thành công !");
                }
            }
        }

        // public function View_Purchase_History(){ // order , order_details , mobile_phone
        //     $string = "";
        //     if(mysqli_fetch_column($this->order->Check_Order($_SESSION["account_id"] , "and status != 1")) != 0){
        //         $data = $this->order ->List_Order($_SESSION["account_id"] , "and status != 1");
        //         while($row = mysqli_fetch_array($data)){
        //             $string = $string . "orderdetails.order_id = " . $row["order_id"] . " or ";
        //         }
        //         $data2 = $this->order->Purchase_History(rtrim($string , " or "));
        //         $this->view2("Layout","Layout_Account" , ["content" => "Account" , "content2" => "Purchase_History" , "orders" => $this->order ->List_Order($_SESSION["account_id"] , "and status != 1") , "order_details" => $this->order->Purchase_History(rtrim($string , " or "))]);
        //     }
        //     else{
        //         $this->view2("Layout","Layout_Account" , ["message" => "Lịch sử mua hàng trống" , "content" => "Account" , "content2" => "Purchase_History"]);
        //     }
        // }
        public function View_Purchase_History(){ // order , order_details , mobile_phone
            $string = "";
            if(mysqli_fetch_column($this->order->Check_Order($_SESSION["account_id"] , "and status != 1")) != 0){
                $data = $this->order ->List_Order($_SESSION["account_id"] , "and status != 1");
                while($row = mysqli_fetch_array($data)){
                    $string = $string . "orderdetails.order_id = " . $row["order_id"] . " or ";
                }
                $data2 = $this->order->Purchase_History(rtrim($string , " or "));
                $this->view2("Layout","Layout_Account" , ["content" => "Account" , "content2" => "Purchase_History" , "Purchase_History" => $this->order->Purchase_History(rtrim($string , " or "))]);
            }
            else{
                $this->view2("Layout","Layout_Account" , ["message" => "Lịch sử mua hàng trống" , "content" => "Account" , "content2" => "Purchase_History"]);
            }
        }
    }
?>