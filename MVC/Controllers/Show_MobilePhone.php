<?php

class Show_MobilePhone extends Controller{
    public $mobilePhone;
    function __construct(){
        $this->mobilePhone = $this->model("MobilePhoneModel");
    }

    function ShowMobilePhone(){
        if(isset($_SESSION["role"]) == 1){
              header("Location: /Project---CTStore---WD1110/Admin/View_Index_Admin");
        }
        else{
            $this->view("Layout" , ["mobilePhone"=> $this->mobilePhone->List_MobilePhone() , "content" => "Index"]);
        }
    }
    function ShowMobilePhone_message($message){
        $this->view("Layout" , ["mobilePhone"=> $this->mobilePhone->List_MobilePhone() , "content" => "Index" , "message"=> $message]);     
    }

    function SreachMobilePhone_By_Name($name){
        if(isset($_POST["Sreach"])){
            $data = $_POST["NameMobilePhone"];
            if(mysqli_fetch_column($this->mobilePhone->Count_MobilePhone_By_Value($name,trim($data))) != 0){
                    $this->view("Layout" , ["mobilePhone"=> $this->mobilePhone->Sreach_MobilePhone_By_Value($name , trim($data) ) , "content" => "Index"]);
            }
            else {
                $this->view("Layout" , ["mobilePhone"=> $this->mobilePhone->List_MobilePhone() , "content" => "Index" , "message" => "Không tìm thấy sản phẩm !"]);
            }
        }
    }

    function SreachMobilePhone($name , $data){
        $this->view("Layout" , ["mobilePhone"=> $this->mobilePhone->Sreach_MobilePhone_By_Value($name , $data ) , "content" => "Index"]);
    }
}
?>