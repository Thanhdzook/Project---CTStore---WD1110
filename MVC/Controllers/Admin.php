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
            $count_account = mysqli_fetch_column($this->account->Count_Account(2));
            $count_mobilephone = mysqli_fetch_column($this->mobilephone->Count_All_MobilePhone());
            $count_order = mysqli_fetch_column($this->order->Count_All_Order());
            $this->view2("Layout" , "Layout_Admin" ,
            ["content" => "Admin" , "content2" => "Index" , "message" => $message , "count_admin" => $count_admin ,
            "account" => $count_account , "mobilephone" => $count_mobilephone ,
            "order" => $count_order , "Recent Payment" => $this->order->Recent_Payment("account.full_name , orders.order_date , orders.order_id , orders.status" ,
            "account , orders where orders.status != 1 and account.account_id = orders.account_id" , "order_id") , 
            "Recent Account" => $this->account->Recent_Account("full_name , email , phone_number , account_id" , "account where role = 2" , "account_id")]);
        }

        function View_List_Account(){
            $List_Account = $this->account->List_Account_Admin();
            $this->view2("Layout" , "Layout_Admin" , ["content" => "Admin" , "content2" => "List_Account" , "account" => $List_Account]);
        }

        function View_Payment($data){
            $List_Payment = $this->order->Order_Account();
            $this->view2("Layout" , "Layout_Admin" , ["content" => "Admin" , "content2" => "List_Payment" , "order" => $List_Payment]);
        }

        function View_MobilePhone($next){
            $_SESSION["next"] = $next;
            $this->view2("Layout" , "Layout_Admin" , ["mobilePhone"=> $this->mobilephone->List_MobilePhone($_SESSION["next"]) , "content" => "Admin" , "content2" => "List_MobilePhone"]);
        }

        function Lock_Account($id){
            $this->account->Lock_Account($id);
            $this->View_List_Account();
        }

        function View_Account_Order($id){
            $this->view2("Layout" , "Layout_Admin" , ["Account_Order" => $this->account->Recent_Account("account.full_name , account.email , account.phone_number , account.account_id ,
            orders.order_id, orders.order_date , orders.status , mobilephone.mobilePhone_name , mobilephone.memory , mobilephone.color , orderdetails.unit_price , orderdetails.quantity
            " , "account , orders , mobilephone , orderdetails where account.account_id = orders.account_id and orderdetails.order_id = orders.order_id and
             orderdetails.mobilePhone_id = mobilephone.mobilePhone_id and orders.status != 1" , "orders.order_id") , "content" => "Admin" , "content2" => "Account_Order"]);
        }
    }
?>