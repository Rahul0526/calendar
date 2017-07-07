<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');
//test url https://api-3t.sandbox.paypal.com/nvp
//live url https://api-3t.paypal.com//nvp
//
//live url 
class Paypal extends CI_Controller {

  function __construct() {
    parent::__construct();

    // Load helpers
   $this->load->library('session');
		//$this->load->library('email');
		$this->load->database();
                $this->load->helper('language');
		$this->load->helper(array('form','html','url','path'));
               $this->load->library('pagination','database');
                 $this->load->model('db_model');
                 $this->load->model('email_model');

    // Load PayPal library
    $this->config->load('paypal');
global $config;
    $config = array(
        'Sandbox' => $this->config->item('Sandbox'), // Sandbox / testing mode option.
        'APIUsername' => $this->config->item('APIUsername'), // PayPal API username of the API caller
        'APIPassword' => $this->config->item('APIPassword'), // PayPal API password of the API caller
        'APISignature' => $this->config->item('APISignature'), // PayPal API signature of the API caller
        'APISubject' => '', // PayPal API subject (email address of 3rd party user that has granted API permission for your app)
        'APIVersion' => $this->config->item('APIVersion')  // API version you'd like to use for your call.  You can set a default version in the class and leave this blank if you want.
    );

    // Show Errors
    if ($config['Sandbox']) {
      error_reporting(E_ALL);
      ini_set('display_errors', '1');
    }

    $this->load->library('paypal/Paypal_pro', $config);
  }


   function setPayment() {
      //print_r($this->session->userdata());die;
     $userInfo =$this->session->userdata('userInfo');
	
     $plan=$this->db_model->getData('plans',array('id'=>$userInfo['plan_id']));
     $planInfo=$plan[0];    
     
       $amount=$planInfo->price_monthly;
     
     
	 $cancelurl=($this->session->userdata('uid')!='')?'Company/upgrade_plan':'plan';
     global $config;
$params=array(
		'RETURNURL'=>site_url('paypal/GetExpressCheckoutDetails'),
		'CANCELURL'=>site_url($cancelurl),
		'PAYMENTACTION'=>'Sale',
		'AMT'=>round($amount,2),
		'CURRENCYCODE'=>'USD',
		'DESC'=>$planInfo->title." Subscription",
		'L_BILLINGTYPE0'=>'RecurringPayments',
		'L_BILLINGAGREEMENTDESCRIPTION0'=>$planInfo->title." Subscription"
);
$requestParams = array(
     'METHOD' =>'SetExpressCheckout',
     'VERSION' => '123.0',
     'USER' => $config['APIUsername'],
     'PWD' => $config['APIPassword'],
     'SIGNATURE' => $config['APISignature']
);


$request = array_merge($requestParams, $params);
//$params is bringed from other php.
//print_r($request);
$ch = curl_init();
  curl_setopt($ch,CURLOPT_URL ,'https://api-3t.sandbox.paypal.com/nvp');
  curl_setopt($ch,CURLOPT_VERBOSE ,1);
  curl_setopt($ch,CURLOPT_SSL_VERIFYPEER ,false);
  curl_setopt($ch,CURLOPT_SSL_VERIFYHOST ,false);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER ,1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0); 
  curl_setopt($ch, CURLOPT_TIMEOUT, 400); //timeout in seconds
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

//print_r($data);die;
//https://www.paypal.com/webscr?cmd=_express-checkout&useraction=commit&&token='.$data['TOKEN']
header('Location: https://www.sandbox.paypal.com/webscr?cmd=_express-checkout&useraction=commit&&token='.$data['TOKEN']);

   }
