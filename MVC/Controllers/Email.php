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
        function Send_Email($email){
            $_SESSION["random"] = rand(1000 , 9999);
            $message = "mã xác nhận của bạn là " . $_SESSION["random"];
            $name = htmlentities("CTstore");
<<<<<<< HEAD
            $email = htmlentities($email);
            $subject = htmlentities("MA XAC NHAN CUA BAN");
=======
            $email = htmlentities("bui230766@gmail.com");
            $subject = htmlentities("");
>>>>>>> 5b1bf6563fe0315489a186aa6702a6702c82cdb2
            $message = htmlentities($message);

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