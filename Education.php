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
                            <div class="container" style="border: 2px solid black; border-radius: 15px; dir="rtl"">
                                <div class="row" dir="rtl">

                                    <div class="row">
                                        <div class="col" dir="rtl">
                                            <br><center><h6><b>الجهة</b><br><br><br>'.$print["issuer_arabic"].'</h6></center>
                                        </div>
                                        <div class="col" dir="ltr">
                                            <br><center><h6><b>Issuer</b><br><br><br>'.$print["issuer_english"].'</h6></center>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col" dir="rtl">
                                            <br><center><h6><b>المرحلة</b><br><br>'.$print["level_arabic"].'</h6></center>
                                        </div>
                                        <div class="col" dir="ltr">
                                            <br><center><h6><b>Level</b><br><br>'.$print["level_english"].'</h6></center>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col" dir="rtl">
                                            <br><center><h6><b>التخصص</b><br><br>'.$print["major_arabic"].'</h6></center>
                                        </div>

                                        <div class="col" dir="ltr">
                                            <br><center><h6><b>Major</b><br><br>'.$print["major_english"].'</h6></center>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col" dir="rtl">
                                            <br><center><h6><b>المعدل</b><br><br>'.$print["average"].' من '.$print["average_from"].'</h6></center>
                                        </div>
                                        <div class="col" dir="ltr">
                                            <br><center><h6><b>Average</b><br><br>'.$print["average"].' From '.$print["average_from"].'</h6></center>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col" dir="rtl">
                                            <br><center><h6><b>التاريخ</b><br><br> '.$print["start_date"].' - '.$print["end_date"].'</h6></center>
                                        </div>
                                        <div class="col" dir="ltr">
                                            <br><center><h6><b>Date</b><br><br> '.$print["end_date"].' - '.$print["start_date"].'</h6></center>
                                        </div>
                                    </div>
                                    
                                </div>
                                <br>
                            </div>
                            <br>
                        ';
                    }
                }
        ?>
        <?php require_once 'footer.php'; ?>
    </body>
</html>