<head>
    <?php require_once 'head.php' ;?>
</head>
    
<?php
    if(isset($_POST['send_informition']) && !empty($_POST['name']) && !empty($_POST['email']))
        {
            $code = rand(1,1000000);
            if(strlen($code) == 6)
            {
            }
            elseif(strlen($code) != 6)
            $code = rand(1,1000000);
            $_SESSION['code'] = $code ;
        }
    else
        {
            session_unset();
            echo 
                '<center>
                    <div class="alert alert-danger" role="alert"> ! دخول غير مصرح به </div>
                </center>'
            ;
            header("refresh:2;url= index.php");
            exit;
        }
    use PHPMailer\PHPMailer\PHPMailer;
    require 'mailer/autoload.php';
    $mail = new PHPMailer();
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;//لعرض الأخطاء و/أو التأكيد على إرسال الرسالة (برموز)  
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = '07yahala@gmail.com';                     
    $mail->Password   = 'fskwwmpkhxrhdibw';                               
    $mail->SMTPSecure = 'ssl';            
    $mail->Port       = 465;

    $mail->isHTML(true);//لاستخدام HTML و CSS 
    $mail->CharSet = "UTF-8";//لاستخدام اللغة العربية 

    $mail->setFrom('07yahala@gmail.com', 'Verification Code');//الإميل المرسل منه (الإيميل الخاص ب الزائر في الغالب)
    $mail->addAddress($_POST['email']);//الإيميل المرسل إليه (الإيميل الخاص بي في الغالب)
    // $mail->Subject = 'Here is the subject';//عنوان الرسالة 
    // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';//محتوى الرسالة 
    $mail->Subject = 'Verification code'; 
    $mail->Body    = 
    '
        This message was sent automatically by <a href="fmaaz.com/accept.php"><b>FMAAZ developer CV</b></a> , Please enter the sent verification code in the space provided for it on the website . <br>Thanks
        <table class="table table-bordered">
            <tr>
                <th> Code : </th> <td> ' . $_SESSION['code'] . ' </td>
            </tr>
        </table>
        If you did not receive the verification code or you have a problem with it , Please send a message to the following mail .
        <table class="table table-bordered">
            <tr>
                <th> Email : </th> <td> <a class="btn btn-primary btn-sm" href="mailto:FmaazDeveloper@gmail.com" role="button">FmaazDeveloper@gmail.com</a> </td>
            </tr>
        </table>
        <h3><b>*Please do not reply to this email*</b></h3>
    ';
    // $mail->addAttachment($_FILES['file']['tmp_name'] , $_FILES['file']['name']);//لإرسال ملف 
    $mail->send();
?>