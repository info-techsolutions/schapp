<?php
$myTitle = 'Showing All Class - MYSCHOOL APP';

include_once '../pages/header.php';
include_once '../inc/config.php';
include_once '../inc/errorcode.php';

if ($_POST) {

    $sessions = $_POST["sessions"];
    $terms = $_POST["terms"];
    $classes = $_POST["classes"];
    $person_number = $_POST["person_number"];
    
    $stmt = $db->prepare("SELECT * FROM 
    			z_tb_person LEFT JOIN z_tb_grade 
    			ON z_tb_grade.person_number = z_tb_person.person_number
    			AND z_tb_grade.person_number = :personNumber");
    $stmt->execute(array(
    		':personNumber' => $person_number
		    ));
		    $row = $stmt->fetch();
		   $admissionNumber = $row['person_number'];
		    $firstname = $row['firstname'];
		    $lastname = $row['lastname'];
		    $profilePicture = $row['profile_photo_url'];
		   
    ?>
    
    <!--<p style="float: right;">Profile Photo: <img style="height: 32px; width: 32px;" src="../admin/pic/<?php // echo $profilePicture;  ?>" /></p>-->
    <p>Admission Number: <?php echo $admissionNumber; ?></p>
    <p>Student Name: <?php echo $lastname.' '.$firstname; ?></p>

    <div class="ui message" style="display: none;"></div>
    
    <table class="ui celled structured table">
    
             		
  <thead>
  
    <tr>
      <th rowspan="2">Subject</th>
      <th rowspan="2">Type</th>
      <th rowspan="2">Files</th>
      <th colspan="3">Exam/Test</th>
    </tr>
    <tr>
    <?php
    try {
                include_once '../inc/config.php';
    
    $stmt10 = $db->query("SELECT subject_id, test_id"
                		." FROM z_tb_grade"
                		." LEFT JOIN z_tb_person ON z_tb_grade.person_number = z_tb_person.person_number AND z_tb_grade.person_number = '$person_number'"
                		." LEFT JOIN z_tb_class ON z_tb_grade.class_id = z_tb_class.class_id AND z_tb_grade.class_id = '$classes'"
                		." LEFT JOIN z_tb_term ON z_tb_grade.term_id = z_tb_term.term_id AND z_tb_grade.term_id = '$terms'" 
                		." LEFT JOIN z_tb_session ON z_tb_grade.session_id = z_tb_session.session_id AND z_tb_grade.session_id = '$sessions'");
                		
        // let's fetch our subject_id and test_id
    while ($row10 = $stmt10->fetch()) {
    	$subjectId = $row10["subject_id"];
        $testId = $row10["test_id"];
        
        // Let searh for the names related to each id in their respective tables
        
        // Table Subjects
        $stmt11 = $db->prepare("SELECT z_tb_subjects.name AS name"
                			." FROM z_tb_subjects"
                			." INNER JOIN z_tb_grade ON z_tb_subjects.subject_id = z_tb_grade.subject_id AND z_tb_grade.subject_id = :subjectID ");
                	$stmt11->execute(array(':subjectID' => $subjectId));
                	$row11 = $stmt11->fetch(); 
                	$subject11 = $row11["name"];
                	
        // Table Test
                	$stmt12 = $db->prepare("SELECT z_tb_test.name AS name"
                			." FROM z_tb_test, z_tb_grade"
                			." WHERE z_tb_test.test_id = z_tb_grade.test_id AND z_tb_grade.test_id = :testID");
                	 $stmt12->execute(array(':testID' => $testId));
                	 $row12 = $stmt12->fetch(); 
                	 $test = $row12["name"];
    
		   
    ?>
    
      <th><?php echo $test; ?></th>
      <?php
       }
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
            ?>
    </tr>
      
  </thead>

  <tbody>
    <tr>
      <td>Alpha Team</td>
      <td>Project 1</td>
      <td class="right aligned">2</td>
      <td class="center aligned">
        <i class="large green checkmark icon"></i>
      </td>
      <td></td>
      <td></td>
    </tr>
    
      
  </tbody>

</table>
    
        
    <table id="example" class="ui celled table" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Subject</th>
                <th>Score</th>
                <th>Test</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>S/N</th>
                <th>Subject</th>
                <th>Score</th>
                <th>Test</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
            try {
                include_once '../inc/config.php';
                $r = 1;
//                $stmt = $db->query("SELECT person_number, session_id, term_id, test_id, subject_id, class_id,"
//                        . " arm_id, score FROM z_tb_grade WHERE test_id = '$tests'"
//                        . " AND subject_id = '$subjects' AND class_id = '$classes' ");
                $stmt = $db->query("SELECT score, test_id, subject_id" 
                		." FROM z_tb_grade, z_tb_class, z_tb_term, z_tb_session, z_tb_person"
                		." WHERE z_tb_person.person_number = z_tb_grade.person_number AND z_tb_grade.person_number = '$person_number'"
                		." AND z_tb_class.class_id = z_tb_grade.class_id AND z_tb_grade.class_id = '$classes'"
                		." AND z_tb_term.term_id = z_tb_grade.term_id AND z_tb_grade.term_id = '$terms'" 
                		." AND z_tb_session.session_id = z_tb_grade.session_id  AND z_tb_grade.session_id = '$sessions'"
                		." ORDER BY subject_id");
                while ($row = $stmt->fetch()) {
                	// $gradeId = $row["grade_id"];
                	// $admissionNumber = $row["person_number"];
                	$subjectId = $row["subject_id"];
                	$testId = $row["test_id"];
                	
                	$stmt2 = $db->prepare("SELECT z_tb_subjects.name AS name"
                			." FROM z_tb_subjects, z_tb_grade"
                			." WHERE z_tb_subjects.subject_id = z_tb_grade.subject_id AND z_tb_grade.subject_id = :subjectID ");
                	$stmt2->execute(array(':subjectID' => $subjectId));
                	$row2 = $stmt2->fetch(); 
                	$subject = $row2["name"];
                	
                	$stmt3 = $db->prepare("SELECT z_tb_test.name AS name"
                			." FROM z_tb_test, z_tb_grade"
                			." WHERE z_tb_test.test_id = z_tb_grade.test_id AND z_tb_grade.test_id = :testID ");
                	$stmt3->execute(array(':testID' => $testId));
                	$row3 = $stmt3->fetch(); 
                	$test = $row3["name"];
                    ?>
                    <tr>
                        <td><?php echo $r; ?></td>
                        <td><?php echo $subject;  ?> </td>
                        <td><?php echo $row["score"];  ?> </td>
                        <td><?php echo $test;  ?> </td>
                        
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
    <!--                        </div>
                        </div>
                    </div>
                </div>
            </div>-->
    <?php // include_once'../pages/footer.php'; ?>
    <script src="../assets/js/signup.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.semanticui.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();

        });
        </script>

    <!--    </body>
        </html>-->
    <?php
}
?>
