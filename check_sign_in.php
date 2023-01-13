<?php
    if(isset($_SESSION['send_informition']) && !empty($_SESSION['name']) && !empty($_SESSION['email']))
        {
            if(!empty($_SESSION['Ccode']))
                {
                    if($_SESSION['Ccode'] == $_SESSION['code'])
                    {
                    }
                    else
                    {
                        session_unset();
                        echo '<center><div class="alert alert-danger" role="alert"> ! دخول غير مصرح به </div></center>';
                        header("refresh:2;url= index.php");
                        exit;
                    }
                }
                elseif($_SESSION['email'] == $_SESSION["admin_email"] && $_SESSION['name'] == $_SESSION["admin_password"])
                {
                    require_once 'nav.php';
                }

            else
                {
                    session_unset();
                    echo '<center><div class="alert alert-danger" role="alert"> ! دخول غير مصرح به </div></center>';
                    header("refresh:2;url= index.php");
                    exit;
                }
        }
        else
            {
                session_unset();
                echo '<center><div class="alert alert-danger" role="alert"> ! دخول غير مصرح به </div></center>';
                header("refresh:2;url= index.php");
                exit;
            }
?>