<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once 'head.php' ;?>
        <?php require_once 'connect_database.php' ;?>
    </head>
    <body>

        <?php
            if(isset($_SESSION['send_informition']) && !empty($_SESSION['name']) && !empty($_SESSION['email']))
                {
                    echo 
                        '<center>
                            <form method="POST">
                                <fieldset>
                                    <legend> Enter the verification code sent to this email ( '.$_SESSION['email'].' )</legend>
                                    <div class="col-sm-3">
                                        <input type="number" name="code" class="form-control" id="code" placeholder="Enter verification code" required>
                                    </div>
                                    </div>
                                    <br>
                                    <div class="col-auto">
                                        <button type="submit" name="check_code" class="btn btn-primary">Check Code</button>
                                    </div>
                                </fieldset>
                            </form>
                        </center>';
                }
            else
                {
                    session_unset();
                    echo '<center><div class="alert alert-danger" role="alert"> ! دخول غير مصرح به </div></center>';
                    header("refresh:2;url= index.php");
                    exit;
                }

            if(!empty($_POST['code']) && $_SESSION['code'] == $_POST['code'] && isset($_POST['check_code']))
                {
                    //Visitors count
                    if($connect_database)
                    {
                        //Count date
                        $select_count_date = $connect_database->prepare('SELECT MAX(count_date) count_date FROM visitors_count');
                        $select_count_date->execute();

                        foreach($select_count_date as $print)
                            $_SESSION["count_date"] = $print["count_date"];

                        if(empty($_SESSION["count_date"]))
                            $_SESSION["count_date"] = "0000/00/00";

                        //Visitors count
                        $select_visitors_count = $connect_database->prepare('SELECT visitors_count FROM visitors_count WHERE count_date = "'.$_SESSION["count_date"].'"');
                        $select_visitors_count->execute();
    
                        foreach($select_visitors_count as $print)
                            $_SESSION["visitors_count"] = $print["visitors_count"];

                            if(empty($_SESSION["visitors_count"]))
                                $_SESSION["visitors_count"] = 1;
                            elseif(!empty($_SESSION["visitors_count"]))
                                $_SESSION["visitors_count"]++;

                        if($_SESSION["count_date"] == $date)
                        {
                            if($_SESSION["visitors_count"] == 1)
                            {
                                $insert_visitors_count = $connect_database->prepare
                                ('
                                INSERT INTO visitors_count VALUES ( '.$_SESSION["visitors_count"].' , "'.$date.'" , "'.$time.'" )
                                ');
                                if($insert_visitors_count->execute())
                                {
                                    $_SESSION['check_code'] = $_POST['check_code'];
                                    $_SESSION['Ccode'] = $_POST['code'];
                                    echo '<center><br><div class="col-sm-3"><div class="alert alert-success" role="alert"> تم التحقق من الرمز بنجاح </div></div></center>';
                                   header("refresh:3; url= main.php");
                                }
                                else
                                {
                                    echo '<center><br><div class="col-sm-3"><div class="alert alert-danger" role="alert">! حدث خطأ ما</div></div></center>';
                                }
                            }
                            elseif($_SESSION["visitors_count"] > 1)
                            {
                                $update_visitors_count = $connect_database->prepare
                                ('
                                UPDATE visitors_count SET visitors_count = '.$_SESSION["visitors_count"].' WHERE count_date = "'.$date.'"
                                ');
                                if($update_visitors_count->execute())
                                {
                                    $_SESSION['check_code'] = $_POST['check_code'];
                                    $_SESSION['Ccode'] = $_POST['code'];
                                    echo '<center><br><div class="col-sm-3"><div class="alert alert-success" role="alert"> تم التحقق من الرمز بنجاح </div></div></center>';
                                   header("refresh:3; url= main.php");
                                }
                                else
                                {
                                    echo '<center><br><div class="col-sm-3"><div class="alert alert-danger" role="alert">! حدث خطأ ما</div></div></center>';
                                }
                            }
                        }
                        elseif($_SESSION["count_date"] !== $date)
                        {
                            if($_SESSION["visitors_count"] == 1)
                            {
                                $insert_visitors_count = $connect_database->prepare
                                ('
                                INSERT INTO visitors_count VALUES ( '.$_SESSION["visitors_count"].' , "'.$date.'" , "'.$time.'" )
                                ');
                                if($insert_visitors_count->execute())
                                {
                                    $_SESSION['check_code'] = $_POST['check_code'];
                                    $_SESSION['Ccode'] = $_POST['code'];
                                    echo '<center><br><div class="col-sm-3"><div class="alert alert-success" role="alert"> تم التحقق من الرمز بنجاح </div></div></center>';
                                   header("refresh:3; url= main.php");
                                }
                                else
                                {
                                    echo '<center><br><div class="col-sm-3"><div class="alert alert-danger" role="alert">! حدث خطأ ما</div></div></center>';
                                }
                            }
                            elseif($_SESSION["visitors_count"] > 1)
                            {
                                $update_visitors_count = $connect_database->prepare
                                ('
                                UPDATE visitors_count SET visitors_count = '.$_SESSION["visitors_count"].' WHERE count_date = "'.$date.'"
                                ');
                                if($update_visitors_count->execute())
                                {
                                    $_SESSION['check_code'] = $_POST['check_code'];
                                    $_SESSION['Ccode'] = $_POST['code'];
                                    echo '<center><br><div class="col-sm-3"><div class="alert alert-success" role="alert">444 تم التحقق من الرمز بنجاح </div></div></center>';
                                   header("refresh:3; url= main.php");
                                }
                                else
                                {
                                    echo '<center><br><div class="col-sm-3"><div class="alert alert-danger" role="alert">! حدث خطأ ما</div></div></center>';
                                }
                            }
                        }
                    }

                }
            elseif (!empty($_POST['code']) && $_SESSION['code'] != $_POST['code'])
                    echo '<center><br><div class="col-sm-3"><div class="alert alert-danger" role="alert"> الرمز المدخل غير صحيح </div></div></center>';
        ?>
        <style>
            input::-webkit-inner-spin-button,
            input::-webkit-outer-spin-button 
            {
                -webkit-appearance: none;
            }
        </style>
    </body>
</html>