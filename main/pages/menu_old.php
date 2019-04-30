<?php
@$aid = $_SESSION['aid'];
@$sid = $_SESSION['sid'];
@$pid = $_SESSION['pid'];

include_once '../inc/config.php';

if ($aid) {
    ?>

    <div class="ui open button basic"> <a class="view-ui item">
            <i class="sidebar icon"></i> Menu
        </a>
        <button class="tiny ui button gray backs" href=""><i class="angle double left icon"></i></button>
    </div>


    <div class="ui left vertical visible inverted sidebar menu">

        <div class="item">
            <!--
             <a class="ui logo icon image" href="/">
                 <img src="../images/logo.png" class="ui logo icon image">
             </a> -->
            <a href="../admin"><img src="../images/logo.png" style="width: 100px; height: 100px;"><b>MYSCHOOL APP</b></a>
        </div>

        <div class="item">
            <div class="ui input"><input type="text" placeholder="Search..."></div>
        </div>
        <div class="ui dropdown item">
            <i class="dropdown icon"></i> Set-Ups
            <div class="menu">
                <!--<a class="active item">Search</a>-->

                <a class="item" href="show_session.php">
                    <i class="table icon"></i>
                    Sessions
                </a>
                <a class="item" href="show_term.php">
                    <i class="table icon"></i>
                    Terms
                </a>
                <a class="item" href="show_subject.php">
                    <i class="table icon"></i>
                    Subjects
                </a>

                <a class="item" href="show_class.php">
                    <i class="table icon"></i>
                    Classes
                </a>

                <a class="item" href="show_arm.php">
                    <i class="table icon"></i>
                    Arm
                </a>

                <a class="item" href="show_gradesetup.php">
                    <i class="table icon"></i>
                    Grade Setup
                </a>

                <a class="item" href="show_test.php">
                    <i class="table icon"></i>
                    Test/Exams
                </a>
                <a class="item" href="show_fees_setup.php">
                    <i class="money icon"></i>
                    Fees Option
                </a>
                <a class="item" href="mass_upload.php">
                    <i class="upload icon"></i>
                    Mass Upload  
                </a>




            </div>
        </div>

        <div class="ui dropdown item">
            <i class="dropdown icon"></i>
            User rights
            <div class="menu">


                <a class="item" href="#">
                    <i class="table icon"></i>
                    Role
                </a>

                <a class="item" href="#">
                    <i class="table icon"></i>
                    Permission
                </a>

                <a class="item" href="#">
                    <i class="table icon"></i>
                    Assignment
                </a>


            </div>
        </div>  

        <div class="ui dropdown item">
            <i class="dropdown icon"></i>
            Score/Grade
            <div class="menu">
                <a class="item" href="check_student_class.php">
                    <i class="add icon"></i>
                    Add Grade  
                </a>

                <a class="item" href="individual_subject_score_view.php">
                    <i class="add icon"></i>
                    Individual Subject Score  
                </a>
            </div>
        </div>  

        <div class="ui dropdown item">
            <i class="dropdown icon"></i>
            Reports

            <div class="menu">

                <a class="item" href="run_report.php">

                    <i class="line chart icon"></i>
                    View Reports
                </a>


                <a class="item" href="get_student_report.php">
                    <i class="find icon"></i>
                    Class Report  
                </a>

                <a class="item" href="search_student_report.php">
                    <i class="upload icon"></i>
                    Mass assesment Upload
                </a>
                <a class="item" href="individual_subject_score.php">
                    <i class="file text icon"></i>
                    Subject Score Details
                </a>

                <a class="item" href="individual_subject_report.php">
                    <i class="book icon"></i>
                    Individual Subject Report  
                </a>
                <a class="item" href="individual_student_report.php">
                    <i class="student icon"></i>
                    Individual Student Report  
                </a>
                <a class="item" href="feestatus.php">
                    <i class="money icon"></i>
                    Fee Status 
                </a>
            </div>
        </div>
        <div class="ui dropdown item">
            <i class="dropdown icon"></i>
            Users
            <div class="menu">
                <a class="item" href="show_admin.php">
                    <i class="table icon"></i>
                    Admin   
                </a>
                <a class="item" href="show_teacher.php">
                    <i class="table icon"></i>
                    Teachers   
                </a>

                <a class="item" href="show_student.php">
                    <i class="table icon"></i>
                    Students
                </a>

                <a class="item" href="show_parent.php">
                    <i class="table icon"></i>
                    Parent  
                </a>
            </div>
        </div>

        <div class="ui dropdown item">
            <i class="dropdown icon"></i>
            Settings
            <div class="menu">
                <a class="item" href="edit_profile.php">
                    <i class="user icon"></i>
                    Profile   
                </a>


            </div>
        </div>

        <div class="ui dropdown item">
            <i class="dropdown icon"></i>
            Payment

            <div class="menu">

                <a class="item" href="school_fees.php">
                    <i class="money icon"></i>
                    register   
                </a>
                <!--
                    <a class="item" href="cash_pay.php">
                        <i class="money icon"></i>
                        Cash   
                    </a>
                    <a class="item" href="online.php">
                        <i class="mobile icon"></i>
                        Online   
                    </a>
                -->
            </div>
        </div>

        <a class="item" href="logout.php">
            <i class="power icon"></i>
            logout   
        </a>
        <a class="item" href="logout.php">
            <i class="power icon"></i>
            logout   
        </a>
        <a class="item" href="logout.php">
            <i class="power icon"></i>
            logout   
        </a>
        <a class="item" href="logout.php">
            <i class="power icon"></i>
            logout   
        </a>
        <a class="item" href="logout.php">
            <i class="power icon"></i>
            logout   
        </a><a class="item" href="logout.php">
            <i class="power icon"></i>
            logout   
        </a><a class="item" href="logout.php">
            <i class="power icon"></i>
            logout   
        </a><a class="item" href="logout.php">
            <i class="power icon"></i>
            logout   
        </a><a class="item" href="logout.php">
            <i class="power icon"></i>
            logout   
        </a><a class="item" href="logout.php">
            <i class="power icon"></i>
            logout   
        </a><a class="item" href="logout.php">
            <i class="power icon"></i>
            logout   
        </a><a class="item" href="logout.php">
            <i class="power icon"></i>
            logout   
        </a><a class="item" href="logout.php">
            <i class="power icon"></i>
            logout   
        </a><a class="item" href="logout.php">
            <i class="power icon"></i>
            logout   
        </a><a class="item" href="logout.php">
            <i class="power icon"></i>
            logout   
        </a>

    </div>

<!-- For each staff -->
    <?php
} elseif ($sid) {
    ?>

    <div class="ui open button basic"> <a class="view-ui item">
            <i class="sidebar icon"></i> Menu
        </a></div>


    <div class="ui left vertical visible inverted sidebar menu">

        <div class="item">
            <a class="ui logo icon image" href="/">
                <img src="/images/logo.png">
            </a>
            <a href="index1.php"><b>MYSCHOOL APP</b></a>
        </div>

        <div class="item">
            <div class="ui input"><input type="text" placeholder="Search..."></div>
        </div>

        <div class="ui dropdown item">
            <i class="dropdown icon"></i>
            Score/Grade
            <div class="menu">
                <a class="item" href="check_student_class.php">
                    <i class="add icon"></i>
                    Add Grade  
                </a>

                <a class="item" href="individual_subject_score_view.php">
                    <i class="add icon"></i>
                    Individual Subject Score  
                </a>
            </div>
        </div>  
        <div class="ui dropdown item">
            <i class="dropdown icon"></i>
            Reports

            <div class="menu">


                <a class="item" href="get_student_report.php">
                    <i class="add icon"></i>
                    Class Report  
                </a>

                <a class="item" href="search_student_report.php">
                    <i class="add icon"></i>
                    Add Student Report  
                </a>
                <a class="item" href="individual_subject_score.php">
                    <i class="add icon"></i>
                    Subject Score Details
                </a>

                <a class="item" href="individual_subject_report.php">
                    <i class="add icon"></i>
                    Individual Subject Report  
                </a>
                <a class="item" href="individual_student_report.php">
                    <i class="add icon"></i>
                    Individual Student Report  
                </a>

            </div>
        </div>


        <div class="ui dropdown item">
            <i class="dropdown icon"></i>
            Students
            <div class="menu">

                <a class="item" href="show_student.php">
                    <i class="table icon"></i>
                    Show Student
                </a>

            </div>
        </div>  

        <div class="ui dropdown item">
            <i class="dropdown icon"></i>
            Settings
            <div class="menu">
                <a class="item" href="profile.php">
                    <i class="user icon"></i>
                    Profile   
                </a>
                <a class="item" href="logout.php">
                    <i class="power icon"></i>
                    logout   
                </a>

            </div>
        </div>


    </div>
    <?php
} elseif ($pid) {
    ?>
    <div class="ui open button basic"> <a class="view-ui item">
            <i class="sidebar icon"></i> Menu
        </a></div>


    <div class="ui left vertical visible inverted sidebar menu">

        <div class="item">
            <a class="ui logo icon image" href="/">
                <img src="/images/logo.png">
            </a>
            <a href="index1.php"><b>MYSCHOOL APP</b></a>
        </div>



        <div class="ui dropdown item">
            <i class="dropdown icon"></i>
            Reports
            <div class="menu">
                <?php
                include_once '../inc/config.php';
                $stmt = $db->query("SELECT sponsor_id, firstname, class_id, person_number FROM z_tb_person WHERE typ = 'STUDENT'");
                foreach ($stmt as $value) {
                    $firstname = $value["firstname"];
                    $sponsorId = $value["sponsor_id"];
                    $personNumber = $value["person_number"];
                    $classId = $value["class_id"];

                    if ($sponsorId == $pid) {
                        //  $stmt = ("SELECT session_id, term_id");
                        ?>
                        <a class="item" href="../classes/get_child_report.php?person_number=<?php echo $personNumber; ?>&class_id=<?php echo $classId; ?>">
                            <i class="student icon"></i>
                            <?php echo "view " . $firstname . "'s result"; ?>
                        </a>

                        <?php
                    }
                }
                ?>

                </a>
            </div>
        </div>  
        <div class="ui dropdown item">
            <i class="dropdown icon"></i>
            Settings
            <div class="menu">
                <a class="item" href="profile.php">
                    <i class="user icon"></i>
                    Profile   
                </a>
                <a class="item" href="logout.php">
                    <i class="power icon"></i>
                    logout   
                </a>

            </div>
        </div>

    </div>
    <?php
} else {
    ?>
    <div class="ui open button basic"> <a class="view-ui item">
            <i class="sidebar icon"></i> Menu
        </a></div>


    <div class="ui left vertical visible inverted sidebar menu">

        <div class="item">
            <a class="ui logo icon image" href="/">
                <!--<img src="../images/logo.png">-->
            </a>
            <a href="index1.php"><img src="../images/logo.png" style="width: 100px; height: 100px;"><b>MYSCHOOL APP</b></a>
        </div>

        <div class="item">
            <div class="ui input"><input type="text" placeholder="Search..."></div>
        </div>
        <div class="ui dropdown item">
            <i class="dropdown icon"></i> Set-Ups
            <div class="menu">
                <!--<a class="active item">Search</a>-->

                <a class="item" href="show_session.php">
                    <i class="table icon"></i>
                    Sessions
                </a>
                <a class="item" href="show_term.php">
                    <i class="table icon"></i>
                    Terms
                </a>
                <a class="item" href="show_subject.php">
                    <i class="table icon"></i>
                    Subjects
                </a>

                <a class="item" href="show_class.php">
                    <i class="table icon"></i>
                    Classes
                </a>

                <a class="item" href="show_arm.php">
                    <i class="table icon"></i>
                    Arm
                </a>
                <a class="item" href="mass_upload.php">
                    <i class="add icon"></i>
                    Mass Upload  
                </a>




            </div>
        </div>

        <div class="ui dropdown item">
            <i class="dropdown icon"></i>
            Tests/Exams Setups
            <div class="menu">


                <a class="item" href="show_gradesetup.php">
                    <i class="table icon"></i>
                    Grade Setup
                </a>

                <a class="item" href="show_test.php">
                    <i class="table icon"></i>
                    Test/Exams
                </a>


            </div>
        </div>  

        <div class="ui dropdown item">
            <i class="dropdown icon"></i>
            Score/Grade
            <div class="menu">
                <a class="item" href="check_student_class.php">
                    <i class="add icon"></i>
                    Add Grade  
                </a>

                <a class="item" href="individual_subject_score_view.php">
                    <i class="add icon"></i>
                    Individual Subject Score  
                </a>
            </div>
        </div>  

        <div class="ui dropdown item">
            <i class="dropdown icon"></i>
            Reports

            <div class="menu">

                <a class="item" href="run_report.php">
                    <i class="add icon"></i>
                    Project Report
                </a>

                <a class="item" href="get_student_report.php">
                    <i class="add icon"></i>
                    Class Report  
                </a>

                <a class="item" href="search_student_report.php">
                    <i class="add icon"></i>
                    Add Student Report  
                </a>
                <a class="item" href="individual_subject_score.php">
                    <i class="add icon"></i>
                    Subject Score Details
                </a>

                <a class="item" href="individual_subject_report.php">
                    <i class="add icon"></i>
                    Individual Subject Report  
                </a>
                <a class="item" href="individual_student_report.php">
                    <i class="add icon"></i>
                    Individual Student Report  
                </a>
                <a class="item" href="feestatus.php">
                    <i class="add icon"></i>
                    Fee Status 
                </a>
            </div>
        </div>
        <div class="ui dropdown item">
            <i class="dropdown icon"></i>
            Users
            <div class="menu">
                <a class="item" href="show_admin.php">
                    <i class="table icon"></i>
                    Admin   
                </a>
                <a class="item" href="show_teacher.php">
                    <i class="table icon"></i>
                    Teachers   
                </a>

                <a class="item" href="show_student.php">
                    <i class="table icon"></i>
                    Students
                </a>

                <a class="item" href="show_parent.php">
                    <i class="table icon"></i>
                    Parent  
                </a>
            </div>
        </div>

        <div class="ui dropdown item">
            <i class="dropdown icon"></i>
            Settings
            <div class="menu">
                <a class="item" href="profile.php">
                    <i class="user icon"></i>
                    Profile   
                </a>
                <a class="item" href="logout.php">
                    <i class="power icon"></i>
                    logout   
                </a>

            </div>
        </div>

        <div class="ui dropdown item">
            <i class="dropdown icon"></i>
            Payment
            <div class="menu">
                <a class="item" href="cash_pay.php">
                    <i class="money icon"></i>
                    Cash   
                </a>
                <a class="item" href="logout.php">
                    <i class="mobile icon"></i>
                    Online   
                </a>

            </div>
        </div>

    </div>
    <?php
}

