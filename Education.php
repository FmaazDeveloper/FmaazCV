<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once 'head.php' ;?>
    </head>
    <body>
        <?php
            require_once 'check_sign_in.php' ;
            require_once 'nav.php' ;
            require_once 'connect_database.php' ;
        ?>
        <center>
            <br><h3>Education | التعليم</h3><br>
        </center>
        <?php
            if($connect_database)
                {
                    $select_education_info = $connect_database->prepare('SELECT * FROM education ORDER BY end_date DESC');
                    $select_education_info->execute();

                        echo '<center><h5>'.$select_education_info->rowCount().' : عدد الشهادات</h5></center><br>';

                        if($select_education_info->rowCount() == 0)
                            echo '<br><br><br><br><br>';

                    foreach($select_education_info as $print)
                        {
                            echo
                            '
                            <center>
                            <div class="container" style="border: 2px solid black; border-radius: 15px; dir="rtl"">
                                <div class="row" dir="rtl">
                                    <div class="col" dir="rtl">
                                        <br>
                                        <h6><b>الجهة</b><br> '.$print["issuer_arabic"].'</h6>
                                        <br>
                                        <h6><b>المرحلة</b><br> '.$print["level_arabic"].'</h6>
                                        <br>
                                        <h6><b>التخصص</b><br> '.$print["major_arabic"].'</h6>
                                        <br>
                                        <h6><b>المعدل</b><br> '.$print["average"].'/'.$print["average_from"].'</h6>
                                        <br>
                                        <h6><b>التاريخ</b><br> '.$print["start_date"].' - '.$print["end_date"].'</h6>
                                    </div>

                                    <div class="col">
                                        |<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|
                                    </div>
                                    <div class="col" dir="ltr">
                                        <br>
                                        <h6><b>Issuer</b><br> '.$print["issuer_english"].'</h6>
                                        <br>
                                        <h6><b>Level</b><br> '.$print["level_english"].'</h6>
                                        <br>
                                        <h6><b>Major</b><br> '.$print["major_english"].'</h6>
                                        <br>
                                        <h6><b>Average</b><br> '.$print["average"].'/'.$print["average_from"].'</h6>
                                        <br>
                                        <h6><b>Date</b><br> '.$print["end_date"].' - '.$print["start_date"].'</h6>
                                    </div>
                                </div>
                            </div>
                            </center>
                            <br>
                            ';
                        }
                }
        ?>
        <?php require_once 'footer.php'; ?>
    </body>
</html>