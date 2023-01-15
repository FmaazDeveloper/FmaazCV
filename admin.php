<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            require_once 'head.php'; 
            require_once 'check_sign_in.php';
            require_once 'connect_database.php';
        ?>
    </head>
    <body>
        
        <?php
            if($_SESSION['email'] == $_SESSION["admin_email"] && $_SESSION['name'] == $_SESSION["admin_password"])
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
        ?>
        <br>
        <form method="POST">
            <div dir="rtl">
                <div class="row m-2">
                    <div class="dropdown" dir="rtl">
                        <select class="col-sm-3" name="type" aria-label=".form-select-sm example" dir="rtl" required>
                            <option selected value="" disabled>اختر نوع الإدخال | Choose input type</option>
                            <option value="education">التعليم | Education</option>
                            <option value="experience">الخبرات | Experience</option>
                            <option value="courses">الدورات | Courses</option>
                            <option value="projects">المشاريع | Projects</option>
                            <option value="general_brief">النبذة العامة | General brief</option>
                        </select>
                    </div>
                </div>
                <div class="row m-3">
                    <input type="submit" name="insert" class="btn btn-primary col-sm-3" value="Insert">
                </div>
                <div class="row m-3">
                    <input type="submit" name="update" class="btn btn-success col-sm-3" value="Update">
                </div>
                <div class="row m-3">
                    <input type="submit" name="delete" class="btn btn-danger col-sm-3" value="Delete">
                </div>
            </div>
        </form>
        <?php

            if(!empty($_POST["type"]))
                {
                    switch($_POST["type"])
                        {
                            case "education" :
                                $_SESSION["input_type"] = "Education | التعليم";
                                break;
                            case "experience" :
                                $_SESSION["input_type"] = "Experience | الخبرات";
                                break;
                            case "courses" :
                                $_SESSION["input_type"] = "Courses | الدورات";
                                break;
                            case "projects" :
                                $_SESSION["input_type"] = "Projects | المشاريع";
                                break;
                            case "general_brief" :
                                $_SESSION["input_type"] = "General brief | النبذة العامة";
                                break;
                            default : 
                                $_SESSION["input_type"] = "";
                        }
                    $_SESSION["type"] = $_POST["type"];
                }
                
            if(isset($_POST["insert"]))
                $_SESSION["submit_type"] = $_POST["insert"];
            elseif(isset($_POST["update"]))
                $_SESSION["submit_type"] = $_POST["update"];
            elseif(isset($_POST["delete"]))
                $_SESSION["submit_type"] = $_POST["delete"];
            elseif(empty($_SESSION["submit_type"]))
                $_SESSION["submit_type"] = "";

            //Eduction - Insert
            if($_SESSION["submit_type"] == "Insert" && $_SESSION["type"] == "education")
                {
                    ?>
                        <div class="row m-3" dir="ltr">
                            <div class="col">
                                <center><h5><?php echo $_SESSION["input_type"]; ?></h5></center>
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-sm-8 col-md-8 col-lg-5">
                                            <div class="signup-form">
                                                <form method="POST" class="mt-6 border p-4 bg-light shadow">
                                                    <center><h4>عربي</h4></center>
                                                    <div class="form-floating">
                                                        <input type="text" name="education_issuer_arabic" maxlength="50" class="form-control" id="floatingPassword" placeholder="الجهة">
                                                        <label for="floatingPassword">الجهة</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input type="text" name="education_major_arabic" maxlength="50" class="form-control" id="floatingPassword" placeholder="التخصص">
                                                        <label for="floatingPassword">التخصص</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <div class="dropdown">
                                                            <select name="education_level_arabic" aria-label=".form-select-sm example" class="form-control" dir="ltr">
                                                                <option selected value="" disabled>المستوى التعليمي</option>
                                                                <option value="الثانوية العامة">الثانوية العامة</option>
                                                                <option value="دبلوم">دبلوم</option>
                                                                <option value="بكالريوس">بكالريوس</option>
                                                                <option value="ماجستير">ماجستير</option>
                                                                <option value="دكتوراه">دكتوراه</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <center><h4>English</h4></center>
                                                    <div class="form-floating">
                                                        <input type="text" name="education_issuer_english" maxlength="50" class="form-control" id="Issuer" placeholder="Issuer">
                                                        <label for="Issuer">Issuer</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input type="text" name="education_major_english" maxlength="50" class="form-control" id="Major" placeholder="Major">
                                                        <label for="Major">Major</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <div class="dropdown" dir="ltr">
                                                            <select name="education_level_english" aria-label=".form-select-sm example" class="form-control" dir="ltr">
                                                                <option selected value="" disabled>Educational level</option>
                                                                <option value="High school">High school</option>
                                                                <option value="Diploma">Diploma</option>
                                                                <option value="Baccalaureus">Baccalaureus</option>
                                                                <option value="Master">Master</option>
                                                                <option value="PhD">PhD</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                <center><h4>English | عربي</h4></center>
                                                <div class="form-floating">
                                                    <div class="input-group mb-3">
                                                        <select name="education_average_from" aria-label=".form-select-sm example" class="form-control" dir="ltr" required>
                                                            <option selected value="" disabled>Average from | المعدل من</option>
                                                            <option value="4.00">4.00</option>
                                                            <option value="5.00">5.00</option>
                                                            <option value="100.00">100.00</option>
                                                        </select>
                                                        <input type="number" name="education_average" step="0.01" class="form-control" min="0" max="100" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                </div>
                                                <div class="form-floating">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="Start date | تاريخ البداية" disabled>
                                                        <input type="date" name="education_start_date" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="End date | تاريخ النهاية" disabled>
                                                        <input type="date" name="education_end_date" max="<?php echo $date; ?>" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                </div>
                                                <div class="row m-3">
                                                    <input type="submit" name="education_insert_info" class="btn btn-primary" value="Insert info">
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <br>
                    <?php
                        if(!empty($_POST["education_issuer_arabic"]) && !empty($_POST["education_major_arabic"]) && !empty($_POST["education_level_arabic"]) &&
                        !empty($_POST["education_issuer_english"]) && !empty($_POST["education_major_english"]) && !empty($_POST["education_level_english"]) &&
                        !empty($_POST["education_average"]) &&!empty($_POST["education_average_from"]) &&
                        !empty($_POST["education_start_date"]) && !empty($_POST["education_end_date"]))
                        {
                            if(isset($_POST["education_insert_info"]) && ($_POST["education_average"] <= $_POST["education_average_from"]) &&
                            ($_POST["education_average"] >= ($_POST["education_average_from"]*0.7)) && ((($_POST["education_level_arabic"] == 'الثانوية العامة') &&
                            ($_POST["education_level_english"] == 'High school')) || (($_POST["education_level_arabic"] == 'دبلوم') && ($_POST["education_level_english"] == 'Diploma')) ||
                            (($_POST["education_level_arabic"] == 'بكالريوس') && ($_POST["education_level_english"] == 'Baccalaureus')) ||
                            (($_POST["education_level_arabic"] == 'ماجستير') && ($_POST["education_level_english"] == 'Master')) ||
                            (($_POST["education_level_arabic"] == 'دكتوراه') && ($_POST["education_level_english"] == 'PhD'))) &&
                            (((($_POST["education_average_from"] == 100) && ($_POST["education_level_arabic"] == 'الثانوية العامة')) || 
                            (($_POST["education_average_from"] != 100) && ($_POST["education_level_arabic"] != 'الثانوية العامة')))) &&
                            ($_POST["education_start_date"] < ($_POST["education_end_date"])))
                                {
                                    if($connect_database)
                                        {
                                            $select_education_id = $connect_database->prepare('SELECT MAX(education_ID) ID FROM education');
                                            $select_education_id->execute();

                                            foreach($select_education_id as $print)
                                                $_SESSION["education_ID"] = $print["ID"];
                                            if(empty($print["ID"]))
                                                $_SESSION["education_ID"] = 1;
                                            elseif(!empty($print["ID"]))
                                                $_SESSION["education_ID"] ++;

                                            $insert_education_info = $connect_database->prepare
                                            ('
                                                INSERT INTO education VALUES
                                                (
                                                    '.$_SESSION["education_ID"].' , "'.$_POST["education_issuer_arabic"].'" , "'.$_POST["education_major_arabic"].'" ,
                                                    "'.$_POST["education_level_arabic"].'" , "'.$_POST["education_issuer_english"].'" , "'.$_POST["education_major_english"].'" ,
                                                    "'.$_POST["education_level_english"].'" , '.$_POST["education_average"].' , '.$_POST["education_average_from"].' ,
                                                    "'.$_POST["education_start_date"].'" , "'.$_POST["education_end_date"].'"
                                                )
                                            ');
                                            if($insert_education_info->execute())
                                                {
                                                    $_SESSION["submit_type"] = null;
                                                    $_SESSION["type"] = null;
                                                    echo '
                                                        <center>
                                                            <div class="row align-items-center justify-content-center">
                                                                <div class="col-sm-8 col-md-8 col-lg-5">
                                                                    <div class="alert alert-success" role="alert">تم إضافة بيانات التعليم بنجاح</div>
                                                                </div>
                                                            </div>
                                                        </center>
                                                    ';
                                                    header("refresh:2;url= admin.php");
                                                }
                                            else
                                                {
                                                    echo '
                                                        <center>
                                                            <div class="row align-items-center justify-content-center">
                                                                <div class="col-sm-8 col-md-8 col-lg-5">
                                                                    <div class="alert alert-danger" role="alert">! حدث خطأ ما </div>
                                                                </div>
                                                            </div>
                                                        </center>
                                                    ';
                                                    header("refresh:2;url= admin.php");
                                                }
                                        }
                                    echo '</div></div></div><br>';
                                }
                                elseif(($_POST["education_level_arabic"] == 'الثانوية العامة') && ($_POST["education_level_english"] != 'High school'))
                                echo '
                                    <center>
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-sm-8 col-md-8 col-lg-5">
                                                <div class="alert alert-danger" role="alert">! المستوى التعليمي المدخل غير متطابق</div>
                                            </div>
                                        </div>
                                    </center>
                                ';
                                elseif(($_POST["education_level_arabic"] == 'دبلوم') && ($_POST["education_level_english"] != 'Diploma'))
                                echo '
                                    <center>
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-sm-8 col-md-8 col-lg-5">
                                                <div class="alert alert-danger" role="alert">! المستوى التعليمي المدخل غير متطابق</div>
                                            </div>
                                        </div>
                                    </center>
                                ';
                                elseif(($_POST["education_level_arabic"] == 'بكالرويس') && ($_POST["education_level_english"] != 'Baccalaureus'))
                                echo '
                                    <center>
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-sm-8 col-md-8 col-lg-5">
                                                <div class="alert alert-danger" role="alert">! المستوى التعليمي المدخل غير متطابق</div>
                                            </div>
                                        </div>
                                    </center>
                                ';
                                elseif(($_POST["education_level_arabic"] == 'ماجستير') && ($_POST["education_level_english"] != 'Master'))
                                echo '
                                    <center>
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-sm-8 col-md-8 col-lg-5">
                                                <div class="alert alert-danger" role="alert">! المستوى التعليمي المدخل غير متطابق</div>
                                            </div>
                                        </div>
                                    </center>
                                ';
                                elseif(($_POST["education_level_arabic"] == 'دكتوراه') && ($_POST["education_level_english"] != 'PhD'))
                                echo '
                                    <center>
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-sm-8 col-md-8 col-lg-5">
                                                <div class="alert alert-danger" role="alert">! المستوى التعليمي المدخل غير متطابق</div>
                                            </div>
                                        </div>
                                    </center>
                                ';
                                elseif(($_POST["education_average_from"] == 100) && ($_POST["education_level_arabic"] != 'الثانوية العامة'))
                                echo '
                                    <center>
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-sm-8 col-md-8 col-lg-5">
                                                <div class="alert alert-danger" role="alert">! المعدل من" المدخل يجب أن يساوي 4.00 أو 5.00"</div>
                                            </div>
                                        </div>
                                    </center>
                                ';
                                elseif(($_POST["education_average_from"] == 4.00) || ($_POST["education_average_from"] == 5.00) && ($_POST["education_level_arabic"] == 'الثانوية العامة'))
                                echo '
                                    <center>
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-sm-8 col-md-8 col-lg-5">
                                                <div class="alert alert-danger" role="alert">! المعدل من" المدخل يجب أن يساوي 100"</div>
                                            </div>
                                        </div>
                                    </center>
                                ';        
                                elseif(($_POST["education_average"] > $_POST["education_average_from"]))
                                echo '
                                    <center>
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-sm-8 col-md-8 col-lg-5">
                                                <div class="alert alert-danger" role="alert">! المعدل المدخل أكبر من '.$_POST["education_average_from"].'</div>
                                            </div>
                                        </div>
                                    </center>
                                '; 
                                elseif(($_POST["education_average"] < ($_POST["education_average_from"]*0.7)))
                                echo '
                                    <center>
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-sm-8 col-md-8 col-lg-5">
                                                <div class="alert alert-danger" role="alert">! المعدل المدخل أقل من '.$_POST["education_average_from"]*0.7.'</div>
                                            </div>
                                        </div>
                                    </center>
                                ';         
                                elseif(($_POST["education_start_date"] >= ($_POST["education_end_date"])))
                                echo '
                                    <center>
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-sm-8 col-md-8 col-lg-5">
                                                <div class="alert alert-danger" role="alert">! يجب أن يكون تاريخ البداية أقل من تاريخ النهاية</div>
                                            </div>
                                        </div>
                                    </center>
                                ';         
                        }
                }
            //Expriance - Insert
            elseif($_SESSION["submit_type"] == "Insert" && $_SESSION["type"] == "experience")
                {
                    ?>
                        <div class="row m-3" dir="ltr">
                            <div class="col">
                                <center><h5><?php echo $_SESSION["input_type"]; ?></h5></center>
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-sm-8 col-md-8 col-lg-5">
                                            <div class="signup-form">
                                                <form method="POST" class="mt-6 border p-4 bg-light shadow">
                                                    <center><h4>عربي</h4></center>
                                                    <div class="form-floating">
                                                        <input type="text" maxlength="50" name="experience_issuer_arabic" maxlength="50" class="form-control" id="floatingPassword" placeholder="الجهة" required>
                                                        <label for="floatingPassword">الجهة</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input type="text" maxlength="50" name="experience_job_title_arabic" maxlength="50" class="form-control" id="floatingPassword" placeholder=">المسمى الوظيفي" required>
                                                        <label for="floatingPassword">المسمى الوظيفي</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" maxlength="500" name="experience_brief_arabic" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                        <label for="floatingTextarea">نبذة عن الخبرة</label>
                                                    </div>

                                                    <center><h4>English</h4></center>
                                                    <div class="form-floating">
                                                        <input type="text" name="experience_issuer_english" maxlength="50" class="form-control" id="floatingPassword" placeholder="Issuer" required>
                                                        <label for="floatingPassword">Issuer</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input type="text" name="experience_job_title_english" maxlength="50" class="form-control" id="floatingPassword" placeholder="Job title" required>
                                                        <label for="floatingPassword">Job title</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" maxlength="500" name="experience_brief_english" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                        <label for="floatingTextarea">Experience brief</label>
                                                    </div>

                                                <center><h4>English | عربي</h4></center>
                                                <div class="form-floating">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="Start date | تاريخ البداية" disabled>
                                                        <input type="date" name="experience_start_date" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="End date | تاريخ النهاية" disabled>
                                                        <input type="date" name="experience_end_date" max="<?php echo $date; ?>" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                </div>
                                                <div class="row m-3">
                                                    <input type="submit" name="experience_insert_info" class="btn btn-primary" value="Insert info">
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <br>
                    <?php
                        if(!empty($_POST["experience_issuer_arabic"]) && !empty($_POST["experience_job_title_arabic"]) && !empty($_POST["experience_brief_arabic"]) &&
                        !empty($_POST["experience_issuer_english"]) && !empty($_POST["experience_job_title_english"]) && !empty($_POST["experience_brief_english"]) &&
                        !empty($_POST["experience_start_date"]) && !empty($_POST["experience_end_date"]))
                        {
                            if(isset($_POST["experience_insert_info"]) && ($_POST["experience_start_date"] < ($_POST["experience_end_date"])))
                                {
                                    if($connect_database)
                                        {
                                            $select_experience_id = $connect_database->prepare('SELECT MAX(experience_ID) ID FROM experience');
                                            $select_experience_id->execute();

                                            foreach($select_experience_id as $print)
                                                $_SESSION["experience_ID"] = $print["ID"];
                                            if(empty($print["ID"]))
                                                $_SESSION["experience_ID"] = 1;
                                            elseif(!empty($print["ID"]))
                                                $_SESSION["experience_ID"] ++;

                                            $insert_experience_info = $connect_database->prepare
                                            ('
                                                INSERT INTO experience VALUES
                                                (
                                                    '.$_SESSION["experience_ID"].' , "'.$_POST["experience_issuer_arabic"].'" , "'.$_POST["experience_job_title_arabic"].'" ,
                                                    "'.$_POST["experience_brief_arabic"].'" , "'.$_POST["experience_issuer_english"].'" ,
                                                    "'.$_POST["experience_job_title_english"].'" , "'.$_POST["experience_brief_english"].'" ,
                                                    "'.$_POST["experience_start_date"].'" , "'.$_POST["experience_end_date"].'"
                                                )
                                            ');
                                            if($insert_experience_info->execute())
                                                {
                                                    $_SESSION["submit_type"] = null;
                                                    $_SESSION["type"] = null;
                                                    echo '
                                                        <center>
                                                            <div class="row align-items-center justify-content-center">
                                                                <div class="col-sm-8 col-md-8 col-lg-5">
                                                                    <div class="alert alert-success" role="alert">تم إضافة بيانات الخبرة بنجاح</div>
                                                                </div>
                                                            </div>
                                                        </center>
                                                    ';
                                                    header("refresh:2;url= admin.php");
                                                }
                                            else
                                                {
                                                    echo '
                                                        <center>
                                                            <div class="row align-items-center justify-content-center">
                                                                <div class="col-sm-8 col-md-8 col-lg-5">
                                                                <div class="alert alert-danger" role="alert">! حدث خطأ ما </div>
                                                                </div>
                                                            </div>
                                                        </center>
                                                    ';
                                                    header("refresh:2;url= admin.php");
                                                }
                                        }
                                    echo '</div></div></div><br>';
                                }
                                elseif(($_POST["experience_start_date"] >= ($_POST["experience_end_date"])))
                                echo '
                                    <center>
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-sm-8 col-md-8 col-lg-5">
                                                <div class="alert alert-danger" role="alert">! يجب أن يكون تاريخ البداية أقل من تاريخ النهاية</div>
                                            </div>
                                        </div>
                                    </center>
                                ';
                        }
                }
            //Courses - Insert
            elseif($_SESSION["submit_type"] == "Insert" && $_SESSION["type"] == "courses")
                {
                    ?>
                        <div class="row m-3" dir="ltr">
                            <div class="col">
                                <center><h5><?php echo $_SESSION["input_type"]; ?></h5></center>
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-sm-8 col-md-8 col-lg-5">
                                            <div class="signup-form">
                                                <form method="POST" class="mt-6 border p-4 bg-light shadow">
                                                    <center><h4>عربي</h4></center>
                                                    <div class="form-floating">
                                                        <input type="text" maxlength="50" name="courses_issuer_arabic" maxlength="50" class="form-control" id="floatingPassword" placeholder="الجهة" required>
                                                        <label for="floatingPassword">الجهة</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input type="text" maxlength="50" name="course_title_arabic" maxlength="50" class="form-control" id="floatingPassword" placeholder=">مسمى الدورة" required>
                                                        <label for="floatingPassword">مسمى الدورة</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" maxlength="500" name="courses_brief_arabic" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                        <label for="floatingTextarea">نبذة عن الدورة</label>
                                                    </div>
        
                                                    <center><h4>English</h4></center>
                                                    <div class="form-floating">
                                                        <input type="text" name="courses_issuer_english" maxlength="50" class="form-control" id="floatingPassword" placeholder="Issuer" required>
                                                        <label for="floatingPassword">Issuer</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input type="text" name="course_title_english" maxlength="50" class="form-control" id="floatingPassword" placeholder="Courses title" required>
                                                        <label for="floatingPassword">Courses title</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" maxlength="500" name="courses_brief_english" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                        <label for="floatingTextarea">Course brief</label>
                                                    </div>
        
                                                <center><h4>English | عربي</h4></center>
                                                <div class="form-floating">
                                                        <input type="number" name="courses_hours" max="99" class="form-control" id="floatingPassword" placeholder="Hours | الساعات" required>
                                                        <label for="floatingPassword">Hours | الساعات</label>
                                                    </div>
                                                    <br>
                                                <div class="form-floating">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="Start date | تاريخ البداية" disabled>
                                                        <input type="date" name="courses_start_date" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="End date | تاريخ النهاية" disabled>
                                                        <input type="date" name="courses_end_date" max="<?php echo $date; ?>" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                </div>
                                                <div class="row m-3">
                                                    <input type="submit" name="courses_insert_info" class="btn btn-primary" value="Insert info">
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <br>
                    <?php
                        if(!empty($_POST["courses_issuer_arabic"]) && !empty($_POST["course_title_arabic"]) && !empty($_POST["courses_brief_arabic"]) &&
                        !empty($_POST["courses_issuer_english"]) && !empty($_POST["course_title_english"]) && !empty($_POST["courses_brief_english"]) &&
                        !empty($_POST["courses_hours"]) && !empty($_POST["courses_start_date"]) && !empty($_POST["courses_end_date"]))
                            {
                                if(isset($_POST["courses_insert_info"]) && ($_POST["courses_start_date"] < ($_POST["courses_end_date"])))
                                    {
                                        if($connect_database)
                                            {
                                                $select_courses_id = $connect_database->prepare('SELECT MAX(course_ID) ID FROM courses');
                                                $select_courses_id->execute();

                                                foreach($select_courses_id as $print)
                                                    $_SESSION["course_ID"] = $print["ID"];
                                                if(empty($print["ID"]))
                                                    $_SESSION["course_ID"] = 1;
                                                elseif(!empty($print["ID"]))
                                                    $_SESSION["course_ID"] ++;
        
                                                $insert_courses_info = $connect_database->prepare
                                                ('
                                                    INSERT INTO courses VALUES
                                                    (
                                                        '.$_SESSION["course_ID"].' , "'.$_POST["courses_issuer_arabic"].'" , "'.$_POST["course_title_arabic"].'" ,
                                                        "'.$_POST["courses_brief_arabic"].'" , "'.$_POST["courses_issuer_english"].'" , "'.$_POST["course_title_english"].'" ,
                                                        "'.$_POST["courses_brief_english"].'" , '.$_POST["courses_hours"].' ,
                                                        "'.$_POST["courses_start_date"].'" , "'.$_POST["courses_end_date"].'"
                                                    )
                                                ');
                                                if($insert_courses_info->execute())
                                                    {
                                                        $_SESSION["submit_type"] = null;
                                                        $_SESSION["type"] = null;
                                                        echo '
                                                        <center>
                                                            <div class="row align-items-center justify-content-center">
                                                                <div class="col-sm-8 col-md-8 col-lg-5">
                                                                    <div class="alert alert-success" role="alert">تم إضافة بيانات الدورة بنجاح</div>
                                                                </div>
                                                            </div>
                                                        </center>
                                                        ';
                                                        header("refresh:2;url= admin.php");
                                                    }
                                                else
                                                    {
                                                        echo '
                                                        <center>
                                                            <div class="row align-items-center justify-content-center">
                                                                <div class="col-sm-8 col-md-8 col-lg-5">
                                                                    <div class="alert alert-danger" role="alert">! حدث خطأ ما </div>
                                                                </div>
                                                            </div>
                                                        </center>
                                                        ';
                                                        header("refresh:2;url= admin.php");
                                                    }
                                            }
                                        echo '</div></div></div><br>';
                                    }
                                    elseif(($_POST["courses_start_date"] >= ($_POST["courses_end_date"])))
                                    echo '
                                        <center>
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-sm-8 col-md-8 col-lg-5">
                                                    <div class="alert alert-danger" role="alert">! يجب أن يكون تاريخ البداية أقل من تاريخ النهاية</div>
                                                </div>
                                            </div>
                                        </center>
                                    ';
                            }
                }
            //Projects - Insert
            elseif($_SESSION["submit_type"] == "Insert" && $_SESSION["type"] == "projects")
                {
                    ?>
                        <div class="row m-3" dir="ltr">
                            <div class="col">
                                <center><h5><?php echo $_SESSION["input_type"]; ?></h5></center>
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                        <div class="signup-form">
                                            <form method="POST" class="mt-6 border p-4 bg-light shadow">

                                                <center><h4>عربي</h4></center>

                                                <div class="form-floating">
                                                    <input type="text" name="project_name_arabic" maxlength="50" class="form-control" id="floatingPassword" placeholder="اسم المشروع" required>
                                                    <label for="floatingPassword">اسم المشروع</label>
                                                </div>

                                                <div class="form-floating">
                                                        <textarea class="form-control" maxlength="1000" name="project_brief_arabic" placeholder="Leave a comment here" id="floatingTextarea" required></textarea>
                                                        <label for="floatingTextarea">نبذة عن المشروع</label>
                                                </div>

                                                <center><h4>English</h4></center>

                                                <div class="form-floating">
                                                    <input type="text" name="project_name_english" maxlength="50" class="form-control" id="Issuer" placeholder="Project name" required>
                                                    <label for="Issuer">Project name</label>
                                                </div>

                                                <div class="form-floating">
                                                        <textarea class="form-control" maxlength="1000" name="project_brief_english" placeholder="Leave a comment here" id="floatingTextarea" required></textarea>
                                                        <label for="floatingTextarea">Project brief</label>
                                                </div>

                                                <center><h4>English | عربي</h4></center>

                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="Project URL | رابط المشروع" disabled>
                                                    <input type="text" name="project_url" class="form-control" maxlength="200" aria-label="Text input with segmented dropdown button" required>
                                                </div>

                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="End date | تاريخ الانتهاء" disabled>
                                                    <input type="date" name="project_end_date" max="<?php echo $date; ?>" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                </div>

                                                <div class="row m-3">
                                                    <input type="submit" name="project_insert_info" class="btn btn-primary" value="Insert info">
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        if(!empty($_POST["project_name_arabic"]) && !empty($_POST["project_brief_arabic"]) && !empty($_POST["project_name_english"]) &&
                        !empty($_POST["project_brief_english"]) && !empty($_POST["project_url"]) && !empty($_POST["project_end_date"]))
                        {
                            if(isset($_POST["project_insert_info"]))
                            {
                                if($connect_database)
                                {
                                    $select_project_id = $connect_database->prepare('SELECT MAX(project_ID) ID FROM projects');
                                    $select_project_id->execute();

                                    foreach($select_project_id as $print)
                                        $_SESSION["project_ID"] = $print["ID"];
                                    if(empty($print["ID"]))
                                        $_SESSION["project_ID"] = 1;
                                    if(!empty($print["ID"]))
                                        $_SESSION["project_ID"]++;
                                    
                                    $insert_project_info = $connect_database->prepare
                                    ('
                                    INSERT INTO projects VALUES
                                    (
                                        '.$_SESSION["project_ID"].' , "'.$_POST["project_name_arabic"].'" , "'.$_POST["project_brief_arabic"].'" ,
                                        "'.$_POST["project_name_english"].'" , "'.$_POST["project_brief_english"].'" , "'.$_POST["project_url"].'" ,
                                        "'.$_POST["project_end_date"].'"
                                    )
                                    ');
                                    if($insert_project_info->execute())
                                    {
                                        $_SESSION["submit_type"] = null;
                                        $_SESSION["type"] = null;
                                        echo '
                                            <center>
                                                <div class="row align-items-center justify-content-center">
                                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                                        <div class="alert alert-success" role="alert">تم إضافة بيانات المشروع بنجاح</div>
                                                    </div>
                                                </div>
                                            </center>
                                        ';
                                        header("refresh:2;url= admin.php");
                                    }
                                    else
                                    {
                                        echo '
                                            <center>
                                                <div class="row align-items-center justify-content-center">
                                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                                        <div class="alert alert-danger" role="alert">! حدث خطأ ما </div>
                                                    </div>
                                                </div>
                                            </center>
                                        ';
                                        header("refresh:2;url= admin.php");
                                    }
                                }
                            }
                        }
                }
            //General brief - Insert
            elseif($_SESSION["submit_type"] == "Insert" && $_SESSION["type"] == "general_brief")
                {
                    ?>
                        <div class="row m-3" dir="ltr">
                            <div class="col">
                                <center><h5><?php echo $_SESSION["input_type"]; ?></h5></center>
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                        <div class="signup-form">
                                            <form method="POST" class="mt-6 border p-4 bg-light shadow">

                                                <center><h4>عربي</h4></center>

                                                <div class="form-floating">
                                                    <textarea class="form-control" maxlength="4000" name="general_brief_arabic" placeholder="Leave a comment here" id="floatingTextarea" required></textarea>
                                                    <label for="floatingTextarea">نبذة عامة</label>
                                                </div>

                                                <center><h4>English</h4></center>

                                                <div class="form-floating">
                                                    <textarea class="form-control" maxlength="4000" name="general_brief_english" placeholder="Leave a comment here" id="floatingTextarea" required></textarea>
                                                    <label for="floatingTextarea">General brief</label>
                                                </div>

                                                <div class="row m-3">
                                                    <input type="submit" name="general_brief_insert_info" class="btn btn-primary" value="Insert info">
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        if(!empty($_POST["general_brief_arabic"]) && !empty($_POST["general_brief_english"]))
                        {
                            if(isset($_POST["general_brief_insert_info"]))
                            {
                                if($connect_database)
                                {
                                    $select_general_brief_id = $connect_database->prepare('SELECT MAX(general_brief_ID) ID FROM general_brief');
                                    $select_general_brief_id->execute();

                                    foreach($select_general_brief_id as $print)
                                        $_SESSION["general_brief_ID"] = $print["ID"];
                                    if(empty($print["ID"]))
                                        $_SESSION["general_brief_ID"] = 1;
                                    if(!empty($print["ID"]))
                                        $_SESSION["general_brief_ID"]++;
                                    
                                    $insert_general_brief_info = $connect_database->prepare
                                    ('
                                    INSERT INTO general_brief VALUES
                                    (
                                        '.$_SESSION["general_brief_ID"].' , "'.$_POST["general_brief_arabic"].'" , "'.$_POST["general_brief_english"].'"
                                    )
                                    ');
                                    if($insert_general_brief_info->execute())
                                    {
                                        $_SESSION["submit_type"] = null;
                                        $_SESSION["type"] = null;
                                        echo '
                                            <center>
                                                <div class="row align-items-center justify-content-center">
                                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                                        <div class="alert alert-success" role="alert">تم إضافة بيانات النبذة العامة بنجاح</div>
                                                    </div>
                                                </div>
                                            </center>
                                        ';
                                        header("refresh:2;url= admin.php");
                                    }
                                    else
                                    {
                                        echo '
                                            <center>
                                                <div class="row align-items-center justify-content-center">
                                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                                        <div class="alert alert-danger" role="alert">! حدث خطأ ما </div>
                                                    </div>
                                                </div>
                                            </center>
                                        ';
                                        header("refresh:2;url= admin.php");
                                    }
                                }
                            }
                        }
                }

            //Eduction - Update
            elseif($_SESSION["submit_type"] == "Update" && $_SESSION["type"] == "education")
                {
                    ?>
                        <div class="row align-items-center justify-content-center">
                            <div class="col-sm-8 col-md-8 col-lg-5">
                                <center><h5><?php echo $_SESSION["input_type"]; ?></h5></center>
                                <div class="signup-form">
                                    <form method="POST" class="mt-6 border p-4 bg-light shadow" style="text-align: center;">
                                        <div class="form-floating">
                                            <div class="dropdown">
                                                <select name="update_education" aria-label=".form-select-sm example" class="form-control" dir="rtl" required>
                                                    <option selected value="" disabled>اختر الشهادة</option>
                                                    <?php
                                                        if($connect_database)
                                                        {
                                                            $select_education_id = $connect_database->prepare('SELECT * FROM education');
                                                            $select_education_id->execute();
                                                            
                                                            foreach($select_education_id as $print)
                                                            {
                                                                echo '<option value="'.$print["education_ID"].'">الجهة : '.$print["issuer_arabic"].' | التخصص : '.$print["major_arabic"].' | المرحله : '.$print["level_arabic"].'</option>';
                                                            }
                                                            
                                                        }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                        <div class="row m-3">
                                            <button type="submit" name="select_update_education" class="btn btn-success m-3"> Update </button>
                                        </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        <br>
                    <?php
                        if(isset($_POST["select_update_education"]))
                        {
                            $_SESSION["select_education_ID"] = $_POST["update_education"];
                            if(empty($_SESSION["select_education_ID"]))
                            $_SESSION["select_education_ID"] = 0;

                            $comfirm_education_id = $connect_database->prepare('SELECT * FROM education WHERE education_ID = '.$_SESSION["select_education_ID"].'');
                            $comfirm_education_id->execute();
                            
                            foreach($comfirm_education_id as $print)
                            {
                                ?>
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-sm-8 col-md-8 col-lg-5">
                                            <div class="signup-form">
                                                <form method="POST" class="mt-6 border p-4 bg-light shadow">
                                                    <center><h4>عربي</h4></center>
                                                    <div class="form-floating">
                                                        <input type="text" name="education_issuer_arabic" value="<?php echo $print["issuer_arabic"]; ?>" maxlength="50" class="form-control" id="floatingPassword" placeholder="الجهة" required>
                                                        <label for="floatingPassword">الجهة</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input type="text" name="education_major_arabic" value="<?php echo $print["major_arabic"]; ?>" maxlength="50" class="form-control" id="floatingPassword" placeholder="التخصص" required>
                                                        <label for="floatingPassword">التخصص</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <div class="dropdown">
                                                            <select name="education_level_arabic" aria-label=".form-select-sm example" class="form-control" dir="ltr" required>
                                                                <option value="" disabled>المستوى التعليمي</option>
                                                                <?php
                                                                    //الثانوية العامة
                                                                    if($print["level_arabic"] == "الثانوية العامة")
                                                                    echo '
                                                                        <option value="الثانوية العامة" selected>الثانوية العامة</option>
                                                                        <option value="دبلوم">دبلوم</option>
                                                                        <option value="بكالريوس">بكالريوس</option>
                                                                        <option value="ماجستير">ماجستير</option>
                                                                        <option value="دكتوراه">دكتوراه</option>
                                                                    ';
                                                                    //دبلوم
                                                                    elseif($print["level_arabic"] == "دبلوم")
                                                                    echo '
                                                                        <option value="الثانوية العامة">الثانوية العامة</option>
                                                                        <option value="دبلوم" selected>دبلوم</option>
                                                                        <option value="بكالريوس">بكالريوس</option>
                                                                        <option value="ماجستير">ماجستير</option>
                                                                        <option value="دكتوراه">دكتوراه</option>
                                                                    ';
                                                                    //بكالريوس
                                                                    elseif($print["level_arabic"] == "بكالريوس")
                                                                    echo '
                                                                        <option value="الثانوية العامة">الثانوية العامة</option>
                                                                        <option value="دبلوم">دبلوم</option>
                                                                        <option value="بكالريوس" selected>بكالريوس</option>
                                                                        <option value="ماجستير">ماجستير</option>
                                                                        <option value="دكتوراه">دكتوراه</option>
                                                                    ';
                                                                    //ماجستير
                                                                    elseif($print["level_arabic"] == "ماجستير")
                                                                    echo '
                                                                        <option value="الثانوية العامة">الثانوية العامة</option>
                                                                        <option value="دبلوم">دبلوم</option>
                                                                        <option value="بكالريوس">بكالريوس</option>
                                                                        <option value="ماجستير" selected>ماجستير</option>
                                                                        <option value="دكتوراه">دكتوراه</option>
                                                                    ';
                                                                    //دكتوراه
                                                                    elseif($print["level_arabic"] == "دكتوراه")
                                                                    echo '
                                                                        <option value="الثانوية العامة">الثانوية العامة</option>
                                                                        <option value="دبلوم">دبلوم</option>
                                                                        <option value="بكالريوس">بكالريوس</option>
                                                                        <option value="ماجستير">ماجستير</option>
                                                                        <option value="دكتوراه" selected>دكتوراه</option>
                                                                    ';
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <center><h4>English</h4></center>
                                                    <div class="form-floating">
                                                        <input type="text" name="education_issuer_english" value="<?php echo $print["issuer_english"]; ?>" maxlength="50" class="form-control" id="Issuer" placeholder="Issuer" required>
                                                        <label for="Issuer">Issuer</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input type="text" name="education_major_english" value="<?php echo $print["major_english"]; ?>" maxlength="50" class="form-control" id="Major" placeholder="Major" required>
                                                        <label for="Major">Major</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <div class="dropdown" dir="ltr">
                                                            <select name="education_level_english" aria-label=".form-select-sm example" class="form-control" dir="ltr" required>
                                                                <option selected value="" disabled>Educational level</option>
                                                                <?php
                                                                    //High school
                                                                    if($print["level_english"] == "High school")
                                                                    echo '
                                                                        <option value="High school" selected>High school</option>
                                                                        <option value="Diploma">Diploma</option>
                                                                        <option value="Baccalaureus">Baccalaureus</option>
                                                                        <option value="Master">Master</option>
                                                                        <option value="PhD">PhD</option>
                                                                    ';
                                                                    //Diploma
                                                                    elseif($print["level_english"] == "Diploma")
                                                                    echo '
                                                                        <option value="High school">High school</option>
                                                                        <option value="Diploma" selected>Diploma</option>
                                                                        <option value="Baccalaureus">Baccalaureus</option>
                                                                        <option value="Master">Master</option>
                                                                        <option value="PhD">PhD</option>
                                                                    ';
                                                                    //Baccalaureus
                                                                    elseif($print["level_english"] == "Baccalaureus")
                                                                    echo '
                                                                        <option value="High school">High school</option>
                                                                        <option value="Diploma">Diploma</option>
                                                                        <option value="Baccalaureus" selected>Baccalaureus</option>
                                                                        <option value="Master">Master</option>
                                                                        <option value="PhD">PhD</option>
                                                                    ';
                                                                    //Master
                                                                    elseif($print["level_english"] == "Master")
                                                                    echo '
                                                                        <option value="High school">High school</option>
                                                                        <option value="Diploma">Diploma</option>
                                                                        <option value="Baccalaureus">Baccalaureus</option>
                                                                        <option value="Master" selected>Master</option>
                                                                        <option value="PhD">PhD</option>
                                                                    ';
                                                                    //PhD
                                                                    elseif($print["level_english"] == "PhD")
                                                                    echo '
                                                                        <option value="High school">High school</option>
                                                                        <option value="Diploma">Diploma</option>
                                                                        <option value="Baccalaureus">Baccalaureus</option>
                                                                        <option value="Master">Master</option>
                                                                        <option value="PhD" selected>PhD</option>
                                                                    ';
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                <center><h4>English | عربي</h4></center>
                                                <div class="form-floating">
                                                    <div class="input-group mb-3">
                                                        <select name="education_average_from" aria-label=".form-select-sm example" class="form-control" dir="ltr" required>
                                                            <option selected value="" disabled>Average from | المعدل من</option>

                                                            <?php
                                                                if($print["average_from"] == 4)
                                                                echo '
                                                                    <option value="4.00" selected>4.00</option>
                                                                    <option value="5.00">5.00</option>
                                                                    <option value="100.00">100.00</option>
                                                                ';
                                                                elseif($print["average_from"] == 5)
                                                                echo '
                                                                    <option value="4.00">4.00</option>
                                                                    <option value="5.00" selected>5.00</option>
                                                                    <option value="100.00">100.00</option>
                                                                ';
                                                                elseif($print["average_from"] == 100)
                                                                echo '
                                                                    <option value="4.00">4.00</option>
                                                                    <option value="5.00">5.00</option>
                                                                    <option value="100.00" selected>100.00</option>
                                                                ';
                                                            ?>
                                                        </select>
                                                        <input type="number" name="education_average" value="<?php echo $print["average"]; ?>" step="0.01" class="form-control" min="0" max="100" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                </div>
                                                <div class="form-floating">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="Start date | تاريخ البداية" disabled>
                                                        <input type="date" name="education_start_date" value="<?php echo $print["start_date"]; ?>" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="End date | تاريخ النهاية" disabled>
                                                        <input type="date" name="education_end_date" max="<?php echo $date; ?>" value="<?php echo $print["end_date"]; ?>" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                </div>
                                                <div class="row m-3">
                                                    <input type="submit" name="education_update_info" class="btn btn-success" value="Update info">
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                                if(!empty($_POST["education_issuer_arabic"]) && !empty($_POST["education_major_arabic"]) && !empty($_POST["education_level_arabic"]) &&
                                !empty($_POST["education_issuer_english"]) && !empty($_POST["education_major_english"]) && !empty($_POST["education_level_english"]) &&
                                !empty($_POST["education_average"]) &&!empty($_POST["education_average_from"]) &&
                                !empty($_POST["education_start_date"]) && !empty($_POST["education_end_date"]))
                                {
                                    $_SESSION["education_issuer_arabic"] = $_POST["education_issuer_arabic"];$_SESSION["education_major_arabic"] = $_POST["education_major_arabic"];
                                    $_SESSION["education_level_arabic"] = $_POST["education_level_arabic"];$_SESSION["education_issuer_english"] = $_POST["education_issuer_english"];
                                    $_SESSION["education_major_english"] = $_POST["education_major_english"];$_SESSION["education_level_english"] = $_POST["education_level_english"];
                                    $_SESSION["education_average"] = $_POST["education_average"];$_SESSION["education_average_from"] = $_POST["education_average_from"];
                                    $_SESSION["education_start_date"] = $_POST["education_start_date"];$_SESSION["education_end_date"] = $_POST["education_end_date"];
                                    
                                    if(isset($_POST["education_update_info"]) && ($_POST["education_average"] <= $_POST["education_average_from"]) &&
                                    ($_POST["education_average"] >= ($_POST["education_average_from"]*0.7)) && ((($_POST["education_level_arabic"] == 'الثانوية العامة') &&
                                    ($_POST["education_level_english"] == 'High school')) || (($_POST["education_level_arabic"] == 'دبلوم') && ($_POST["education_level_english"] == 'Diploma')) ||
                                    (($_POST["education_level_arabic"] == 'بكالريوس') && ($_POST["education_level_english"] == 'Baccalaureus')) ||
                                    (($_POST["education_level_arabic"] == 'ماجستير') && ($_POST["education_level_english"] == 'Master')) ||
                                    (($_POST["education_level_arabic"] == 'دكتوراه') && ($_POST["education_level_english"] == 'PhD'))) &&
                                    (((($_POST["education_average_from"] == 100) && ($_POST["education_level_arabic"] == 'الثانوية العامة')) ||
                                    (($_POST["education_average_from"] != 4) && ($_POST["education_level_arabic"] != 'الثانوية العامة')))) &&
                                    ($_POST["education_start_date"] < ($_POST["education_end_date"])))
                                    {
                                            echo '
                                                <center>
                                                <br><br>
                                                <div class="row align-items-center justify-content-center">
                                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                                        Are you sure you want to <b>Update</b> this information ?
                                                        <table class="table-success table table-bordered" style="font-size:80%;" dir="rtl">
                                                            <tr class="table-warning">
                                                                <th colspan="11"><center> بيانات الشهادة </center></th>
                                                            </tr>
                                                            <tr class="table-success">
                                                                <th> الجهه </th> <th> التخصص </th> <th> المرحله </th> <th> Issuer </th> <th> Major </th>
                                                                <th> Level </th> <th> المعدل من </th> <th> المعدل </th> <th> تاريخ البداية </th>
                                                                <th> تاريخ النهاية </th>
                                                            </tr>
                                                            <tr class="table-info">
                                                                <th> '.$_POST["education_issuer_arabic"].' </th> <th> '.$_POST["education_major_arabic"].' </th>
                                                                <th> '.$_POST["education_level_arabic"].' </th> <th> '.$_POST["education_issuer_english"].' </th>
                                                                <th> '.$_POST["education_major_english"].' </th> <th> '.$_POST["education_level_english"].' </th>
                                                                <th> '.$_POST["education_average_from"].' </th> <th> '.$_POST["education_average"].' </th>
                                                                <th> '.$_POST["education_start_date"].' </th> <th> '.$_POST["education_end_date"].' </th>
                                                            </tr>
                                                        </table>
                                            ';
                                            echo '
                                                <form method="POST">
                                                    <fieldset>
                                                        <div class="col-auto">
                                                            <button type="submit" name="confirm_update" class="btn btn-outline-success m-3"> Yes </button>
                                                            <button type="submit" name="cancel_update" class="btn btn-outline-success m-3"> No </button>
                                                        </div>
                                                    </fieldset>
                                                </form>
                                                </div>
                                                </div>
                                                </center>
                                            ';
                                            echo '</div></div></div><br>';
                                    }
                                    elseif(($_POST["education_level_arabic"] == 'الثانوية العامة') && ($_POST["education_level_english"] != 'High school'))
                                    echo '
                                        <center>
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-sm-8 col-md-8 col-lg-5">
                                                    <div class="alert alert-danger" role="alert">! المستوى التعليمي المدخل غير متطابق</div>
                                                </div>
                                            </div>
                                        </center>
                                    ';
                                    elseif(($_POST["education_level_arabic"] == 'دبلوم') && ($_POST["education_level_english"] != 'Diploma'))
                                    echo '
                                        <center>
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-sm-8 col-md-8 col-lg-5">
                                                    <div class="alert alert-danger" role="alert">! المستوى التعليمي المدخل غير متطابق</div>
                                                </div>
                                            </div>
                                        </center>
                                    ';
                                    elseif(($_POST["education_level_arabic"] == 'بكالرويس') && ($_POST["education_level_english"] != 'Baccalaureus'))
                                    echo '
                                        <center>
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-sm-8 col-md-8 col-lg-5">
                                                    <div class="alert alert-danger" role="alert">! المستوى التعليمي المدخل غير متطابق</div>
                                                </div>
                                            </div>
                                        </center>
                                    ';
                                    elseif(($_POST["education_level_arabic"] == 'ماجستير') && ($_POST["education_level_english"] != 'Master'))
                                    echo '
                                        <center>
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-sm-8 col-md-8 col-lg-5">
                                                    <div class="alert alert-danger" role="alert">! المستوى التعليمي المدخل غير متطابق</div>
                                                </div>
                                            </div>
                                        </center>
                                    ';
                                    elseif(($_POST["education_level_arabic"] == 'دكتوراه') && ($_POST["education_level_english"] != 'PhD'))
                                    echo '
                                        <center>
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-sm-8 col-md-8 col-lg-5">
                                                    <div class="alert alert-danger" role="alert">! المستوى التعليمي المدخل غير متطابق</div>
                                                </div>
                                            </div>
                                        </center>
                                    ';
                                    elseif(($_POST["education_average_from"] == 100) && ($_POST["education_level_arabic"] != 'الثانوية العامة'))
                                    echo '
                                        <center>
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-sm-8 col-md-8 col-lg-5">
                                                    <div class="alert alert-danger" role="alert">! المعدل من" المدخل يجب أن يساوي 4.00 أو 5.00"</div>
                                                </div>
                                            </div>
                                        </center>
                                    ';
                                    elseif(($_POST["education_average_from"] == 4.00) || ($_POST["education_average_from"] == 5.00) && ($_POST["education_level_arabic"] == 'الثانوية العامة'))
                                    echo '
                                        <center>
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-sm-8 col-md-8 col-lg-5">
                                                    <div class="alert alert-danger" role="alert">! المعدل من" المدخل يجب أن يساوي 100"</div>
                                                </div>
                                            </div>
                                        </center>
                                    ';        
                                    elseif(($_POST["education_average"] > $_POST["education_average_from"]))
                                    echo '
                                        <center>
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-sm-8 col-md-8 col-lg-5">
                                                    <div class="alert alert-danger" role="alert">! المعدل المدخل أكبر من '.$_POST["education_average_from"].'</div>
                                                </div>
                                            </div>
                                        </center>
                                    '; 
                                    elseif(($_POST["education_average"] < ($_POST["education_average_from"]*0.7)))
                                    echo '
                                        <center>
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-sm-8 col-md-8 col-lg-5">
                                                    <div class="alert alert-danger" role="alert">! المعدل المدخل أقل من '.$_POST["education_average_from"]*0.7.'</div>
                                                </div>
                                            </div>
                                        </center>
                                    ';         
                                    elseif(($_POST["education_start_date"] >= ($_POST["education_end_date"])))
                                    echo '
                                        <center>
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-sm-8 col-md-8 col-lg-5">
                                                    <div class="alert alert-danger" role="alert">! يجب أن يكون تاريخ البداية أقل من تاريخ النهاية</div>
                                                </div>
                                            </div>
                                        </center>
                                    ';
                                }
                                if(isset($_POST["confirm_update"]))
                                        {
                                            if($connect_database)
                                                {
                                                    $update_education_info = $connect_database->prepare
                                                    ('
                                                        UPDATE education SET
                                                            issuer_arabic = "'.$_SESSION["education_issuer_arabic"].'" ,
                                                            major_arabic = "'.$_SESSION["education_major_arabic"].'" , level_arabic = "'.$_SESSION["education_level_arabic"].'" ,
                                                            issuer_english = "'.$_SESSION["education_issuer_english"].'" , major_english = "'.$_SESSION["education_major_english"].'" ,
                                                            level_english = "'.$_SESSION["education_level_english"].'" , average = '.$_SESSION["education_average"].' ,
                                                            average_from = '.$_SESSION["education_average_from"].' ,
                                                            start_date = "'.$_SESSION["education_start_date"].'" , end_date = "'.$_SESSION["education_end_date"].'"
                                                            WHERE education_ID = '.$_SESSION["select_education_ID"].'
                                                    ');
                                                    if($update_education_info->execute())
                                                        {
                                                            $_SESSION["submit_type"] = null;
                                                            $_SESSION["type"] = null;
                                                            echo '
                                                                <center>
                                                                <div class="row align-items-center justify-content-center">
                                                                <div class="col-sm-8 col-md-8 col-lg-5">
                                                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                        <b>تم تحديث بيانات التعليم بنجاح</b>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                </center>
                                                            ';
                                                            header("refresh:2;url=admin.php");
                                                        }
                                                    else
                                                        {
                                                            echo '    
                                                                <center>
                                                                <div class="row align-items-center justify-content-center">
                                                                <div class="col-sm-8 col-md-8 col-lg-5">
                                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                        <b>! حدث خطأ ما</b>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                </center>
                                                            ';
                                                            header("refresh:2;url= admin.php");
                                                        }
                                                }
                                        }
                                        elseif(isset($_POST["cancel_update"]))
                                        {
                                            $_SESSION["submit_type"] = null;
                                            $_SESSION["type"] = null;
                                            echo '    
                                                <center>
                                                <div class="row align-items-center justify-content-center">
                                                <div class="col-sm-8 col-md-8 col-lg-5">
                                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <b>تم إلغاء التحديث بنجاح</b>
                                                    </div>
                                                    </div>
                                                    </div>
                                                </center>
                                            ';
                                            header("refresh:2;url= admin.php");
                                        }
                }
            //Experience - Update
            elseif($_SESSION["submit_type"] == "Update" && $_SESSION["type"] == "experience")
                {
                    ?>
                        <div class="row align-items-center justify-content-center">
                            <div class="col-sm-8 col-md-8 col-lg-5">
                            <center><h5><?php echo $_SESSION["input_type"]; ?></h5></center>
                            <div class="signup-form">
                                <form method="POST" class="mt-6 border p-4 bg-light shadow" style="text-align: center;">
                                    <div class="form-floating">
                                        <div class="dropdown">
                                            <select name="update_experience" aria-label=".form-select-sm example" class="form-control" dir="rtl" required>
                                                <option selected value="" disabled>اختر الوظيفة</option>
                                                <?php
                                                    if($connect_database)
                                                    {
                                                        $select_experience_id = $connect_database->prepare('SELECT * FROM experience');
                                                        $select_experience_id->execute();
                                                        foreach($select_experience_id as $print)
                                                        {
                                                            echo '<option value="'.$print["experience_ID"].'">الجهة : '.$print["issuer_arabic"].' | المسمى الوظيفي : '.$print["job_title_arabic"].'</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                        <div class="row m-3">
                                            <button type="submit" name="select_update_experience" class="btn btn-success m-3"> Update </button>
                                        </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        <br>
                    <?php
                        if(isset($_POST["select_update_experience"]))
                        {
                            $_SESSION["select_experience_ID"] = $_POST["update_experience"];
                            if(empty($_SESSION["select_experience_ID"]))
                            $_SESSION["select_experience_ID"] = 0;

                            echo $_SESSION["select_experience_ID"];

                            $comfirm_experience_id = $connect_database->prepare('SELECT * FROM experience WHERE experience_ID = '.$_SESSION["select_experience_ID"].'');
                            $comfirm_experience_id->execute();
    
                            foreach($comfirm_experience_id as $print)
                            {
                                ?>
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-sm-8 col-md-8 col-lg-5">
                                            <div class="signup-form">
                                                <form method="POST" class="mt-6 border p-4 bg-light shadow">
                                                    <center><h4>عربي</h4></center>
                                                    <div class="form-floating">
                                                        <input type="text" maxlength="50" name="experience_issuer_arabic" value="<?php echo $print["issuer_arabic"]; ?>" maxlength="50" class="form-control" id="floatingPassword" placeholder="الجهة" required>
                                                        <label for="floatingPassword">الجهة</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input type="text" maxlength="50" name="experience_job_title_arabic" value="<?php echo $print["job_title_arabic"]; ?>" maxlength="50" class="form-control" id="floatingPassword" placeholder=">المسمى الوظيفي" required>
                                                        <label for="floatingPassword">المسمى الوظيفي</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" maxlength="500" name="experience_brief_arabic" placeholder="Leave a comment here" id="floatingTextarea"><?php echo $print["brief_arabic"]; ?></textarea>
                                                        <label for="floatingTextarea">نبذة عن الخبرة</label>
                                                    </div>

                                                    <center><h4>English</h4></center>
                                                    <div class="form-floating">
                                                        <input type="text" name="experience_issuer_english" value="<?php echo $print["issuer_english"] ?>" maxlength="50" class="form-control" id="floatingPassword" placeholder="Issuer" required>
                                                        <label for="floatingPassword">Issuer</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input type="text" name="experience_job_title_english" value="<?php echo $print["job_title_english"]; ?>" maxlength="50" class="form-control" id="floatingPassword" placeholder="Job title" required>
                                                        <label for="floatingPassword">Job title</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" maxlength="500" name="experience_brief_english" placeholder="Leave a comment here" id="floatingTextarea"><?php echo $print["brief_english"]; ?></textarea>
                                                        <label for="floatingTextarea">Experience brief</label>
                                                    </div>

                                                <center><h4>English | عربي</h4></center>
                                                <div class="form-floating">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="Start date | تاريخ البداية" disabled>
                                                        <input type="date" name="experience_start_date" value="<?php echo $print["start_date"]; ?>" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="End date | تاريخ النهاية" disabled>
                                                        <input type="date" name="experience_end_date" max="<?php echo $date; ?>" value="<?php echo $print["end_date"]; ?>" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                </div>
                                                <div class="row m-3">
                                                    <input type="submit" name="experience_update_info" class="btn btn-success" value="Update info">
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                        if(!empty($_POST["experience_issuer_arabic"]) && !empty($_POST["experience_job_title_arabic"]) && !empty($_POST["experience_brief_arabic"]) &&
                        !empty($_POST["experience_issuer_english"]) && !empty($_POST["experience_job_title_english"]) && !empty($_POST["experience_brief_english"]) &&
                        !empty($_POST["experience_start_date"]) && !empty($_POST["experience_end_date"]))
                        {
                            $_SESSION["experience_issuer_arabic"] = $_POST["experience_issuer_arabic"]; $_SESSION["experience_job_title_arabic"] = $_POST["experience_job_title_arabic"];
                            $_SESSION["experience_brief_arabic"] = $_POST["experience_brief_arabic"]; $_SESSION["experience_issuer_english"] = $_POST["experience_issuer_english"];
                            $_SESSION["experience_job_title_english"] = $_POST["experience_job_title_english"]; $_SESSION["experience_brief_english"] = $_POST["experience_brief_english"];
                            $_SESSION["experience_start_date"] = $_POST["experience_start_date"]; $_SESSION["experience_end_date"] = $_POST["experience_end_date"];

                            if(isset($_POST["experience_update_info"]) && ($_POST["experience_start_date"] < ($_POST["experience_end_date"])))
                                {
                                    $comfirm_experience_id = $connect_database->prepare('SELECT * FROM experience WHERE experience_ID = '.$_SESSION["select_experience_ID"].'');
                                    $comfirm_experience_id->execute();
                
                                        foreach($comfirm_experience_id as $print)
                                        {
                                            echo '
                                                <center>
                                                <br><br>
                                                <div class="row align-items-center justify-content-center">
                                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                                    Are you sure you want to <b>Update</b> this information ?
                                                    <table class="table-success table table-bordered" style="font-size:80%;" dir="rtl">
                                                        <tr class="table-warning">
                                                            <th colspan="9"><center> بيانات الوظيفة </center></th>
                                                        </tr>
                                                        <tr class="table-success">
                                                        <th> الجهه </th> <th> المسمى الوظيفي </th> <th> نبذة عن الخبرة </th> <th> Issuer </th> <th> Job title </th>
                                                        <th> Experience brief </th> <th> تاريخ البداية </th> <th> تاريخ النهاية </th>
                                                        </tr>
                                                        <tr class="table-info">
                                                        <th> '.$_POST["experience_issuer_arabic"].' </th> <th> '.$_POST["experience_job_title_arabic"].' </th>
                                                        <th> '.$_POST["experience_brief_arabic"].' </th> <th> '.$_POST["experience_issuer_english"].' </th>
                                                        <th> '.$_POST["experience_job_title_english"].' </th> <th> '.$_POST["experience_brief_english"].' </th>
                                                        <th> '.$_POST["experience_start_date"].' </th> <th> '.$_POST["experience_end_date"].' </th>
                                                        </tr>
                                                    </table>
                                            ';
                                        }
                
                                        echo '
                                            <form method="POST">
                                                <fieldset>
                                                    <div class="col-auto">
                                                        <button type="submit" name="confirm_update" class="btn btn-outline-success m-3"> Yes </button>
                                                        <button type="submit" name="cancel_update" class="btn btn-outline-success m-3"> No </button>
                                                    </div>
                                                </fieldset>
                                            </form>
                                            </div>
                                            </div>
                                            </center>
                                        ';
                                }
                                elseif(($_POST["experience_start_date"] >= ($_POST["experience_end_date"])))
                                echo '
                                    <center>
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-sm-8 col-md-8 col-lg-5">
                                                <div class="alert alert-danger" role="alert">! يجب أن يكون تاريخ البداية أقل من تاريخ النهاية</div>
                                            </div>
                                        </div>
                                    </center>
                                ';
                        }
                                    if(isset($_POST["confirm_update"]))
                                        {
                                            $update_experience = $connect_database->prepare('
                                            UPDATE experience SET
                                            issuer_arabic = "'.$_SESSION["experience_issuer_arabic"].'" , job_title_arabic = "'.$_SESSION["experience_job_title_arabic"].'" ,
                                            brief_arabic = "'.$_SESSION["experience_brief_arabic"].'" , issuer_english = "'.$_SESSION["experience_issuer_english"].'" ,
                                            job_title_english = "'.$_SESSION["experience_job_title_english"].'" , brief_english = "'.$_SESSION["experience_brief_english"].'" ,
                                            start_date = "'.$_SESSION["experience_start_date"].'" , end_date = "'.$_SESSION["experience_end_date"].'"
                                            WHERE experience_ID = '.$_SESSION["select_experience_ID"].'
                                            ');
                                            if($update_experience->execute())
                                            {
                                                $_SESSION["submit_type"] = null;
                                                $_SESSION["type"] = null;
                                                echo '    
                                                    <center>
                                                    <div class="row align-items-center justify-content-center">
                                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            <b>تم تحديث بيانات الخبرة بنجاح</b>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </center>
                                                ';
                                                header("refresh:3;url= admin.php");
                                            }
                                            else
                                            {
                                                echo '    
                                                    <center>
                                                    <div class="row align-items-center justify-content-center">
                                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            <b>! حدث خطأ ما</b>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </center>
                                                ';
                                            }
                                        }
                                        elseif(isset($_POST["cancel_update"]))
                                        {
                                            $_SESSION["submit_type"] = null;
                                            $_SESSION["type"] = null;
                                            echo '    
                                                <center>
                                                <div class="row align-items-center justify-content-center">
                                                <div class="col-sm-8 col-md-8 col-lg-5">
                                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <b>تم إلغاء التحديث بنجاح</b>
                                                    </div>
                                                    </div>
                                                    </div>
                                                </center>
                                            ';
                                            header("refresh:2;url= admin.php");
                                        }
                }
            //Courses - Update
            elseif($_SESSION["submit_type"] == "Update" && $_SESSION["type"] == "courses")
                {
                    ?>
                        <div class="row align-items-center justify-content-center">
                        <div class="col-sm-8 col-md-8 col-lg-5">
                        <center><h5><?php echo $_SESSION["input_type"]; ?></h5></center>
                            <div class="signup-form">
                                <form method="POST" class="mt-6 border p-4 bg-light shadow" style="text-align: center;">
                                    <div class="form-floating">
                                        <div class="dropdown">
                                            <select name="update_education" aria-label=".form-select-sm example" class="form-control" dir="rtl" required>
                                                <option selected value="" disabled>اختر الشهادة</option>
                                                <?php
                                                    if($connect_database)
                                                    {
                                                        $select_courses_id = $connect_database->prepare('SELECT * FROM courses');
                                                        $select_courses_id->execute();
                                                        foreach($select_courses_id as $print)
                                                        {
                                                            echo '<option value="'.$print["course_ID"].'">
                                                            الجهة : '.$print["issuer_arabic"].' | مسمى الدورة  : '.$print["course_title_arabic"].' | تاريخ النهاية : '.$print["end_date"].'
                                                            </option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                        <div class="row m-3">
                                            <button type="submit" name="select_update_course" class="btn btn-success m-3"> Update </button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                    <?php
                        if(isset($_POST["select_update_course"]))
                        {
                            $_SESSION["select_course_ID"] = $_POST["update_education"];
                            if(empty($_SESSION["select_course_ID"]))
                            $_SESSION["select_course_ID"] = 0;

                            $comfirm_courses_id = $connect_database->prepare('SELECT * FROM courses WHERE course_ID = '.$_SESSION["select_course_ID"].'');
                            $comfirm_courses_id->execute();
                            foreach($comfirm_courses_id as $print)
                            {
                                ?>
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-sm-8 col-md-8 col-lg-5">
                                            <div class="signup-form">
                                                <form method="POST" class="mt-6 border p-4 bg-light shadow">
                                                    <center><h4>عربي</h4></center>
                                                    <div class="form-floating">
                                                        <input type="text" maxlength="50" name="courses_issuer_arabic" value="<?php echo $print["issuer_arabic"]; ?>" maxlength="50" class="form-control" id="floatingPassword" placeholder="الجهة" required>
                                                        <label for="floatingPassword">الجهة</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input type="text" maxlength="50" name="course_title_arabic" value="<?php echo $print["course_title_arabic"]; ?>" maxlength="50" class="form-control" id="floatingPassword" placeholder=">مسمى الدورة" required>
                                                        <label for="floatingPassword">مسمى الدورة</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" maxlength="500" name="courses_brief_arabic" placeholder="Leave a comment here" id="floatingTextarea"><?php echo $print["brief_arabic"]; ?></textarea>
                                                        <label for="floatingTextarea">نبذة عن الدورة</label>
                                                    </div>
        
                                                    <center><h4>English</h4></center>
                                                    <div class="form-floating">
                                                        <input type="text" name="courses_issuer_english" value="<?php echo $print["issuer_english"]; ?>" maxlength="50" class="form-control" id="floatingPassword" placeholder="Issuer" required>
                                                        <label for="floatingPassword">Issuer</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input type="text" name="course_title_english" value="<?php echo $print["course_title_english"]; ?>" maxlength="50" class="form-control" id="floatingPassword" placeholder="Courses title" required>
                                                        <label for="floatingPassword">Courses title</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" maxlength="500" name="courses_brief_english" placeholder="Leave a comment here" id="floatingTextarea"><?php echo $print["brief_english"]; ?></textarea>
                                                        <label for="floatingTextarea">Course brief</label>
                                                    </div>
        
                                                <center><h4>English | عربي</h4></center>
                                                <div class="form-floating">
                                                        <input type="number" name="courses_hours" value="<?php echo $print["hours"]; ?>" max="99" class="form-control" id="floatingPassword" placeholder="Hours | الساعات" required>
                                                        <label for="floatingPassword">Hours | الساعات</label>
                                                    </div>
                                                <div class="form-floating">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="Start date | تاريخ البداية" disabled>
                                                        <input type="date" name="courses_start_date" value="<?php echo $print["start_date"]; ?>" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="End date | تاريخ النهاية" disabled>
                                                        <input type="date" name="courses_end_date" max="<?php echo $date; ?>" value="<?php echo $print["end_date"]; ?>" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                </div>
                                                <div class="row m-3">
                                                    <input type="submit" name="courses_update_info" class="btn btn-success" value="Update info">
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                        <?php
                            }
                        }
                                            if(!empty($_POST["courses_issuer_arabic"]) && !empty($_POST["course_title_arabic"]) && !empty($_POST["courses_brief_arabic"]) &&
                                            !empty($_POST["courses_issuer_english"]) && !empty($_POST["course_title_english"]) && !empty($_POST["courses_brief_english"]) &&
                                            !empty($_POST["courses_hours"]) && !empty($_POST["courses_start_date"]) && !empty($_POST["courses_end_date"]))
                                            {
                                                $_SESSION["courses_issuer_arabic"] = $_POST["courses_issuer_arabic"];$_SESSION["course_title_arabic"] = $_POST["course_title_arabic"];
                                                $_SESSION["courses_issuer_english"] = $_POST["courses_issuer_english"];$_SESSION["course_title_english"] = $_POST["course_title_english"];
                                                $_SESSION["courses_brief_english"] = $_POST["courses_brief_english"];
                                                $_SESSION["courses_hours"] = $_POST["courses_hours"];$_SESSION["courses_start_date"] = $_POST["courses_start_date"];
                                                $_SESSION["courses_end_date"] = $_POST["courses_end_date"];$_SESSION["courses_brief_arabic"] = $_POST["courses_brief_arabic"];

                                                if(isset($_POST["courses_update_info"]) && ($_POST["courses_start_date"] < ($_POST["courses_end_date"])))
                                                {
                                                        $comfirm_courses_id = $connect_database->prepare('SELECT * FROM courses WHERE course_ID = '.$_SESSION["select_course_ID"].'');
                                                        $comfirm_courses_id->execute();

                                                        foreach($comfirm_courses_id as $print)
                                                        {
                                                            echo '
                                                            <center>
                                                            <br><br>
                                                            <div class="row align-items-center justify-content-center">
                                                            <div class="col-sm-8 col-md-8 col-lg-5">
                                                            Are you sure you want to <b>Update</b> this information ?
                                                            <table class="table-success table table-bordered" style="font-size:80%;" dir="rtl">
                                                            <tr class="table-warning">
                                                            <th colspan="10"><center> بيانات الدورة </center></th>
                                                            </tr>
                                                            <tr class="table-success">
                                                            <th> الجهه </th> <th> مسمى الدورة </th> <th> نبذة عن الدورة </th> <th> Issuer </th>
                                                            <th> Course title </th> <th> Course brief </th> <th> الساعات </th>
                                                            <th> تاريخ البداية </th> <th> تاريخ النهاية </th>
                                                            </tr>
                                                            <tr class="table-info">
                                                            <th> '.$_SESSION["courses_issuer_arabic"].' </th> <th> '.$_SESSION["course_title_arabic"].' </th>
                                                            <th> '.$_SESSION["courses_brief_arabic"].' </th> <th> '.$_SESSION["courses_issuer_english"].' </th>
                                                            <th> '.$_SESSION["course_title_english"].' </th> <th> '.$_SESSION["courses_brief_english"].' </th>
                                                            <th> '.$_SESSION["courses_hours"].' </th>
                                                            <th> '.$_SESSION["courses_start_date"].' </th> <th> '.$_SESSION["courses_end_date"].' </th>
                                                            </tr>
                                                            </table>
                                                            ';
                                                        }

                                                        echo '
                                                        <form method="POST">
                                                        <fieldset>
                                                        <div class="col-auto">
                                                        <button type="submit" name="confirm_update" class="btn btn-outline-success m-3"> Yes </button>
                                                        <button type="submit" name="cancel_update" class="btn btn-outline-success m-3"> No </button>
                                                        </div>
                                                        </fieldset>
                                                        </form>
                                                        </div>
                                                        </div>
                                                        </center>
                                                        ';
                                                }   
                                                elseif(($_POST["courses_start_date"] >= ($_POST["courses_end_date"])))
                                                echo '
                                                    <center>
                                                        <div class="row align-items-center justify-content-center">
                                                            <div class="col-sm-8 col-md-8 col-lg-5">
                                                                <div class="alert alert-danger" role="alert">! يجب أن يكون تاريخ البداية أقل من تاريخ النهاية</div>
                                                            </div>
                                                        </div>
                                                    </center>
                                                ';
                                            }
                                                    if(isset($_POST["confirm_update"]))
                                                    {
                                                        $delete_course = $connect_database->prepare('
                                                        UPDATE courses SET
                                                        issuer_arabic = "'.$_SESSION["courses_issuer_arabic"].'" , course_title_arabic = "'.$_SESSION["course_title_arabic"].'" , 
                                                        brief_arabic = "'.$_SESSION["courses_brief_arabic"].'" , issuer_english = "'.$_SESSION["courses_issuer_english"].'" , 
                                                        course_title_english = "'.$_SESSION["course_title_english"].'" , brief_english = "'.$_SESSION["courses_brief_english"].'" , 
                                                        hours = '.$_SESSION["courses_hours"].' , 
                                                        start_date = "'.$_SESSION["courses_start_date"].'" , end_date = "'.$_SESSION["courses_end_date"].'"
                                                        WHERE course_ID = '.$_SESSION["select_course_ID"].'
                                                        ');
                                                        if($delete_course->execute())
                                                        {
                                                            $_SESSION["submit_type"] = null;
                                                            $_SESSION["type"] = null;
                                                            echo '    
                                                            <center>
                                                            <div class="row align-items-center justify-content-center">
                                                            <div class="col-sm-8 col-md-8 col-lg-5">
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            <b>تم تحديث بيانات الدورة بنجاح</b>
                                                            </div>
                                                            </div>
                                                            </div>
                                                            </center>
                                                            ';
                                                            header("refresh:3;url= admin.php");
                                                        }
                                                        else
                                                        {
                                                            echo '    
                                                            <center>
                                                            <div class="row align-items-center justify-content-center">
                                                            <div class="col-sm-8 col-md-8 col-lg-5">
                                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            <b>! حدث خطأ ما</b>
                                                            </div>
                                                            </div>
                                                            </div>
                                                            </center>
                                                            ';
                                                        }
                                                    }
                                                    elseif(isset($_POST["cancel_update"]))
                                                    {
                                                        $_SESSION["submit_type"] = null;
                                                        $_SESSION["type"] = null;
                                                        echo '    
                                                        <center>
                                                        <div class="row align-items-center justify-content-center">
                                                        <div class="col-sm-8 col-md-8 col-lg-5">
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <b>تم إلغاء التحديث بنجاح</b>
                                                        </div>
                                                        </div>
                                                        </div>
                                                        </center>
                                                        ';
                                                        header("refresh:2;url= admin.php");
                                                    }
                }
            //Projects - Update
            elseif($_SESSION["submit_type"] == "Update" && $_SESSION["type"] == "projects")
                {
                    ?>
                    <div class="row align-items-center justify-content-center">
                        <div class="col-sm-8 col-md-8 col-lg-5">
                        <center><h5><?php echo $_SESSION["input_type"]; ?></h5></center>
                            <div class="signup-form">
                                <form method="POST" class="mt-6 border p-4 bg-light shadow" style="text-align: center;">
                                    <div class="form-floating">
                                        <div class="dropdown">
                                            <select name="select_update_project" aria-label=".form-select-sm example" class="form-control" dir="rtl" required>
                                                <option selected value="" disabled>اختر المشروع</option>
                                                <?php
                                                    if($connect_database)
                                                    {
                                                        $select_project_id = $connect_database->prepare('SELECT * FROM projects');
                                                        $select_project_id->execute();
                                                        foreach($select_project_id as $print)
                                                        {
                                                            echo '<option value="'.$print["project_ID"].'">
                                                            اسم المشروع : '.$print["name_english"].' | تاريخ الإنتهاء : '.$print["end_date"].'
                                                            </option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                        <div class="row m-3">
                                            <button type="submit" name="update_project" class="btn btn-success m-3"> Update </button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                    <?php
                    if(isset($_POST["update_project"]))
                    {
                        $_SESSION["select_project_ID"] = $_POST["select_update_project"];
                        if(empty($_SESSION["select_project_ID"]))
                        $_SESSION["select_project_ID"] = 0;

                        $comfirm_project_id = $connect_database->prepare('SELECT * FROM projects WHERE project_ID = '.$_SESSION["select_project_ID"].'');
                        $comfirm_project_id->execute();

                        foreach($comfirm_project_id as $print)
                        {
                            ?>
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-sm-8 col-md-8 col-lg-5">
                                            <div class="signup-form">
                                                <form method="POST" class="mt-6 border p-4 bg-light shadow">
    
                                                    <center><h4>عربي</h4></center>
    
                                                    <div class="form-floating">
                                                        <input type="text" name="project_name_arabic" value="<?php echo $print["name_arabic"]; ?>" maxlength="50" class="form-control" id="floatingPassword" placeholder="اسم المشروع" required>
                                                        <label for="floatingPassword">اسم المشروع</label>
                                                    </div>
    
                                                    <div class="form-floating">
                                                            <textarea class="form-control" maxlength="1000" name="project_brief_arabic" placeholder="Leave a comment here" id="floatingTextarea" required><?php echo $print["brief_arabic"]; ?></textarea>
                                                            <label for="floatingTextarea">نبذة عن المشروع</label>
                                                    </div>
    
                                                    <center><h4>English</h4></center>
    
                                                    <div class="form-floating">
                                                        <input type="text" name="project_name_english" value="<?php echo $print["name_english"]; ?>" maxlength="50" class="form-control" id="Issuer" placeholder="Project name" required>
                                                        <label for="Issuer">Project name</label>
                                                    </div>
    
                                                    <div class="form-floating">
                                                            <textarea class="form-control" maxlength="1000" name="project_brief_english" placeholder="Leave a comment here" id="floatingTextarea" required><?php echo $print["brief_english"]; ?></textarea>
                                                            <label for="floatingTextarea">Project brief</label>
                                                    </div>
    
                                                    <center><h4>English | عربي</h4></center>
    
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="Project URL | رابط المشروع" disabled>
                                                        <input type="text" name="project_url" value="<?php echo $print["url"]; ?>" maxlength="200" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
    
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="End date | تاريخ الانتهاء" disabled>
                                                        <input type="date" name="project_end_date" max="<?php echo $date; ?>" value="<?php echo $print["end_date"]; ?>" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
    
                                                    <div class="row m-3">
                                                        <input type="submit" name="project_update_info" class="btn btn-success" value="Update info">
                                                    </div>
    
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                        }
                    }
                                if(!empty($_POST["project_name_arabic"]) && !empty($_POST["project_brief_arabic"]) && !empty($_POST["project_name_english"]) &&
                                !empty($_POST["project_brief_english"]) && !empty($_POST["project_url"]) && !empty($_POST["project_end_date"]))
                                {
                                    $_SESSION["project_name_arabic"] = $_POST["project_name_arabic"];$_SESSION["project_brief_arabic"] = $_POST["project_brief_arabic"];
                                    $_SESSION["project_name_english"] = $_POST["project_name_english"];$_SESSION["project_brief_english"] = $_POST["project_brief_english"];
                                    $_SESSION["project_url"] = $_POST["project_url"];$_SESSION["project_end_date"] = $_POST["project_end_date"];

                                    if(isset($_POST["project_update_info"]))
                                    {

                                        $comfirm_project_id = $connect_database->prepare('SELECT * FROM projects WHERE project_ID = '.$_SESSION["select_project_ID"].'');
                                        $comfirm_project_id->execute();

                                        foreach($comfirm_project_id as $print)
                                        {
                                            echo '
                                                <center>
                                                    <br><br>
                                                    <div class="row align-items-center justify-content-center">
                                                        <div class="col-sm-8 col-md-8 col-lg-5">
                                                            Are you sure you want to <b>Update</b> this information ?
                                                            <table class="table-success table table-bordered" style="font-size:80%;" dir="rtl">
                                                                <tr class="table-warning">
                                                                    <th colspan="6"><center> بيانات المشروع </center></th>
                                                                </tr>
                                                                <tr class="table-success">
                                                                    <th> اسم المشروع </th> <th> نبذة عن المشروع </th>
                                                                    <th> Project name </th> <th> Project brief </th> 
                                                                    <th> رابط المشروع </th> <th> تاريخ الإنتهاء </th>
                                                                </tr>
                                                                <tr class="table-info">
                                                                    <th> '.$_SESSION["project_name_arabic"].' </th> <th> '.$_SESSION["project_brief_arabic"].' </th>
                                                                    <th> '.$_SESSION["project_name_english"].' </th> <th> '.$_SESSION["project_brief_english"].' </th>
                                                                    <th> '.$_SESSION["project_url"].' </th> <th> '.$_SESSION["project_end_date"].' </th>
                                                                </tr>
                                                            </table>
                                            ';
                                        }
                                        echo '
                                            <form method="POST">
                                                <fieldset>
                                                    <div class="col-auto">
                                                        <button type="submit" name="confirm_update" class="btn btn-outline-success m-3"> Yes </button>
                                                        <button type="submit" name="cancel_update" class="btn btn-outline-success m-3"> No </button>
                                                    </div>
                                                </fieldset>
                                            </form>
                                            </div>
                                            </div>
                                            </center>
                                        ';
                                    }
                                }
                                    if(isset($_POST["confirm_update"]))
                                    {
                                        $update_project = $connect_database->prepare('
                                        UPDATE projects SET
                                        name_arabic = "'.$_SESSION["project_name_arabic"].'" , brief_arabic = "'.$_SESSION["project_brief_arabic"].'" ,
                                        name_english = "'.$_SESSION["project_name_english"].'" , brief_english = "'.$_SESSION["project_brief_english"].'" ,
                                        url = "'.$_SESSION["project_url"].'" , end_date = "'.$_SESSION["project_end_date"].'"
                                        WHERE project_ID = '.$_SESSION["select_project_ID"].'
                                        ');
                                        if($update_project->execute())
                                        {
                                            $_SESSION["submit_type"] = null;
                                            $_SESSION["type"] = null;
                                            echo '    
                                                <center><br>
                                                    <div class="row align-items-center justify-content-center">
                                                        <div class="col-sm-8 col-md-8 col-lg-5">
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <b>تم تحديث بيانات المشروع بنجاح</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </center>
                                            ';
                                            header("refresh:3;url= admin.php");
                                        }
                                        else
                                        {
                                            echo '    
                                                <center><br>
                                                    <div class="row align-items-center justify-content-center">
                                                        <div class="col-sm-8 col-md-8 col-lg-5">
                                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                <b>! حدث خطأ ما</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </center>
                                            ';
                                        }
                                    }
                                    elseif(isset($_POST["cancel_update"]))
                                    {
                                        $_SESSION["submit_type"] = null;
                                        $_SESSION["type"] = null;
                                        echo '    
                                            <center><br>
                                                <div class="row align-items-center justify-content-center">
                                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            <b>تم إلغاء التحديث بنجاح</b>
                                                        </div>
                                                    </div>
                                                </div>
                                            </center>
                                        ';
                                        header("refresh:2;url= admin.php");
                                    }
                }
            //General brief - Update
            elseif($_SESSION["submit_type"] == "Update" && $_SESSION["type"] == "general_brief")
                {
                    ?>
                        <div class="row align-items-center justify-content-center">
                        <div class="col-sm-8 col-md-8 col-lg-5">
                        <center><h5><?php echo $_SESSION["input_type"]; ?></h5></center>
                            <div class="signup-form">
                                <form method="POST" class="mt-6 border p-4 bg-light shadow" style="text-align: center;">
                                    <div class="form-floating">
                                        <div class="dropdown">
                                            <select name="select_update_general_brief" aria-label=".form-select-sm example" class="form-control" dir="rtl" required>
                                                <option selected value="" disabled>اختر النبذة العامة</option>
                                                <?php
                                                    if($connect_database)
                                                    {
                                                        $select_project_id = $connect_database->prepare('SELECT * FROM general_brief');
                                                        $select_project_id->execute();
                                                        foreach($select_project_id as $print)
                                                        {
                                                            echo '<option value="'.$print["general_brief_ID"].'">معرف النبذة العامة : '.$print["general_brief_ID"].'</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                        <div class="row m-3">
                                            <button type="submit" name="update_general_brief" class="btn btn-success m-3"> Update </button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                        if(isset($_POST["update_general_brief"]))
                        {
                            $_SESSION["select_general_brief_ID"] = $_POST["select_update_general_brief"];
                            if(empty($_SESSION["select_general_brief_ID"]))
                            $_SESSION["select_general_brief_ID"] = 0;
    
                            $comfirm_general_brief_id = $connect_database->prepare('SELECT * FROM general_brief WHERE general_brief_ID = '.$_SESSION["select_general_brief_ID"].'');
                            $comfirm_general_brief_id->execute();
    
                            foreach($comfirm_general_brief_id as $print)
                            {
                                ?>
                                    <div class="row m-3" dir="ltr">
                                        <div class="col">
                                            <center><h5><?php echo $_SESSION["input_type"]; ?></h5></center>
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-sm-8 col-md-8 col-lg-5">
                                                    <div class="signup-form">
                                                        <form method="POST" class="mt-6 border p-4 bg-light shadow">

                                                            <center><h4>عربي</h4></center>

                                                            <div class="form-floating">
                                                                <textarea class="form-control" maxlength="40000" name="general_brief_arabic" placeholder="Leave a comment here" id="floatingTextarea" required><?php echo $print["brief_arabic"]; ?></textarea>
                                                                <label for="floatingTextarea">نبذة عامة</label>
                                                            </div>

                                                            <center><h4>English</h4></center>

                                                            <div class="form-floating">
                                                                <textarea class="form-control" maxlength="40000" name="general_brief_english" placeholder="Leave a comment here" id="floatingTextarea" required><?php echo $print["brief_english"]; ?></textarea>
                                                                <label for="floatingTextarea">General brief</label>
                                                            </div>

                                                            <div class="row m-3">
                                                                <input type="submit" name="general_brief_update_info" class="btn btn-success" value="Update info">
                                                            </div>
                                            
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                        if(isset($_POST["general_brief_update_info"]))
                        {
                            if(!empty($_POST["general_brief_arabic"]) && !empty($_POST["general_brief_english"]))
                            {
                                $_SESSION["general_brief_arabic"] = $_POST["general_brief_arabic"];
                                $_SESSION["general_brief_english"] = $_POST["general_brief_english"];

                                $comfirm_general_brief_id = $connect_database->prepare('SELECT * FROM general_brief WHERE general_brief_ID = '.$_SESSION["select_general_brief_ID"].'');
                                $comfirm_general_brief_id->execute();
    
                                foreach($comfirm_general_brief_id as $print)
                                {
                                echo '
                                    <center>
                                    <br><br>
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-sm-8 col-md-8 col-lg-5">
                                        Are you sure you want to <b>Update</b> this information ?
                                        <table class="table-success table table-bordered" style="font-size:80%;" dir="rtl">
                                            <tr class="table-warning">
                                                <th colspan="3"><center> بيانات النبذة العامة </center></th>
                                            </tr>
                                            <tr class="table-success">
                                                <th> معرف النبذة العامة </th> <th> نبذة عامة </th> <th> General brief </th>
                                            </tr>
                                            <tr class="table-info">
                                                <th> '.$print["general_brief_ID"].' </th> <th> '.$_SESSION["general_brief_arabic"].' </th> <th> '.$_SESSION["general_brief_english"].' </th>
                                            </tr>
                                        </table>
                                ';
                                }
    
                                echo '
                                <form method="POST">
                                    <fieldset>
                                        <div class="col-auto">
                                            <button type="submit" name="confirm_update" class="btn btn-outline-success m-3"> Yes </button>
                                            <button type="submit" name="cancel_update" class="btn btn-outline-success m-3"> No </button>
                                        </div>
                                    </fieldset>
                                </form>
                                </div>
                                </div>
                                </center>
                                ';
                            }
                        }
                        if(isset($_POST["confirm_update"]))
                            {
                                $update_general_brief = $connect_database->prepare
                                ('
                                UPDATE general_brief SET brief_arabic = "'.$_SESSION["general_brief_arabic"].'" , brief_english = "'.$_SESSION["general_brief_english"].'"
                                WHERE general_brief_ID = '.$_SESSION["select_general_brief_ID"].'
                                ');
                                if($update_general_brief->execute())
                                {
                                    $_SESSION["submit_type"] = null;
                                    $_SESSION["type"] = null;
                                    echo '    
                                        <center><br>
                                        <div class="row align-items-center justify-content-center">
                                        <div class="col-sm-8 col-md-8 col-lg-5">
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <b>تم تحديث بيانات النبذة العامة بنجاح</b>
                                            </div>
                                        </div>
                                        </div>
                                        </center>
                                    ';
                                    header("refresh:3;url= admin.php");
                                }
                                else
                                {
                                    echo '    
                                        <center><br>
                                        <div class="row align-items-center justify-content-center">
                                        <div class="col-sm-8 col-md-8 col-lg-5">
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <b>! حدث خطأ ما</b>
                                            </div>
                                        </div>
                                        </div>
                                        </center>
                                    ';
                                }
                            }
                            elseif(isset($_POST["cancel_update"]))
                            {
                                $_SESSION["submit_type"] = null;
                                $_SESSION["type"] = null;
                                echo '    
                                    <center><br>
                                    <div class="row align-items-center justify-content-center">
                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <b>تم إلغاء التحديث بنجاح</b>
                                        </div>
                                        </div>
                                        </div>
                                    </center>
                                ';
                                header("refresh:2;url= admin.php");
                            }
                }

            //Eduction - Delete
            elseif($_SESSION["submit_type"] == "Delete" && $_SESSION["type"] == "education")
                {
                    ?>
                    <div class="row align-items-center justify-content-center">
                        <div class="col-sm-8 col-md-8 col-lg-5">
                        <center><h5><?php echo $_SESSION["input_type"]; ?></h5></center>
                            <div class="signup-form">
                                <form method="POST" class="mt-6 border p-4 bg-light shadow" style="text-align: center;">
                                    <div class="form-floating">
                                        <div class="dropdown">
                                            <select name="select_delete_education" aria-label=".form-select-sm example" class="form-control" dir="rtl" required>
                                                <option selected value="" disabled>اختر الشهادة</option>
                                                <?php
                                                    if($connect_database)
                                                    {
                                                        $select_education_id = $connect_database->prepare('SELECT * FROM education');
                                                        $select_education_id->execute();
                                                        foreach($select_education_id as $print)
                                                        {
                                                            echo '<option value="'.$print["education_ID"].'">الجهة : '.$print["issuer_arabic"].' | التخصص : '.$print["major_arabic"].' | المرحله : '.$print["level_arabic"].'</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                        <div class="row m-3">
                                            <button type="submit" name="delete_education" class="btn btn-danger m-3"> Delete </button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                    if(isset($_POST["delete_education"]))
                    {
                        $_SESSION["education_ID"] = $_POST["select_delete_education"];
                        if(empty($_SESSION["education_ID"]))
                        $_SESSION["education_ID"] = 0;

                        $comfirm_education_id = $connect_database->prepare('SELECT * FROM education WHERE education_ID = '.$_SESSION["education_ID"].'');
                        $comfirm_education_id->execute();

                        foreach($comfirm_education_id as $print)
                        {
                            echo '
                                <center>
                                <br><br>
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                    Are you sure you want to <b>Delete</b> this information ?
                                    <table class="table-success table table-bordered" style="font-size:80%;" dir="rtl">
                                        <tr class="table-warning">
                                            <th colspan="3"><center> بيانات الشهادة </center></th>
                                        </tr>
                                        <tr class="table-success">
                                            <th> الجهه </th> <th> التخصص </th> <th> المرحله </th>
                                        </tr>
                                        <tr class="table-info">
                                            <th> '.$print["issuer_arabic"].' </th> <th> '.$print["major_arabic"].' </th> <th> '.$print["level_arabic"].' </th>
                                        </tr>
                                    </table>
                            ';
                        }

                        echo '
                            <form method="POST">
                                <fieldset>
                                    <div class="col-auto">
                                        <button type="submit" name="confirm_delete" class="btn btn-outline-danger m-3"> Yes </button>
                                        <button type="submit" name="cancel_delete" class="btn btn-outline-danger m-3"> No </button>
                                    </div>
                                </fieldset>
                            </form>
                            </div>
                            </div>
                            </center>
                        ';
                    }
                    if(isset($_POST["confirm_delete"]))
                        {
                            $delete_education = $connect_database->prepare('DELETE FROM education WHERE education_ID = '.$_SESSION["education_ID"].'');
                            if($delete_education->execute())
                            {
                                $_SESSION["submit_type"] = null;
                                $_SESSION["type"] = null;
                                echo '    
                                    <center><br>
                                    <div class="row align-items-center justify-content-center">
                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <b>تم حذف بيانات التعليم بنجاح</b>
                                        </div>
                                    </div>
                                    </div>
                                    </center>
                                ';
                                header("refresh:3;url= admin.php");
                            }
                            else
                            {
                                echo '    
                                    <center><br>
                                    <div class="row align-items-center justify-content-center">
                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <b>! حدث خطأ ما</b>
                                        </div>
                                    </div>
                                    </div>
                                    </center>
                                ';
                            }
                        }
                        elseif(isset($_POST["cancel_delete"]))
                        {
                            $_SESSION["submit_type"] = null;
                            $_SESSION["type"] = null;
                            echo '    
                                <center><br>
                                <div class="row align-items-center justify-content-center">
                                <div class="col-sm-8 col-md-8 col-lg-5">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <b>تم إلغاء الحذف بنجاح</b>
                                    </div>
                                    </div>
                                    </div>
                                </center>
                            ';
                            header("refresh:2;url= admin.php");
                        }
                }
            //Experience - Delete
            elseif($_SESSION["submit_type"] == "Delete" && $_SESSION["type"] == "experience")
                {
                    ?>
                    <div class="row align-items-center justify-content-center">
                        <div class="col-sm-8 col-md-8 col-lg-5">
                        <center><h5><?php echo $_SESSION["input_type"]; ?></h5></center>
                            <div class="signup-form">
                                <form method="POST" class="mt-6 border p-4 bg-light shadow" style="text-align: center;">
                                    <div class="form-floating">
                                        <div class="dropdown">
                                            <select name="select_delete_experience" aria-label=".form-select-sm example" class="form-control" dir="rtl" required>
                                                <option selected value="" disabled>اختر الشهادة</option>
                                                <?php
                                                    if($connect_database)
                                                    {
                                                        $select_experience_id = $connect_database->prepare('SELECT * FROM experience');
                                                        $select_experience_id->execute();
                                                        foreach($select_experience_id as $print)
                                                        {
                                                            echo '<option value="'.$print["experience_ID"].'">الجهة : '.$print["issuer_arabic"].' | المسمى الوظيفي : '.$print["job_title_arabic"].'</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                        <div class="row m-3">
                                            <button type="submit" name="delete_experience" class="btn btn-danger m-3"> Delete </button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                    if(isset($_POST["delete_experience"]))
                    {
                        $_SESSION["experience_ID"] = $_POST["select_delete_experience"];
                        if(empty($_SESSION["experience_ID"]))
                        $_SESSION["experience_ID"] = 0;

                        $comfirm_experience_id = $connect_database->prepare('SELECT * FROM experience WHERE experience_ID = '.$_SESSION["experience_ID"].'');
                        $comfirm_experience_id->execute();

                        foreach($comfirm_experience_id as $print)
                        {
                            echo '
                                <center>
                                <br><br>
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                    Are you sure you want to <b>Delete</b> this information ?
                                    <table class="table-success table table-bordered" style="font-size:80%;" dir="rtl">
                                        <tr class="table-warning">
                                            <th colspan="2"><center> بيانات الوظيفة </center></th>
                                        </tr>
                                        <tr class="table-success">
                                            <th> الجهه </th> <th> المسمى الوظيفي </th>
                                        </tr>
                                        <tr class="table-info">
                                            <th> '.$print["issuer_arabic"].' </th> <th> '.$print["job_title_arabic"].' </th>
                                        </tr>
                                    </table>
                            ';
                        }

                        echo '
                            <form method="POST">
                                <fieldset>
                                    <div class="col-auto">
                                        <button type="submit" name="confirm_delete" class="btn btn-outline-danger m-3"> Yes </button>
                                        <button type="submit" name="cancel_delete" class="btn btn-outline-danger m-3"> No </button>
                                    </div>
                                </fieldset>
                            </form>
                            </div>
                            </div>
                            </center>
                        ';
                    }
                    if(isset($_POST["confirm_delete"]))
                        {
                            $delete_experience = $connect_database->prepare('DELETE FROM experience WHERE experience_ID = '.$_SESSION["experience_ID"].'');
                            if($delete_experience->execute())
                            {
                                $_SESSION["submit_type"] = null;
                                $_SESSION["type"] = null;
                                echo '    
                                    <center><br>
                                    <div class="row align-items-center justify-content-center">
                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <b>تم حذف بيانات الخبرة بنجاح</b>
                                        </div>
                                    </div>
                                    </div>
                                    </center>
                                ';
                                header("refresh:3;url= admin.php");
                            }
                            else
                            {
                                echo '    
                                    <center><br>
                                    <div class="row align-items-center justify-content-center">
                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <b>! حدث خطأ ما</b>
                                        </div>
                                    </div>
                                    </div>
                                    </center>
                                ';
                            }
                        }
                        elseif(isset($_POST["cancel_delete"]))
                        {
                            $_SESSION["submit_type"] = null;
                            $_SESSION["type"] = null;
                            echo '    
                                <center><br>
                                <div class="row align-items-center justify-content-center">
                                <div class="col-sm-8 col-md-8 col-lg-5">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <b>تم إلغاء الحذف بنجاح</b>
                                    </div>
                                    </div>
                                    </div>
                                </center>
                            ';
                            header("refresh:2;url= admin.php");
                        }
                }
            //Courses - Delete
            elseif($_SESSION["submit_type"] == "Delete" && $_SESSION["type"] == "courses")
                {
                    ?>
                    <div class="row align-items-center justify-content-center">
                        <div class="col-sm-8 col-md-8 col-lg-5">
                        <center><h5><?php echo $_SESSION["input_type"]; ?></h5></center>
                            <div class="signup-form">
                                <form method="POST" class="mt-6 border p-4 bg-light shadow" style="text-align: center;">
                                    <div class="form-floating">
                                        <div class="dropdown">
                                            <select name="select_delete_course" aria-label=".form-select-sm example" class="form-control" dir="rtl" required>
                                                <option selected value="" disabled>اختر الشهادة</option>
                                                <?php
                                                    if($connect_database)
                                                    {
                                                        $select_courses_id = $connect_database->prepare('SELECT * FROM courses');
                                                        $select_courses_id->execute();
                                                        foreach($select_courses_id as $print)
                                                        {
                                                            echo '<option value="'.$print["course_ID"].'">
                                                            الجهة : '.$print["issuer_arabic"].' | مسمى الدورة  : '.$print["course_title_arabic"].' | تاريخ النهاية : '.$print["end_date"].'
                                                            </option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                        <div class="row m-3">
                                            <button type="submit" name="delete_course" class="btn btn-danger m-3"> Delete </button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                    if(isset($_POST["delete_course"]))
                    {
                        $_SESSION["course_ID"] = $_POST["select_delete_course"];
                        if(empty($_SESSION["course_ID"]))
                        $_SESSION["course_ID"] = 0;

                        $comfirm_courses_id = $connect_database->prepare('SELECT * FROM courses WHERE course_ID = '.$_SESSION["course_ID"].'');
                        $comfirm_courses_id->execute();

                        foreach($comfirm_courses_id as $print)
                        {
                            echo '
                                <center>
                                <br><br>
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                    Are you sure you want to <b>Delete</b> this information ?
                                    <table class="table-success table table-bordered" style="font-size:80%;" dir="rtl">
                                        <tr class="table-warning">
                                            <th colspan="3"><center> بيانات الدورة </center></th>
                                        </tr>
                                        <tr class="table-success">
                                            <th> الجهه </th> <th> مسمى الدورة </th> <th> تاريخ النهاية </th>
                                        </tr>
                                        <tr class="table-info">
                                            <th> '.$print["issuer_arabic"].' </th> <th> '.$print["course_title_arabic"].' </th> <th> '.$print["end_date"].' </th>
                                        </tr>
                                    </table>
                            ';
                        }

                        echo '
                            <form method="POST">
                                <fieldset>
                                    <div class="col-auto">
                                        <button type="submit" name="confirm_delete" class="btn btn-outline-danger m-3"> Yes </button>
                                        <button type="submit" name="cancel_delete" class="btn btn-outline-danger m-3"> No </button>
                                    </div>
                                </fieldset>
                            </form>
                            </div>
                            </div>
                            </center>
                        ';
                    }
                    if(isset($_POST["confirm_delete"]))
                        {
                            $delete_course = $connect_database->prepare('DELETE FROM courses WHERE course_ID = '.$_SESSION["course_ID"].'');
                            if($delete_course->execute())
                            {
                                $_SESSION["submit_type"] = null;
                                $_SESSION["type"] = null;
                                echo '    
                                    <center><br>
                                    <div class="row align-items-center justify-content-center">
                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <b>تم حذف بيانات الدورة بنجاح</b>
                                        </div>
                                    </div>
                                    </div>
                                    </center>
                                ';
                                header("refresh:3;url= admin.php");
                            }
                            else
                            {
                                echo '    
                                    <center><br>
                                    <div class="row align-items-center justify-content-center">
                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <b>! حدث خطأ ما</b>
                                        </div>
                                    </div>
                                    </div>
                                    </center>
                                ';
                            }
                        }
                        elseif(isset($_POST["cancel_delete"]))
                        {
                            $_SESSION["submit_type"] = null;
                            $_SESSION["type"] = null;
                            echo '    
                                <center><br>
                                <div class="row align-items-center justify-content-center">
                                <div class="col-sm-8 col-md-8 col-lg-5">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <b>تم إلغاء الحذف بنجاح</b>
                                    </div>
                                    </div>
                                    </div>
                                </center>
                            ';
                            header("refresh:2;url= admin.php");
                        }
                }
            //Projects - Delete
            elseif($_SESSION["submit_type"] == "Delete" && $_SESSION["type"] == "projects")
                {
                    ?>
                    <div class="row align-items-center justify-content-center">
                        <div class="col-sm-8 col-md-8 col-lg-5">
                        <center><h5><?php echo $_SESSION["input_type"]; ?></h5></center>
                            <div class="signup-form">
                                <form method="POST" class="mt-6 border p-4 bg-light shadow" style="text-align: center;">
                                    <div class="form-floating">
                                        <div class="dropdown">
                                            <select name="select_delete_project" aria-label=".form-select-sm example" class="form-control" dir="rtl" required>
                                                <option selected value="" disabled>اختر المشروع</option>
                                                <?php
                                                    if($connect_database)
                                                    {
                                                        $select_project_id = $connect_database->prepare('SELECT * FROM projects');
                                                        $select_project_id->execute();
                                                        foreach($select_project_id as $print)
                                                        {
                                                            echo '<option value="'.$print["project_ID"].'">
                                                            اسم المشروع : '.$print["name_arabic"].' | رابط المشروع : '.$print["url"].' | تاريخ الإنتهاء : '.$print["end_date"].'
                                                            </option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                        <div class="row m-3">
                                            <button type="submit" name="delete_project" class="btn btn-danger m-3"> Delete </button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                    if(isset($_POST["delete_project"]))
                    {
                        $_SESSION["project_ID"] = $_POST["select_delete_project"];
                        if(empty($_SESSION["project_ID"]))
                        $_SESSION["project_ID"] = 0;

                        $comfirm_project_id = $connect_database->prepare('SELECT * FROM projects WHERE project_ID = '.$_SESSION["project_ID"].'');
                        $comfirm_project_id->execute();

                        foreach($comfirm_project_id as $print)
                        {
                            echo '
                                <center>
                                <br><br>
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                    Are you sure you want to <b>Delete</b> this information ?
                                    <table class="table-success table table-bordered" style="font-size:80%;" dir="rtl">
                                        <tr class="table-warning">
                                            <th colspan="3"><center> بيانات المشروع </center></th>
                                        </tr>
                                        <tr class="table-success">
                                            <th> اسم المشروع </th> <th> رابط المشروع </th> <th> تاريخ الإنتهاء </th>
                                        </tr>
                                        <tr class="table-info">
                                            <th> '.$print["name_arabic"].' </th> <th> '.$print["url"].' </th> <th> '.$print["end_date"].' </th>
                                        </tr>
                                    </table>
                            ';
                        }

                        echo '
                            <form method="POST">
                                <fieldset>
                                    <div class="col-auto">
                                        <button type="submit" name="confirm_delete" class="btn btn-outline-danger m-3"> Yes </button>
                                        <button type="submit" name="cancel_delete" class="btn btn-outline-danger m-3"> No </button>
                                    </div>
                                </fieldset>
                            </form>
                            </div>
                            </div>
                            </center>
                        ';
                    }
                    if(isset($_POST["confirm_delete"]))
                        {
                            $delete_project = $connect_database->prepare('DELETE FROM projects WHERE project_ID = '.$_SESSION["project_ID"].'');
                            if($delete_project->execute())
                            {
                                $_SESSION["submit_type"] = null;
                                $_SESSION["type"] = null;
                                echo '    
                                    <center><br>
                                    <div class="row align-items-center justify-content-center">
                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <b>تم حذف بيانات المشروع بنجاح</b>
                                        </div>
                                    </div>
                                    </div>
                                    </center>
                                ';
                                header("refresh:3;url= admin.php");
                            }
                            else
                            {
                                echo '    
                                    <center><br>
                                    <div class="row align-items-center justify-content-center">
                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <b>! حدث خطأ ما</b>
                                        </div>
                                    </div>
                                    </div>
                                    </center>
                                ';
                            }
                        }
                        elseif(isset($_POST["cancel_delete"]))
                        {
                            $_SESSION["submit_type"] = null;
                            $_SESSION["type"] = null;
                            echo '    
                                <center><br>
                                <div class="row align-items-center justify-content-center">
                                <div class="col-sm-8 col-md-8 col-lg-5">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <b>تم إلغاء الحذف بنجاح</b>
                                    </div>
                                    </div>
                                    </div>
                                </center>
                            ';
                            header("refresh:2;url= admin.php");
                        }
                }
            //General brief - Delete
            elseif($_SESSION["submit_type"] == "Delete" && $_SESSION["type"] == "general_brief")
                {
                    ?>
                    <div class="row align-items-center justify-content-center">
                        <div class="col-sm-8 col-md-8 col-lg-5">
                        <center><h5><?php echo $_SESSION["input_type"]; ?></h5></center>
                            <div class="signup-form">
                                <form method="POST" class="mt-6 border p-4 bg-light shadow" style="text-align: center;">
                                    <div class="form-floating">
                                        <div class="dropdown">
                                            <select name="select_delete_general_brief" aria-label=".form-select-sm example" class="form-control" dir="rtl" required>
                                                <option selected value="" disabled>اختر النبذة العامة</option>
                                                <?php
                                                    if($connect_database)
                                                    {
                                                        $select_project_id = $connect_database->prepare('SELECT * FROM general_brief');
                                                        $select_project_id->execute();
                                                        foreach($select_project_id as $print)
                                                        {
                                                            echo '<option value="'.$print["general_brief_ID"].'">معرف النبذة العامة : '.$print["general_brief_ID"].'</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                        <div class="row m-3">
                                            <button type="submit" name="delete_general_brief" class="btn btn-danger m-3"> Delete </button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                        if(isset($_POST["delete_general_brief"]))
                        {
                            $_SESSION["general_brief_ID"] = $_POST["select_delete_general_brief"];
                            if(empty($_SESSION["general_brief_ID"]))
                            $_SESSION["general_brief_ID"] = 0;
    
                            $comfirm_general_brief_id = $connect_database->prepare('SELECT * FROM general_brief WHERE general_brief_ID = '.$_SESSION["general_brief_ID"].'');
                            $comfirm_general_brief_id->execute();
    
                            foreach($comfirm_general_brief_id as $print)
                            {
                                echo '
                                    <center>
                                    <br><br>
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-sm-8 col-md-8 col-lg-5">
                                        Are you sure you want to <b>Delete</b> this information ?
                                        <table class="table-success table table-bordered" style="font-size:80%;" dir="rtl">
                                            <tr class="table-warning">
                                                <th colspan="3"><center> بيانات النبذة العامة </center></th>
                                            </tr>
                                            <tr class="table-success">
                                                <th> معرف النبذة العامة </th> <th> نبذة عامة </th> <th> General brief </th>
                                            </tr>
                                            <tr class="table-info">
                                                <th> '.$print["general_brief_ID"].' </th> <th> '.$print["brief_arabic"].' </th> <th> '.$print["brief_english"].' </th>
                                            </tr>
                                        </table>
                                ';
                            }
    
                            echo '
                                <form method="POST">
                                    <fieldset>
                                        <div class="col-auto">
                                            <button type="submit" name="confirm_delete" class="btn btn-outline-danger m-3"> Yes </button>
                                            <button type="submit" name="cancel_delete" class="btn btn-outline-danger m-3"> No </button>
                                        </div>
                                    </fieldset>
                                </form>
                                </div>
                                </div>
                                </center>
                            ';
                        }
                        if(isset($_POST["confirm_delete"]))
                            {
                                $delete_general_brief = $connect_database->prepare('DELETE FROM general_brief WHERE general_brief_ID = '.$_SESSION["general_brief_ID"].'');
                                if($delete_general_brief->execute())
                                {
                                    $_SESSION["submit_type"] = null;
                                    $_SESSION["type"] = null;
                                    echo '    
                                        <center><br>
                                        <div class="row align-items-center justify-content-center">
                                        <div class="col-sm-8 col-md-8 col-lg-5">
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <b>تم حذف بيانات النبذة العامة بنجاح</b>
                                            </div>
                                        </div>
                                        </div>
                                        </center>
                                    ';
                                    header("refresh:3;url= admin.php");
                                }
                                else
                                {
                                    echo '    
                                        <center><br>
                                        <div class="row align-items-center justify-content-center">
                                        <div class="col-sm-8 col-md-8 col-lg-5">
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <b>! حدث خطأ ما</b>
                                            </div>
                                        </div>
                                        </div>
                                        </center>
                                    ';
                                }
                            }
                            elseif(isset($_POST["cancel_delete"]))
                            {
                                $_SESSION["submit_type"] = null;
                                $_SESSION["type"] = null;
                                echo '    
                                    <center><br>
                                    <div class="row align-items-center justify-content-center">
                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <b>تم إلغاء الحذف بنجاح</b>
                                        </div>
                                        </div>
                                        </div>
                                    </center>
                                ';
                                header("refresh:2;url= admin.php");
                            }
                }

            //يرجى اختيار نوع العملية
            else
                {
                    echo '<center><h1>يرجى اختيار نوع العملية</h1></center><br><br><br><br><br><br><br><br>';
                }
        ?>
        <style>
            input::-webkit-inner-spin-button,
            input::-webkit-outer-spin-button 
            {
                -webkit-appearance: none;
            }
        </style>
        <?php require_once 'footer.php'; ?>
        
    </body>
</html>