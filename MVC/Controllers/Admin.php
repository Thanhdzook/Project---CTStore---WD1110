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
            $count_mobilephone = mysqli_fetch_column($this->mobilephone->Count_All_MobilePhone());
            $count_order = mysqli_fetch_column($this->order->Count_All_Order());
            $this->view2("Layout" , "Layout_Admin" ,
            ["content" => "Admin" , "content2" => "Index" , "message" => $message , "count_admin" => $count_admin ,
            "account" => $count_account , "mobilephone" => $count_mobilephone ,
            "order" => $count_order , "Recent Payment" => $this->order->Recent_Payment("account.full_name , orders.order_date , orders.order_id , orders.status" ,
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

        function View_MobilePhone($next){
            $_SESSION["next"] = $next;
            $mb = $this->mobilephone->List_MobilePhone($_SESSION["next"]);
            $this->view2("Layout" , "Layout_Admin" , ["mobilePhone"=> $mb , "content" => "Admin" , "content2" => "List_MobilePhone"]);
        }

        function Lock_Account($id){
            $this->account->Lock_Account($id);
            $this->View_List_Account();
        }

        function UnLock_Account($id){
            $this->account->UnLock_Account($id);
            $this->View_List_Account();
        }

        function Order_Confirmation($id){
            $this->order->Fix_Order($id , 3);
            $this->View_Payment(";");
        }

        function View_Account_Order($id){
            $this->view2("Layout" , "Layout_Admin" , ["Account_Order" => $this->account->Recent_Account("account.full_name , account.email , account.phone_number , account.account_id ,
            orders.order_id, orders.order_date , orders.status , mobilephone.mobilePhone_name , mobilephone.memory , mobilephone.color , orderdetails.unit_price , orderdetails.quantity
            " , "account , orders , mobilephone , orderdetails where account.account_id = orders.account_id and orderdetails.order_id = orders.order_id and
             orderdetails.mobilePhone_id = mobilephone.mobilePhone_id and orders.status != 1 and account.account_id = ".$id."" , "orders.order_id ") , "content" => "Admin" , "content2" => "Account_Order"]);
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
    }
?>