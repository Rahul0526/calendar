<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author MAT
 */
class Company extends CI_Controller {

	//put your code here
	/**
	 * User Controller Cunstuctor
	 */
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		//$this->load->library('email');
		$this->load->helper('language');
		$this->load->helper(array('form', 'html', 'url', 'path'));
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->model('user_model');
		$this->load->model('db_model');
	 $this->load->model('admin_model');
		$this->load->model('email_model');
	//$this->load->library('csvreader');
	}

	public function index() {
		$data['title'] = "Home";
		$this->authCheck();
		$userId = $this->session->userdata('uid');
		$milestones= $this->db_model->getData('au_milestones',array('company_id'=>$userId)); 
		$Employee= $this->db_model->getData('au_users',array('company_id'=>$userId,'type'=>'Employee'));
		$emplyolist=array(array('key'=>'0','label'=>'--Select--'));
		if(!empty($Employee)){
			foreach($Employee as $emp){
				$emplyolist[]=array('key'=>$emp->id,'label'=>$emp->f_name.' '.$emp->l_name);		
			}
		}
		// $milestoelist=array(array('key'=>'0','label'=>'--Select--'));
		if(!empty($milestones)){
			foreach($milestones as $mlt){
				$milestoelist[]=array('key'=>$mlt->id,'label'=>$mlt->Title);		
			}
		}
		$data['Employee']=$emplyolist;
		$data['Milestoelist']=$milestoelist;
		$this->load->view('company/dashboard',$data);
	}
	
	public function taskManagement() {
		$this->authCheck();
		$parameters=$_REQUEST;
		$userId = $this->session->userdata('uid');
		// print_r($parameters); 
		// die;
		// get data	 BKP
		if(isset($parameters['from']) and isset($parameters['to'])) { 
			$tasks = $this->db_model->getData('au_tasks',array('company_id'=>$userId,'start_date>='=>$parameters['from'],'end_date<='=>$parameters['to']));
			$outputdata=array();
			if(!empty($tasks)){
				foreach($tasks as $task){
					$taskType = $task->highlighted;
					$highlighted = "";
					if($taskType != "0") { // default
						if($taskType == "1") {
							$highlighted = "highlighted";
						} else if ($taskType == "2") {
							$highlighted = "holiday";
						}
					}
					// $highlighted = $task->highlighted == "0" ? "" : "highlighted";
					$outputdata[]=array(
						'start_date'=>$task->start_date,
						'end_date'=>$task->end_date,
						'text'=>$task->title,
						'event_id'=>$task->id,
						'employee'=>$task->employee_id,
						'milestone'=>$task->milestone_id,
						// 'weight'+$task->milestone_id=>$weight,
						'subject'=>$highlighted
					);
				}
				// print_r($outputdata);
				echo json_encode($outputdata);
				// die;
			}
		}

		$company_id = $this->session->userdata('uid');
		$a = $this->db_model->getData('au_weekends', array('companyId'=>$company_id),'','');
		$weekOffs = $a[0]->weekOffs;
		$weekDays = array(1=>"Monday",2=>"Tuesday",3=>"Wednesday",4=>"Thursday",5=>"Friday",6=>"Saturday",7=>"Sunday");

		//insert tasks
		$insertedData=$_POST;
	 	// print_r($insertedData);die;
		if(@$insertedData[0]=='inserted') {
			$taskdata=array();
			//procss data
			foreach($insertedData as $kt=>$rowd) {
				if($kt==0 or $kt=='ids')
				continue;
				$rowx=explode("_",$kt);			  
				$taskdata[$rowx[0]][$rowx[1]]=$rowd;			  
			}
			// print_r($taskdata);die;
		 
			foreach($taskdata as $cid=>$task) {
				//get milestone records 
				// print_r($task);
				// $milestones = array_map('intval', explode(",", $task['milestone']));
				$milestones = array();
				foreach($task as $key=>$value) {
					if(strpos($key, "milestone") !== false && $value !== "false") {
						$arr = explode("milestone", $key);
						$a = array(
							"priority"=>$task["priority".$arr[1]],
							"key" => $arr[1], 
							"value"=> $task["weight".$arr[1]]
						);
						array_push($milestones, $a);
					}
				}
				sort($milestones);

				//  Checking if job exceeds given time frame
				$FinalDays = 0;
				$workingDays = 0;
				foreach ($milestones as $key => $milestone) {
					$milestonesDet = $this->db_model->getData('au_milestones',array('company_id'=>$userId,'id'=>$milestone["key"]));
					$weight = (int)$milestonesDet[0]->weight;
					$addDays = round(((int)$milestone["value"])/$weight);
					$daysMilstone=$milestonesDet[0]->days;
					$totalDays = ($daysMilstone + $addDays);
					$workingDays += $totalDays;
					for($i=0;$i<$totalDays;$i++) {		
						$taskarray=array();
						$day = strtotime($task['end']. " - $i days");
						$dayNo = date("N", $day);
						if(strpos($weekOffs, $dayNo) !== false) {
							$totalDays++;
						}
						$FinalDays++;
					}
				}
				$startDate = new DateTime(date('Y-m-d H:i:s', strtotime($task['end']. " - $FinalDays days")));
				$endDate = new DateTime($task['end']);
				$selectedStartDate = new DateTime($task['start']);

				if($startDate < $selectedStartDate) {
					$interval = $startDate->diff($selectedStartDate);
					echo "Job exceeds the date range by " . floor($interval->format('%R%a days')) . " Day(s). Please extend date range.\n";
					$days = $startDate->diff($endDate, true)->days;
					echo "\nWorking Days: $workingDays";
					foreach (explode(',', $weekOffs) as $key => $value) {
						$holiday = intval($days / 7) + ($startDate->format('N') + $days % 7 >= $value);
						echo "\n".$weekDays[$value].": $holiday";
						
					}
					// $saturdays = intval($days / 7) + ($startDate->format('N') + $days % 7 >= 6);

					// echo "\n\nStart Date: ".$startDate->format('Y-m-d H:i:s');
					// echo "\nEnd Date: ".$endDate->format('Y-m-d H:i:s');
					// echo "\nStart Date Given: ".date('Y-m-d H:i:s', strtotime($task['start']));
					// echo "\nStart Date Given: ".date('Y-m-d H:i:s', strtotime($task['start']));
					// echo "\nEnd Date Given: ".date('Y-m-d H:i:s', strtotime($task['end']));
					// echo "\nSaturdays: $saturdays";
					echo "\nTotal Days: $FinalDays";
					die;
				}

				foreach ($milestones as $key => $milestone) {
					$milestonesDet = $this->db_model->getData('au_milestones',array('company_id'=>$userId,'id'=>$milestone["key"]));
					$weight = (int)$milestonesDet[0]->weight;
					$addDays = round(((int)$milestone["value"])/$weight);
					// echo '<br/>' . $milestone["key"] . " - " . $milestone["value"] . " - " . $milestones[0]->days . " - " . $addDays;
					$daysMilstone=$milestonesDet[0]->days;
					$totalDays = $daysMilstone + $addDays;
					for($i=0;$i<$totalDays;$i++) {		
						$taskarray=array();
						$day = strtotime($task['end']. " - $i days");
						$dayNo = date("N", $day);
						if(strpos($weekOffs, $dayNo) !== false) {
							if($i < $daysMilstone) $daysMilstone++;
							$totalDays++;
							$taskarray['highlighted']=2; // excluding holidays
						} else {
							if($i < $daysMilstone) {
								$taskarray['highlighted']=0;
							} else {
								$taskarray['highlighted']=1; // adding extra days
							}
						}

						// $startDate=date('Y-m-d H:i:s', strtotime($task['start']. " + $i days"));
						$startDate=date('Y-m-d', strtotime($task['end']. " - $i days")) . " " . date('H:i:s', strtotime($task['start']));
						$endDate=date('Y-m-d H:i:s', strtotime($task['end']. " - $i days"));
						
						$taskarray['cid']=$cid;
						$taskarray['task_group']=$cid;
						$taskarray['company_id']=$userId;
						$taskarray['start_date']=$startDate;
						$taskarray['end_date']=$endDate;
						$taskarray['title']=$task['text'];
						$taskarray['employee_id']=$task['employee'];
						$taskarray['milestone_id']=$milestone["key"];
						// print_r($taskarray); die;
						$this->db_model->SaveForm('au_tasks',$taskarray);
					}
				}
				echo $cid;
			}
		}
		//update task
		if(@$insertedData[0]=='updated') {
			$taskdata=array();
			//procss data
			foreach($insertedData as $kt=>$rowd){
				if($kt==0 or $kt=='ids')
				continue;
				$rowx=explode("_",$kt);			  
				$taskdata[$rowx[0]][$rowx[1]]=$rowd;			  
			}
		
			foreach($taskdata as $cid=>$task) {
			$taskarray=array();
			$taskarray['cid']=$cid;
			$taskarray['company_id']=$userId;
			$taskarray['start_date']=$task['start'];
			$taskarray['end_date']=$task['end'];
			$taskarray['title']=$task['text'];
			$taskarray['employee_id']=$task['employee'];
			$taskarray['milestone_id']=$task['milestone'];
			if(isset($task['event']))
			$this->deleteTask($task['event']);
			else
			$this->deleteTaskwithCid($cid);			  
			$this->db_model->SaveForm('au_tasks',$taskarray);
			echo $cid;
			}
		}
		//delete task
		if(@$insertedData[0]=='deleted') {
			foreach($insertedData as $kt=>$rowd){
				if($kt==0 or $kt=='ids')
				continue;
				$rowx=explode("_",$kt);			  
				$taskdata[$rowx[0]][$rowx[1]]=$rowd;			  
			}
		
			foreach($taskdata as $cid=>$task){
			$taskarray=array();			
			if(isset($task['event']))
			$this->deleteTask($task['event']);
			else
			$this->deleteTaskwithCid($cid);	 	
			echo $cid;
			}
		}
	}
	
	public function deleteTask($id = "") {
		$this->authCheck();
	$userId = $this->session->userdata('uid');
	 $this->db_model->DeleteRow('au_tasks', array('id' => $id,'company_id'=>$userId));      
	}
	
	public function deleteTaskwithCid($cid = "") {
		$this->authCheck();
		$userId = $this->session->userdata('uid');
		$this->db_model->DeleteRow('au_tasks', array('cid' => $cid,'company_id'=>$userId));      
	}

	public function holidays() {
		$company_id = $this->session->userdata('uid');
		$result = $this->db_model->getData('au_weekends', array('companyId'=>$company_id),'','');
		$data = array();
		$data["holidays"] = $result[0];
		// print_r($data);
		// die;
		$this->load->view('Company/holidays', $data);
	}

	public function addHolidays() {
		$days = $_GET["days"];
		$company_id = $this->session->userdata('uid');
		$data['weekOffs'] = $days;
		$data['companyId'] = $company_id;
		$result = $this->db_model->getData('au_weekends', array('companyId'=>$company_id),'','');
		$msg = "success";
		if(count($result)) {
			$result = $this->db_model->UpdateForm('au_weekends', array('weekOffs'=>$days), array('companyId'=>$company_id));
		} else {
			// print_r($data);
			// die;
			$result = $this->db_model->SaveForm('au_weekends', $data);
		}
		if($result != true) {
				$msg = "error";
		}
		echo $msg;
	}
 
	public function myHome(){
		 $this->authCheck();
		$data['title'] = "Home";
	 $data['stock_heading'] = $this->db_model->getData('pages',array('type'=>'stock_heading'));
		 $page=$this->db_model->getData('pages',array('type'=>'Home_content_after_login'));
		$data['page']=$page[0];
	$filePath= './csvFiles/Home_login.csv';
		$data['csvData'] =  $this->csvreader->parse_file($filePath);
		$this->load->view('front/user-home-view', $data);
	}

	public function profile() {
		$this->authCheck();

		$userId = $this->session->userdata('uid');
		$userInfo = $this->db_model->getData('users', array('id' => $userId));
		$data['userInfo'] = $userInfo[0];
	$planInfo = $this->db_model->getData('plans', array('id' => $userInfo[0]->plan_id));
		$data['planInfo'] = $planInfo[0];
		$data['title'] = $this->session->userdata('name') . " Profile";
		$this->form_validation->set_rules('f_name', 'Firest Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('phone_no', 'Phone No.', 'required|trim|numeric');
		$this->form_validation->set_rules('occupation', 'Occupation', 'required|trim');
		$this->form_validation->set_rules('company', 'Company', 'required|trim');
		$this->form_validation->set_rules('address_1', 'Address 1', 'required|trim');
		$this->form_validation->set_rules('city', 'City', 'required|trim');
		$this->form_validation->set_rules('state', 'State', 'required|trim');
		$this->form_validation->set_rules('country', 'Country', 'required|trim');
		$this->form_validation->set_rules('zip', 'Zip', 'required|trim|numeric');

		$this->form_validation->set_error_delimiters('<span class="text-danger text-sm">', '</span>');

		if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
		 
		} else {
			if ($this->db_model->UpdateForm('au_users', $_POST, array('id' => $userId))) {

				$this->session->set_flashdata("success", "Pofile updated sucessfully ");
			} else {
				$this->session->set_flashdata("error", "Error in update");
			}
		 
			
		}
	$listuser=$this->db_model->getData('users',array('company_id'=>$this->session->userdata('uid')));
	$usercount=count($listuser);
	
	$userInfo = $this->db_model->getData('users', array('id' => $userId));
		$data['userInfo'] = $userInfo[0];
	$data['employcount'] =$usercount;
	$planInfo = $this->db_model->getData('plans', array('id' => $userInfo[0]->plan_id));
		$data['planInfo'] = $planInfo[0];

		 $this->load->view('company/profile-view',$data);
	}

	public function setting() {
		$this->authCheck();
		$this->form_validation->set_rules('c_pass', 'Old Password', 'required|trim');
		$this->form_validation->set_rules('n_pass', 'New Password', 'required|trim');
		$this->form_validation->set_rules('re_pass', 'Confirm Password', 'required|trim|matches[n_pass]');

		$this->form_validation->set_error_delimiters('<span class="text-danger text-sm">', '</span>');

		if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
		 $this->load->view('company/setting-view');
		} else { // passed validation proceed to post success logic
			$data = array(
					'email' => $this->session->userdata('email'),
					'password' => md5($this->input->post('c_pass')),
					'status' => 1,
//          'type' => 'admin'
			);
			$newPassData=array(
					'password'=>@md5($this->input->post('n_pass'))
			);
		if($this->db_model->UpdateForm('au_users',$newPassData,$data)){
			$this->session->set_flashdata("success", "Password sucessfully updated");
		}
		else{
			$this->session->set_flashdata("error", "Unable to change password");
		}
		redirect('company/setting');
	}
	}
	

	public function logout() {
		$form_data = array(
				'last_login' => date('Y-m-d H:i:s')
		);
		$res = $this->db_model->UpdateForm('users', $form_data, array('id' => $this->session->userdata('uid')));
		$this->output->set_header('cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header("cache-Control: post-check=0, pre-check=0", false);
		$this->output->set_header("Pragma: no-cache");
		$this->output->set_header("Expires: Sat, 26 Jul 2014 05:00:00 GMT");
		$this->session->unset_userdata('id', 'userId', 'last_password', 'name', 'email');
		$this->session->sess_destroy();
		$this->session->set_flashdata("error_msg", 'logged out successfully!!');
		//print_r($this->session->userdata);   die; 
		redirect('users/index', 'refresh');
	}

	public function forgotPassword() {
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
			$this->load->view('front/login-view', $data);
		} else { // passed validation proceed to post success logic
			$data = array(
					'email' => $this->input->post('email'),
					'status' => 0,
			);
			$result = $this->user_model->userLogin($data);
			if ($result != "noresult") {
				$password = $result[0]->password;
				$subject = "Password Reset";
				$msg = "Hello " . $result[0]->f_name . ",<br> Your updated password is <b>" . $password . "</b>.<br> Login Your account <a href='" . site_url('login') . "' target='_blank'>click hear</a><br><br> Thanks,<br>Stocksrealitty.Com Team";
				if ($this->email_model->sendMail($result[0]->email.",info@stocksreally.com", 'info@stocksreally.com', $subject, $msg)) {
					$this->session->set_flashdata("success", 'You will receive an email to reset your password. Do not forget to check your SPAM folder!!!');
				} else {
					$this->session->set_flashdata("error_msg", 'Unable to send password contact to support!!!');
				}
			} else {
				$this->session->set_flashdata("error_msg", 'Email not registered or verified');
			}
			redirect('/login', 'refresh');
		}
	}
	function getAlltickers(){
	 $sql = "select DISTINCT ticker from au_stock order by ticker asc";
		$result = $this->db_model->getQueryData($sql);
		return $result;
	}
	function companyData($limit=30) {
		$sql = "select * from au_company_stats limit 0, $limit";
		$result = $this->db_model->getQueryData($sql);
		return $result;
	}

 


	function authCheck() {
		if ($this->session->userdata('uid') != "" && $this->session->userdata("type") === "company") {
				if($this->session->userdata("Paypal_NEXTBILLINGDATE")<date('Y-m-d'))
			redirect('Company/upgrade_plan');
		} else {
		redirect('users/login');
		}
	}
	
	public function users() {
		$this->authCheck();
	$userId = $this->session->userdata('uid');
		$data['userList'] = $this->db_model->getData("users",array('type'=>'Employee','company_id'=>$userId));    
		$this->load->view('company/user-view', $data);
	}
	
 public function addUser() {
		$this->authCheck();
		$userId = $this->session->userdata('uid');
		$this->form_validation->set_rules('f_name', 'Firest Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[au_users.email]');
		$this->form_validation->set_rules('phone_no', 'Phone No.', 'required|trim|numeric');
		$this->form_validation->set_rules('occupation', 'Occupation', 'required|trim');
		$this->form_validation->set_rules('company', 'Company', 'required|trim');
		$this->form_validation->set_rules('address_1', 'Address 1', 'required|trim');
		$this->form_validation->set_rules('city', 'City', 'required|trim');
		$this->form_validation->set_rules('state', 'State', 'required|trim');
		$this->form_validation->set_rules('country', 'Country', 'required|trim');
		$this->form_validation->set_rules('zip', 'Zip', 'required|trim|numeric');

		$this->form_validation->set_error_delimiters('<span class="text-red">', '</span>');

		if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
	 		$this->load->view('company/newUser-view');
		}elseif(!$this->checkEmployeeLimit()){
			$this->session->set_flashdata("error", "Error:- More user not allowed with this plan.Please Upgrade Your Plan");
			$this->load->view('company/newUser-view');
		} else {	
			$userInfo=$_POST;
			$userInfo['status']=0;
			$userInfo['company_id']=$userId;
			$userInfo['type']='Employee';
			$userInfo['last_login']=date("Y-m-d H:i:s");
			$password=$this->randomPassword();
			$userInfo['password']=md5($password);
			if ($this->db_model->SaveForm('au_users',$userInfo)) {
			 	$this->session->set_flashdata("success", "New Employee Sucessfully Created");
				$mailHtml="<pre>Thank you for choosing calendar Task.</pre>";
				$mailHtml .= "<pre>&nbsp;</pre>";
				$mailHtml .= "<pre>Login Details</pre>";
				$mailHtml .= "<pre>Email : ".$userInfo['email']."</pre>";
				$mailHtml .= "<pre>Password : ".$password."</pre>";
				$mailHtml .= "<pre>You are receiving this email because you or someone created an account for you at Augurs.in. If you did not, please disregard or email us at the email address below. This is a system generated email, please do not reply.</pre>";
				$mailHtml .= "<pre>&nbsp;</pre>";
				$mailHtml .= "<pre>To activate your account, please verify your email by clicking the link below, or paste it in your browser address bar:</pre>";
				$mailHtml .= "<pre>&nbsp;</pre>";
				$mailHtml .= "<pre><strong><a href='".site_url('validateEmail/'.$userInfo['email'])."'>Activation Link Here</a>&gt;&gt;</strong></pre>";
				$mailHtml .= "<pre>&nbsp;</pre>";
				$mailHtml .= "<pre>Thank you for your interest in Augurs.in.</pre>";
				$mailHtml .= "<pre>&nbsp;</pre>";
				$mailHtml .= "<pre>Stocksreally.com</pre>";
				$mailHtml .= "<p>charts | data | analysis for today&rsquo;s  investor </p>";
				$mailHtml .= "<pre>http://www.Augurs.in</pre>";
				$mailHtml .= "<pre>info@bennyapp.com</pre>";
				$this->email_model->sendMail($userInfo['email'].",khalidhashmi13@gmail.com", "khalidhashmi13@gmail.com", "Welcome to Augurs.in", $mailHtml);
				redirect('/company/users'); 
			} else {
				$this->session->set_flashdata("error", "Error in created");
			}
		}
	}
	public function checkEmployeeLimit(){
		$listuser=$this->db_model->getData('users',array('company_id'=>$this->session->userdata('uid')));
		$usercount=count($listuser);
		$plandetails=$this->db_model->getData('plans',array('id'=>$this->session->userdata('plan_id')));
		$allowEmployes=$plandetails[0]->employees;
		if($usercount>=$allowEmployes)
		return false;
		else
		return true;
		
		
	}
	public function randomPassword() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
				$n = rand(0, $alphaLength);
				$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
}

