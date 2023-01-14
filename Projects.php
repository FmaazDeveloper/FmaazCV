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
                                        <a href="'.$print["url"].'/index.php" target="_blank"><h3>'.$print["name_english"].'</h3></a>
                                        </div>
                                    </div>
                                    <div class="row" dir="rtl">
                                        <div class="col" dir="rtl">
                                            <br>
                                            <h6>اسم المشروع: <i>'.$print["name_arabic"].'</i></h6>
                                            <br>
                                            <h6>نبذة عن المشروع: <i>'.$print["brief_arabic"].'</i></h6>
                                            <br>
                                            <h6>تاريخ الإنتهاء: <i>'.$print["end_date"].'</i></h6>
                                        </div>

                                        <div class="col">
                                            |<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|
                                        </div>

                                        <div class="col" dir="ltr">
                                            <br>
                                            <h6>Project name: <i>'.$print["name_english"].'</i></h6>
                                            <br>
                                            <h6>Project brief: <i>'.$print["brief_english"].'</i></h6>
                                            <br>
                                            <h6>End date: <i>'.$print["end_date"].'</i></h6>
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