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
                                <div class="container" style="border: 2px solid black; border-radius: 15px; dir="rtl"">
                                    <div class="row" dir="rtl">

                                        <div class="row">
                                            <div class="col" dir="rtl">
                                                <br><center><h6><b>الجهة</b><br><br> '.$print["issuer_arabic"].'</h6></center>
                                            </div>
                                            <div class="col" dir="ltr">
                                                <br><center><h6><b>Issuer</b><br><br> '.$print["issuer_english"].'</h6></center>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col" dir="rtl">
                                                <br><center><h6><b>مسمى الدورة</b><br><br> '.$print["course_title_arabic"].'</h6></center>
                                            </div>
                                            <div class="col" dir="ltr">
                                                <br><center><h6><b>Course Title</b><br><br> '.$print["course_title_english"].'</h6></center>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col" dir="rtl">
                                                <br><center><h6><b>نبذة</b><br></center>'.$print["brief_arabic"].'</h6>
                                            </div>

                                            <div class="col" dir="ltr">
                                                <br><center><h6><b>Brief</b><br></center>'.$print["brief_english"].'</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col" dir="rtl">
                                                <br><center><h6><b>عدد الساعات</b><br><br> '.$print["hours"].'</h6></center>
                                            </div>
                                            <div class="col" dir="ltr">
                                                <br><center><h6><b>Hours</b><br><br> '.$print["hours"].'</h6></center>
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