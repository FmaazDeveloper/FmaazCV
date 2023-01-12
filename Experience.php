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
            <br><h3>Experience | الخبرات</h3><br>
        </center>
        <?php
            if($connect_database)
                {
                    $select_experience_info = $connect_database->prepare('SELECT * FROM experience');
                    $select_experience_info->execute();

                    echo '<center><h5>'.$select_experience_info->rowCount().' : عدد الشهادات</h5></center>';

                    if($select_experience_info->rowCount() == 0)
                        echo '<br><br><br><br><br>';

                    foreach($select_experience_info as $print)
                        {
                            echo
                            '
                                <hr>
                                <div class="row m-3" dir="rtl">
                                    <div class="col" dir="rtl">
                                        <br>
                                        <h6>الجهة: <i>'.$print["issuer_arabic"].'</i></h6>
                                        <br>
                                        <h6>المسمى الوظيفي: <i>'.$print["job_title_arabic"].'</i></h6>
                                        <br>
                                        <h6>نبذة: <i>'.$print["brief_arabic"].'</i></h6>
                                        <br>
                                        <h6>التاريخ: <i>'.$print["start_date"].' - '.$print["end_date"].'</i></h6>
                                    </div>

                                    <div class="col" dir="ltr">
                                        <br>
                                        <h6>Issuer: <i>F'.$print["issuer_english"].'</i></h6>
                                        <br>
                                        <h6>Job title: <i>'.$print["job_title_english"].'</i></h6>
                                        <br>
                                        <h6>Brief: <i>'.$print["brief_english"].'</i></h6>
                                        <br>
                                        <h6>Date: <i>'.$print["end_date"].' - '.$print["start_date"].'</i></h6>
                                    </div>
                                </div>
                                <hr>
                            ';
                        }
                }
        ?>
        <?php require_once 'footer.php'; ?>
    </body>
</html>