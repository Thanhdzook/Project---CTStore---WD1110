<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // require './PHPMailer/src/Exception.php';
    // require './PHPMailer/src/PHPMailer.php';
    // require './PHPMailer/src/SMTP.php';
    require '/xampp/htdocs/Project---CTStore---WD1110/MVC/wwwroot/PHPMailer/src/Exception.php';
    require '/xampp/htdocs/Project---CTStore---WD1110/MVC/wwwroot/PHPMailer/src/PHPMailer.php';
    require '/xampp/htdocs/Project---CTStore---WD1110/MVC/wwwroot/PHPMailer/src/SMTP.php';
    // require './PHPMailer/src/PHPMailer.php';
    // require './PHPMailer/src/SMTP.php';

    Class Email extends Controller{
        function Send_Email(){
            if(isset($_SESSION["email"])){
                if(isset($_POST["submit"])){
                    $name = htmlentities("CTstore");
                    $email = htmlentities('nhohonlohphp@gmail.com');
                    $subject = htmlentities("GOP Y CUA NGUOI DUNG : ".$_SESSION["email"]);
                    $message = htmlentities($_POST["message"]);

                    $mail = new PHPMailer(true);
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'nhohonlohphp@gmail.com';
                    $mail->Password = 'sxsyjcojmmyexxod';
                    $mail->Port = 465;
                    $mail->SMTPSecure = 'ssl';
                    $mail->isHTML(true);
                    $mail->setFrom($email, $name);
                    $mail->addAddress($email);
                    $mail->Subject = ($subject);
                    $mail->Body = $message;
                    $mail->send();
                    header("Location: /Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone_message/Bạn sẽ sớm nhận được phản hồi !/0");
                }
                else{
                    header("Location: /Project---CTStore---WD1110/Show_MobilePhone/ShowMobilePhone_message/Góp ý không thành công !/0");
                }
            }
            else{
                header("Location: /Project---CTStore---WD1110/Login_Sigin/View_Login_Sigin");
            }
        }
    }

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require "../wwwroot/PHPMailer/src/Exception.php";
// require "../wwwroot/PHPMailer/src/PHPMailer.php";
// require "../wwwroot/PHPMailer/src/SMTP.php";

// $name = htmlentities("CTstore");
// $email = htmlentities("nhohonlohphp@gmail.com");
// $subject = htmlentities("");
// $message = htmlentities($_POST['message']);

// $mail = new PHPMailer(true);
// $mail->isSMTP();
// $mail->Host = 'smtp.gmail.com';
// $mail->SMTPAuth = true;
// $mail->Username = 'nhohonlohphp@gmail.com';
// $mail->Password = 'sxsyjcojmmyexxod';
// $mail->Port = 465;
// $mail->SMTPSecure = 'ssl';
// $mail->isHTML(true);
// $mail->setFrom($email, $name);
// $mail->addAddress('thanhnt.114010121039@vtc.edu.vn');
// $mail->Subject = ("$email ($subject)");
// $mail->Body = $message;
// $mail->send();

    // header("Location: ./response.html");

?>