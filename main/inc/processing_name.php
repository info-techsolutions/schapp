<?php

require("config.php");

$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];


// array for JSON response
// $response = array();
$response = array();


//add the users details to the database
$stmt = $db->prepare("INSERT INTO users (firstname, lastname) values (:firstname, :lastname)");

$result = $stmt->execute(array(
	':firstname' => $firstname,
	':lastname' => $lastname
));

//if (mysql_affected_rows($result) &gt; 0) {

if($result){

// success
$response["error"] = 1;
$response["message"] = "User details saved!";

// echoing JSON response
echo json_encode($response);

}
else {

// did not save to db
$response["success"] = 0;
$response["message"] = "Not saved, try again";

// echo no crime JSON
echo json_encode($response);
}


/*
if(isset($_GET["names"]))
{
    //checks the format client wants
    if($_GET["names"] == "json")
    {
        $name_and_age = array("Name1" => 12, "Name2" => 34, "Name3" => 67);

        //sets the response format type
        header("Content-Type: application/json");

        //converts any PHP type to JSON string
        echo json_encode($name_and_age);    
    }
    else
    {
        //web service not found 
        header("HTTP/1.0 404 Not Found");
    }
}
else
{
    header("HTTP/1.0 404 Not Found");
}
*/
?>
