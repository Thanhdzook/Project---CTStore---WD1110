<?php

class Login_Sigin extends AccountCore{
    function View_Login_Sinin(){
        $this->view("Login_sigin");
    }

    function Check_Login(){
        //get data from
        $check = false;
        if(isset($_POST["Login"])){
            $email = $_POST["email"];
            $password = $_POST["password"];
        }
        // insert database
        $account = $this->model("AccountModel");
        // $account->List_Account();
        $arr_accounts = $account->List_Account();
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
?>