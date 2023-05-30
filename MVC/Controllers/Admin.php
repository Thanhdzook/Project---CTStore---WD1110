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

        public function View_Index_Admin(){
            $count_account = mysqli_fetch_column($this->account->Count_Account());
            $count_mobilephone = mysqli_fetch_column($this->mobilephone->Count_All_MobilePhone());
            $count_order = mysqli_fetch_column($this->order->Count_All_Order());
            $this->view2("Layout" , "Layout_Admin" , ["content" => "Admin" , "content2" => "Index" , "account" => $count_account , "mobilephone" => $count_mobilephone , "order" => $count_order]);
        }

        public function View_Mobile_Phone(){
            
        }
    }
?>