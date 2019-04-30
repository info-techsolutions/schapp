<?php
@$aid = $_SESSION['aid'];
@$sid = $_SESSION['sid'];
@$pid = $_SESSION['pid'];

include_once '../inc/config.php';

if ($aid) {
    ?>
    <!-- LEFT MENU -->
    <div class="ui left vertical inverted sidebar menu">


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

        <!-- item setup -->   
        <div class="item">
            <div class="header">Setups</div>

            <div class="menu">
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

        <!-- End of item setup -->

        <div class="item">
            <div class="header">Student Score</div>
            <div class="menu">
                <a class="item" href="check_student_class.php">
                    <i class="add icon"></i>
                    Add Score  
                </a>

                <a class="item" href="individual_subject_score_view.php">
                    <i class="add icon"></i>
                    Individual Subject Score  </a>
            </div>
        </div>
        <!-- -->

        <!-- Reports -->
        <div class="item">
            <div class="header">General Reports</div>
            <div class="menu">

                <a class="item" href="run_report.php">

                    <i class="line chart icon"></i>
                    Decision Reports
                </a>


                <a class="item" href="get_student_report.php">
                    <i class="find icon"></i>
                    Report by Class
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
        <!-- End of reports -->

        <!-- users -->
        <div class="item">
            <div class="header">Users</div>
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
        <!-- End of users -->


        <!-- profile -->
        <div class="item">
            <div class="header">Settings</div>
            <div class="menu">
                <a class="item" href="edit_profile.php">
                    <i class="user icon"></i>
                    Profile   
                </a>


            </div>
        </div>
        <!-- End of profile -->

        <!-- -->
        <div class="item">
            <div class="header">Payment Options</div>

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
        <!-- ./ -->

        <a class="item" href="logout.php">
            <i class="power icon"></i>
            logout   
        </a>

        <!-- -->
        <div class="item">
            <div class="header"></div>

            <div class="menu">

                <a class="item" href="#">  
                </a>

            </div>
        </div>

    </div>

    <!-- For each staff -->
    <?php
} elseif ($sid) {
    // For staffs
    ?>

    <?php
} elseif ($pid) {
    // For parents
    ?>

    <div class="ui left vertical inverted sidebar menu">


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

        <div class="item">
            <div class="header">Reports</div>
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

        <a class="item" href="logout.php">
            <i class="power icon"></i>
            logout   
        </a>
        <a class="item" href="#">

        </a>

    </div>
    <?php
} else {
    
}
?>
<!-- RIGHT MENU -->
<!--
<div class="ui right vertical inverted sidebar menu">
<a class="item">1</a>
<a class="item">2</a>
<a class="item">3</a>
</div>
-->

