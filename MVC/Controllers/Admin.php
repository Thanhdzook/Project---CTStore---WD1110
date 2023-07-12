<?php
    class Admin extends Controller{
        public $order;
        public $mobilephone;
        public $account;
        function __construct(){
            $this->order = $this->model("OrderModel");
            $this->mobilephone = $this->model("MobilePhoneModel");
            $this->account = $this->model("AccountModel");
        }

        function View_Index_Admin($message){
            $count_admin = mysqli_fetch_column($this->account->Count_Account(1));
            $count_account = mysqli_fetch_column($this->account->Count_Account("2 or role = 3"));
            $count_mobilephone = mysqli_fetch_column($this->mobilephone->Count_All_MobilePhone(2));
            $count_order = mysqli_fetch_column($this->order->Count_All_Order());
            $this->view2("Layout" , "Layout_Admin" ,
            ["content" => "Admin" , "content2" => "Index" , "message" => $message , "count_admin" => $count_admin ,
            "Account" => $count_account , "mobilephone" => $count_mobilephone ,
            "Order" => $count_order , "Recent Payment" => $this->order->Recent_Payment("account.full_name , orders.order_date , orders.order_id , orders.status" ,
            "account , orders where orders.status != 1 and account.account_id = orders.account_id" , "order_id") , 
            "Recent Account" => $this->account->Recent_Account("full_name , email , phone_number , account_id" , "account where role != 1" , "account_id")]);
        }

        function View_List_Account(){
            $List_Account = $this->account->List_Account_Admin();
            $this->view2("Layout" , "Layout_Admin" , ["content" => "Admin" , "content2" => "List_Account" , "account" => $List_Account]);
        }

        function View_Payment($data){
            $List_Payment = $this->order->Order_Account($data);
            $this->view2("Layout" , "Layout_Admin" , ["content" => "Admin" , "content2" => "List_Payment" , "order" => $List_Payment]);
        }
        function View_Revenue($data){
            $string = "";
            if($data == 0){
                $date = date('m-Y');
                $check = $this->order->List_All_Order("");
                while($row = mysqli_fetch_array($check)){
                    if($date == date("m-Y",strtotime($row['order_date']))){
                        $string = $string . " orderdetails.order_id = " . $row["order_id"] . " or ";
                    }
                }
                if($string == ""){
                    $this->view2("Layout" , "Layout_Admin" , ["content" => "Admin" , "content2" => "Revenue" , "Month" => null , "month" => date('m')]);
                }
                else{
                    $data2 = $this->order->Revenue(rtrim($string , " or "));
                    $this->view2("Layout" , "Layout_Admin" , ["content" => "Admin" , "content2" => "Revenue" , "Month" => $data2 , "month" => date('m')]);
                }
                
            }
            else{
                if(isset($_POST["submit"])){
                    // $date = $_POST["month"] . "-" . date('Y');
                    // $date = date("m-Y",strtotime($date));
                    $check = $this->order->List_All_Order("");
                    while($row = mysqli_fetch_array($check)){
                        if(date("Y") == date("Y",strtotime($row['order_date']))){
                            if($_POST["month"] == date("m",strtotime($row['order_date']))){
                                $string = $string . " orderdetails.order_id = " . $row["order_id"] . " or ";
                            }
                        }
                        
                    }
                    if($string == ""){
                        $this->view2("Layout" , "Layout_Admin" , ["content" => "Admin" , "content2" => "Revenue" , "Month" => null , "month" => $_POST["month"]]);
                    }
                    else{
                        $data2 = $this->order->Revenue(rtrim($string , " or "));
                        $this->view2("Layout" , "Layout_Admin" , ["content" => "Admin" , "content2" => "Revenue" , "Month" => $data2 , "month" => $_POST["month"]]);
                    }
                }
            }
            
        }
        function View_MobilePhone($next){
            $_SESSION["next"] = $next;
            $mb = $this->mobilephone->List_MobilePhone($_SESSION["next"] , 2);
            $this->view2("Layout" , "Layout_Admin" , ["mobilePhone"=> $mb , "content" => "Admin" , "content2" => "List_MobilePhone"]);
        }

        function Lock_Account($id){
            $this->account->Lock_Account($id);
            $this->View_Account_Order($id);
        }

        function UnLock_Account($id){
            $this->account->UnLock_Account($id);
            $this->View_Account_Order($id);
        }

        function Order_Confirmation($id){
            $this->order->Fix_Order($id , 3);
            $this->View_Order_Detail($id);
        }
        function Order_Cancel($id){
            $this->order->Fix_Order($id , 5);
            $or = $this->order->List_Order_Detail($id);
            while($row = mysqli_fetch_array($or)){
                $this->order->Cancel_Order($row["mobilePhone_id"] , $row["quantity"]);
            }
            $this->View_Order_Detail($id);
        }

        function Lock_MB($id){
            $this->mobilephone->Lock_Unlock_MobilePhone($id , 0);
            $this->View_MobilePhone_Detail($id);
        }
        function UnLock_MB($id){
            $this->mobilephone->Lock_Unlock_MobilePhone($id , 1);
            $this->View_MobilePhone_Detail($id);
        }

        function View_Account_Order($id){
            $ac = $this->account->Search_Account("account_id" , $id);
            $row = mysqli_fetch_array($this->account->Search_Account("account_id" , $id));
            $this->view2("Layout" , "Layout_Admin" , ["Account_Detail" => $this->account->Recent_Account(" orders.order_id, orders.order_date , orders.status , mobilephone.mobilePhone_name , mobilephone.memory , mobilephone.color , orderdetails.unit_price , orderdetails.quantity
            " , "account , orders , mobilephone , orderdetails where account.account_id = orders.account_id and orderdetails.order_id = orders.order_id and
             orderdetails.mobilePhone_id = mobilephone.mobilePhone_id and orders.status != 1 and account.account_id = ".$id."" , "orders.order_id ") , "content" => "Admin" , "content2" => "Account_Details" , "account" => $ac , "id_account" => $id , "status" => $row["role"]]);
        }

        function Search(){
            if(isset($_POST["Submit"])){
                $data = $_POST["Search"];
                $checker = 0;
                if(mysqli_fetch_array($this->mobilephone->Count_MobilePhone_By_Value("mobilePhone_name" ,$data , ""))[0] != 0){
                    $checker = 1;
                }
                elseif(mysqli_fetch_array($this->account->Count_Account_By_Value("email" ,$data))[0] != 0){
                    $checker = 2;
                }
                elseif(mysqli_fetch_array($this->order->Check_Order("order_id" ,$data , ""))[0] != 0){
                    $checker = 3;
                }
                switch($checker){
                    case 0 :
                        $this->View_Index_Admin("Không tìm thấy gì liên quan đến từ khóa");
                        break;
                    case 1 :
                        $mb = $this->mobilephone->Sreach_MobilePhone_By_Value("mobilePhone_name" , $data , "");
                        $_SESSION["next"] = 0;
                        $this->view2("Layout" , "Layout_Admin" , ["mobilePhone"=> $mb , "content" => "Admin" , "content2" => "List_MobilePhone"]);
                        break;
                    case 2 :
                        $List_Account = $this->account->Search_Account("email" , $data);
                        $this->view2("Layout" , "Layout_Admin" , ["content" => "Admin" , "content2" => "List_Account" , "account" => $List_Account]);
                        break;
                    case 3 :
                        $data2 = "and order_id = " . $data;
                        $this->View_Payment($data2);
                        break;
                }
            }
        }
        function View_MobilePhone_Detail($id){
            $mb = $this->mobilephone->Sreach_MobilePhone_By_Value("mobilePhone_id" , $id , "");
            $this->view2("Layout" , "Layout_Admin" , ["mobilePhone"=> $mb , "content" => "Admin" , "content2" => "MobilePhone_Details" ]);
        }
        function View_Order_Detail($id){
            $or = $this->order->List_Order_Detail($id);
            $row = mysqli_fetch_array($this->order->List_Order_Detail($id));
            $status = $row["status"];
            $id_order = $row["order_id"];
            if($row["unique_id"] == 0){
                $row2 = mysqli_fetch_array($this->account->Search_Account("account_id" , $row["account_id"]));
                $data_customer = [
                    "customer_name" => $row2["full_name"],
                    "customer_phonenumber" => $row2["phone_number"],
                    "customer_address" => "18 Tam Trinh"
                ];
            }
            else{
                $row2 = mysqli_fetch_array($this->account->List_Customer_By_Unique($row["unique_id"]));
                // $row2 = mysqli_fetch_array($this->account->Search_Account("account_id" , $row["account_id"]));
                $data_customer = [
                    "customer_name" => $row2["customer_name"],
                    "customer_phonenumber" => $row2["customer_phonenumber"],
                    "customer_address" => $row2["customer_address"]
                ];
            }
            $this->view2("Layout" , "Layout_Admin" , ["content" => "Admin" , "content2" => "Order_Details" , "order" => $or , "customer" => $data_customer , "status" => $status , "id_order" => $id_order]);
        }
        function Messages($unique_id){
            if($unique_id != "null"){
                $_SESSION["UN_ID"] = $unique_id;
                $qr = $this->account->Search_Account("unique_id" , $unique_id);
                $row1 = mysqli_fetch_assoc($qr);
                $_SESSION["UN_NAME"] = $row1['full_name'];
                $_SESSION["chat_id"] = $unique_id;
            }
            $this->view2("Admin" , "Messages");
        }
    }
?>