<?php
use PayPal\Api\Payer;
require "start.php";

if( !isset( $_POST['product']) && !isset($_POST['price'] )){
    die();
}
$product = $_POST['product'];
$price = $_POST['price'];
$shipping = 2.00;

$total = (float)$price + (float)$shipping;

$payer = new Payer();
$payer->setPaymentMethod('paypal');

//创建item
$item = new \PayPal\Api\Item();
$item->setName($product)
    ->setCurrency('GBP')
    ->setQuantity(1)
    ->setPrice($price);

//创建itemlist
$itemList = new \PayPal\Api\ItemList();
$itemList->setItems([$item]);

//detail
$detail = new \PayPal\Api\Details();
$detail->setShipping($shipping)
->setSubtotal($price);

//amount set currency detail
$amount = new \PayPal\Api\Amount();
$amount->setCurrency('GBP')
    ->setTotal($total)
    ->setDetails($detail);

//transaction =>amount itemlist description
$transaction = new \PayPal\Api\Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription('PayFormSomething Payment')
    ->setInvoiceNumber(uniqid());

//url
$redirectUrls = new \PayPal\Api\RedirectUrls();
$redirectUrls->setReturnUrl(SITE_URL.'/pay.php?success=true')
    ->setCancelUrl(SITE_URL.'/pay.php?success=false');

$payment = new \PayPal\Api\Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setRedirectUrls($redirectUrls)
    ->setTransactions([$transaction]);

//create a payment
try{
    $payment->create($paypal);
}catch (Exception $e){
    die($e);
}

$approvalUrl = $payment->getApprovalLink();
header("Location:{$approvalUrl}");