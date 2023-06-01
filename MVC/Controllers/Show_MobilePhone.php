<?php

class Show_MobilePhone extends Controller{
    public $mobilePhone;
    public $order;
    function __construct(){
        $this->mobilePhone = $this->model("MobilePhoneModel");
        $this->order = $this->model("OrderModel");
        $row = mysqli_fetch_array($this->order->List_Order($_SESSION["account_id"] , 1));
        $_SESSION["Count_Cart"] = mysqli_fetch_column($this->order->Check_Order_Detail("order_id" , $row["order_id"] , $row["order_id"]));
    }

    function ShowMobilePhone(){
        if(isset($_SESSION["role"])){
            $role = $_SESSION["role"];
            switch($role){
                case 1:
                    header("Location: /Project---CTStore---WD1110/Admin/View_Index_Admin");
                    break;
                case 2:
                    $this->view("Layout" , ["mobilePhone"=> $this->mobilePhone->List_MobilePhone() , "content" => "Index"]);
                    break;
            }
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