<?php

class Account extends Controller{
    public $accountModel;

    function __construct(){
        $this->accountModel = $this->model("AccountModel");
    }
    function View_Add_Address(){
        $this->view("Layout" , ["content" => "Account" , "content2" => "Add_Address"]);
    }

    function View_Account_Infor(){
        $this->view("Layout" , ["account_infor" => $this->accountModel->Search_Account($_SESSION["email"]) ,"content" => "Account" , "content2" => "Infor_Account"]);
    }

    function Add_Address(){
        if(isset($_POST["submit"])){
            $full_name = $_POST["customer_name"];
            $phone_number = $_POST["customer_phonenumber"];
            $address = $_POST["customer_address"];

            $check = $this->accountModel->Create_Customer($_SESSION["account_id"] , $full_name , $phone_number , $address);

            if($check == true){
                header("Location: /Project---CTStore---WD1110/Payment/ViewCart/Thêm địa chỉ người nhận thành công");
            }
            else{
                header("Location: /Project---CTStore---WD1110/Payment/ViewCart/Thêm địa chỉ người nhận không thành công");
            }
        }
    }

    public function View_Fix_Infor_Account(){
        $this->view("Layout" , ["account_infor" => $this->accountModel->Search_Account($_SESSION["email"]) ,"content" => "Account" , "content2" => "Fix_Infor_Account"]);
    }
    public function Fix_Infor_Account(){

    }
}
?>