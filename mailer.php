<head>
    <?php require_once 'head.php' ;?>
</head>
    
    <?php
        if(isset($_POST['send_informition']) && !empty($_POST['name']) && !empty($_POST['email']))
            {
            }
        else
            {
                echo 
                    '<center>
                        <div class="alert alert-danger" role="alert"> ! دخول غير مصرح به </div>
                    </center>'
                ;
                header("refresh:2;url= index.php");
                exit;
            }

            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\Exception;

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

            $mail->setFrom('07yahala@gmail.com', 'My Website');//الإميل المرسل منه (الإيميل الخاص بي في الغالب )
            $mail->addAddress('07yahala@gmail.com');//الإيميل المرسل إليه (الإيميل الخاص ب الزائر في الغالب)
            // $mail->Subject = 'Here is the subject';//عنوان الرسالة 
            // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';//محتوى الرسالة 
            $mail->Subject = 'دخول للموقع'; 
            $mail->Body    = 
            '
                <h2>The site was entered by:</h2>
                <table class="table table-bordered">
                    <tr> 
                        <th> Name : </th> <td> ' . $_POST['name'] . ' </td>
                    </tr>
                    <tr> 
                        <th> Email : </th> <td> ' . $_POST['email'] . ' </td>
                    </tr>
                    <tr> 
                    <th> Code : </th> <td> ' . $_SESSION['code'] . ' </td>
                    </tr>
                </table>
            ';
            // $mail->addAttachment($_FILES['file']['tmp_name'] , $_FILES['file']['name']);//لإرسال ملف 
            $mail->send();
    ?>