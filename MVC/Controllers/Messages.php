<?php

class Messages extends Controller{

    public $message;
    public $account;
    public function __construct()
    {
        $this->message = $this->model("MessagesModel");
        $this->account = $this->model("AccountModel");
    }

    public function insertChat(){
        // $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = $_POST['incoming_id'];
        $message = $_POST['message'];
        $this->message->insertChat($incoming_id , $message);
    }
    public function getChat(){
        if($_SESSION["role"] == 1){
            $incoming_id = $_SESSION["chat_id"];
        }
        else{
           $incoming_id = 123; 
        }
        echo $this->message->getChat($incoming_id);
    }
    public function View_chat($unique_id){
        if($_SESSION["role"] == 1){
            $_SESSION["chat_id"] = $unique_id;
            $account = $this->account->Search_Account("unique_id" , $unique_id);
            $this->view("Messages" , ["account" => $account]);
        }
        $this->view("Messages");
    }
    public function View_chat_box(){
        $this->view2("Messages" , "User");
    }

    public function getUser(){
       $rs = $this->message->getData();
       echo $rs;
    }
    public function searchUser(){
        echo $this->message->searchUser($_POST['searchTerm']);
    }
}