public function deleteUser($id = "") {
		$this->authCheck();
		if ($this->db_model->DeleteRow('users', array('id' => $id))) {
			$this->session->set_flashdata('success', 'User Deleted');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$this->session->set_flashdata('error', 'Unable to Delete');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function activateUser($id = '') {    
	$Byadmin=1;
		if ($this->admin_model->UpdateForm('users', array('status' => 1), $id)) {
			$this->session->set_flashdata('success', 'User Activated');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$this->session->set_flashdata('error', 'Unable to activate');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function inActivateUser($id = '') {
		$this->authCheck();
		if ($this->admin_model->UpdateForm('users', array('status' => 0), $id)) {
			$this->session->set_flashdata('success', 'User Blocked');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$this->session->set_flashdata('error', 'Unable to block');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
	public function upgrade_plan() {
		//$this->authCheck();
	$this->form_validation->set_rules('planid', 'Plan', 'required|trim');
		$this->form_validation->set_rules('plantype', 'Plan Type', 'required|trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger text-sm">', '</span>');
	if ($this->form_validation->run() == TRUE) { // validation hasn't been passed
			 $result=$this->db_model->getData('users',array('id'=>$this->session->userdata('uid')));
		
		 $userData=(array)$result[0];
		 $userData['plan_id']=$_POST['planid'];
		 $userData['subscriptionType']=$_POST['plantype'];
		$data=array('userInfo'=>$userData);
		
	 $this->session->set_userdata($data); 
	 redirect('paypal/setPayment');
		}
			
	$data['planList'] = $this->db_model->getData("plans","`status` = 1");
		$this->load->view('company/UpgradePlan', $data);
	}
	
	public function milestones() {
		$this->authCheck();
	$userId = $this->session->userdata('uid');
		$data['milestonesList'] = $this->db_model->getData("au_milestones",array('company_id'=>$userId));    
		$this->load->view('company/milestone-view', $data);
	}
	
	public function addMilestones() {
		$this->authCheck();
		$userId = $this->session->userdata('uid');
		$this->form_validation->set_rules('Title', 'Title', 'required|trim');    
		$this->form_validation->set_rules('days', 'No.Days', 'required|trim|numeric');
		$this->form_validation->set_rules('weight', 'Weight', 'required|trim|numeric');   

		$this->form_validation->set_error_delimiters('<span class="text-red">', '</span>');

		if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
			$this->load->view('company/newMilestones-view');
		} else {	
			$userInfo=$_POST;		
			$userInfo['company_id']=$userId;		
			if ($this->db_model->SaveForm('au_milestones',$userInfo)) {
				$this->session->set_flashdata("success", "New Milestones Sucessfully Created");		
				redirect('/company/milestones'); 
			} else {
				$this->session->set_flashdata("error", "Error in created");
			}
		}
	}
	
	public function editMilestone($id = null) {
		$this->authCheck();
		$milestone = $this->db_model->getData('au_milestones', array('id' => $id));
		$data['milestone'] = $milestone[0];
		$this->form_validation->set_rules('Title', 'Title', 'required|trim');    
		$this->form_validation->set_rules('days', 'No.Days', 'required|trim|numeric');
	$this->form_validation->set_rules('weight', 'Weight', 'required|trim|numeric');   

		$this->form_validation->set_error_delimiters('<span class="text-red">', '</span>');

		if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
	
	 // $data['featuresList'] = $this->db_model->getData("features_Txt",array('Status'=>1));
		 
			$this->load->view('company/editmilestone-view', $data);
		} else { // passed validation proceed to post success logic
			// build array for the model

			$form_data = $_POST;
			// run insert model to write data to db

			if ($this->db_model->UpdateForm('au_milestones', $form_data, array('id' => $id)) == TRUE) {
				$this->session->set_flashdata('success', 'Milestone Updated  ');
				redirect('company/milestones/');
			} else {
				$this->session->set_flashdata('error', 'Unable to update ');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}
	
	public function deleteMilestone($id = "") {
		$this->authCheck();
		if ($this->db_model->DeleteRow('au_milestones', array('id' => $id))) {
			$this->session->set_flashdata('success', 'Milestones Deleted');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$this->session->set_flashdata('error', 'Unable to Delete');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function paymenthistory() {
		$this->authCheck();
	$userId = $this->session->userdata('uid');
		$data['paypalhistoryList'] = $this->db_model->getData("au_paypalhistory",array('user_id'=>$userId));    
		$this->load->view('company/paypalhistory-view', $data);
	}
}
