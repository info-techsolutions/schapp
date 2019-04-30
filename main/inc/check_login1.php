<?php

include_once '../inc/errorcode.php';

if (isset($_POST)) {


$username = $_POST['username']; //Set UserName
$password = $_POST['password']; //Set Password

if ($username == '' || $password == '') {
    ?>
   <div class="ui error message">
                        <div class="header">Error</div>
                         <p>Empty Username or password</p>
                    </div>
                    <?php
}

if (isset($username, $password)) {

 include_once('config.php'); //Initiate the MySQL connection'
 	try{

        $stmt = $db->prepare("SELECT sch_code AS id FROM z_tb_schools WHERE username = :username AND password = :password");

        $stmt->execute(array(
        ':username' => $username,
        ':password' => $password
        ));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        print_r($user);
            
             } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
    
}      // End of isset username and password


else{
?>

<div class="ui error message">
                        <div class="header">Error</div>
                         <p>Sorry! We can't recognise this username or password</p>
                    </div>
                    <?php
}

}


?>
