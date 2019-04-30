<?php

/**
 * Description of class
 *
 * @author union
 */
class User extends Password {
    //put your code here
    
    private $db;
    
    /**
     * 
     */
    public function __construct($db) {
        parent::__construct();

        $this->_db = $db;
}

/**
 * 
 */

public function createHash($value) {
    return $hash = crypt($value, '$2a$12'.substr(str_replace('+', '.', base64_encode(sha1(microtime(TRUE), TRUE))), 0, 22));
    
}

/**
 * 
 */
public function verifyHash($password, $hash) {
    return $hash = crypt($password, $hash);
}

/**
 * Checks if a user is logged in
 */
public function isLoggedIn(){
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE){
        return true;
    } 
}

/**
 * 
 */
public function getUserHash($username) {
    try {
        $stmt = $this->_db->prepare('SELECT password FROM users WHERE username = :username');
        $stmt->execute(array('username' => $username));
        
        $row = $stmt->fetch();
        return $row['password'];
        
    
} 
catch (PDOException $e){
    echo '<p class="error">'. $e->getMessage(). '</p>';
    
}
catch (Exception $exc) {
    echo $exc->getTraceAsString();
}
   
}

public function login($username, $password) {
    $hashed = $this->getUserHash($username);
    if($this->password_verify($password, $hashed) == 1){
        $_SESSION['loggedin'] = TRUE;
        return true;
    }
}

public function logout($param) {
    session_destroy();
}

}
