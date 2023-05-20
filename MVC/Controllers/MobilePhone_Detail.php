<?php

class MobilePhone_Detail extends Controller{
    public $mobilePhone;
    function __construct(){
        $this->mobilePhone = $this->model("MobilePhoneModel");
    }

    function ShowMobilePhoneDetail($id){
        $this->view("Layout" , ["mobilePhone"=> $this->mobilePhone->MobilePhone_Detail($id) , "content" => "MobilePhone_Detail"]);
    }
}
?>