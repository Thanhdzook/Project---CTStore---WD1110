<?php
class Controller{

    public function model($model){
        require_once "./MVC/Models/".$model.".php";
        return new $model;
    }

    public function view($view , $data = []){
        require_once "./MVC/Views/".$view."/".$view.".php";
    }
    public function view2($view , $view2 , $data = []){
        require_once "./MVC/Views/".$view."/".$view2.".php";
    }
}
?>