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
            <br><h3>Projects | المشاريع</h3><br>
        </center>
        
        <?php
            if($connect_database)
                {
                    $select_project_info = $connect_database->prepare('SELECT * FROM projects');
                    $select_project_info->execute();

                    echo '<center><h5>'.$select_project_info->rowCount().' : عدد المشاريع</h5></center><br>';

                    if($select_project_info->rowCount() == 0)
                        echo '<br><br><br><br><br>';

                    foreach($select_project_info as $print)
                        {
                            echo
                            '
                                <center>
                                <div class="container" style="border: 2px solid black; border-radius: 15px; dir="rtl"">
                                    <div class="row">
                                        <div class="col">
                                        <a href="'.$print["url"].'" target="_blank"><h3>'.$print["name_english"].'</h3></a>
                                        </div>
                                    </div>
                                    <div class="row" dir="rtl">
                                        <div class="col" dir="rtl">
                                            <br>
                                            <h6><b>اسم المشروع</b><br> '.$print["name_arabic"].'</h6>
                                            <br>
                                            <h6><b>نبذة عن المشروع</b><br> '.$print["brief_arabic"].'</h6>
                                            <br>
                                            <h6><b>تاريخ الإنتهاء</b><br> '.$print["end_date"].'</h6>
                                        </div>

                                        <div class="col">
                                            |<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|
                                        </div>

                                        <div class="col" dir="ltr">
                                            <br>
                                            <h6><b>Project name</b><br> '.$print["name_english"].'</h6>
                                            <br>
                                            <h6><b>Project brief</b><br> '.$print["brief_english"].'</h6>
                                            <br>
                                            <h6><b>End date</b><br> '.$print["end_date"].'</h6>
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