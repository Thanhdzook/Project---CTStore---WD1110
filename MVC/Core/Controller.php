<?php
class Controller{

    public function model($model){
        require_once "./MVC/Models/".$model.".php";
        return new $model;
    }

    public function view($view , $data = []){
        require_once "./MVC/Views/".$view."/".$view.".php";
    }

    public function view2($folder , $view , $data = []){
        require_once "./MVC/Views/".$folder."/".$view.".php";
    }
}
?>