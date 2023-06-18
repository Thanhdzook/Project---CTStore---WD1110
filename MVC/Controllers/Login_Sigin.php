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
            if (empty($_POST["email"])) {
                $this->view("Login_sigin" , ["message" => "Tài khoản là bắt buộc"]);
            }
            if (empty($_POST["password"])) {
                $this->view("Login_sigin" , ["message" => "Mật khẩu là bắt buộc"]);
                exit();
            }

            // check in database
            $arr_accounts = $this->accountModel->List_Account();
            while($row = mysqli_fetch_array($arr_accounts)){
                if($_POST["email"] == $row["email"] && $_POST["password"] == $row["password"]){
                    $role = $row["role"];
                    $id = $row["account_id"];
                    $unique_id = $row["unique_id"];
                    $check = true;
                }
            }
            if($check == true){
                $email = $_POST["email"];
                if (empty($email)) {
                    $this->view("Login_sigin" , ["message" => "Tài khoản là bắt buộc"]);
                    exit();
                }
                $password = $_POST["password"];
                $_SESSION['email'] = $email;
                $_SESSION['account_id'] = $id;
                $_SESSION['password'] = $password;
                $_SESSION['role'] = $role;
                $_SESSION['unique_id'] = $unique_id;
                switch($role){
                    case 1:
                        header("Location: /Project---CTStore---WD1110/Admin/View_Index_Admin/null");
                        break;
                    case 2:
                        header("Location: /Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone");
                        break;
                    case 3:
                        $this->view("Login_sigin" , ["message" => "Tài khoản này đã bị khóa"]);
                        break;
                }
            }
            else {
                $this->view("Login_sigin" , ["message" => "Tài khoản hoặc mật khẩu sai"]);
                exit();
            }
        }
    }
    function Check_Sigin($role){
        //get data from
        if(isset($_POST["Register"])){
            $full_name = $_POST["FullName"];
            $phone_number = $_POST["Phone"];
            $email = $_POST["Email"];
            $password = $_POST["Password"];
            $random_id = rand(time(), 1000000000);
            // $password = password_hash($password , PASSWORD_DEFAULT);
            if(empty($full_name)){
                $this->view("Login_sigin" , ["message" => "Không được để trống tên !"]);
                
            }
            if(empty($phone_number)){
                $this->view("Login_sigin" , ["message" => "Không được để trống số điện thoại !"]);
            }
            if(empty($email)){
                $this->view("Login_sigin" , ["message" => "Không được để trống email !"]);
            }
            if(empty($password)){
                $this->view("Login_sigin" , ["message" => "Không được để trống mật khẩu !"]);
            }
            else{
                $arr_accounts = $this->accountModel->List_Account();
                while($row = mysqli_fetch_array($arr_accounts)){
                    if($email == $row["email"]){
                        $this->view("Login_sigin" , ["message" => "Email đã tồn tại !"]);
                    }
                    if($phone_number == $row["phone_number"]){
                        $this->view("Login_sigin" , ["message" => "Số điện thoại đã tồn tại !"]);
                    }
                }
                // insert to database
                $check = $this->accountModel->Create_Account($full_name , $phone_number , $email , $password , $role , $random_id);
                if($check == true){
                    if(isset($_SESSION["role"])){
                        header("Location: /Project---CTStore---WD1110/Admin/View_Index_Admin/Thêm thành công tài khoản admin !");
                    }
                    // header("Location: /Project---CTStore---WD1110/Login_Sigin/View_Login_Sigin/Đăng ký thành công!");
                    $this->view("Login_sigin" , ["message" => "Đăng ký thành công !"]);
                }
            }
            
        }
    }

    function Log_out(){
        unset($_SESSION['account_id']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        unset($_SESSION['role']);
        unset($_SESSION["Count_Cart"]);
        unset($_SESSION["unique_id"]);
        header("Location: /Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone");
    }

    function View_Forgot_Password(){
        $this->view2("Login_sigin" , "Check_Email_Sigin");
    }
}
?>