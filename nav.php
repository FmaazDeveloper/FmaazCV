<?php 
ob_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-#e3f2fd" style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <a class="navbar-brand" href="main.php">Dev.FMAAZ CV</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" style="color: black;" href="Education.php">Education | التعليم</a>
                </li>
                _
                <li class="nav-item">
                    <a class="nav-link" style="color: black;" href="Experience.php">Experience | الخبرات</a>
                </li>
                _
                <li class="nav-item">
                    <a class="nav-link" style="color: black;" href="Courses.php">Courses | الدورات</a>
                </li>
                _
                <li class="nav-item">
                    <a class="nav-link" style="color: black;" href="Projects.php">Projects | المشاريع</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: blue;" href="CV/FMAAZ CV.pdf" target="_blank">CV PDF</a>
                </li>
                
                    <?php 
                        require_once 'connect_database.php';
                        if($connect_database)
                        {
                            $select_visitors_count = $connect_database->prepare('SELECT SUM(visitors_count) visitors_count FROM visitors_count');
                            $select_visitors_count->execute();

                            foreach($select_visitors_count as $print)
                            $_SESSION["select_visitors_count"] = $print["visitors_count"];

                            if(empty($_SESSION["select_visitors_count"]))
                            $_SESSION["select_visitors_count"] = 0;

                        }
                        echo '
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <li class="nav-item"><a class="nav-link">Number of Visitors ('.$_SESSION["select_visitors_count"].') عدد الزوار</a></li>
                        '; 

                    if($_SESSION['email'] == $_SESSION["admin_email"] && $_SESSION['name'] == $_SESSION["admin_password"])
                    {
                        echo 
                            '
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <li class="nav-item" dir="rtl">
                                    <b><a class="nav-link" style="color: red;" href="admin.php">Admin page</a></b>
                                </li>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <li class="nav-item" dir="rtl">
                                '; 
                                ?>
                                <form method="POST">
                                    <button type="submit" name="log_out" class="btn btn-danger">Log out</button>
                                </form>
                                <?php
                                echo'
                                </li>
                            ';
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>
<?php
    if(isset($_POST["log_out"]))
        {
            session_unset();
            echo 
                '<center>
                    <div class="alert alert-success" role="alert">تم تسجيل الخروج بنجاح</div>
                </center>'
            ;
            header("refresh:2;url= index.php");
            exit;
        }
        ob_end_flush();
?>