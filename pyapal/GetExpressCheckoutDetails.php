<?php


$params=array();
$requestParams = array(
     'METHOD' =>'GetExpressCheckoutDetails',
     'VERSION' => '123.0',
     'USER' => 'singh87shailu_api1.aol.com',
     'PWD' => 'G9FNWSWM6N3YFTPR',
     'SIGNATURE' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31APIQvArs8UJ9HEK7yiROm35N9D6L',
	 'TOKEN'=>$_GET['token']
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
$response = explode('&',urldecode($response));

$data = array();
foreach($response AS $key => $value){
    $newValues = explode('=',$value);
    $data[$newValues[0]] = $newValues[1];
}

//print_r($data);


//create expess checkout profile

$params=array(
	'SUBSCRIBERNAME'=>'Mr.Subscriber',
	'PROFILESTARTDATE'=>'2016-11-27T00:00:00Z',
	'DESC'=>'SameEveryTime',
	'MAXFAILEDPAYMENTS'=>3,
	'AUTOBILLAMT'=>'AddToNextBilling',
	'BILLINGPERIOD'=>'Week',
	'BILLINGFREQUENCY'=>1,
	'AMT'=>0.01,
	'FIRSTNAME'=>'John',
	'LASTNAME'=>'Doe',
	'STREET'=>'1 Anything Street',
	'CITY'=>'Topeka',
	'STATE'=>'KS', 
	'COUNTRYCODE'=>'US',
	'ZIP'=>66601,
	'CURRENCYCODE'=>'USD'
);
$requestParams = array(
     'METHOD' =>'CreateRecurringPaymentsProfile',
     'VERSION' => '123.0',
     'USER' => 'singh87shailu_api1.aol.com',
     'PWD' => 'G9FNWSWM6N3YFTPR',
     'SIGNATURE' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31APIQvArs8UJ9HEK7yiROm35N9D6L',
	 'TOKEN'=>$_GET['token']
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
$response = explode('&',urldecode($response));

$data = array();
foreach($response AS $key => $value){
    $newValues = explode('=',$value);
    $data[$newValues[0]] = $newValues[1];
}

print_r($data);

?>