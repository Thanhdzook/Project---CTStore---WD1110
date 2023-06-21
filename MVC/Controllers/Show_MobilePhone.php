<?php

class Show_MobilePhone extends Controller{
    public $mobilePhone;
    public $order;
    function __construct(){
        $this->mobilePhone = $this->model("MobilePhoneModel");
        $this->order = $this->model("OrderModel");
        $_SESSION["count_mobilephone"] = mysqli_fetch_column($this->mobilePhone->Count_All_MobilePhone(0));
        if(isset($_SESSION["account_id"])){
            $row = mysqli_fetch_column($this->order->Check_Order( "account_id", $_SESSION['account_id'] , "and status = 1"));
            if($row == 0){
                $_SESSION["Count_Cart"] = 0;
            }
            else{
                $row = mysqli_fetch_array($this->order->List_Order( "account_id" ,$_SESSION['account_id'] , "and status = 1"));
                $_SESSION["Count_Cart"] = mysqli_fetch_column($this->order->Check_Order_Detail("order_id" , $row["order_id"] , $row["order_id"]));
            }
        }
    }

    function ShowMobilePhone(){
        $_SESSION["next"] = 0;
        if(isset($_SESSION["role"])){
            $role = $_SESSION["role"];
            switch($role){
                case 1:
                    header("Location: /Project---CTStore---WD1110/Admin/View_Index_Admin/null");
                    break;
                case 2:
                    $this->view("Layout" , ["mobilePhone"=> $this->mobilePhone->List_MobilePhone($_SESSION["next"] , 0) , "phone_outstanding" => $this->mobilePhone->Recent_Phone("*" , "mobilephone" , "sale"), "content" => "Index"]);
                    break;
            }
        }
        else{
            $this->view("Layout" , ["mobilePhone"=> $this->mobilePhone->List_MobilePhone($_SESSION["next"] , 0) , "phone_outstanding" => $this->mobilePhone->Recent_Phone("*" , "mobilephone" , "sale") , "content" => "Index"]);
        }
    }
    function ShowMobilePhone_message($message , $next){
        $_SESSION["next"] = $next;
        $this->view("Layout" , ["mobilePhone"=> $this->mobilePhone->List_MobilePhone($_SESSION["next"] , 0) , "phone_outstanding" => $this->mobilePhone->Recent_Phone("*" , "mobilephone" , "sale") , "content" => "Index" , "message"=> $message]);     
    }

    function SreachMobilePhone_By_Name($name){
        if(isset($_POST["Sreach"])){
            $data = $_POST["NameMobilePhone"];
            if(mysqli_fetch_column($this->mobilePhone->Count_MobilePhone_By_Value($name,trim($data) , " and status != 0")) != 0){
                $_SESSION["count_mobilephone"] = mysqli_fetch_column($this->mobilePhone->Count_MobilePhone_By_Value($name,trim($data) , " and status != 0"));
                $this->view("Layout" , ["mobilePhone"=> $this->mobilePhone->Sreach_MobilePhone_By_Value($name , trim($data) , " and status != 0") , "content" => "Index"]);
            }
            else {
                $this->view("Layout" , ["mobilePhone"=> $this->mobilePhone->List_MobilePhone($_SESSION["next"] , 0) , "content" => "Index" , "message" => "Không tìm thấy sản phẩm !"]);
            }
        }
    }

    function SreachMobilePhone($name , $data){
        $this->view("Layout" , ["mobilePhone"=> $this->mobilePhone->Sreach_MobilePhone_By_Value($name , $data , " and status != 0") , "content" => "Index"]);
    }
}
?>