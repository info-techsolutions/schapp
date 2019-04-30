<?php
$myTitle = 'Showing All Class - MYSCHOOL APP';

include_once '../pages/header.php';
include_once '../inc/config.php';
include_once '../inc/errorcode.php';

if ($_POST) {

    $sessions = $_POST["sessions"];
    $terms = $_POST["terms"];
    $classes = $_POST["classes"];
    $subjects = $_POST["subjects"];

    $stmt = $db->prepare("SELECT z_tb_subjects.name FROM z_tb_grade, z_tb_subjects WHERE z_tb_subjects.subject_id = z_tb_grade.subject_id AND z_tb_grade.subject_id = :subject_id");
    $stmt->execute(array(
        ':subject_id' => $subjects
    ));
    $row = $stmt->fetch();
    $subjectNames = $row['name'];
    ?>


    <div class="ui message" style="display: none;"></div>    
    <?php
    echo "Showing Report for: <strong>" . $subjectNames . "<br /><br /></strong>";
    
 // include_once 'report_views.inc';
 // unlink('report_views.inc');
 /*
   $stm4 = $db->query("CREATE VIEW report AS SELECT DISTINCT z_tb_report.person_number, test_one, test_two, test_three, firstname, lastname, gender, total, rank
			FROM z_tb_report, z_tb_session, z_tb_term, z_tb_class, z_tb_subjects, z_tb_person
			WHERE 
			z_tb_report.session_id = z_tb_session.session_id AND z_tb_report.session_id = '$sessions'
			AND z_tb_report.class_id = z_tb_class.class_id AND z_tb_report.class_id = '$classes'
			AND z_tb_report.term_id = z_tb_term.term_id AND z_tb_report.term_id = '$terms'
			AND z_tb_report.subject_id = z_tb_subjects.subject_id AND z_tb_report.subject_id = '$subjects'
			AND z_tb_report.person_number = z_tb_person.person_number 
			ORDER BY z_tb_report.person_number");
	*/			

$stmt = $db->query("SELECT * FROM report");

    $previousAdmissionNumber = -1;

    foreach ($stmt as $row) {

        $admissionNumber = $row["person_number"];
        $gender = $row["gender"];
        $firstCA = $row['test_one'];
        $secondCA = $row['test_two'];
        $thirdCA = $row['test_three'];
        $total = $row['total'];
        $rank = $row['rank'];


        if ($admissionNumber != $previousAdmissionNumber) {

// Display Student Info and their details about their grade

            echo "<strong>Admission Number: </strong>" . $admissionNumber . "<br/>";
            echo "<strong>Name: </strong>" . $row['firstname'] . " " . $row['lastname'] . "<br/>";
            echo "Gender: " . $gender . "<br />";
            ?>
            <table id="example" class="ui celled table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>FIRST CA</th>
                        <th>SECOND CA</th>
                        <th>EXAM</th>
                        <th>TOTAL</th>
                        <th>POSITION</th>
                    </tr>
                </thead>

                <?php
                $previousAdmissionNumber = $admissionNumber;
            }
            ?>
            <tbody>
                <tr>
                    <td><?php echo $firstCA; ?></td>
                    <td><?php echo $secondCA; ?></td>
                    <td><?php echo $thirdCA; ?></td>
                    <td><?php echo $total; ?></td>
                    <td><?php echo $rank; ?></td>
                </tr>
            </tbody>
        </table>

        <?php
    }
}
?>
<a class="ui small teal button print" >Print</a>
<script>
    $(document).ready(function () {
        $("#printMe").find('.print').on('click', function () {
            $.print("#printMe");
        });

    });
</script>
