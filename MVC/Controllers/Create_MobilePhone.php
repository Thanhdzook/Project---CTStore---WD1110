<?php

    class Create_MobilePhone extends Controller{
        public $MobilePhoneModel;

        function __construct(){
            $this->MobilePhoneModel = $this->model("MobilePhoneModel");
        }
        function View_CreateMobilePhone(){
            $this->view("CreateMobilePhone");
        }

        function Inpost_MobilePhone(){
            if ($_SERVER['REQUEST_METHOD'] !== 'POST')
            {
                echo "Phải Post dữ liệu";
                die;
            }
          
            if (!isset($_FILES["fileupload"]))
            {
                echo "Dữ liệu không đúng cấu trúc";
                die;
            }
          
            if ($_FILES["fileupload"]['error'] != 0)
            {
              echo "Dữ liệu upload bị lỗi";
              die;
            }
          
            $target_dir    = "/Project---CTStore---WD1110/MVC/wwwroot/img/";
            $target_file   = $target_dir . basename($_FILES["fileupload"]["name"]);
          
            $allowUpload   = true;
          
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
          
            $maxfilesize   = 800000;
          
            $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
          
          
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
                if($check !== false)
                {
                    echo "Đây là file ảnh - " . $check["mime"] . ".";
                    $allowUpload = true;
                }
                else
                {
                    echo "Không phải file ảnh.";
                    $allowUpload = false;
                }
            }
          
            if (file_exists($target_file))
            {
                echo "Tên file đã tồn tại trên server, không được ghi đè";
                $allowUpload = false;
            }
            if ($_FILES["fileupload"]["size"] > $maxfilesize)
            {
                echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
                $allowUpload = false;
            }
          
          
            if (!in_array($imageFileType,$allowtypes ))
            {
                echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
                $allowUpload = false;
            }
          
          
            if ($allowUpload)
            {
                if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file))
                {
                $mobilePhone_name = $_POST["mobilePhone_name"];
                $chip = $_POST["chip"];
                $memory = $_POST["memory"];
                $camera = $_POST["camera"];
                $operatingSystem = $_POST["operatingSystem"];
                $weight = $_POST["weight"];
                $pin = $_POST["pin"];
                $warrantyPeriod = $_POST["warrantyPeriod"];
                $price = $_POST["price"];
                $amount = $_POST["amount"];
                $img = "/Project---CTStore---WD1110/MVC/wwwroot/img/".basename( $_FILES["fileupload"]["name"]);

                //insert to database
                $check = $this->MobilePhoneModel->Create_MobilePhone($mobilePhone_name, $chip, $memory, $camera, $operatingSystem, $weight, $pin, $warrantyPeriod, $price, $amount, $img);
                echo $check;
                }
                else
                {
                    echo "Có lỗi xảy ra khi upload file.";
                }
            }
            else
            {
                echo "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
            }
        }
    }
?>