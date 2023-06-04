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
                if(mysqli_fetch_column($this->order->Check_Order($_SESSION['account_id'] , 1)) != 0){
                    $row = mysqli_fetch_array($this->order->List_Order($_SESSION['account_id'] , 1));
                    $order_id = $row["order_id"];
                    if(mysqli_fetch_column($this->order->Check_Order_Detail( "mobilePhone_id", $mobilephone_id , $order_id)) != 0){
                        $this->order->Fix_Order_Detail($mobilephone_id , $order_id , "+" , $quantity);
                        header("Location: /Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone_message/Đã thêm vào giỏ hàng thành công !");
                    }
                    else{
                        $row = mysqli_fetch_array($this->order->List_Order($_SESSION['account_id'] , 1));
                        $this->order->Create_Order_Detail($row["order_id"] , $mobilephone_id , $unit_price , $quantity);
                        header("Location: /Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone_message/Đã thêm vào giỏ hàng thành công !");
                    }
                }
                else{
                    $this->order->Create_Order($_SESSION["account_id"]);
                    $row = mysqli_fetch_array($this->order->List_Order($_SESSION['account_id'] , 1));
                    $this->order->Create_Order_Detail($row["order_id"] , $mobilephone_id , $unit_price , $quantity);
                    header("Location: /Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone_message/Đã thêm vào giỏ hàng thành công !");
                }
            }
        }

        public function View_Purchase_History(){ // order , order_details , mobile_phone
            $a = 0;
            $b = 0;
            $c = 0;
            $data = ["order" => $this -> order -> List_Order($_SESSION["account_id"] , 2)];
            while($row = mysqli_fetch_array($data["order"])){
                $b = 0;
                $c = 0;
                $data4[$a][$b][$c] = $row["order_date"];
                $data2 = ["order_detail" => $this->order->List_Order_Detail($row["order_id"])];
                while($row2 = mysqli_fetch_array($data2["order_detail"])){
                    $b++;
                    $data4[$a][$b][$c] = $row2["unit_price"];
                    $data3 = ["mobilephone" => $this->mobilephone->Sreach_MobilePhone_By_Value("mobilePhone_id" , $row2["mobilePhone_id"])];
                    while($row3 = mysqli_fetch_array($data3["mobilephone"])){
                        $c++;
                        $data4[$a][$b][$c] = $row3["mobilePhone_name"];
                    }
                }
                $a++;
            }
            $this -> order -> List_Order($_SESSION["account_id"] , 2);
            if(isset($data4)){
                $this->view("Layout" , ["history" => $data4 , "content" => "Account" , "content2" => "Purchase_History"]);
            }
            else{
                $this->view("Layout" , ["message" => "Lịch sử mua hàng trống" , "content" => "Account" , "content2" => "Purchase_History"]);
            }
            // $this->view("Layout" , ["history" => $data4 , "content" => "Account" , "content2" => "Purchase_History"]);
        }
    }
?>