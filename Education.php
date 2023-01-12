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
                            <div style="width: 1000px; height: 300px; border: 2px solid black; border-radius: 15px; dir="rtl"">
                                <div class="row" dir="rtl">
                                    <div class="col" dir="rtl">
                                        <br>
                                        <h6>الجهة: <i>'.$print["issuer_arabic"].'</i></h6>
                                        <br>
                                        <h6>المرحلة: <i>'.$print["level_arabic"].'</i></h6>
                                        <br>
                                        <h6>التخصص: <i>'.$print["major_arabic"].'</i></h6>
                                        <br>
                                        <h6>المعدل: <i>'.$print["average_from"].'/'.$print["average"].'</i></h6>
                                        <br>
                                        <h6>التاريخ: <i>'.$print["start_date"].' - '.$print["end_date"].'</i></h6>
                                    </div>

                                    <div class="col" text-color: blue;>
                                        |<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|
                                    </div>
                                    <div class="col" dir="ltr">
                                        <br>
                                        <h6>Issuer: <i>'.$print["issuer_english"].'</i></h6>
                                        <br>
                                        <h6>Level: <i>'.$print["level_english"].'</i></h6>
                                        <br>
                                        <h6>Major: <i>'.$print["major_english"].'</i></h6>
                                        <br>
                                        <h6>Average: <i>'.$print["average"].'/'.$print["average_from"].'</i></h6>
                                        <br>
                                        <h6>Date: <i>'.$print["end_date"].' - '.$print["start_date"].'</i></h6>
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