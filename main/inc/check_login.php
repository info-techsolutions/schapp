<?php

$username = $_POST['username']; //Set UserName
$password = $_POST['password']; //Set Password

include_once '../inc/function.php';

if ($username == '' || $password == '') {
  display_error('Username and password empty');
}

if (isset($username, $password)) {

    try {
        include_once('config.php'); //Initiate the MySQL connection

        $stmt = $db->prepare("SELECT person_number, person_id AS id FROM z_tb_person WHERE person_number = :username AND password = :password");

        $stmt->execute(array(
        ':username' => $username,
        ':password' => $password
        ));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($user)) {
            $personId = $user["id"];
            
            

            $stmt = $db->prepare("SELECT z_tb_role.name FROM z_tb_role, z_tb_user_role WHERE z_tb_user_role.person_id = :person_id AND z_tb_role.role_id = z_tb_user_role.role_id");
            $stmt->execute(array(
                ':person_id' => $personId
            ));
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $playRole = $result["name"];

            if (!empty($result)) {
            
            	switch($playRole){
            	
            	 case 'ADMIN':
            	    session_name("Admin");
                    session_start();
                    $_SESSION['aid'] = $user['id'];
                    $_SESSION['username'] = $user['person_number'];

                    $_SESSION['log'] = "YES";

                    header("Location:../admin/");
                    break;
                    
                    case 'STAFF':
            	    session_name("Staff");
                    session_start();
                    $_SESSION['sid'] = $user['id'];
                    $_SESSION['username'] = $user['person_number'];

                    $_SESSION['log'] = "YES";

                    header("Location:../staff/");
                    break;
            	
            	case 'SUPERADMIN':
            	    session_name("ROOT");
                    session_start();
                    $_SESSION['rid'] = $user['id'];
                    $_SESSION['username'] = $user['person_number'];

                    $_SESSION['log'] = "YES";

                    header("Location:../super/");
                    break;
            	
                  case 'PARENT':
            	    session_name("Parent");
                    session_start();
                    $_SESSION['pid'] = $user['id'];
                    $_SESSION['username'] = $user['person_number'];

                    $_SESSION['log'] = "YES";

                    header("Location:../parent/");
                    break;
            	
            	default: 
            		'No user exist with this account';
            	
            	}
            	
            } else {
                display_error("You are coming from another location");
            }
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }

    $msg = "Wrong Username or Password. Please retry";
    display_error($msg);
}  //end of the if statement for the userlogins select
else {
    header("Location:../?msg=$msg");
}
?>


