<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require '/xampp/htdocs/Project---CTStore---WD1110/MVC/wwwroot/PHPMailer/src/Exception.php';
    require '/xampp/htdocs/Project---CTStore---WD1110/MVC/wwwroot/PHPMailer/src/PHPMailer.php';
    require '/xampp/htdocs/Project---CTStore---WD1110/MVC/wwwroot/PHPMailer/src/SMTP.php';

    Class Email extends Controller{
        public function Send_Email($email){
            $_SESSION["random"] = rand(1000 , 9999);
            $message = "mã xác nhận của bạn là " . $_SESSION["random"];
            $name = htmlentities("CTstore");
            $email = htmlentities($email);
            $subject = htmlentities("MA XAC NHAN CUA BAN");
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
?>