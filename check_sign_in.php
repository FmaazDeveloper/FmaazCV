<?php
    if(isset($_SESSION['send_informition']) && !empty($_SESSION['name']) && !empty($_SESSION['email']))
        {
            // if($_SESSION['email'] == "FmaazDeveloper@gmail.com" && $_SESSION['name'] == "mohammad@2004")
            //     {
            //     }
            // elseif(!empty($_SESSION['Ccode']) && $_SESSION['code'] == $_SESSION['Ccode'] && isset($_SESSION['check_code']))
            //     {
            //     }
        }
        else
            {
                session_unset();
                echo '<center><div class="alert alert-danger" role="alert"> ! دخول غير مصرح به </div></center>';
                header("refresh:2;url= index.php");
                exit;
            }
?>