<?php
require "start.php";
if( !isset( $_GET['success'] ) || !isset( $_GET['paymentId'] ) || !isset( $_GET['PayerID'] ) ){
    die();
}

if(   $_GET['success'] === false ) die();

$paymentId = $_GET['paymentId'];
$payerId = $_GET['PayerID'];

//grab the payment
$payment = \PayPal\Api\Payment::get($paymentId,$paypal);

//excute payment
$execute = new \PayPal\Api\PaymentExecution();
$execute->setPayerId($payerId);

try{
    $result = $payment->execute($execute,$paypal);
}catch (Exception $e){
    $data = json_decode( $e->getData() );
    var_dump($data);
    die();
}

echo 'Payment mad. Thanks!';