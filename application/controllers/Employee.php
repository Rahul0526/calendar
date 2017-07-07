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
class Employee extends CI_Controller {

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
	$name = $this->session->userdata('name');
	$userId = $this->session->userdata('uid');
	
	$milestones= $this->db_model->getData('au_milestones');
	$milestoelist=array();
	if(!empty($milestones)){
		foreach($milestones as $mlt){
			$milestoelist[]=array('key'=>$mlt->id,'label'=>$mlt->Title);		
		}
	}
	$emplyolist[]=array('key'=>$userId,'label'=>$name);	
	$data['Milestoelist']=$milestoelist;
	$data['Employee']=$emplyolist;	
    $this->load->view('employee/user-home-view',$data);
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
	$employer_details = $this->db_model->getData('users', array('id' => $userInfo[0]->company_id));
    $data['employerDetails'] = $employer_details[0];
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
      $this->load->view('employee/profile-view', $data);
    } else {
      if ($this->db_model->UpdateForm('users', $_POST, array('id' => $userId))) {

        $this->session->set_flashdata("success", "Pofile updated sucessfully ");
      } else {
        $this->session->set_flashdata("error", "Error in update");
      }
      //echo $this->db->last_query();die;
      redirect('employee/profile');
    }

    // $this->load->view('front/profile-view',$data);
  }

  public function setting() {
    $this->authCheck();
    $userId = $this->session->userdata('uid');
    $userEmail = $this->session->userdata('email');
   
    $data['title'] = $this->session->userdata('name') . " Setting";
    $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
    $this->form_validation->set_rules('new_password', 'New Password', 'required|trim');
    $this->form_validation->set_rules('conform_password', 'Conform Password', 'required|trim|matches[new_password]');
    $this->form_validation->set_error_delimiters('<span class="text-danger text-sm">', '</span>');

    if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
      $this->load->view('Employee/setting-view', $data);
    } else {
      $con = array(
          'id' => $userId,
          'password' => @md5($this->input->post('current_password'))
      );
      $data = array('password' => @md5($this->input->post('new_password')));
      if ($this->db_model->UpdateForm('users', $data, $con)) {
        $password = @$this->input->post('new_password');
        $subject = "Augurs.in account updated Password";
        $msg = "Hello " . $this->session->userdata('name') . ",<br> Your updated password is <b>" . $password . "</b>.<br> Login Your account <a href='" . site_url('login') . "' target='_blank'>click here</a><br><br> Thanks,<br>Augurs.in Team";
        $this->email_model->sendMail($userEmail, 'noreply@Augurs.in', $subject, $msg);

        $this->session->set_flashdata("success", "Password updated sucessfully ");
      } else {
        $this->session->set_flashdata("error", "Current password not match");
      }
      //echo $this->db->last_query();die;
      redirect('Employee/setting');
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
    redirect('Employee/login', 'refresh');
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
        $msg = "Hello " . $result[0]->f_name . ",<br> Your updated password is <b>" . $password . "</b>.<br> Login Your account <a href='" . site_url('login') . "' target='_blank'>click hear</a><br><br> Thanks,<br>Augurs.in Team";
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

    if ($this->session->userdata('uid') != "" && $this->session->userdata("type") === "Employee") {
      
    } else {
      redirect('Employee/login');
    }
  }  
 
   public function about() {

    $data['title'] = "About";

	

    $page=$this->db_model->getData('pages',array('type'=>'about'));

    $data['page']=$page[0];

    $this->load->view('Employee/about-view', $data);

  }

  

  public function privacy() {	 

    $data['title'] = "Privacy";

	//$data['stock_heading'] = $this->db_model->getData('pages',array('type'=>'stock_heading'));

    $page=$this->db_model->getData('pages',array('type'=>'privacy_policy'));

    $data['page']=$page[0];

    $this->load->view('Employee/privacy', $data);

  }

  public function terms() {

    $data['title'] = "Terms";	

    $page=$this->db_model->getData('pages',array('type'=>'term_of_use'));

    $data['page']=$page[0];

    $this->load->view('Employee/terms', $data);

  }
  
    public function contactus() {

    $data['title'] = "How to Reach Us?";

	//$data['stock_heading'] = $this->db_model->getData('pages',array('type'=>'stock_heading'));

    $page=$this->db_model->getData('pages',array('type'=>'How_to_Reach_Us'));

    $data['page']=$page[0];

    $this->load->view('Employee/about-view', $data);

  }
  
   public function login() {
    $data['title'] = "User Login";
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[255]');

    $this->form_validation->set_error_delimiters('<span class="text-danger text-sm">', '</span>');

    if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
      $this->load->view('employee/login-view', $data);
    } else { // passed validation proceed to post success logic
      $data = array(
          'email' => $this->input->post('email'),
          'password' => md5($this->input->post('password')),
          'status' => 1,
		  'type' => 'Employee',
      );
      $result = $this->user_model->userLogin($data);
      
      if ($result != "noresult") {

        $my_data = array(
            'uid' => $result[0]->id,
            'name' => $result[0]->f_name.' '.$result[0]->l_name,
            'last_login' => $result[0]->last_login,
            'email' => $result[0]->email,
            'status' => $result[0]->status,
            'company_id ' => $result[0]->company_id,			
            'type' => "Employee");

        $this->session->set_userdata($my_data);		
        redirect("Employee/index");
      } else {
        $this->session->set_flashdata("error", "Invalid username & password or Status is deactive");
        redirect("Employee/login");
      }
    }
  }
  
  public function taskManagement(){
	 $this->authCheck();
	 $parameters=$_REQUEST;
	 $userId = $this->session->userdata('uid');
	 //print_r($parameters); 
	  //get data	 
	  if(isset($parameters['from']) and isset($parameters['to'])){		
	  	$tasks = $this->db_model->getData('au_tasks',array('employee_id'=>$userId,'start_date>='=>$parameters['from'],'end_date<='=>$parameters['to']));
		$outputdata=array();
		foreach($tasks as $task){
			$outputdata[]=array('start_date'=>$task->start_date,
								'end_date'=>$task->end_date,
								'text'=>$task->title,
								'event_id'=>$task->id,
								'employee'=>$task->employee_id,
								'milestone'=>$task->milestone_id,
								'readonly'=>'true'
								);
		}
		//print_r($outputdata);
		echo json_encode($outputdata);
	  }
	  
	  //insert tasks
	  $insertedData=$_POST;
	  
	  if(@$insertedData[0]=='inserted'){
		  $taskdata=array();
		  //procss data
		  foreach($insertedData as $kt=>$rowd){
			  if($kt==0 or $kt=='ids')
			  continue;
			  $rowx=explode("_",$kt);			  
			  $taskdata[$rowx[0]][$rowx[1]]=$rowd;			  
		  }
		 
		  foreach($taskdata as $cid=>$task){
			$taskarray=array();
			$taskarray['cid']=$cid;
			$taskarray['company_id']=$userId;
			$taskarray['start_date']=$task['start'];
			$taskarray['end_date']=$task['end'];
			$taskarray['title']=$task['text'];
			$taskarray['employee_id']=$task['employee'];
			$taskarray['milestone_id']=$task['milestone'];					  
		 	$this->db_model->SaveForm('au_tasks',$taskarray);
			echo $cid;
		  }
	  }
	  //update task
	  if(@$insertedData[0]=='updated'){
		  $taskdata=array();
		  //procss data
		  foreach($insertedData as $kt=>$rowd){
			  if($kt==0 or $kt=='ids')
			  continue;
			  $rowx=explode("_",$kt);			  
			  $taskdata[$rowx[0]][$rowx[1]]=$rowd;			  
		  }
		
		  foreach($taskdata as $cid=>$task){
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
	  if(@$insertedData[0]=='deleted'){
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
  
 
}
