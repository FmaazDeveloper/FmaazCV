<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once 'head.php' ;?>
    </head>
    <body >
        <?php
            require_once 'check_sign_in.php' ;
            require_once 'nav.php';
            echo '<br><br><center><img src="images/Personal/Picture1.jpg" style="border-radius: 75%; border:2px solid black"></center><br><br>';

            if($connect_database)
                {
                    $select_general_brief_info = $connect_database->prepare('SELECT * FROM general_brief');
                    $select_general_brief_info->execute();

                        if($select_general_brief_info->rowCount() == 0)
                            echo '<br><br><br><br><br>';

                    foreach($select_general_brief_info as $print)
                        {
                            echo
                            '
                            <center>
                            <div class="container" style="border: 2px solid black; border-radius: 15px; dir="rtl"">
                                <div class="row" dir="rtl">

                                    <div class="col" dir="rtl">
                                        <br>
                                        <h6><b>النبذة العامة</b><br> '.$print["brief_arabic"].'</h6>
                                    </div>

                                    <div class="col">
                                        |<br>|<br>|<br>|<br>|<br>|<br>|<br>|
                                    </div>

                                    <div class="col" dir="lrt">
                                        <br>
                                        <h6><b>General brief</b><br> '.$print["brief_english"].'</h6>
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
