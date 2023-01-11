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
        ob_start();
        ?>
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
                            <option selected value="" disabled>Choose input type | اختر نوع الإدخال</option>
                            <option value="education">Education | التعليم</option>
                            <option value="experience">Experience | الخبرات</option>
                            <option value="courses">Courses | الدورات</option>
                            <option value="hobbies">Hobbies | الهوايات</option>
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
                            case "hobbies" :
                                $_SESSION["input_type"] = "Hobbies | الهوايات";
                                break;
                            default : 
                                $_SESSION["input_type"] = "";
                        }
                }
            if(isset($_POST["insert"]))
                $_SESSION["submit_type"] = $_POST["insert"];
            elseif(isset($_POST["update"]))
                $_SESSION["submit_type"] = $_POST["update"];
            elseif(isset($_POST["delete"]))
                $_SESSION["submit_type"] = $_POST["delete"];
            elseif(empty($_SESSION["submit_type"]))
                $_SESSION["submit_type"] = "";

            if(!empty($_POST["type"]))
                $_SESSION["type"] = $_POST["type"];

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
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="certificate photo | صورة الشهادة" disabled>
                                                        <input type="file" name="education_photo" accept="image/*" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                </div>
                                                <div class="form-floating">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="Start date | تاريخ البداية" disabled>
                                                        <input type="date" name="education_start_date" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="End date | تاريخ النهاية" disabled>
                                                        <input type="date" name="education_end_date" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                </div>
                                                <div class="row m-3">
                                                    <input type="submit" name="education_insert_info" class="btn btn-primary" value="Insert info">
                                                </div>
                                            </form>
                                        </div>
                                        <br>
                    <?php
                        if(!empty($_POST["education_issuer_arabic"]) && !empty($_POST["education_major_arabic"]) && !empty($_POST["education_level_arabic"]) &&
                        !empty($_POST["education_issuer_english"]) && !empty($_POST["education_major_english"]) && !empty($_POST["education_level_english"]) &&
                        !empty($_POST["education_average"]) &&!empty($_POST["education_average_from"]) && !empty($_POST["education_photo"]) &&
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
                                                    "'.$_POST["education_photo"].'" , "'.$_POST["education_start_date"].'" , "'.$_POST["education_end_date"].'"
                                                )
                                            ');
                                            if($insert_education_info->execute())
                                                {
                                                    $_SESSION["submit_type"] = null;
                                                    $_SESSION["type"] = null;
                                                    echo '<center><div class="alert alert-success" role="alert">تم إضافة بيانات التعليم بنجاح</div></center>';
                                                    header("refresh:2;url= admin.php");
                                                }
                                            else
                                                {
                                                    echo '<center><div class="alert alert-danger" role="alert">! حدث خطأ ما </div></center>';
                                                    header("refresh:2;url= admin.php");
                                                }
                                        }
                                    echo '</div></div></div><br>';
                                }
                                elseif(($_POST["education_level_arabic"] == 'الثانوية العامة') && ($_POST["education_level_english"] != 'High school'))
                                        echo '<center><div class="alert alert-danger" role="alert">! المستوى التعليمي المدخل غير متطابق</div></center>';
                                elseif(($_POST["education_level_arabic"] == 'دبلوم') && ($_POST["education_level_english"] != 'Diploma'))
                                        echo '<center><div class="alert alert-danger" role="alert">! المستوى التعليمي المدخل غير متطابق</div></center>';
                                elseif(($_POST["education_level_arabic"] == 'بكالرويس') && ($_POST["education_level_english"] != 'Baccalaureus'))
                                        echo '<center><div class="alert alert-danger" role="alert">! المستوى التعليمي المدخل غير متطابق</div></center>';
                                elseif(($_POST["education_level_arabic"] == 'ماجستير') && ($_POST["education_level_english"] != 'Master'))
                                        echo '<center><div class="alert alert-danger" role="alert">! المستوى التعليمي المدخل غير متطابق</div></center>';
                                elseif(($_POST["education_level_arabic"] == 'دكتوراه') && ($_POST["education_level_english"] != 'PhD'))
                                        echo '<center><div class="alert alert-danger" role="alert">! المستوى التعليمي المدخل غير متطابق</div></center>';
                                elseif(($_POST["education_average_from"] == 100) && ($_POST["education_level_arabic"] != 'الثانوية العامة'))
                                        echo '<center><div class="alert alert-danger" role="alert">! المعدل من" المدخل يجب أن يساوي 4.00 أو 5.00"</div></center>';
                                elseif(($_POST["education_average_from"] == 4.00) || ($_POST["education_average_from"] == 5.00) && ($_POST["education_level_arabic"] == 'الثانوية العامة'))
                                        echo '<center><div class="alert alert-danger" role="alert">! المعدل من" المدخل يجب أن يساوي 100"</div></center>';
                                elseif(($_POST["education_average"] > $_POST["education_average_from"]))
                                        echo '<center><div class="alert alert-danger" role="alert">! المعدل المدخل أكبر من '.$_POST["education_average_from"].'</div></center>';
                                elseif(($_POST["education_average"] < ($_POST["education_average_from"]*0.7)))
                                        echo '<center><div class="alert alert-danger" role="alert">! المعدل المدخل أقل من '.$_POST["education_average_from"]*0.7.'</div></center>';
                                elseif(($_POST["education_start_date"] >= ($_POST["education_end_date"])))
                                        echo '<center><div class="alert alert-danger" role="alert">! يجب أن يكون تاريخ البداية أقل من تاريخ النهاية</div></center>';
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
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="certificate photo | صورة الشهادة" disabled>
                                                        <input type="file" name="experience_photo" accept="image/*" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                </div>
                                                <div class="form-floating">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="Start date | تاريخ البداية" disabled>
                                                        <input type="date" name="experience_start_date" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="End date | تاريخ النهاية" disabled>
                                                        <input type="date" name="experience_end_date" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                </div>
                                                <div class="row m-3">
                                                    <input type="submit" name="experience_insert_info" class="btn btn-primary" value="Insert info">
                                                </div>
                                            </form>
                                        </div>
                        <br>
                    <?php
                        if(!empty($_POST["experience_issuer_arabic"]) && !empty($_POST["experience_job_title_arabic"]) && !empty($_POST["experience_brief_arabic"]) &&
                        !empty($_POST["experience_issuer_english"]) && !empty($_POST["experience_job_title_english"]) && !empty($_POST["experience_brief_english"]) &&
                        !empty($_POST["experience_photo"]) && !empty($_POST["experience_start_date"]) && !empty($_POST["experience_end_date"]))
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
                                                    "'.$_POST["experience_start_date"].'" , "'.$_POST["experience_end_date"].'" , "'.$_POST["experience_photo"].'"
                                                )
                                            ');
                                            if($insert_experience_info->execute())
                                                {
                                                    $_SESSION["submit_type"] = null;
                                                    $_SESSION["type"] = null;
                                                    echo '<center><div class="alert alert-success" role="alert">تم إضافة بيانات الخبرة بنجاح</div></center>';
                                                    header("refresh:2;url= admin.php");
                                                }
                                            else
                                                {
                                                    echo '<center><div class="alert alert-danger" role="alert">! حدث خطأ ما </div></center>';
                                                    header("refresh:2;url= admin.php");
                                                }
                                        }
                                    echo '</div></div></div><br>';
                                }
                                elseif(($_POST["experience_start_date"] >= ($_POST["experience_end_date"])))
                                        echo '<center><div class="alert alert-danger" role="alert">! يجب أن يكون تاريخ البداية أقل من تاريخ النهاية</div></center>';
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
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="certificate photo | صورة الشهادة" disabled>
                                                        <input type="file" name="courses_photo" accept="image/*" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                </div>
                                                <div class="form-floating">
                                                        <input type="number" name="courses_hours" max="99" class="form-control" id="floatingPassword" placeholder="Hours | الساعات" required>
                                                        <label for="floatingPassword">Hours | الساعات</label>
                                                    </div>
                                                <div class="form-floating">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="Start date | تاريخ البداية" disabled>
                                                        <input type="date" name="courses_start_date" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="End date | تاريخ النهاية" disabled>
                                                        <input type="date" name="courses_end_date" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                </div>
                                                <div class="row m-3">
                                                    <input type="submit" name="courses_insert_info" class="btn btn-primary" value="Insert info">
                                                </div>
                                            </form>
                                        </div>
                        <br>
                    <?php
                        if(!empty($_POST["courses_issuer_arabic"]) && !empty($_POST["course_title_arabic"]) && !empty($_POST["courses_brief_arabic"]) &&
                        !empty($_POST["courses_issuer_english"]) && !empty($_POST["course_title_english"]) && !empty($_POST["courses_brief_english"]) &&
                        !empty($_POST["courses_photo"]) && !empty($_POST["courses_hours"]) && !empty($_POST["courses_start_date"]) &&
                        !empty($_POST["courses_end_date"]))
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
                                                        "'.$_POST["courses_start_date"].'" , "'.$_POST["courses_end_date"].'" , "'.$_POST["courses_photo"].'"
                                                    )
                                                ');
                                                if($insert_courses_info->execute())
                                                    {
                                                        $_SESSION["submit_type"] = null;
                                                        $_SESSION["type"] = null;
                                                        echo '<center><div class="alert alert-success" role="alert">تم إضافة بيانات الدورة بنجاح</div></center>';
                                                        header("refresh:2;url= admin.php");
                                                    }
                                                else
                                                    {
                                                        echo '<center><div class="alert alert-danger" role="alert">! حدث خطأ ما </div></center>';
                                                        header("refresh:2;url= admin.php");
                                                    }
                                            }
                                        echo '</div></div></div><br>';
                                    }
                                    elseif(($_POST["courses_start_date"] >= ($_POST["courses_end_date"])))
                                        echo '<center><div class="alert alert-danger" role="alert">! يجب أن يكون تاريخ البداية أقل من تاريخ النهاية</div></center>';
                            }
                }
            //Hobbies
            // elseif(($_SESSION["submit_type"] == "Insert" || $_SESSION["submit_type"] == "Update" || $_SESSION["submit_type"] == "Delete") && $_SESSION["type"] == "hobbies")
            //     {
            //         echo '<center><h3>Hobbies</h3><br><h3>الصفحة تحت الإنشاء</h3></center>';
            //     }
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
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="certificate photo | صورة الشهادة" disabled>
                                                        <input type="file" name="education_photo" accept="image/*" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                </div>
                                                <div class="form-floating">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="Start date | تاريخ البداية" disabled>
                                                        <input type="date" name="education_start_date" value="<?php echo $print["start_date"]; ?>" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="End date | تاريخ النهاية" disabled>
                                                        <input type="date" name="education_end_date" value="<?php echo $print["end_date"]; ?>" class="form-control" aria-label="Text input with segmented dropdown button" required>
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
                                !empty($_POST["education_average"]) &&!empty($_POST["education_average_from"]) && !empty($_POST["education_photo"]) &&
                                !empty($_POST["education_start_date"]) && !empty($_POST["education_end_date"]))
                                {
                                    $_SESSION["education_issuer_arabic"] = $_POST["education_issuer_arabic"];$_SESSION["education_major_arabic"] = $_POST["education_major_arabic"];
                                    $_SESSION["education_level_arabic"] = $_POST["education_level_arabic"];$_SESSION["education_issuer_english"] = $_POST["education_issuer_english"];
                                    $_SESSION["education_major_english"] = $_POST["education_major_english"];$_SESSION["education_level_english"] = $_POST["education_level_english"];
                                    $_SESSION["education_average"] = $_POST["education_average"];$_SESSION["education_average_from"] = $_POST["education_average_from"];
                                    $_SESSION["education_photo"] = $_POST["education_photo"];$_SESSION["education_start_date"] = $_POST["education_start_date"];
                                    $_SESSION["education_end_date"] = $_POST["education_end_date"];
                                    
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
                                                                <th> Level </th> <th> المعدل من </th> <th> المعدل </th> <th> الصورة </th> <th> تاريخ البداية </th>
                                                                <th> تاريخ النهاية </th>
                                                            </tr>
                                                            <tr class="table-info">
                                                                <th> '.$_POST["education_issuer_arabic"].' </th> <th> '.$_POST["education_major_arabic"].' </th>
                                                                <th> '.$_POST["education_level_arabic"].' </th> <th> '.$_POST["education_issuer_english"].' </th>
                                                                <th> '.$_POST["education_major_english"].' </th> <th> '.$_POST["education_level_english"].' </th>
                                                                <th> '.$_POST["education_average_from"].' </th> <th> '.$_POST["education_average"].' </th>
                                                                <th> '.$_POST["education_photo"].' </th>
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
                                            // echo '</div></div></div><br>';
                                    }
                                        elseif(($_POST["education_level_arabic"] == 'الثانوية العامة') && ($_POST["education_level_english"] != 'High school'))
                                                echo '<center><div class="alert alert-danger" role="alert">! المستوى التعليمي المدخل غير متطابق</div></center>';
                                        elseif(($_POST["education_level_arabic"] == 'دبلوم') && ($_POST["education_level_english"] != 'Diploma'))
                                                echo '<center><div class="alert alert-danger" role="alert">! المستوى التعليمي المدخل غير متطابق</div></center>';
                                        elseif(($_POST["education_level_arabic"] == 'بكالرويس') && ($_POST["education_level_english"] != 'Baccalaureus'))
                                                echo '<center><div class="alert alert-danger" role="alert">! المستوى التعليمي المدخل غير متطابق</div></center>';
                                        elseif(($_POST["education_level_arabic"] == 'ماجستير') && ($_POST["education_level_english"] != 'Master'))
                                                echo '<center><div class="alert alert-danger" role="alert">! المستوى التعليمي المدخل غير متطابق</div></center>';
                                        elseif(($_POST["education_level_arabic"] == 'دكتوراه') && ($_POST["education_level_english"] != 'PhD'))
                                                echo '<center><div class="alert alert-danger" role="alert">! المستوى التعليمي المدخل غير متطابق</div></center>';
                                        elseif(($_POST["education_average_from"] == 100) && ($_POST["education_level_arabic"] != 'الثانوية العامة'))
                                                echo '<center><div class="alert alert-danger" role="alert">! المعدل من" المدخل يجب أن يساوي 4.00 أو 5.00"</div></center>';
                                        elseif(($_POST["education_average_from"] == 4.00) || ($_POST["education_average_from"] == 5.00) && ($_POST["education_level_arabic"] == 'الثانوية العامة'))
                                                echo '<center><div class="alert alert-danger" role="alert">! المعدل من" المدخل يجب أن يساوي 100"</div></center>';
                                        elseif(($_POST["education_average"] > $_POST["education_average_from"]))
                                                echo '<center><div class="alert alert-danger" role="alert">! المعدل المدخل أكبر من '.$_POST["average_from"].'</div></center>';
                                        elseif(($_POST["education_average"] < ($_POST["education_average_from"]*0.7)))
                                                echo '<center><div class="alert alert-danger" role="alert">! المعدل المدخل أقل من '.$_POST["average_from"]*0.7.'</div></center>';
                                        elseif(($_POST["education_start_date"] >= ($_POST["education_end_date"])))
                                                echo '<center><div class="alert alert-danger" role="alert">! يجب أن يكون تاريخ البداية أقل من تاريخ النهاية</div></center>';
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
                                                            average_from = '.$_SESSION["education_average_from"].' , photo = "'.$_SESSION["education_photo"].'" ,
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
                                                            header("refresh:2;url= admin.php");
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
                                            echo '    
                                                <center>
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
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="certificate photo | صورة الشهادة" disabled>
                                                        <input type="file" name="experience_photo" value="<?php echo $print["photo"]; ?>" accept="image/*" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                </div>
                                                <div class="form-floating">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="Start date | تاريخ البداية" disabled>
                                                        <input type="date" name="experience_start_date" value="<?php echo $print["start_date"]; ?>" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="End date | تاريخ النهاية" disabled>
                                                        <input type="date" name="experience_end_date" value="<?php echo $print["end_date"]; ?>" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                </div>
                                                <div class="row m-3">
                                                    <input type="submit" name="experience_update_info" class="btn btn-success" value="Update info">
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                <?php
                            }
                        }
                        if(!empty($_POST["experience_issuer_arabic"]) && !empty($_POST["experience_job_title_arabic"]) && !empty($_POST["experience_brief_arabic"]) &&
                        !empty($_POST["experience_issuer_english"]) && !empty($_POST["experience_job_title_english"]) && !empty($_POST["experience_brief_english"]) &&
                        !empty($_POST["experience_photo"]) && !empty($_POST["experience_start_date"]) && !empty($_POST["experience_end_date"]))
                        {
                            $_SESSION["experience_issuer_arabic"] = $_POST["experience_issuer_arabic"]; $_SESSION["experience_job_title_arabic"] = $_POST["experience_job_title_arabic"];
                            $_SESSION["experience_brief_arabic"] = $_POST["experience_brief_arabic"]; $_SESSION["experience_issuer_english"] = $_POST["experience_issuer_english"];
                            $_SESSION["experience_job_title_english"] = $_POST["experience_job_title_english"]; $_SESSION["experience_brief_english"] = $_POST["experience_brief_english"];
                            $_SESSION["experience_photo"] = $_POST["experience_photo"]; $_SESSION["experience_start_date"] = $_POST["experience_start_date"];
                            $_SESSION["experience_end_date"] = $_POST["experience_end_date"];

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
                                                        <th> Experience brief </th> <th> تاريخ البداية </th> <th> تاريخ النهاية </th> <th> الصورة </th>
                                                        </tr>
                                                        <tr class="table-info">
                                                        <th> '.$_POST["experience_issuer_arabic"].' </th> <th> '.$_POST["experience_job_title_arabic"].' </th>
                                                        <th> '.$_POST["experience_brief_arabic"].' </th> <th> '.$_POST["experience_issuer_english"].' </th>
                                                        <th> '.$_POST["experience_job_title_english"].' </th> <th> '.$_POST["experience_brief_english"].' </th>
                                                        <th> '.$_POST["experience_start_date"].' </th> <th> '.$_POST["experience_end_date"].' </th>
                                                        <th> '.$_POST["experience_photo"].' </th>
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
                                            $update_experience = $connect_database->prepare('
                                            UPDATE experience SET
                                            issuer_arabic = "'.$_SESSION["experience_issuer_arabic"].'" , job_title_arabic = "'.$_SESSION["experience_job_title_arabic"].'" ,
                                            brief_arabic = "'.$_SESSION["experience_brief_arabic"].'" , issuer_english = "'.$_SESSION["experience_issuer_english"].'" ,
                                            job_title_english = "'.$_SESSION["experience_job_title_english"].'" , brief_english = "'.$_SESSION["experience_brief_english"].'" ,
                                            start_date = "'.$_SESSION["experience_start_date"].'" , end_date = "'.$_SESSION["experience_end_date"].'" ,
                                            photo = "'.$_SESSION["experience_photo"].'"
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
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="certificate photo | صورة الشهادة" disabled>
                                                        <input type="file" name="courses_photo" value="<?php echo $print["photo"]; ?>" accept="image/*" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                </div>
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
                                                        <input type="date" name="courses_end_date" value="<?php echo $print["end_date"]; ?>" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                </div>
                                                <div class="row m-3">
                                                    <input type="submit" name="courses_update_info" class="btn btn-success" value="Update info">
                                                </div>
                                            </form>
                                        </div>
                                        <?php
                            }   
                        }
                                            if(!empty($_POST["courses_issuer_arabic"]) && !empty($_POST["course_title_arabic"]) && !empty($_POST["courses_brief_arabic"]) &&
                                            !empty($_POST["courses_issuer_english"]) && !empty($_POST["course_title_english"]) && !empty($_POST["courses_brief_english"]) &&
                                            !empty($_POST["courses_photo"]) && !empty($_POST["courses_hours"]) && !empty($_POST["courses_start_date"]) &&
                                            !empty($_POST["courses_end_date"]))
                                            {
                                                $_SESSION["courses_issuer_arabic"] = $_POST["courses_issuer_arabic"];$_SESSION["course_title_arabic"] = $_POST["course_title_arabic"];
                                                $_SESSION["courses_issuer_english"] = $_POST["courses_issuer_english"];$_SESSION["course_title_english"] = $_POST["course_title_english"];
                                                $_SESSION["courses_brief_english"] = $_POST["courses_brief_english"];$_SESSION["courses_photo"] = $_POST["courses_photo"];
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
                                                            <th> Course title </th> <th> Course brief </th> <th> الساعات </th> <th> الصورة </th>
                                                            <th> تاريخ البداية </th> <th> تاريخ النهاية </th>
                                                            </tr>
                                                            <tr class="table-info">
                                                            <th> '.$_SESSION["courses_issuer_arabic"].' </th> <th> '.$_SESSION["course_title_arabic"].' </th>
                                                            <th> '.$_SESSION["courses_brief_arabic"].' </th> <th> '.$_SESSION["courses_issuer_english"].' </th>
                                                            <th> '.$_SESSION["course_title_english"].' </th> <th> '.$_SESSION["courses_brief_english"].' </th>
                                                            <th> '.$_SESSION["courses_hours"].' </th> <th> '.$_SESSION["courses_photo"].' </th>
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
                                            }
                                                    if(isset($_POST["confirm_update"]))
                                                    {
                                                        $delete_course = $connect_database->prepare('
                                                        UPDATE courses SET
                                                        issuer_arabic = "'.$_SESSION["courses_issuer_arabic"].'" , course_title_arabic = "'.$_SESSION["course_title_arabic"].'" , 
                                                        brief_arabic = "'.$_SESSION["courses_brief_arabic"].'" , issuer_english = "'.$_SESSION["courses_issuer_english"].'" , 
                                                        course_title_english = "'.$_SESSION["course_title_english"].'" , brief_english = "'.$_SESSION["courses_brief_english"].'" , 
                                                        photo = "'.$_SESSION["courses_photo"].'" , hours = '.$_SESSION["courses_hours"].' , 
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
                                                            <b>تم تحديث بيانات الشهادة بنجاح</b>
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
                                            <select name="delete_education" aria-label=".form-select-sm example" class="form-control" dir="rtl" required>
                                                <option selected value="" disabled>اختر الشهادة</option>
                                                <?php
                                                    if($connect_database)
                                                    {
                                                        $select_education_id = $connect_database->prepare('SELECT * FROM education');
                                                        $select_education_id->execute();
                                                        foreach($select_education_id as $print)
                                                        {
                                                            echo '<option value"'.$print["education_ID"].'">الجهة : '.$print["issuer_arabic"].' | التخصص : '.$print["major_arabic"].' | المرحله : '.$print["level_arabic"].'</option>';
                                                            $_SESSION["education_ID"] = $print["education_ID"];
                                                        }
                                                        if(empty($_SESSION["education_ID"]))
                                                        $_SESSION["education_ID"] = 0;
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
                    if(!empty($_SESSION["education_ID"] && isset($_POST["delete_education"])))
                    {
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
                                    <center>
                                    <div class="row align-items-center justify-content-center">
                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <b>تم حذف البيانات بنجاح</b>
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
                        elseif(isset($_POST["cancel_delete"]))
                        { 
                            echo '    
                                <center>
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
                                            <select name="delete_education" aria-label=".form-select-sm example" class="form-control" dir="rtl" required>
                                                <option selected value="" disabled>اختر الشهادة</option>
                                                <?php
                                                    if($connect_database)
                                                    {
                                                        $select_experience_id = $connect_database->prepare('SELECT * FROM experience');
                                                        $select_experience_id->execute();
                                                        foreach($select_experience_id as $print)
                                                        {
                                                            echo '<option value"'.$print["experience_ID"].'">الجهة : '.$print["issuer_arabic"].' | المسمى الوظيفي : '.$print["job_title_arabic"].'</option>';
                                                            $_SESSION["experience_ID"] = $print["experience_ID"];
                                                        }
                                                        if(empty($_SESSION["experience_ID"]))
                                                        $_SESSION["experience_ID"] = 0;
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
                    if(!empty($_SESSION["experience_ID"] && isset($_POST["delete_experience"])))
                    {
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
                                    <center>
                                    <div class="row align-items-center justify-content-center">
                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <b>تم حذف البيانات بنجاح</b>
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
                        elseif(isset($_POST["cancel_delete"]))
                        { 
                            echo '    
                                <center>
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
                                            <select name="delete_education" aria-label=".form-select-sm example" class="form-control" dir="rtl" required>
                                                <option selected value="" disabled>اختر الشهادة</option>
                                                <?php
                                                    if($connect_database)
                                                    {
                                                        $select_courses_id = $connect_database->prepare('SELECT * FROM courses');
                                                        $select_courses_id->execute();
                                                        foreach($select_courses_id as $print)
                                                        {
                                                            echo '<option value"
                                                            '.$print["course_ID"].'">الجهة : '.$print["issuer_arabic"].' | مسمى الدورة  : '.$print["course_title_arabic"].'
                                                            | تاريخ النهاية : '.$print["end_date"].'
                                                            </option>';
                                                            $_SESSION["course_ID"] = $print["courses_ID"];
                                                        }
                                                        if(empty($_SESSION["course_ID"]))
                                                        $_SESSION["course_ID"] = 0;
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
                    if(!empty($_SESSION["course_ID"] && isset($_POST["delete_course"])))
                    {
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
                                    <center>
                                    <div class="row align-items-center justify-content-center">
                                    <div class="col-sm-8 col-md-8 col-lg-5">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <b>تم حذف البيانات بنجاح</b>
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
                        elseif(isset($_POST["cancel_delete"]))
                        { 
                            echo '    
                                <center>
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
                    echo '<center><h1>يرجى اختيار نوع العملية</h1></center>';
                }
        ?>
        <style>
            input::-webkit-inner-spin-button,
            input::-webkit-outer-spin-button 
            {
                -webkit-appearance: none;
            }
        </style>
        <?php
        ob_end_flush();
        ?>
    </body>
</html>