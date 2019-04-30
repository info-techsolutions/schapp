<?php


$myTitle = 'Showing School Fees Report - MYSCHOOL APP';
include_once '../pages/header.php';
include_once '../inc/config.php';


if (isset($_POST))
{

$sessions = $_POST["sessions"];
$terms = $_POST["terms"];
$classes = $_POST["classes"];


$stmt = $db->prepare("SELECT z_tb_term.name, z_tb_session.year, z_tb_class.name AS classes FROM z_tb_payment_status, z_tb_term, z_tb_class, z_tb_session 
	WHERE z_tb_term.term_id = z_tb_payment_status.term_id AND z_tb_payment_status.term_id = :term_id 
	AND z_tb_session.session_id = z_tb_payment_status.session_id AND z_tb_payment_status.session_id = :session_id
	AND z_tb_class.class_id = z_tb_payment_status.class_id AND z_tb_payment_status.class_id = :class_id"
	);
$stmt->execute(array(
    ':term_id' => $terms,
    ':session_id' => $sessions,
    ':class_id' => $classes
));
$row = $stmt->fetch();
$termName = $row['name'];
$sessionName = $row['year'];
$class = $row['classes'];
?>

<p>Viewing Fees For: <strong><?php echo$sessionName.';&nbsp; '.$termName.'; &nbsp;'.$class.'.'; ?></strong></p>
<table id="example" class="ui celled table" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>S/N</th>
            <th>Admission Number</th>
            <th>Amount</th>
            <th>Status</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>S/N</th>
            <th>Admission Number</th>
            <th>Amount</th>
            <th>Status</t
        </tr>
    </tfoot>
    <tbody>
        <?php
        try {
            include_once '../inc/config.php';
            $r = 1;

            $stmt = $db->query("SELECT z_tb_payment_status.person_number, amount, z_tb_fees_setup.name     
                                      FROM z_tb_payment_status, z_tb_session, z_tb_class, z_tb_term, z_tb_fees_setup 
                                      WHERE 
                                      z_tb_fees_setup.fees_setup_id = z_tb_payment_status.status
                                      AND z_tb_class.class_id = z_tb_payment_status.class_id AND z_tb_payment_status.class_id = '$classes'
                                     AND z_tb_payment_status.term_id = z_tb_term.term_id AND z_tb_payment_status.term_id = '$terms'
                                     AND z_tb_session.session_id = z_tb_payment_status.session_id AND z_tb_payment_status.session_id = '$sessions' 
                                      ORDER BY z_tb_payment_status.person_number");
            while ($row = $stmt->fetch()) {
                ?>
                <tr>
                    <td><?php echo $r; ?></td>
                    <td><?php echo $row['person_number']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <td><?php echo $row['name']; ?></td>
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

<?php

}

?>
<script>
    $(document).ready(function () {
        $("#printMe").find('.print').on('click', function () {
            $.print("#printMe");
        });

    });
</script>
