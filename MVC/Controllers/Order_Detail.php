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
                // $quantity = $_POST["quantity"];
                if(mysqli_fetch_column($this->order->Check_Order( "account_id", $_SESSION['account_id'] , "and status = 1")) != 0){
                    $row = mysqli_fetch_array($this->order->List_Order( "account_id" ,$_SESSION['account_id'] , "and status = 1"));
                    $order_id = $row["order_id"];
                    if(mysqli_fetch_column($this->order->Check_Order_Detail( "mobilePhone_id", $mobilephone_id , $order_id)) != 0){
                        $this->order->Fix_Order_Detail($mobilephone_id , $order_id , "+" , "1" , "quantity");
                        return 1;
                    }
                    else{
                        $row = mysqli_fetch_array($this->order->List_Order( "account_id" ,$_SESSION['account_id'] , "and status = 1"));
                        $this->order->Create_Order_Detail($row["order_id"] , $mobilephone_id , $unit_price , "1");
                        return 2;
                    }
                }
                else{
                    $this->order->Create_Order($_SESSION["account_id"]);
                    $row = mysqli_fetch_array($this->order->List_Order( "account_id" ,$_SESSION['account_id'] , "and status = 1"));
                    $this->order->Create_Order_Detail($row["order_id"] , $mobilephone_id , $unit_price , "1");
                    return 3;
                }
            }
        }
        function Check_Pay_Now($mobilephone_id , $unit_price , $now){
            if(isset($_SESSION["email"])){
                $check = $this->Create_Order_Detail($mobilephone_id , $unit_price);
                if($now == "yes"){
                    header("Location: /Project---CTStore---WD1110/Payment/ViewCart/null");
                }
                else if($now == "no"){
                    switch($check){
                        case 1:
                            header("Location: /Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone_message/Đã thêm vào giỏ hàng thành công !/0");
                            break;
                        case 2:
                            header("Location: /Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone_message/Đã thêm vào giỏ hàng thành công !/0");
                            break;
                        case 3:
                            header("Location: /Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone_message/Đã thêm vào giỏ hàng thành công !/0");
                            break;
                    }
                }
            }
            else{
                header("Location: /Project---CTStore---WD1110/Login_Sigin/View_Login_Sigin");
            }
        }
        function View_Purchase_History($check){ // order , order_details , mobile_phone
            $string = "";
            $t = 0;
            switch($check){
                case 0:
                    $t = 0;
                    $status = " != 1";
                    break;
                case 1:
                    $t = 1;
                    $status = " = 2";
                    break;
                case 2:
                    $status = " = 3";
                    $t = 2;
                    break;
                case 3:
                    $status = " = 3";
                    $t = 3;
                    break;
                case 4:
                    $status = " = 4";
                    $t = 4;
                    break;
                case 5:
                    $status = " = 5";
                    $t = 5;
                    break;
            }
            $Order = mysqli_fetch_array($this->order->Check_Order("account_id" , $_SESSION["account_id"] , " and status = 3"))[0];
            $Bought = mysqli_fetch_array($this->order->Check_Order("account_id" , $_SESSION["account_id"] , " and status = 4"))[0];
            if(mysqli_fetch_column($this->order->Check_Order( "account_id" , $_SESSION["account_id"] , "and status ".$status)) != 0){
                $data = $this->order ->List_Order( "account_id" ,$_SESSION["account_id"] , "and status ".$status);
                while($row = mysqli_fetch_array($data)){
                    $string = $string . " orderdetails.order_id = " . $row["order_id"] . " or ";
                }
                $data2 = $this->order->Purchase_History(rtrim($string , " or "));
                $this->view2("Layout","Layout_Account" , ["content" => "Account" , "content2" => "Purchase_History" , "Purchase_History" => $data2 , "Order" => $Order , "Bought" => $Bought , "t" => $t]);
            }
            else{
                $this->view2("Layout","Layout_Account" , ["message" => "Lịch sử mua hàng trống" , "content" => "Account" , "content2" => "Purchase_History" , "Order" => $Order , "Bought" => $Bought, "t" => $t]);
            }
        }
        function Fix_Order_Details($mobilePhone_id , $order_id , $maths , $data , $data2){
            $this->order->Fix_Order_Details($mobilePhone_id , $order_id , $maths , $data , $data2);
        }
        function Delete_Order_Details($mobilePhone_id , $order_id){
            echo $this->order->Delete_Order_Details($mobilePhone_id , $order_id);
            header("Location: /Project---CTStore---WD1110/Payment/ViewCart/null");
        }

        function Fix_Order($id , $data){
            $this->order->Fix_Order($id , $data);
            if($data == 5){
                $this->Cancel_Order($id);
            }
            $this -> View_Purchase_History(0);
        }
        function Cancel_Order($id){
            $or = $this->order->List_Order_Detail($id);
            while($row = mysqli_fetch_array($or)){
                $this->order->Cancel_Order($row["mobilePhone_id"] , $row["quantity"]);
            }
        }
    }
?>