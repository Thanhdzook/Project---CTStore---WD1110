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
            if(mysqli_fetch_column($this->order->Check_Order($_SESSION['account_id'] , "and status = 1")) != 0){
                $row = mysqli_fetch_array($this->order->List_Order($_SESSION['account_id'] , "and status = 1" ));
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
            $row = mysqli_fetch_array($this->order->List_Order($_SESSION['account_id'] , "and status = 1"));
            $order_id = $row["order_id"];
            $data = [
                "id" => $this->order->List_Order_Detail($order_id)
            ];
            
            if(isset($_POST["Payment"])){
                while($row2 = mysqli_fetch_array($data["id"])){
                    $mobilephone_id = $row2["mobilePhone_id"];
                    if(isset($_POST[$mobilephone_id])){
                        $id = $row2["mobilePhone_id"];
                        $this->order->Fix_Order_Detail($row2["mobilePhone_id"] , $order_id , " , quantity = " , $_POST[$id] , "quantity" );
                        $data3 = $data3 . " mobilephone.mobilePhone_id = " . $row2["mobilePhone_id"] . " or";
                        $check1 ++;
                    }
                }
            }
            if($check1 == 0){
                header("Location: /Project---CTStore---WD1110/Payment/ViewCart/Chưa chọn sản phẩm nào !");
            }
            $check = mysqli_fetch_column($this->account->Check_Customer($_SESSION['account_id']));
            if($check == 0){
                header("Location: /Project---CTStore---WD1110/Account/View_Add_Address");
            }
            else{
                $this->view("Layout"  ,["payment" => $this->order->List_Payment($order_id , trim($data3,"or")) , "customer" => $this->account->List_Customer($_SESSION['account_id']) , "content" => "Payment"]);
            }
        }

        function Pay(){
            $data = "";
            for($i = 0 ; $i<= $_SESSION["count"] ; $i++){
                $data = $data . " mobilePhone_id != " . $_SESSION["mobilePhone_id"][$i] . " and";
            }
            $check = $this->order->Pay($_SESSION['account_id'] , trim($data , "and"));
            unset($_SESSION['count']);
            unset($_SESSION['mobilePhone_id']);
            if($check == true){
                header("Location: /Project---CTStore---WD1110/Payment/ViewCart/Đặt hàng thành công !");
            }
            else{
                header("Location: /Project---CTStore---WD1110/Payment/ViewCart/Đặt hàng thành không công !");
            }
        }


    }
?>