<?php


$params=array(
		'RETURNURL'=>'http://stocksreally.com/pyapal/GetExpressCheckoutDetails.php',
		'CANCELURL'=>'http://stocksreally.com/pyapal/cancel.php',
		'PAYMENTACTION'=>'Sale',
		'AMT'=>0,
		'CURRENCYCODE'=>'USD',
		'DESC'=>'test EC payment',
		'L_BILLINGTYPE0'=>'RecurringPayments',
		'L_BILLINGAGREEMENTDESCRIPTION0'=>'SameEveryTime'
);
$requestParams = array(
     'METHOD' =>'SetExpressCheckout',
     'VERSION' => '123.0',
     'USER' => 'singh87shailu_api1.aol.com',
     'PWD' => 'G9FNWSWM6N3YFTPR',
     'SIGNATURE' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31APIQvArs8UJ9HEK7yiROm35N9D6L'
);

$request = array_merge($requestParams, $params);
//$params is bringed from other php.

$ch = curl_init();
  curl_setopt($ch,CURLOPT_URL ,'https://api-3t.sandbox.paypal.com/nvp');
  curl_setopt($ch,CURLOPT_VERBOSE ,1);
  curl_setopt($ch,CURLOPT_SSL_VERIFYPEER ,false);
  curl_setopt($ch,CURLOPT_SSL_VERIFYHOST ,false);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER ,1);
  curl_setopt($ch,CURLOPT_HTTPGET ,true);
  curl_setopt($ch,CURLOPT_POSTFIELDS , http_build_query($request));
  

$response = curl_exec($ch);
if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}
$response = explode('&',urldecode($response));

$data = array();
foreach($response AS $key => $value){
    $newValues = explode('=',$value);
    $data[$newValues[0]] = $newValues[1];
}

//print_r($data);
header('Location: https://www.sandbox.paypal.com/webscr?cmd=_express-checkout&useraction=commit&&token='.$data['TOKEN']);

?>