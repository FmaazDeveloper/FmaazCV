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
                            <option selected value="">Choose input type | اختر نوع الإدخال</option>
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
                                                        <input type="text" name="issuer_arabic" maxlength="50" class="form-control" id="floatingPassword" placeholder="الجهة" required>
                                                        <label for="floatingPassword">الجهة</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input type="text" name="major_arabic" maxlength="50" class="form-control" id="floatingPassword" placeholder="التخصص" required>
                                                        <label for="floatingPassword">التخصص</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <div class="dropdown">
                                                            <select name="level_arabic" aria-label=".form-select-sm example" class="form-control" dir="ltr" required>
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
                                                        <input type="text" name="issuer_english" maxlength="50" class="form-control" id="Issuer" placeholder="Issuer" required>
                                                        <label for="Issuer">Issuer</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input type="text" name="major_english" maxlength="50" class="form-control" id="Major" placeholder="Major" required>
                                                        <label for="Major">Major</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <div class="dropdown" dir="ltr">
                                                            <select name="level_english" aria-label=".form-select-sm example" class="form-control" dir="ltr" required>
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
                                                        <select name="average_from" aria-label=".form-select-sm example" class="form-control" dir="ltr" required>
                                                            <option selected value="" disabled>Average from | المعدل من</option>
                                                            <option value="4.00">4.00</option>
                                                            <option value="5.00">5.00</option>
                                                            <option value="100.00">100.00</option>
                                                        </select>
                                                        <input type="number" name="average" step="0.01" class="form-control" min="0" max="100" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                </div>
                                                <div class="form-floating">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="certificate photo | صورة الشهادة" disabled>
                                                        <input type="file" name="photo" accept="image/*" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                </div>
                                                <div class="form-floating">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="Start date | تاريخ البداية" disabled>
                                                        <input type="date" name="start_date" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="End date | تاريخ النهاية" disabled>
                                                        <input type="date" name="end_date" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                </div>
                                                <div class="row m-3">
                                                    <input type="submit" name="insert_info" class="btn btn-primary" value="Insert info">
                                                </div>
                                            </form>
                                        </div>
                        <br>
                    <?php
                        if(!empty($_POST["issuer_arabic"]) && !empty($_POST["major_arabic"]) && !empty($_POST["level_arabic"]) && !empty($_POST["issuer_english"]) &&
                        !empty($_POST["major_english"]) && !empty($_POST["level_english"]) && !empty($_POST["average"]) &&!empty($_POST["average_from"]) &&
                        !empty($_POST["photo"]) &&!empty($_POST["start_date"]) && !empty($_POST["end_date"]))
                        {
                            if(isset($_POST["insert_info"]) && ($_POST["average"] <= $_POST["average_from"]) && ($_POST["average"] >= ($_POST["average_from"]*0.7)) &&
                            ((($_POST["level_arabic"] == 'الثانوية العامة') && ($_POST["level_english"] == 'High school')) ||
                            (($_POST["level_arabic"] == 'دبلوم') && ($_POST["level_english"] == 'Diploma')) ||
                            (($_POST["level_arabic"] == 'بكالريوس') && ($_POST["level_english"] == 'Baccalaureus')) ||
                            (($_POST["level_arabic"] == 'ماجستير') && ($_POST["level_english"] == 'Master')) ||
                            (($_POST["level_arabic"] == 'دكتوراه') && ($_POST["level_english"] == 'PhD'))) && (((($_POST["average_from"] == 100) && ($_POST["level_arabic"] == 'الثانوية العامة')) || 
                            (($_POST["average_from"] == 4.00) || ($_POST["average_from"] == 5.00) && ($_POST["level_arabic"] != 'الثانوية العامة')))) &&
                            ($_POST["start_date"] < ($_POST["end_date"])))
                                {
                                    if($connect_database)
                                        {
                                            $select_education_id = $connect_database->prepare('SELECT MAX(ID) ID FROM education');
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
                                                    '.$_SESSION["education_ID"].' , "'.$_POST["issuer_arabic"].'" , "'.$_POST["major_arabic"].'" ,"'.$_POST["level_arabic"].'" ,
                                                    "'.$_POST["issuer_english"].'" , "'.$_POST["major_english"].'" , "'.$_POST["level_english"].'" ,
                                                    '.$_POST["average"].' , '.$_POST["average_from"].' , "'.$_POST["photo"].'" ,
                                                    "'.$_POST["start_date"].'" , "'.$_POST["end_date"].'"
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
                                elseif(($_POST["level_arabic"] == 'الثانوية العامة') && ($_POST["level_english"] != 'High school'))
                                        echo '<center><div class="alert alert-danger" role="alert">! المستوى التعليمي المدخل غير متطابق</div></center>';
                                elseif(($_POST["level_arabic"] == 'دبلوم') && ($_POST["level_english"] != 'Diploma'))
                                        echo '<center><div class="alert alert-danger" role="alert">! المستوى التعليمي المدخل غير متطابق</div></center>';
                                elseif(($_POST["level_arabic"] == 'بكالرويس') && ($_POST["level_english"] != 'Baccalaureus'))
                                        echo '<center><div class="alert alert-danger" role="alert">! المستوى التعليمي المدخل غير متطابق</div></center>';
                                elseif(($_POST["level_arabic"] == 'ماجستير') && ($_POST["level_english"] != 'Master'))
                                        echo '<center><div class="alert alert-danger" role="alert">! المستوى التعليمي المدخل غير متطابق</div></center>';
                                elseif(($_POST["level_arabic"] == 'دكتوراه') && ($_POST["level_english"] != 'PhD'))
                                        echo '<center><div class="alert alert-danger" role="alert">! المستوى التعليمي المدخل غير متطابق</div></center>';
                                elseif(($_POST["average_from"] == 100) && ($_POST["level_arabic"] != 'الثانوية العامة'))
                                        echo '<center><div class="alert alert-danger" role="alert">! المعدل من" المدخل يجب أن يساوي 4.00 أو 5.00"</div></center>';
                                elseif(($_POST["average_from"] == 4.00) || ($_POST["average_from"] == 5.00) && ($_POST["level_arabic"] == 'الثانوية العامة'))
                                        echo '<center><div class="alert alert-danger" role="alert">! المعدل من" المدخل يجب أن يساوي 100"</div></center>';
                                elseif(($_POST["average"] > $_POST["average_from"]))
                                        echo '<center><div class="alert alert-danger" role="alert">! المعدل المدخل أكبر من '.$_POST["average_from"].'</div></center>';
                                elseif(($_POST["average"] < ($_POST["average_from"]*0.7)))
                                        echo '<center><div class="alert alert-danger" role="alert">! المعدل المدخل أقل من '.$_POST["average_from"]*0.7.'</div></center>';
                                elseif(($_POST["start_date"] >= ($_POST["end_date"])))
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
                                                        <input type="text" maxlength="50" name="issuer_arabic" maxlength="50" class="form-control" id="floatingPassword" placeholder="الجهة" required>
                                                        <label for="floatingPassword">الجهة</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input type="text" maxlength="50" name="job_title_arabic" maxlength="50" class="form-control" id="floatingPassword" placeholder=">المسمى الوظيفي" required>
                                                        <label for="floatingPassword">المسمى الوظيفي</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" maxlength="500" name="brief_arabic" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                        <label for="floatingTextarea">نبذة عن الخبرة</label>
                                                    </div>

                                                    <center><h4>English</h4></center>
                                                    <div class="form-floating">
                                                        <input type="text" name="issuer_english" maxlength="50" class="form-control" id="floatingPassword" placeholder="Issuer" required>
                                                        <label for="floatingPassword">Issuer</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input type="text" name="job_title_english" maxlength="50" class="form-control" id="floatingPassword" placeholder="Job title" required>
                                                        <label for="floatingPassword">Job title</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" maxlength="500" name="brief_english" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                        <label for="floatingTextarea">Experience brief</label>
                                                    </div>

                                                <center><h4>English | عربي</h4></center>
                                                <div class="form-floating">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="certificate photo | صورة الشهادة" disabled>
                                                        <input type="file" name="photo" accept="image/*" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                </div>
                                                <div class="form-floating">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="Start date | تاريخ البداية" disabled>
                                                        <input type="date" name="start_date" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="End date | تاريخ النهاية" disabled>
                                                        <input type="date" name="end_date" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                </div>
                                                <div class="row m-3">
                                                    <input type="submit" name="insert_info" class="btn btn-primary" value="Insert info">
                                                </div>
                                            </form>
                                        </div>
                        <br>
                    <?php
                        if(!empty($_POST["issuer_arabic"]) && !empty($_POST["job_title_arabic"]) && !empty($_POST["brief_arabic"]) && !empty($_POST["issuer_english"]) &&
                        !empty($_POST["job_title_english"]) && !empty($_POST["brief_english"]) && !empty($_POST["photo"]) &&
                        !empty($_POST["start_date"]) && !empty($_POST["end_date"]))
                        {
                            if(isset($_POST["insert_info"]) && ($_POST["start_date"] < ($_POST["end_date"])))
                                {
                                    if($connect_database)
                                        {
                                            $select_experience_id = $connect_database->prepare('SELECT MAX(ID) ID FROM experience');
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
                                                    '.$_SESSION["experience_ID"].' , "'.$_POST["issuer_arabic"].'" , "'.$_POST["job_title_arabic"].'" , "'.$_POST["brief_arabic"].'" ,
                                                    "'.$_POST["issuer_english"].'" , "'.$_POST["job_title_english"].'" , "'.$_POST["brief_english"].'" ,
                                                    "'.$_POST["start_date"].'" , "'.$_POST["end_date"].'" , "'.$_POST["photo"].'"
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
                                elseif(($_POST["start_date"] >= ($_POST["end_date"])))
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
                                                        <input type="text" maxlength="50" name="issuer_arabic" maxlength="50" class="form-control" id="floatingPassword" placeholder="الجهة" required>
                                                        <label for="floatingPassword">الجهة</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input type="text" maxlength="50" name="course_title_arabic" maxlength="50" class="form-control" id="floatingPassword" placeholder=">مسمى الدورة" required>
                                                        <label for="floatingPassword">مسمى الدورة</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" maxlength="500" name="brief_arabic" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                        <label for="floatingTextarea">نبذة عن الدورة</label>
                                                    </div>
        
                                                    <center><h4>English</h4></center>
                                                    <div class="form-floating">
                                                        <input type="text" name="issuer_english" maxlength="50" class="form-control" id="floatingPassword" placeholder="Issuer" required>
                                                        <label for="floatingPassword">Issuer</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input type="text" name="course_title_english" maxlength="50" class="form-control" id="floatingPassword" placeholder="Courses title" required>
                                                        <label for="floatingPassword">Courses title</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" maxlength="500" name="brief_english" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                        <label for="floatingTextarea">Course brief</label>
                                                    </div>
        
                                                <center><h4>English | عربي</h4></center>
                                                <div class="form-floating">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="certificate photo | صورة الشهادة" disabled>
                                                        <input type="file" name="photo" accept="image/*" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                </div>
                                                <div class="form-floating">
                                                        <input type="number" name="hours" max="99" class="form-control" id="floatingPassword" placeholder="Hours | الساعات" required>
                                                        <label for="floatingPassword">Hours | الساعات</label>
                                                    </div>
                                                <div class="form-floating">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="Start date | تاريخ البداية" disabled>
                                                        <input type="date" name="start_date" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" value="End date | تاريخ النهاية" disabled>
                                                        <input type="date" name="end_date" class="form-control" aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                </div>
                                                <div class="row m-3">
                                                    <input type="submit" name="insert_info" class="btn btn-primary" value="Insert info">
                                                </div>
                                            </form>
                                        </div>
                        <br>
                    <?php
                        if(!empty($_POST["issuer_arabic"]) && !empty($_POST["course_title_arabic"]) && !empty($_POST["brief_arabic"]) && !empty($_POST["issuer_english"]) &&
                            !empty($_POST["course_title_english"]) && !empty($_POST["brief_english"]) && !empty($_POST["photo"]) && !empty($_POST["hours"]) &&
                            !empty($_POST["start_date"]) && !empty($_POST["end_date"]))
                            {
                                if(isset($_POST["insert_info"]) && ($_POST["start_date"] < ($_POST["end_date"])))
                                    {
                                        if($connect_database)
                                            {
                                                $select_courses_id = $connect_database->prepare('SELECT MAX(ID) ID FROM courses');
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
                                                        '.$_SESSION["course_ID"].' , "'.$_POST["issuer_arabic"].'" , "'.$_POST["course_title_arabic"].'" , "'.$_POST["brief_arabic"].'" ,
                                                        "'.$_POST["issuer_english"].'" , "'.$_POST["course_title_english"].'" , "'.$_POST["brief_english"].'" , "'.$_POST["hours"].'" ,
                                                        "'.$_POST["start_date"].'" , "'.$_POST["end_date"].'" , "'.$_POST["photo"].'"
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
                                    elseif(($_POST["start_date"] >= ($_POST["end_date"])))
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

                    echo '<center><h3>Eduction - Update</h3></center>';
                }
            //experience - Update
            elseif($_SESSION["submit_type"] == "Update" && $_SESSION["type"] == "experience")
                {
                    echo '<center><h3>Experience - Update</h3></center>';
                }
            //Courses - Update
            elseif($_SESSION["submit_type"] == "Update" && $_SESSION["type"] == "courses")
                {
                    echo '<center><h3>Courses - Update</h3></center>';
                }
            //Eduction - Delete
            elseif($_SESSION["submit_type"] == "Delete")
                {
                    echo '<center><h3>Delete</h3></center>';
                }
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