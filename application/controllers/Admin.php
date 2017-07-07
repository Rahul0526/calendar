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
class Admin extends CI_Controller {

	//put your code here

	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		//$this->load->library('email');
		$this->load->helper('language');
		$this->load->helper(array('form', 'html', 'url', 'path'));
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->model('admin_model');
		$this->load->model('db_model');
	}

	public function index() {
		$this->authCheck();
		$this->load->view('admin/dashboard');
	}

	public function users() {
		$this->authCheck();
		$data['userList'] = $this->db_model->getData("users");
		$data['userPlan'] = $this->db_model->getPlane();	
		$this->load->view('admin/user-view', $data);
	}
	
	public function OrderHIstory() {
		$this->authCheck();
		$data['orderList'] = $this->db_model->getQueryData("SELECT au_paypalhistory.`id` as id,f_name, l_name, email, city, country, plan_id, rawdata, Paypal_NEXTBILLINGDATE FROM `au_paypalhistory` left join au_users on au_paypalhistory.`user_id`=au_users.id WHERE 1 order by au_paypalhistory.`created` DESC");  
		$data['userPlan'] = $this->db_model->getPlane();
		$this->load->view('admin/order-view', $data);
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
		// if ($this->admin_model->UpdateForm('users', array('status' => 0,'ActiveByAdmin'=>1), $id)) {
		if ($this->admin_model->UpdateForm('users', array('status' => 1,'ActiveByAdmin'=>1), $id)) {
			$this->session->set_flashdata('success', 'User Activated');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$this->session->set_flashdata('error', 'Unable to activate');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function inActivateUser($id = '') {
		$this->authCheck();
		// if ($this->admin_model->UpdateForm('users', array('status' => 1), $id)) {
		if ($this->admin_model->UpdateForm('users', array('status' => 0,'ActiveByAdmin' => 0), $id)) {
			$this->session->set_flashdata('success', 'User Blocked');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$this->session->set_flashdata('error', 'Unable to block');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function setting() {
		$this->authCheck();
		$this->form_validation->set_rules('c_pass', 'Old Password', 'required|trim');
		$this->form_validation->set_rules('n_pass', 'New Password', 'required|trim');
		$this->form_validation->set_rules('re_pass', 'Confirm Password', 'required|trim|matches[n_pass]');

		$this->form_validation->set_error_delimiters('<span class="text-danger text-sm">', '</span>');

		if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
		 $this->load->view('admin/setting-view');
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
		if($this->db_model->UpdateForm('admin',$newPassData,$data)){
			$this->session->set_flashdata("success", "Password sucessfully updated");
		}
		else{
			$this->session->set_flashdata("error", "Unable to change password");
		}
		redirect('admin/setting');
	}
	}

	public function login() {
		$data['title'] = "Admin Login";
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[255]');

		$this->form_validation->set_error_delimiters('<span class="text-danger text-sm">', '</span>');

		if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
			$this->load->view('admin/login-view', $data);
		} else { // passed validation proceed to post success logic
	
			$data = array(
					'email' => $this->input->post('email'),
					'password' => md5($this->input->post('password')),
					'status' => 1,
//          'type' => 'admin'
			);
			$result = $this->admin_model->userLogin($data);
			//print_r($result);
			if ($result != "noresult") {


				$my_data = array(
						'uid' => $result[0]->id,
						//'name' => $result[0]->name,
						'last_login' => $result[0]->last_login,
						'type' => $result[0]->type,
						'email' => $result[0]->email,
						'status' => $result[0]->status);
				$this->session->set_userdata($my_data);
				//$this->session->set_flashdata("success", "Sucessfully login");
				//print_r($this->session->userdata);   die;          
				redirect("admin/");
			} else {
				$this->session->set_flashdata("error", "Invalid username & password");
				 redirect($_SERVER['HTTP_REFERER']);
			}
		}
		// $this->load->view('admin/login-view',$data);
	}
	public function forgotPassword() {
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
			 $this->session->set_flashdata("error", 'Email not registered or valid');
				redirect('admin/login', 'refresh');
		} else { // passed validation proceed to post success logic
			$data = array(
					'email' => $this->input->post('email'),
					'status' => 0,
			);
			$result = $this->admin_model->userLogin($data);
			if ($result != "noresult") {
				$password = substr(str_shuffle(md5(time())),0,8);
				if($this->db_model->UpdateForm('admin',array('password'=>$password), array('id'=>$result[0]->id))){
				$subject = "Stocksrealitty.Com account updated Password";
				$msg = "Hello" . $result[0]->f_name . ",<br> Your updated password is <b>" . $password . "</b>.<br> Login Your account <a href='" . site_url('login') . "' target='_blank'>click hear</a><br><br> Thanks,<br>Stocksrealitty.Com Team";
				if ($this->email_model->sendMail($result[0]->email, 'noreply@stocksrealitty.com', $subject, $msg)) {
					$this->session->set_flashdata("success", 'Password reset successfully!!');
				} else {
					$this->session->set_flashdata("error", 'Unable to send password contact to support!!');
				}
			}
			}else {
				$this->session->set_flashdata("error", 'Email not registered or verified');
			}
			redirect('admin/login', 'refresh');
		}
	}


	public function logout() {
		$form_data = array(
				'last_login' => date('Y-m-d H:i:s')
		);
		$res = $this->admin_model->UpdateForm('admin', $form_data, $this->session->userdata('uid'));
		$this->output->set_header('cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header("cache-Control: post-check=0, pre-check=0", false);
		$this->output->set_header("Pragma: no-cache");
		$this->output->set_header("Expires: Sat, 26 Jul 2014 05:00:00 GMT");
		$this->session->unset_userdata('id', 'userId', 'last_password', 'name', 'role', 'type', 'email', 'address', 'login_ip');
		$this->session->sess_destroy();
		$this->session->set_flashdata("error_msg", 'logged out successfully!!');
		redirect('', 'refresh');
	}

	function authCheck() {

		if ($this->session->userdata('type') != "admin") {
			redirect('admin/login');
		}
	}

}
