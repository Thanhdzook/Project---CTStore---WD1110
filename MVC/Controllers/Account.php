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

    public function View_Check_Password(){
        $this->view("Layout" , ["content" => "Account" , "content2" => "Check_Password"]);
    }

    public function View_Fix_Password(){
        $this->view("Layout" , ["content" => "Account" , "content2" => "Fix_Password"]);
    }

    public function Check_Password($password){
            if($password == $_SESSION['password']){
                return true;
            }
            else{
                return false;
            }
    }
    public function Fix_Infor_Account($message){
        if($message == "password ok"){
            if(isset($_POST["submit"])){
                if($this->Check_Password($_POST["password"]) == true){
                    $check = $this->accountModel->Update_Infor_Account($_SESSION['full_name'],$_SESSION['phone_number'],$_SESSION['email'],$_SESSION["account_id"]);
                    if($check == true){
                        unset($_SESSION['full_name']);
                        unset($_SESSION['phone_number']);
                        header("Location: /Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone_message/Cập nhật tài khoản thành công !");
                    }
                    else{
                        header("Location: /Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone_message/Cập nhật tài khoản không thành công !");
                    }
                }
                else{
                    $this->view("Layout" , ["content" => "Account" , "content2" => "Check_Password" , "message" => "Sai mật khẩu !"]);
                }
            }
        }
        else{
            if(isset($_POST["submit"])){
                $_SESSION['full_name'] = $_POST["full_name"];
                $_SESSION['phone_number'] = $_POST["phone_number"];
                $_SESSION['email'] = $_POST["email"];
                header("Location: /Project---CTStore---WD1110/Account/View_Check_Password");
            }
        }
    }
}
?>