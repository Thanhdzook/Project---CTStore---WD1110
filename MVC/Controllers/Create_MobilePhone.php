<?php

    class Create_MobilePhone extends Controller{
        public $MobilePhoneModel;

        function __construct(){
            $this->MobilePhoneModel = $this->model("MobilePhoneModel");
        }
        function View_CreateMobilePhone(){
            $this->view2("Layout" , "Layout_Admin" , ["content" => "CreateMobilePhone"]);
        }

        function Inpost_MobilePhone($checkinpost){
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
          
            $target_dir    = "C:/xampp/htdocs/Project---CTStore---WD1110/MVC/wwwroot/img/";
            $random_id = rand(time(), 1000000000);
            $target_file   = $target_dir . basename($_FILES["fileupload"]["name"]);
          
            $allowUpload   = true;
          
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            
            $target_file   = $target_dir . $random_id.".png";

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
                    // $random_id = rand(time(), 1000000000);
                    // rename("/Project---CTStore---WD1110/MVC/wwwroot/img/".basename( $_FILES["fileupload"]["name"]), "/Project---CTStore---WD1110/MVC/wwwroot/img/".$random_id."png");
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
                    $sale = $_POST["sale"];
                    $color = $_POST["color"];
                    $img = "/Project---CTStore---WD1110/MVC/wwwroot/img/".$random_id.".png";;

                    //insert to database
                    if($checkinpost == 0){
                        $check = $this->MobilePhoneModel->Create_MobilePhone($mobilePhone_name, $chip, $memory, $camera, $operatingSystem, $weight, $pin, $warrantyPeriod, $price, $amount, $img , $sale , $color);
                    }
                    else{
                        $check = $this->MobilePhoneModel->Fix_MobilePhone( $checkinpost ,$mobilePhone_name, $chip, $memory, $camera, $operatingSystem, $weight, $pin, $warrantyPeriod, $price, $amount, $img , $sale , $color);
                    }
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
        function View_Fix_MobilePhone($id){
            $MB = $this->MobilePhoneModel->Sreach_MobilePhone_By_Value("mobilePhone_id" , $id , "");
            $this->view2("Layout" , "Layout_Admin" , ["mobilePhone" => $MB , "content" => "CreateMobilePhone" , "content2" =>"Fix_MobilePhone"]);
        }
    }
?>