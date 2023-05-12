<?php

class Show_MobilePhone extends Controller{
    public $mobilePhone;
    function __construct(){
        $this->mobilePhone = $this->model("MobilePhoneModel");
    }

    function ShowMobilePhone(){
        $this->view("Index" , ["mobilePhone"=> $this->mobilePhone->List_MobilePhone()]);
    }

    function SreachMobilePhone($name){
        if(isset($_POST["Sreach"])){
            $data = $_POST["NameMobilePhone"];
            if(mysqli_fetch_column($this->mobilePhone->Count_MobilePhone_By_Value($name,$data)) != 0){
                    $this->view("Index" , ["mobilePhone"=> $this->mobilePhone->Sreach_MobilePhone_By_Value($name , $data )]);
            }
            else {
                echo "ko co gi";
            }
        }
    }
}
?>