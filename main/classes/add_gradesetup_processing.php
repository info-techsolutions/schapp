<?php
require_once '../inc/function.php';
require_once '../inc/config.php';
include_once '../classes/class.upload.php';
include_once '../inc/errorcode.php';

if ($_POST) {


// $array = ($_POST);
//    if(isset($_POST['to']) && is_array($_POST['to']) AND isset($_POST['from']) && is_array($_POST['from']) AND isset($_POST['grade']) && is_array($_POST['grade']) AND isset($_POST['remark']) && is_array($_POST['remark'])){
//        $to = '';
//        foreach ($_POST['to'] as $key => $to_value){
//            $to .= $to_value.", ";
//        }
//        
    /*  $to = implode(", ", $_POST['to']);
        $from = implode(", ", $_POST['from']);
        $grade = implode(", ", $_POST['grade']);
        $remark = implode(", ", $_POST['remark']);
   
        
        $tos = serialize($to);
        $froms = serialize($from);
        $grades = serialize($grade);
        $remarks = serialize($remark);
       */ 
   // }


// collect form data
//extract($_POST);
  
  
  
 /* $to = $_POST['to'];
  $from = $_POST['from'];
  $grade = $_POST['grade'];
  $remark = $_POST['remark'];
  print_r($to);
  print_r($from);
  print_r($grade);
  print_r($remark);
  */
  
// basic basic validation
/*
    if ($to == '') {
        $error[] = 'No to.';
    }

    if ($from == '') {
        $error[] = 'No from.';
    }

    if ($grade == '') {
        $error[] = 'No grade.';
    }

    if ($remark == '') {
        $error[] = 'No remark.';
    }

    if (!isset($error)) {
    */
        try {
                    
                for($i = 0; $i < count($_POST['from']); $i++){
                
                $stmt = $db->prepare('INSERT INTO z_tb_gradesetup(froms, tos, grade, remark) VALUES (:froms, :tos, :grade, :remark)');
                    $result = $stmt->execute(array(
                    	':froms' => $_POST['from'][$i],
                        ':tos' => $_POST['to'][$i],
                        ':grade' => $_POST['grade'][$i],
                        ':remark' => $_POST['remark'][$i]
                        ));
                }
                 /*   foreach($array as $row){
                    $stmt = $db->prepare('INSERT INTO z_tb_gradesetup(froms, tos, grade, remark) VALUES (:froms, :tos, :grade, :remark)');
                    $stmt->execute(array(
                    	':froms' => $row[0],
                        ':tos' => $row[1],
                        ':grade' => $row[2],
                        ':remark' => $row[3]
                        ));
                     
                   // $stmt->execute($values);
                    }
                    */
                         if($result){
                  
                    ?>
                    <span class="flow-text">You have successfully setup grade <a href="../admin/show_gradesetup.php" class="ui small primary button" style="color: #ffffff; ">Home</a></span>

                   <?php
               } else {
                    // error occurred   
                    ?>
                    <span class="red flow-text">Error: setting up grade</span>

                    <?php
          
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
  //  }
    
}

