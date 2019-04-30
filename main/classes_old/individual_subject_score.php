<?php
$myTitle = 'Showing Student Score - MYSCHOOL APP';
include_once '../pages/header.php';
include_once '../inc/config.php';


$sessions = $_POST["sessions"];
$terms = $_POST["terms"];
$classes = $_POST["classes"];
$subjects = $_POST["subjects"];

$stmt = $db->prepare("SELECT z_tb_subjects.name FROM z_tb_grade, z_tb_subjects WHERE z_tb_subjects.subject_id = z_tb_grade.subject_id AND z_tb_grade.subject_id = :subject_id");
$stmt->execute(array(
    ':subject_id' => $subjects
));
$row = $stmt->fetch();
$subjectName = $row['name'];
?>

<div class="ui message" style="display: none;"></div>
<p>Viewing Subject For: <strong><?php echo $subjectName; ?></strong></p>
<table id="example" class="ui celled table" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>S/N</th>
            <th>Admission Number</th>
            <th>First CA</th>
            <th>Second CA</th>
            <th>Exam</th>
            <th>Total</th>
            <th>Position</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>S/N</th>
            <th>Admission Number</th>
            <th>First CA</th>
            <th>Second CA</th>
            <th>Exam</th>
            <th>Total</th>
            <th>Position</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        try {
            include_once '../inc/config.php';
            $r = 1;

            $stmt = $db->query("SELECT person_number, z_tb_report.subject_id, test_one, test_two, test_three, total, rank
                                      from z_tb_report, z_tb_session, z_tb_class, z_tb_term, z_tb_subjects
                                      WHERE 
                                     z_tb_report.subject_id = z_tb_subjects.subject_id AND z_tb_report.subject_id = '$subjects'
                                     AND z_tb_session.session_id = z_tb_report.session_id AND z_tb_report.session_id = '$sessions' 
                                     AND z_tb_term.term_id = z_tb_report.term_id AND z_tb_report.term_id = '$terms'
                                     AND z_tb_class.class_id = z_tb_report.class_id AND z_tb_report.class_id = '$classes' 
                                      ORDER BY z_tb_report.subject_id");
            while ($row = $stmt->fetch()) {
                ?>
                <tr>
                    <td><?php echo $r; ?></td>
                    <td><?php echo $row['person_number']; ?></td>
                    <td><?php echo $row['test_one']; ?></td>
                    <td><?php echo $row['test_two']; ?></td>
                    <td><?php echo $row['test_three']; ?></td>
                    <td><?php echo $row['total']; ?></td>
                    <td><?php echo $row['rank']; ?></td>
                    <td></td>
                </tr>
                <?php
                $r++;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
        ?>
    </tbody>
</table>
<a class="ui small teal button print" >Print</a>
<script>
    $(document).ready(function () {
        $("#printMe").find('.print').on('click', function () {
            $.print("#printMe");
        });

    });
</script>
