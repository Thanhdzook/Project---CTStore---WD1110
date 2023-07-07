<?php

class Login_Sigin extends Controller{
    public $accountModel;
    public $email;

    function __construct(){
        $this->accountModel = $this->model("AccountModel");
        $this->email = $this->model("Email");
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
    function Check_Sigin($checksigin){
        if($checksigin == 1){
            // insert to database
            $check = $this->accountModel->Create_Account($_SESSION["name_sigin"] , $_SESSION["phoneN_sigin"] , $_SESSION["email_sigin"] , $_SESSION["password_sigin"] , 2 , $_SESSION["random_id"]);
            if($check == true){
                // if(isset($_SESSION["role"])){
                //     header("Location: /Project---CTStore---WD1110/Admin/View_Index_Admin/Thêm thành công tài khoản admin !");
                // }
                unset($_SESSION['name_sigin']);
                unset($_SESSION['phoneN_sigin']);
                unset($_SESSION['email_sigin']);
                unset($_SESSION['password_sigin']);
                unset($_SESSION["random_id"]);
                header("Location: /Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone_message/Đăng ký thành công !/0");
                
            }
            exit();
        }
        //get data from
        if(isset($_POST["Register"])){
            $_SESSION["name_sigin"] = $_POST["FullName"];
            $_SESSION["phoneN_sigin"] = $_POST["Phone"];
            $_SESSION["email_sigin"] = $_POST["Email"];
            $_SESSION["password_sigin"] = $_POST["Password"];
            // $full_name = $_POST["FullName"];
            // $phone_number = $_POST["Phone"];
            // $email = $_POST["Email"];
            // $password = $_POST["Password"];
            $random_id = rand(time(), 1000000000);
            $_SESSION["random_id"] = $random_id;
            // $password = password_hash($password , PASSWORD_DEFAULT);
            if(empty($_SESSION["name_sigin"])){
                $this->view("Login_sigin" , ["message" => "Không được để trống tên !"]);
                
            }
            if(empty($_SESSION["phoneN_sigin"])){
                $this->view("Login_sigin" , ["message" => "Không được để trống số điện thoại !"]);
            }
            if(empty($_SESSION["email_sigin"])){
                $this->view("Login_sigin" , ["message" => "Không được để trống email !"]);
            }
            if(empty($_SESSION["password_sigin"])){
                $this->view("Login_sigin" , ["message" => "Không được để trống mật khẩu !"]);
            }
            else{
                $arr_accounts = $this->accountModel->List_Account();
                while($row = mysqli_fetch_array($arr_accounts)){
                    if($_SESSION["email_sigin"] == $row["email"]){
                        $this->view("Login_sigin" , ["message" => "Email đã tồn tại !"]);
                    }
                    if($_SESSION["phoneN_sigin"] == $row["phone_number"]){
                        $this->view("Login_sigin" , ["message" => "Số điện thoại đã tồn tại !"]);
                    }
                }
                $_SESSION["check_email_sigin"] = $_SESSION["email_sigin"];
                $this->Send_Email($_SESSION["email_sigin"]);
                $this->View_Send_Email($_SESSION["email_sigin"] , 1);
                // // insert to database
                // $check = $this->accountModel->Create_Account($full_name , $phone_number , $email , $password , $role , $random_id);
                // if($check == true){
                //     if(isset($_SESSION["role"])){
                //         header("Location: /Project---CTStore---WD1110/Admin/View_Index_Admin/Thêm thành công tài khoản admin !");
                //     }
                //     // header("Location: /Project---CTStore---WD1110/Login_Sigin/View_Login_Sigin/Đăng ký thành công!");
                //     $this->view("Login_sigin" , ["message" => "Đăng ký thành công !"]);
                // }
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
        if(isset($_SESSION["UN_ID"])){
            unset($_SESSION["UN_ID"]);
            unset($_SESSION["UN_NAME"]);
        }
        header("Location: /Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone");
    }

    function View_Forgot_Password(){
        $this->view2("Login_sigin" , "Forgot_password");
    }
    function View_Send_Email($email , $check){
        $this->view2("Login_sigin" , "Check_Email" , ["email" => $email , "check" => $check]);
    }
    function Send_Email($email){
        $this->email->Send_Email($email);
    }
    function Check_Send_Email($check){
        if(isset($_POST["submit"])){
            $number_email = $_POST["tel1"];
            $number_email .= $_POST["tel2"];
            $number_email .= $_POST["tel3"];
            $number_email .= $_POST["tel4"];
            if($number_email == $_SESSION["random"]){
                switch($check){
                    case 0:
                       $this->view("Layout" , ["content" => "Login_sigin" , "content2" => "Reset_Password"]);
                       break;
                    case 1:
                        $this->Check_Sigin($check);
                        break;
                    case 2:
                        break;
                }
            }
            else{
                $this->view2("Login_sigin" , "Check_Email" , ["email" => $_SESSION["check_email"] , "message" => "Mã xác nhận không đúng !" , "check" => $check]);
            }
        }   
    }

    function Forgot_Password(){
        if(isset($_POST["submit"])){
            $check = false;
            $_SESSION["check_email"] = $_POST["email"];
            $arr_accounts = $this->accountModel->List_Account();
            while($row = mysqli_fetch_array($arr_accounts)){
                if($_POST["email"] == $row["email"]){
                    $check = true;
                }
            }
            if($check == true){
                $this->Send_Email($_SESSION["check_email"]);
                $this->View_Send_Email($_SESSION["check_email"] , 0);
            }
            else{
                $this->view2("Login_sigin" , "Forgot_password" , ["message" => "Không tìm thấy Email ".$_SESSION["check_email"]]);
            }
        }
        elseif(isset($_SESSION["check_email"])){
            $this->View_Send_Email($_SESSION["check_email"] , 0);
        }
        // elseif(isset($_SESSION["check_email_sigin"])){

        // }
    }
    function Check_Forgot_Password($email){
        if(isset($_POST["submit"])){
            ($_POST["password_new1"] == $_POST['password_new2']) ? $check2 = 1 : $check2 = 5;
            if($check2 == 1){
                // $_SESSION['password'] = $_POST["password_new1"];
                $data1 = $this->accountModel->Search_Account( "email" , $email);
                $row = mysqli_fetch_array($data1);
                $check = $this->accountModel->Update_Infor_Account($row['full_name'],$email,$row["account_id"] , $_POST["password_new1"]);
                unset($_SESSION["check_email"]);
                if($check == true){
                    $this->view("Layout" , ["content" => "Index" , "message" => "Cập nhật mật khẩu thành công !"]);
                }
                else{
                    $this->view("Layout" , ["content" => "Index" , "message" => "Cập nhật mật khẩu không thành công !"]);
                }
            }
            else{
                $this->view("Layout" , ["content" => "Login_sigin" , "content2" => "Reset_Password" , "message" => "Mật khẩu xác nhận không trùng nhau !"]);
            }
        }
    }
}
?>