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
            <br><h3>Courses | الدورات</h3><br>
        </center>
        <?php
            if($connect_database)
                {
                    $select_courses_info = $connect_database->prepare('SELECT * FROM courses ORDER BY end_date ASC');
                    $select_courses_info->execute();

                    echo '<center><h5>'.$select_courses_info->rowCount().' : عدد الدورات</h5></center><br>';

                    if($select_courses_info->rowCount() == 0)
                        echo '<br><br><br><br><br>';

                    foreach($select_courses_info as $print)
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
                                            <h6><b>مسمى الدورة</b><br> '.$print["course_title_arabic"].'</h6>
                                            <br>
                                            <h6><b>نبذة</b><br> '.$print["brief_arabic"].'</h6>
                                            <br>
                                            <h6><b>عدد الساعات</b><br>'.$print["hours"].'</h6>
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
                                            <h6><b>Course Title</b><br> '.$print["course_title_english"].'</h6>
                                            <br>
                                            <h6><b>Brief</b><br> '.$print["brief_english"].'</h6>
                                            <br>
                                            <h6><b>Hours</b><br> '.$print["hours"].'</h6>
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