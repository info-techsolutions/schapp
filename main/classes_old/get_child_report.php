<?php
session_start(); //Start the current session
session_name("Parent");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}

$myTitle = 'Welcome to MYSCHOOL APP - Print Student Result';

$pid = $_SESSION['pid'];
$username = $_SESSION['username'];

include_once '../pages/header.php';

include_once '../inc/config.php';
include_once '../inc/errorcode.php';
?>
<body>
    <div id="printMe">
    <?php
    $classes = $_GET["class_id"];
    $person_number = $_GET["person_number"];


    $stmt = $db->prepare("SELECT session_id, term_id FROM z_tb_report "
            . "WHERE person_number = :person_number AND class_id = :class_id ");
    $stmt->execute(array(
        ':person_number' => $person_number,
        ':class_id' => $classes
    ));
    $row = $stmt->fetch();

    $sessions = $row["session_id"];
    $terms = $row["term_id"];


    $stmt = $db->query("SELECT z_tb_person.person_number, z_tb_person.firstname, z_tb_person.lastname, z_tb_person.gender,"
            . " z_tb_subjects.name AS subject_name, z_tb_report.test_one, z_tb_report.test_two, z_tb_report.test_three"
            . " FROM"
            . " z_tb_person"
            . " LEFT JOIN"
            . " z_tb_report"
            . " ON z_tb_person.person_number = z_tb_report.person_number AND z_tb_report.person_number = '$person_number'"
            . " LEFT JOIN"
            . " z_tb_subjects"
            . " ON z_tb_subjects.subject_id = z_tb_report.subject_id"
            . " LEFT JOIN"
            . " z_tb_class"
            . " ON z_tb_report.class_id = z_tb_class.class_id AND z_tb_report.class_id = '$classes'"
            . " LEFT JOIN"
            . " z_tb_term"
            . " ON"
            . " z_tb_report.term_id = z_tb_term.term_id AND z_tb_report.term_id = '$terms'"
            . " LEFT JOIN"
            . " z_tb_session"
            . " ON"
            . " z_tb_report.session_id = z_tb_session.session_id AND z_tb_report.session_id = '$sessions'"
            . " ORDER BY z_tb_person.person_number");

    $previousAdmissionNumber = -1;


    foreach ($stmt as $row) {
        $admissionNumber = $row["person_number"];
        $subjectName = $row['subject_name'];
        $gender = $row["gender"];
        $firstCA = $row['test_one'];
        $secondCA = $row['test_two'];
        $thirdCA = $row['test_three'];

        if ($person_number == $admissionNumber && $person_number != $previousAdmissionNumber) {

// Display Student Info and their details about their grade

            echo "<strong>Admission Number: " . $person_number . "</strong><br/>";
            echo "<strong>Name: " . $row['firstname'] . " " . $row['lastname'] . "</strong><br/>";
            echo "Gender: " . $gender . "<br />";
            ?>
            <table id="example" class="ui celled table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>SUBJECTS</th>
                        <th>FIRST CA</th>
                        <th>SECOND CA</th>
                        <th>EXAM</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $previousAdmissionNumber = $person_number;
                }

                ?>
                <tr>
                    <td><?php echo $subjectName; ?></td>
                    <td><?php echo $firstCA; ?></td>
                    <td><?php echo $secondCA; ?></td>
                    <td><?php echo $thirdCA; ?></td>
                </tr>

                <?php
            }
            ?>
        </tbody>          
        
    </table>
    
    <a class="ui small teal button print" >Print</a>

    <?php include_once'../pages/footer.php'; ?>
    <script src="../assets/js/jQuery.print.js"></script> 
    <script>
        $(document).ready(function () {

            $("#printMe").find('.print').on('click', function () {
                $.print("#printMe");
            });
        });
    </script>

    </div>
</body>
</html>