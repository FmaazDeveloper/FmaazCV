<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once 'head.php' ;?>
    </head>
    <body >
        <?php
            require_once 'check_sign_in.php' ;
            require_once 'nav.php';
            echo 
            '
                <center>
                    <br><h4>Welcome <i><b>'.$_SESSION["name"].'</b></i></h4><br>
                </center>
            ';
        ?>
        <center>
            <br>
            <a href="Education.php"><img src="education.jpg" width="30%" height="50%"></a>
            <br><br><br>
            <a href="Experience.php"><img src="x.jpg" width="50%" height="75%"></a>
            <br><br><br>
            <a href="Courses.php"><img src="x.jpg" width="50%" height="75%"></a>
            <br><br><br>
            <a href="Hobbies.php"><img src="x.jpg" width="50%" height="75%"></a>
            <br><br><br>
            
        </center>
        <?php require_once 'footer.php'; ?>
</body>
</html>
