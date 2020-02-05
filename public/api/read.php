<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once 'classes/connection.php';
include_once 'classes/user.php';
 
// instantiate database and product object
$database = new Connection();
$db = $database->openConnection();
 
// initialize object
$user = new User($db);

 
// query products
$stmt = $user->read();
//$stmt = $user->checkBalance();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $user_arr=array();
    $user_arr["users"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
 
        $user_item=array(
            "id" => $id,
            "firstname" => $firstName,
            "lastname" => $lastName,
            "password" => $password,
            "mobilephone" => $mobilephone,
            "account_id" => $account_id,
            "balance" => $balance
        );
 
        array_push($user_arr["users"], $user_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show products data in json format
    echo json_encode($user_arr);
}
 else {
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no users found
    echo json_encode(
        array("message" => "No users found.")
    );
}