function GetExpressCheckoutDetails(){
      $userInfo =$this->session->userdata('userInfo');
	  
    $plan=$this->db_model->getData('plans',array('id'=>$userInfo['plan_id']));
     $planInfo=$plan[0];
    
       $sDt= gmdate("Y-m-d\TH:i:s\Z");
    
    
       $amount=$planInfo->price_monthly;
       $billingCycle="Month";
     
     global $config;

$params=array();
$requestParams = array(
     'METHOD' =>'GetExpressCheckoutDetails',
     'VERSION' => '123.0',
     'USER' => $config['APIUsername'],
     'PWD' => $config['APIPassword'],
     'SIGNATURE' => $config['APISignature'],
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
	'SUBSCRIBERNAME'=>$userInfo['f_name'],
	'PROFILESTARTDATE'=>$sDt,
	'DESC'=>$planInfo->title." Subscription",
	'MAXFAILEDPAYMENTS'=>3,
	'AUTOBILLAMT'=>'AddToNextBilling',
	'BILLINGPERIOD'=>$billingCycle,
	'BILLINGFREQUENCY'=>1,
	'AMT'=>round($amount,2),
	'FIRSTNAME'=>$userInfo['f_name'],
	'LASTNAME'=>$userInfo['l_name'],	
	'CURRENCYCODE'=>'USD'
);
$requestParams = array(
     'METHOD' =>'CreateRecurringPaymentsProfile',
     'VERSION' => '123.0',
     'USER' => $config['APIUsername'],
     'PWD' => $config['APIPassword'],
     'SIGNATURE' => $config['APISignature'],
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

 
    if(!empty($data) and $data['PROFILESTATUS']=='ActiveProfile'){
		
		//save data intod paypal history 
		if($this->session->userdata('uid')!=''){
			$history['user_id']=$this->session->userdata('uid');
			$history['PROFILEID']=$data['PROFILEID'];
			$history['PROFILESTATUS']=$data['PROFILESTATUS'];
			$history['rawdata']=json_encode($data);			
			$this->db_model->SaveForm('au_paypalhistory', $history);
			
			$updateuserInfo['Paypal_PROFILEID']=$data['PROFILEID'];
			$updateuserInfo['Paypal_PROFILESTATUS']=$data['PROFILESTATUS'];			
			$updateuserInfo['subscriptionType']=$userInfo['subscriptionType'];
			$updateuserInfo['plan_id']=$userInfo['plan_id'];	
			$updateuserInfo['Paypal_NEXTBILLINGDATE']=NULL;
			$this->db_model->UpdateForm('au_users',$updateuserInfo,array('id'=>$this->session->userdata('uid')));
			$this->getReucringPyamentDetails();
			
			$result=$this->db_model->getData('users',array('id'=>$this->session->userdata('uid')));
			$my_data = array(
				'uid' => $result[0]->id,
				'name' => $result[0]->f_name,
				'last_login' => $result[0]->last_login,
				'email' => $result[0]->email,
				'status' => $result[0]->status,
				'plan_id' => $result[0]->plan_id,
				'Paypal_NEXTBILLINGDATE'=>$result[0]->Paypal_NEXTBILLINGDATE,
				'type' => "company");			
			$this->session->set_userdata($my_data);
			
			$this->session->set_flashdata("success", "Plan Updated Sucessfully");
			redirect('/company/profile');
			
		}else{
			$userInfo['Paypal_NEXTBILLINGDATE']=date("Y-m-d");
			$userInfo['Paypal_PROFILEID']=$data['PROFILEID'];
			$userInfo['Paypal_PROFILESTATUS']=$data['PROFILESTATUS'];
			$userInfo['type']=@$data['company'];
			$userInfo['status']=1;
			$userInfo['last_login']=date("Y-m-d H:i:s");
			unset($userInfo['trial']);
			$userInfo['password']=md5($userInfo['password']);
			$this->db_model->SaveForm('users', $userInfo);
			$uid=$this->db->insert_id();
			
			$history['user_id']=$uid;
			$history['PROFILEID']=$data['PROFILEID'];
			$history['PROFILESTATUS']=$data['PROFILESTATUS'];
			$history['rawdata']=json_encode($data);			
			$this->db_model->SaveForm('au_paypalhistory', $history);
			
			$this->getReucringPyamentDetails();
			$result=$this->db_model->getData('users',array('id'=>$uid));
			$my_data = array(
				'uid' => $result[0]->id,
				'name' => $result[0]->f_name,
				'last_login' => $result[0]->last_login,
				'email' => $result[0]->email,
				'status' => $result[0]->status,
				'plan_id' => $result[0]->plan_id,
				'Paypal_NEXTBILLINGDATE'=>$result[0]->Paypal_NEXTBILLINGDATE,
				'type' => "company");
			//print_r($result);die;
			
			$this->session->set_userdata($my_data);
			$this->session->set_flashdata("success", "Sucessfully login");
			$mailHtml="<pre>Thank you for choosing calendar Task.</pre>
	<pre>&nbsp;</pre>
	<pre>You are receiving this email because you or someone created an account for you at Stocksreally.com. If you did not, please disregard or email us at the email address below. This is a system generated email, please do not reply.</pre>
	<pre>&nbsp;</pre>
	<pre>To activate your account, please verify your email by clicking the link below, or paste it in your browser address bar:</pre>
	<pre>&nbsp;</pre>
	<pre><strong><a href='http://jwel.azeabotanica.co/validateEmail/'".$result[0]->email."'>Activation Link Here</a>&gt;&gt;</strong></pre>
	<pre>&nbsp;</pre>
	<pre>Thank you for your interest in Stocksreally.com.</pre>
	<pre>&nbsp;</pre>
	<pre>Stocksreally.com</pre>
	<p>charts | data | analysis for today&rsquo;s  investor </p>
	<pre>http://www.stocksreally.com</pre>
	<pre>info@bennyapp.com</pre>";
			$this->email_model->sendMail($result[0]->email.",khalidhashmi13@gmail.com", "khalidhashmi13@gmail.com", "Welcome to augurs.in", $mailHtml);
			redirect('/company/index');
		}
		
		
	}else{
		$this->session->set_userdata($data);
		redirect('plan');
	}

   }
 
  function cancelPayment(){
    if($_GET['token']!=''&& $_GET['PayerID']!=''){
      $res=$this->Do_express_checkout_payment();
      //print("Success <pre>");
      //print_r($res);
      redirect('success');
    }
    else{
      print("Error ");
    }
  }
  
 function getReucringPyamentDetails($PROFILEID=NULL){
	  
global $config;	 

  $usersDetails=$this->db_model->getQueryData("select * from au_users where Paypal_PROFILEID<>'' and (Paypal_NEXTBILLINGDATE IS NULL or date(Paypal_NEXTBILLINGDATE)<='".date('Y-m-d')."')"); 
 
 foreach($usersDetails as $userkye=>$user){
	 
	 $PROFILEID=$user->Paypal_PROFILEID;
	 
 $params=array();   
$requestParams = array(
     'METHOD' =>'GetRecurringPaymentsProfileDetails',
     'VERSION' => '123.0',
     'USER' => $config['APIUsername'],
     'PWD' => $config['APIPassword'],
     'SIGNATURE' => $config['APISignature'],
	 'PROFILEID'=>$PROFILEID
);


$request = array_merge($requestParams, $params);
//$params is bringed from other php.

$ch = curl_init();
  curl_setopt($ch,CURLOPT_URL ,'https://api-3t.sandbox.paypal.com/nvp');
  curl_setopt($ch,CURLOPT_VERBOSE ,1);
  curl_setopt($ch,CURLOPT_SSL_VERIFYPEER ,false);
  curl_setopt($ch,CURLOPT_SSL_VERIFYHOST ,false);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER ,1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0); 
  curl_setopt($ch, CURLOPT_TIMEOUT, 400); //timeout in seconds
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


 
 	//update in user table
	if(strtotime(date("Y-m-d",strtotime(@$data['NEXTBILLINGDATE']))<strtotime(date("Y-m-d"))) and $user->ActiveByAdmin==0){
		$updateData['status']=1;
	}
	$updateData['Paypal_NEXTBILLINGDATE']=date("Y-m-d H:i:s",strtotime(@$data['NEXTBILLINGDATE']));
	$updateData['Paypal_otherinformation']=json_encode($data);
	$updateData['type']='company';		
	$this->db_model->UpdateForm('au_users',$updateData,array('id'=>$user->id));
		 	
			$history['user_id']=$user->id;
			$history['PROFILEID']=$PROFILEID;
			$history['PROFILESTATUS']=$data['STATUS'];
			$history['rawdata']=json_encode($data);			
			$this->db_model->SaveForm('au_paypalhistory', $history);
 }
 		return false;
 }
}