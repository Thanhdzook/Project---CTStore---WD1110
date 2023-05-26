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
            return ($password == $_SESSION['password']) ? true : false;
    }
    public function Fix_Infor_Account($message){
        if($message == "password ok"){
            if(isset($_POST["submit"])){
                if($this->Check_Password($_POST["password"]) == true){
                    $check = $this->accountModel->Update_Infor_Account($_SESSION['full_name'],$_SESSION['phone_number'],$_SESSION['email'],$_SESSION["account_id"] , $_SESSION['password']);
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

    public function Fix_Password(){
        if(isset($_POST["submit"])){
            ($_POST["password_old"] == $_SESSION['password']) ? $check1 = 2 : $check1 = 4; // 5 , 9
            ($_POST["password_new1"] == $_POST['password_new2']) ? $check2 = 1 : $check2 = 5; // 7 , 9
            // $check = $check1 + $check2; // 3
            ($_POST["password_new1"] == $_POST['password_old']) ? $check = 0 : $check = $check1 + $check2;
            switch ($check){
                case 0:
                    $this->view("Layout" , ["content" => "Account" , "content2" => "Fix_Password" , "message" => "Mật khẩu mới không được trùng với mật khẩu cũ"]);
                    break;
                case 5:
                    $this->view("Layout" , ["content" => "Account" , "content2" => "Fix_Password" , "message" => "Sai mật khẩu cũ"]);
                    break;
                case 9:
                    $this->view("Layout" , ["content" => "Account" , "content2" => "Fix_Password" , "message" => "Sai mật khẩu cũ"]);
                    break;
                case 7:
                    $this->view("Layout" , ["content" => "Account" , "content2" => "Fix_Password" , "message" => "Mật khẩu mới không trùng nhau !"]);
                    break;
                case 3:
                    $_SESSION['password'] = $_POST["password_new1"];
                    $data1 = $this->accountModel->Search_Account($_SESSION["email"]);
                    $row = mysqli_fetch_array($data1);
                    $check = $this->accountModel->Update_Infor_Account($row['full_name'],$row['phone_number'],$_SESSION['email'],$_SESSION["account_id"] , $_SESSION['password']);
                    $this->view("Layout" , ["account_infor" => $this->accountModel->Search_Account($_SESSION["email"]) , "content" => "Account" , "content2" => "Infor_Account" , "message" => "Cập nhật mật khẩu thành công !"]);
                    break;
            }
        }
    }

    public function View_Purchase_History(){
        
    }
}
?>