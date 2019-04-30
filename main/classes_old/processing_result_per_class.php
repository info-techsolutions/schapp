<?php
// $myTitle = 'Showing All Class - MYSCHOOL APP';

// include_once '../pages/header.php';
include_once '../inc/config.php';
include_once '../inc/errorcode.php';

if ($_POST) {

    $sessions = $_POST["sessions"];
    $terms = $_POST["terms"];
    $classes = $_POST["classes"];
   // $person_number = $_POST["person_number"];
   
   $stmt = $db->prepare("SELECT name FROM z_tb_class, z_tb_report WHERE 
    z_tb_report.class_id = z_tb_class.class_id AND z_tb_report.class_id = '$classes'");
    $stmt->execute();
    $row = $stmt->fetch();
    $className = $row['name'];
   ?>
      <div class="item">
           <!--
            <a class="ui logo icon image" href="/">
                <img src="../images/logo.png" class="ui logo icon image">
            </a> -->
            <?php echo $className. ' report'; ?></b><img src="../images/logo.png" style="width: 100px; height: 100px; float: right;">
        </div>
        
        <br /></br ><br /></br ><br /></br >
        <?php
   
$stmt = $db->query("SELECT z_tb_report.person_number, z_tb_person.firstname, z_tb_person.lastname, z_tb_person.gender,"
	." z_tb_subjects.name AS subject_name, z_tb_report.test_one, z_tb_report.test_two, z_tb_report.test_three,"
        . " z_tb_report.total, z_tb_report.rank"
	." FROM"
	." z_tb_person"
	." LEFT JOIN"
	." z_tb_report"
	." ON z_tb_person.person_number = z_tb_report.person_number"
	." LEFT JOIN"
	." z_tb_subjects"
	." ON z_tb_subjects.subject_id = z_tb_report.subject_id"
	." LEFT JOIN"
	." z_tb_class"
	." ON z_tb_report.class_id = z_tb_class.class_id AND z_tb_report.class_id = '$classes'"
	." LEFT JOIN"
	." z_tb_term"
	." ON"
	." z_tb_report.term_id = z_tb_term.term_id AND z_tb_report.term_id = '$terms'"
	." LEFT JOIN"
	." z_tb_session"
	." ON"
	." z_tb_report.session_id = z_tb_session.session_id AND z_tb_report.session_id = '$sessions'"
	." WHERE z_tb_person.typ = 'STUDENT'"
	." ORDER BY z_tb_report.person_number");

$previousAdmissionNumber = -1;

foreach($stmt as $row){

$admissionNumber = $row["person_number"];
$subjectName = $row['subject_name'];
$gender = $row["gender"];
$firstCA = $row['test_one'];
$secondCA = $row['test_two'];
$thirdCA = $row['test_three'];
$total = $row['total'];
$rank = $row['rank'];


if($admissionNumber != $previousAdmissionNumber){

// Display Student Info and their details about their grade


?>
<table id="example" class="ui celled table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>SUBJECTS</th>
                        <th>FIRST CA</th>
                        <th>SECOND CA</th>
                        <th>EXAM</th>
                        <th>TOTAL</th>
                        <th>POSITION</th>
                    </tr>
                </thead>
                <tbody>
               <?php

// echo "********************************************************************************<br/>";
echo "<hr /><br />";
echo "Admission Number: ".$admissionNumber."<br />";
echo "<strong>Name: " .$row['firstname']. " ". $row['lastname']. "</strong><br/>";
echo "Gender: ". $gender. "<br />";


$previousAdmissionNumber = $admissionNumber;

}

?>
		<tr>
                    <td><?php echo $subjectName; ?></td>
                    <td><?php echo $firstCA; ?></td>
                    <td><?php echo $secondCA; ?></td>
                    <td><?php echo $thirdCA; ?></td>
                    <td><?php echo $total; ?></td>
                    <td><?php echo $rank; ?></td>
                </tr>
                <?php
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
    <?php
    
}
?>
