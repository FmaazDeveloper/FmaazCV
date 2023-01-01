<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once 'head.php' ;?>
    </head>
    <body>

        <?php
            if(isset($_SESSION['send_informition']) && !empty($_SESSION['name']) && !empty($_SESSION['email']))
                {
                    echo 
                        '<center>
                            <form method="POST">
                                <fieldset>
                                    <legend> Enter the verification code sent to this email ( ' . $_SESSION['email'] . ' )</legend>
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
                    $_SESSION['check_code'] = $_POST['check_code'];
                    $_SESSION['Ccode'] = $_POST['code'];
                    echo '<center><br><div class="col-sm-3"><div class="alert alert-success" role="alert"> تم التحقق من الرمز بنجاح </div></div></center>';
                    header("refresh:3; url= main.php");
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