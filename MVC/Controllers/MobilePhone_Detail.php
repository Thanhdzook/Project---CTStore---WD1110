<?php

class MobilePhone_Detail extends Controller{
    public $mobilePhone;
    function __construct(){
        $this->mobilePhone = $this->model("MobilePhoneModel");
    }

    function ShowMobilePhoneDetail($id){
        $data = $this->mobilePhone->MobilePhone_Detail($id);
        while($row = mysqli_fetch_array($data)){
            $and = "and memory != " . "'" .$row["memory"] . "'";
            $check = mysqli_fetch_column($this->mobilePhone->Count_MobilePhone_By_Value("mobilePhone_name" , $row["mobilePhone_name"] , $and));
            if($check != 0){
                $sreach_by_memory = $this->mobilePhone->Sreach_MobilePhone_By_Value("mobilePhone_name" , $row["mobilePhone_name"] , $and);
                $and = "and color != " . "'" .$row["color"] . "'";
                $check = mysqli_fetch_column($this->mobilePhone->Count_MobilePhone_By_Value("mobilePhone_name" , $row["mobilePhone_name"] , $and));
                if($check != 0){
                    $sreach_by_color = $this->mobilePhone->Sreach_MobilePhone_By_Value("mobilePhone_name" , $row["mobilePhone_name"] , $and);
                    $this->view("Layout" , ["mobilePhone"=> $this->mobilePhone->MobilePhone_Detail($id) , "content" => "MobilePhone_Detail", 
                    "sreach_by_memory" => $sreach_by_memory , "sreach_by_color" => $sreach_by_color]);
                }
                else{
                    $this->view("Layout" , ["mobilePhone"=> $this->mobilePhone->MobilePhone_Detail($id) , "content" => "MobilePhone_Detail", 
                    "sreach_by_memory" => $sreach_by_memory]);
                }
            }
            else{
                $this->view("Layout" , ["mobilePhone"=> $this->mobilePhone->MobilePhone_Detail($id) , "content" => "MobilePhone_Detail"]);
            }
            
        }
        $this->view("Layout" , ["mobilePhone"=> $this->mobilePhone->MobilePhone_Detail($id) , "content" => "MobilePhone_Detail", 
                    "sreach_by_memory" => $sreach_by_memory , "sreach_by_color" => $sreach_by_color]);
    }
}
?>