<?php

require 'config.php';
require './razorpay-php/Razorpay.php';
session_start();

use Razorpay\Api\Api;

$api= new Api($keyId,$keySecret);

$orderData = [
    'receipt'         => 'rcptid_11',
    'amount'          => 39900, // 39900 rupees in paise
    'currency'        => 'INR'
];

$razorpayOrder = $api->order->create($orderData);


$razorpayOrder=$razorpayOrder['id'];

$session['razorpay_order_id']=$razorpayOrderId;

$checkout='manual';
        
if(isset($_Post['checkout']) and in_array($_Post['checkout'], ['manual'],true))
{
    $checkout=$_Post['checkout'];
}
        
if($displaycurrency!=='INR')
{
    $data['display_curency']=$displaycurrency;
    $data['display_amount']=$displayAmount;
}
    
$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => "Acme Corp",
    "description"       => "Buy best price",
    "image"             => "https://cdn.razorpay.com/logos/FFATTsJeURNMxx_medium.png",
    "prefill"           => [
    "name"              => "Gaurav Kumar",
    "email"             => "gaurav.kumar@example.com",
    "contact"           => "9999999999",
    ],
    "notes"             => [
    "address"           => "Hello World",
    "merchant_order_id" => "12312321",
    ],
  
    "order_id"          => $razorpayOrderId,
];


$json=json_code($data);

require 'checkout/{$checkout}.php';

        ?>