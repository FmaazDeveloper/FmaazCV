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
                    $select_courses_info = $connect_database->prepare('SELECT * FROM courses');
                    $select_courses_info->execute();

                    echo '<center><h5>'.$select_courses_info->rowCount().' : عدد الشهادات</h5></center><br>';

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
                                            <h6>الجهة: <i>'.$print["issuer_arabic"].'</i></h6>
                                            <br>
                                            <h6>مسمى الدورة: <i>'.$print["course_title_arabic"].'</i></h6>
                                            <br>
                                            <h6>نبذة: <i>'.$print["brief_arabic"].'</i></h6>
                                            <br>
                                            <h6>عدد الساعات: <i>'.$print["hours"].'</i></h6>
                                            <br>
                                            <h6>التاريخ: <i>'.$print["start_date"].' - '.$print["end_date"].'</i></h6>
                                        </div>

                                        <div class="col" text-color: blue;>
                                            |<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|
                                        </div>

                                        <div class="col" dir="ltr">
                                            <br>
                                            <h6>Issuer: <i>'.$print["issuer_english"].'</i></h6>
                                            <br>
                                            <h6>Course Title: <i>'.$print["course_title_english"].'</i></h6>
                                            <br>
                                            <h6>Brief: <i>'.$print["brief_english"].'</i></h6>
                                            <br>
                                            <h6>Hours: <i>'.$print["hours"].'</i></h6>
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