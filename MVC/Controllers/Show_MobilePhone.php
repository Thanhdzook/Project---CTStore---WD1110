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
        // if(isset($_POST["Sreach"])){
        //     $data = $_POST["NameMobilePhone"];
        //     $check = false;
        //     $arr_mobilephone = $this->mobilePhone->Sreach_MobilePhone_By_Value($name , $data);
        //     while($row = mysqli_fetch_array($arr_mobilephone)){
        //         if($row["mobilePhone_name"] !== null){
        //             $check = true;
        //         }
        //     }
        //     if($check == false){
        //         echo "ko co gi";
        //     }
        //     else{
        //         $this->view("Index" , ["mobilePhone"=> $this->mobilePhone->Sreach_MobilePhone_By_Value($name , $data)]);
        //     }

        // }
        if(isset($_POST["Sreach"])){
            $data = $_POST["NameMobilePhone"];
            // while($row1 = mysqli_fetch_array($this->mobilePhone->Count_MobilePhone_By_Value($name,$data))){
            //     $check = $row1["count(*)"];
            // }
            $row = mysqli_fetch_column($this->mobilePhone->Count_MobilePhone_By_Value($name,$data));
            echo $row;
        }
    }
}
?>