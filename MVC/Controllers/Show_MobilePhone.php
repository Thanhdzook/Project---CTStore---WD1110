<?php

class Show_MobilePhone extends Controller{
    public $mobilePhone;
    function __construct(){
        $this->mobilePhone = $this->model("MobilePhoneModel");
    }

    function ShowMobilePhone(){
        $this->view("Index" , ["mobilePhone"=> $this->mobilePhone->List_MobilePhone()]);

    }

}
?>