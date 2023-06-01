<?php

class Login_Sigin extends Controller{
    public $accountModel;

    function __construct(){
        $this->accountModel = $this->model("AccountModel");
    }
    function View_Login_Sigin(){
        $this->view("Login_sigin");
    }

    function Check_Login(){
        $check = false;
        if(isset($_POST["Login"])){
            // check in database
            $arr_accounts = $this->accountModel->List_Account();
            while($row = mysqli_fetch_array($arr_accounts)){
                if($_POST["email"] == $row["email"] && $_POST["password"] == $row["password"]){
                    $role = $row["role"];
                    $id = $row["account_id"];
                    $check = true;
                }
            }
            if($check == true){
                $email = $_POST["email"];
                $password = $_POST["password"];
                $_SESSION['email'] = $email;
                $_SESSION['account_id'] = $id;
                $_SESSION['password'] = $password;
                $_SESSION['role'] = $role;
                switch($role){
                    case 1:
                        header("Location: /Project---CTStore---WD1110/Admin/View_Index_Admin");
                        break;
                    case 2:
                        header("Location: /Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone");
                        break;
                    case 3:
                        $this->view("Login_sigin" , ["message" => "Tài khoản này đã bị khóa !"]);
                        break;
                }
            }
            else {
                $this->view("Login_sigin" , ["message" => "Tài khoản hoặc mật khẩu sai !"]);
                // header("Location: /Project---CTStore---WD1110/Login_Sigin/View_Login_Sigin");
                // exit();
            }
        }
    }
    function Check_Sigin(){
        //get data from
        if(isset($_POST["Register"])){
            $full_name = $_POST["FullName"];
            $phone_number = $_POST["Phone"];
            $email = $_POST["Email"];
            $password = $_POST["Password"];
            // $password = password_hash($password , PASSWORD_DEFAULT);

            //insert to database
            $check = $this->accountModel->Create_Account($full_name , $phone_number , $email , $password);
            if($check == true){
                header("Location: /Project---CTStore---WD1110/Login_Sigin/View_Login_Sigin/Đăng ký thành công!");
            }
        }
    }

    function Log_out(){
        unset($_SESSION['account_id']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        unset($_SESSION['role']);
        unset($_SESSION["Count_Cart"]);
        header("Location: /Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone");
    }
}
?>