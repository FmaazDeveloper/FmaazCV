<?php

require_once __DIR__ . '/pdf/autoload.php';

$mpdf = new \Mpdf\Mpdf();//إذا تم تشغيل السطر رقم 8 يجب إيقاف هذا السطر (سطر التشغيل هو الخاص بالطول و العرض ) 
$mpdf ->AddPage("P");//لتحديد شكل الصفحة (L = عرض , P = طول)
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);//لتحديد نوع الورق
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [190, 236]]);//لتحديد الطول و العرض (الطول ، العرض)
$mpdf ->autoScriptToLang = true;//للسماح بكتابة اللغة العربية 
$mpdf ->autoLangToFont = true;//للسماح بكتابة اللغة العربية
$stylesheet = file_get_contents('style.css');
$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
$html = "write hare" ;//البيانات التي سيتم عرضها
$mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output("FMAAZ CV.pdf" , "I");//تحديد اسم الملف عند التحميل أو الفتح (D = dwonload , I = show )

?>
