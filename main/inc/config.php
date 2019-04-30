<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

ob_start();
@session_start();

/*
//database credentials
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','root');
define('DBNAME','z_db');
*/


//database credentials
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','root');
define('DBNAME','zennylim_z_db');


$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Set default timezone
date_default_timezone_set('Europe/London');

// load classes as needed

function __autoload($class) {
    $class = strtolower($class);
    
    // If it is called from within assets adjust path
    $classpath = 'classes/class.'.$class.'.php';
    
    if(file_exists($classpath)){
        require_once $classpath;
    }
    
    // If the class is called from within the admin adjust path
    $classpath = '../classes/class.'.$class.'.php';
    
    if (file_exists($classpath)){
        require_once $classpath;
    }
    
    // If the class is called from within the admin adjust path
    $classpath = '../../classes/class.'.$class.'.php';
    
    if (file_exists($classpath)){
        require_once $classpath;
    }
}

$user = new User($db);

include 'func.php';

?>
