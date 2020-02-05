<?php
$requestMethod = $_SERVER["REQUEST_METHOD"];
$body_data = json_decode(file_get_contents('php://input'),true);

// include database and object files
include_once 'classes/connection.php';
include_once 'classes/transaction.php';
 
// instantiate database and product object
$database = new Connection();
$db = $database->openConnection();
 
// initialize object
$transaction = new Transaction($db);

switch ($requestMethod) {
    case 'POST':
        $from_amount = $body_data['from_amount'];
        $from_account = $body_data['from_account'];
        $to_amount = $body_data['to_amount'];
        $to_account = $body_data['to_account'];
        
 
        $transaction->setFromAmount($from_amount);
        $transaction->setFromAccount($from_account);
        $transaction->setToAmount($to_amount);
        $transaction->setToAccount($to_account);


        try{
            if($transactionInfo = $transaction->createTransaction($transaction->getBalance($from_account), $to_amount)){
                echo ("Transaction was Succesfull");
                return $transactionInfo;
            }

        }catch(Exception $e){
            echo 'Message:' . $e->getMessage();
         }
        
 

        if (!empty($transactionInfo)) {
            $js_encode = json_encode(array('status'=>true, 'message'=>'Transaction was Successfully'), true);
        } else {
            $js_encode = json_encode(array('status'=>false, 'message'=>'Transaction failed.'), true);
        }
        header('Content-Type: application/json');
        echo $js_encode;
        break;
    default:
        //header("HTTP/1.0 405 Method Not Allowed");
        break;
        
}
