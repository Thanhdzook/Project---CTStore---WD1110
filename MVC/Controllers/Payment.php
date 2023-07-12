<?php
    class Payment extends Controller{
        public $order;
        public $account;
        function __construct(){
            $this->order = $this->model("OrderModel");
            $this->account = $this->model("AccountModel");
        }
        
        function ViewCart($message){
            if($_SESSION['account_id'] == null){
                header("Location: /Project---CTStore---WD1110/Login_Sigin/View_Login_Sigin");
            }
            if(mysqli_fetch_column($this->order->Check_Order( "account_id" , $_SESSION['account_id'] , "and status = 1")) != 0){
                $row = mysqli_fetch_array($this->order->List_Order( "account_id" ,$_SESSION['account_id'] , "and status = 1" ));
                $order_id = $row["order_id"];
                if(mysqli_fetch_column($this->order->Check_Order_Detail("order_id",$order_id , $order_id )) != 0){
                    $this->view("Layout" ,["orderdetails" => $this->order->List_Order_Detail($order_id) , "content" => "Payment" , "content2" => "Cart" , "message" => $message , "order_id" => $order_id]); 
                }
                else{
                    $this->view("Layout" ,["content" => "Payment" , "content2" => "Cart" , "message" => "Không có sản phẩm nào trong giỏ hàng, vui lòng quay lại"]);
                }
            }
            else{
                $this->order->Create_Order($_SESSION["account_id"]);
                $this->ViewCart($message);
            }
        }
        function ViewPay(){
            $check1 = 0;
            $data3 = "";
            $row = mysqli_fetch_array($this->order->List_Order( "account_id" ,$_SESSION['account_id'] , "and status = 1"));
            $order_id = $row["order_id"];
            $data = [
                "id" => $this->order->List_Order_Detail($order_id)
            ];
            if(isset($_POST["Payment"])){
                while($row2 = mysqli_fetch_array($data["id"])){
                    $mobilephone_id = $row2["mobilePhone_id"];
                    if(isset($_POST[$mobilephone_id])){
                        $id = $row2["mobilePhone_id"];
                        $_id = $_POST[$id."abc"];
                        $this->order->Fix_Order_Detail($row2["mobilePhone_id"] , $order_id , " , quantity = " , $_id , "quantity" );
                        $data3 = $data3 . " mobilephone.mobilePhone_id = " . $row2["mobilePhone_id"] . " or";
                        $check1 ++;
                    }
                }
            }
            if($check1 == 0){
                header("Location: /Project---CTStore---WD1110/Payment/ViewCart/Chưa chọn sản phẩm nào !");
            }
            // $check = mysqli_fetch_column($this->account->Check_Customer($_SESSION['account_id']));
            // if($check == 0){
            //     header("Location: /Project---CTStore---WD1110/Account/View_Add_Address");
            // }
            // else{
                $this->view("Layout"  ,["orderdetails" => $this->order->List_Payment($order_id , trim($data3,"or")) , "customer" => $this->account->Search_Account("account_id",$_SESSION['account_id']) , "content" => "Payment"]);
            // }
        }

        function Pay(){
            if(isset($_POST["Payment"])){
                $radio = $_POST["radio"];
                $delivery = 0;
                $data = "";
                // for($i = 0 ; $i<= $_SESSION["count"] ; $i++){
                //     // $data = $data . " mobilePhone_id != " . $_SESSION["mobilePhone_id"][$i] . " and";
                //     echo $_SESSION["mobilePhone_id"][$i];
                // }
                if($radio == "check1"){
                    for($i = 0 ; $i<= $_SESSION["count"] ; $i++){
                        $data = $data . " mobilePhone_id != " . $_SESSION["mobilePhone_id"][$i] . " and";
                    }
                    $check = $this->order->Pay($_SESSION['account_id'] , trim($data , "and") ,$delivery);
                    unset($_SESSION['count']);
                    unset($_SESSION['mobilePhone_id']);
                    if($check == true){
                        $this->View_Payment_Comfirm();
                        // header("Location: /Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone_message/Đặt hàng thành công !/0");
                    }
                    else{
                        header("Location: /Project---CTStore---WD1110/ShowMobilePhone_message/ViewCart/Đặt hàng thành không công !/0");
                    }
                }
                else{
                    $name = $_POST["name"];
                    $phoneN = $_POST["phoneN"];
                    $addres = $_POST["address"];
                    $random_id = rand(time(), 1000000000);
                    $this->account->Create_Customer($_SESSION["account_id"] , $name , $phoneN , $addres , $random_id);
                    // $unique_id = $this->account->List_Customer_By_Unique($random_id);
                    $delivery = $random_id;
                    for($i = 0 ; $i<= $_SESSION["count"] ; $i++){
                        $data = $data . " mobilePhone_id != " . $_SESSION["mobilePhone_id"][$i] . " and";
                    }
                    $check = $this->order->Pay($_SESSION['account_id'] , trim($data , "and") ,$delivery);
                    unset($_SESSION['count']);
                    unset($_SESSION['mobilePhone_id']);
                    if($check == true){
                        $this->View_Payment_Comfirm();
                        // header("Location: /Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone_message/Đặt hàng thành công !/0");
                    }
                    else{
                        header("Location: /Project---CTStore---WD1110/ShowMobilePhone_message/ViewCart/Đặt hàng thành không công !/0");
                    }
                }
                
            }
            
        }

        function View_Payment_Comfirm(){
            $this->view("Layout" , ["content" => "Payment" , "content2" => "Comfirm_payment"]);
        }

    }
?>