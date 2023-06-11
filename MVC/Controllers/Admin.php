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
            "order" => $count_order , "Recent Payment" => $this->order->Recent_Payment("account.full_name , orders.order_date , orders.order_id" ,
            "account , orders where orders.status = 4 and account.account_id = orders.account_id" , "order_id") , 
            "Recent Account" => $this->account->Recent_Account("full_name , email , phone_number , account_id" , "account where account_id = 2" , "account_id")]);
        }

        function View_List_Account(){
            $List_Account = $this->account->List_Account();
            $this->view2("Layout" , "Layout_Admin" , ["content" => "Admin" , "content2" => "List_Account" , "account" => $List_Account]);
        }

        function View_Payment($data){
            $List_Payment = $this->order->Order_Account();
            $this->view2("Layout" , "Layout_Admin" , ["content" => "Admin" , "content2" => "List_Payment" , "order" => $List_Payment]);
        } 
    }
?>