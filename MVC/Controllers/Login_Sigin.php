<?php

class Login_Sigin extends Controller{
    public $accountModel;

    function __construct(){
        $this->accountModel = $this->model("AccountModel");
    }
    function View_Login_Sinin(){
        $this->view("Login_sigin");
    }

    function Check_Login(){
        //get data from
        $check = false;
        if(isset($_POST["Login"])){
            $email = $_POST["email"];
            $password = $_POST["password"];

            // check in database
            $arr_accounts = $this->accountModel->List_Account();
            while($row = mysqli_fetch_array($arr_accounts)){
                if($email == $row["email"] && $password == $row["password"]){
                    $check = true;
                }
            }
            if($check == true){
                echo "true";
            }
            else {
                echo "false";
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
            echo $check;
        }
    }
}
?>