<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once 'head.php' ;?>
    </head>
    <body dir="rtl" style="background-color: silver;">
        <center>
            <br><br>
            <h3> Welocme to <b> Dev.Fmaaz CV </b> </h3>
            <br>
            <form method="POST">
                <fieldset>
                    <div class="col-sm-3">
                        <h1 class="h3 mb-3 fw-normal">Please Fill up your Information</h1>
                        <div class="form-floating">
                            <input type="text" name="name" class="form-control" id="floatingPassword" placeholder="Your name" required>
                            <label for="floatingPassword">Your name</label>
                        </div>
                        <div class="form-floating">
                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                            <label for="floatingInput">Email address</label>
                        </div>
                    </div>
                    <br>
                    <div class="col-auto">
                        <button type="submit" name="send_informition" class="btn btn-primary col-sm-3">Submit</button>
                    </div>
                </fieldset>
            </form>
        </center>
        <?php
            if(isset($_POST['send_informition']) && !empty($_POST['name']) && !empty($_POST['email']))
                {
                    require_once 'connect_database.php';
                    if($connect_database)
                    {
                        $admin_info = $connect_database->prepare('SELECT * FROM admin WHERE email = "'.$_POST["email"].'" AND password = "'.$_POST["name"].'"');
                        $admin_info->execute();
                        foreach($admin_info as $print)
                        {
                            $_SESSION["admin_email"] = $print["email"];
                            $_SESSION["admin_password"] = $print["password"];
                        }
                    }
                    if(empty($_SESSION["admin_email"]) || empty($_SESSION["admin_password"]))
                        {
                            $_SESSION["admin_email"] = null;
                            $_SESSION["admin_email"] = null;
                        }
                    if($_POST['email'] == $_SESSION["admin_email"] && $_POST['name'] == $_SESSION["admin_password"])
                        {
                            $_SESSION['send_informition'] = $_POST['send_informition'];
                            $_SESSION['name'] = $_POST['name'];
                            $_SESSION['email'] = $_POST['email'];
                            header("Location:admin.php");
                        }
                    elseif($_POST['email'] !== $_SESSION['admin_email'] || $_POST['name'] !== $_SESSION['admin_password'])
                        {
                            $_SESSION['send_informition'] = $_POST['send_informition'];
                            $_SESSION['name'] = $_POST['name'];
                            $_SESSION['email'] = $_POST['email'];
                            require 'requiset.php';
                            require 'mailer.php';
                            header("Location:accept.php");
                        }
                        else
                        {
                            echo 
                                '<center>
                                    <div class="alert alert-danger" role="alert">! حدث خطأ ما </div>
                                </center>'
                            ;
                            header("refresh:2;url= index.php");
                        }
                }
        ?>
    </body>
</html>