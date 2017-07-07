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
class Users extends CI_Controller {

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
		$this->load->model('email_model');
	//$this->load->library('csvreader');
	}

	public function index() {
		$this->authCheck();
		redirect('/users/profile');
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
			$this->load->view('front/profile-view', $data);
		} else {
			if ($this->db_model->UpdateForm('users', $_POST, array('id' => $userId))) {

				$this->session->set_flashdata("success", "Pofile updated sucessfully ");
			} else {
				$this->session->set_flashdata("error", "Error in update");
			}
			//echo $this->db->last_query();die;
			redirect('users/profile');
		}

		// $this->load->view('front/profile-view',$data);
	}

	public function setting() {
		$this->authCheck();
		$userId = $this->session->userdata('uid');
		$userEmail = $this->session->userdata('email');
		$planId = $this->session->userdata('plan_id');
		$planInfo = $this->db_model->getData('plans', array('id' => $planId));
		$data['planInfo'] = $planInfo[0];
		$data['title'] = $this->session->userdata('name') . " Setting";
		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password', 'New Password', 'required|trim');
		$this->form_validation->set_rules('conform_password', 'Conform Password', 'required|trim|matches[new_password]');
		$this->form_validation->set_error_delimiters('<span class="text-danger text-sm">', '</span>');

		if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
			$this->load->view('front/setting-view', $data);
		} else {
			$con = array(
					'id' => $userId,
					'password' => @$this->input->post('current_password')
			);
			$data = array('password' => @$this->input->post('new_password'));
			if ($this->db_model->UpdateForm('users', $data, $con)) {
				$password = @$this->input->post('new_password');
				$subject = "StocksRealitty.Com account updated Password";
				$msg = "Hello " . $this->session->userdata('name') . ",<br> Your updated password is <b>" . $password . "</b>.<br> Login Your account <a href='" . site_url('login') . "' target='_blank'>click here</a><br><br> Thanks,<br>StocksRealitty.Com Team";
				$this->email_model->sendMail($userEmail, 'noreply@stocksrealitty.com', $subject, $msg);

				$this->session->set_flashdata("success", "Password updated sucessfully ");
			} else {
				$this->session->set_flashdata("error", "Current password not match");
			}
			//echo $this->db->last_query();die;
			redirect('users/setting');
		}
	}

	public function myCharts() {
		$data['title'] = "Save Charts";
		$data['chartList'] = $this->db_model->getData('save_charts', array('userId' => $this->session->userdata('uid')));
		$this->load->view('front/mycharts-view', $data);
	}
	
	public function portfolio() {
		$data['title'] = "Stock Tracker Portfolio";
		$data['chartList'] = $this->db_model->getData('save_charts', array('userId' => $this->session->userdata('uid'),'table_name'=>'stock','chartData!='=>'NULL'));
	$data['companyDataAll'] = $this->getAlltickers();
		$this->load->view('front/portfolio-view', $data);
	}

	public function viewChart($id) {
		$this->authCheck();
		$data['title']="Open Chart";
		$data['chart'] = $this->db_model->getData('save_charts', array('id' => $id));
		$this->load->view('front/openChart-view', $data);
	}

	public function deleteChart($id = "") {
		$this->authCheck();
		if ($this->db_model->DeleteRow('save_charts', array('id' => $id))) {
			$this->session->set_flashdata('success', 'Chart Deleted');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$this->session->set_flashdata('error', 'Unable to Delete');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function login() {
		$data['title'] = "User Login";
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[255]');

		$this->form_validation->set_error_delimiters('<span class="text-danger text-sm">', '</span>');

		if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
			$this->load->view('front/login-view', $data);
		} else { // passed validation proceed to post success logic
			$data = array(
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'status' => 1,
				'type' => 'company',
			);
			$result = $this->user_model->userLogin($data);
	 
			if ($result != "noresult") {
				//print_r($result);

				$my_data = array(
						'uid' => $result[0]->id,
						'name' => $result[0]->f_name,
						'last_login' => $result[0]->last_login,
						'email' => $result[0]->email,
						'status' => $result[0]->status,
						'plan_id' => $result[0]->plan_id,
						'Paypal_NEXTBILLINGDATE' => $result[0]->Paypal_NEXTBILLINGDATE,
						'type' => "company");

				$this->session->set_userdata($my_data);
		 
				//$this->session->set_flashdata("success", "Sucessfully login");
				//print_r($this->session->userdata);   die;          
				redirect("company/index");
			} else {
				$this->session->set_flashdata("error", "Invalid username & password");
				redirect("users/login");
			}
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
		redirect('', 'refresh');
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

	function stackChartData() {
		$sql = "SELECT `ticker`,`date`,`adj_close` FROM `au_stock_report` WHERE `ticker`=(SELECT `ticker` FROM `au_stock` limit 0,1) order by date asc limit 0, 30";
		$result = $this->db_model->getQueryData($sql);
		$data = array();
		$data['date'] = array();
		$data['val'] = array();
	$data['chartTable'] ='stock';
		foreach ($result as $row) {
			$data['label'] = $row->ticker;
			$data['date'][] = $row->date;
			$data['val'][] = $row->adj_close;
		}

		return $data;
	}
	
	function stackChartDataDynamic($columns) {
		$sql = "SELECT * FROM `au_stock` WHERE `ticker`=(SELECT `ticker` FROM `au_stock` limit 0,1) limit 0, 30";
		$result = $this->db_model->getQueryData($sql);
		$data = array();  
		foreach ($result as $row) {
		$label=($columns->dataLabel!='')?$row->{$columns->dataLabel}:$row->ticker;
			$data['label'] =  $label;
			//$data['x_axis'][] = $row->{($columns->x_axis!='ticker')?$columns->x_axis:'volume'};
			//$data['y_axis'][] = $row->{($columns->y_axis!='ticker')?$columns->y_axis:'volume'};
		$data['x_axis'][] = $row->{$columns->x_axis};
			$data['y_axis'][] = $row->{$columns->y_axis};
		}

		return $data;
	}

	function historicChartData() {
		$sql = "SELECT * FROM `au_stock_historical` WHERE `ticker`=(SELECT `ticker` FROM `au_stock` limit 0,1) ORDER BY date ASC";
		$result = $this->db_model->getQueryData($sql);
		$data = array();
		$data['days'] = array();
		$data['val'] = array();

		foreach ($result as $row) {
			$data['label'] = $row->ticker;
			$data['days'][] = $row->measure_date . ": $" . $row->min_low;
			$data['val'][] = $row->min_low;
		}

		return $data;
	}

	function priceChange($q = array()) {
		$con = '';
		if (!empty($q)) {
			$con = "where D.ticker='" . $q['ticker'] . "'";
		}
		$sql = "SELECT D.ticker,`price_change_day`,`percent_change_day`, `price_change_month`,`percent_change_month`,`price_change_week`,`percent_change_week`,`price_change_quarter`,`percent_change_quarter`,`price_change_year`,`percent_change_year` FROM `au_daily_change` D join au_weekly_change W on D.ticker=W.ticker join au_monthly_change M on D.ticker=M.ticker join au_quarterly_change Q on D.ticker=Q.ticker join au_yearly_change Y on D.ticker=Y.ticker $con  limit 0, 30";

		$result = $this->db_model->getQueryData($sql);
		return $result;
	}

	function sectorsData() {
		$sql = "SELECT DISTINCT `sector` FROM `au_company_stats`";
		$result = $this->db_model->getQueryData($sql);
		return $result;
	}

	function lineChartAjax($q) {
		$ticker = $q['ticker'];
		$toggle = $q['toggle'];
	if($q['chartTable']=='company_stats'){
	$result=$this->staticsTableAjax($q);
	}elseif($q['chartTable']=='stock'){
		$sql = "SELECT * FROM `au_stock` WHERE ticker= '$ticker' ORDER BY date ASC limit 0,30";
		$result = $this->db_model->getQueryData($sql);
	}elseif($q['chartTable']=='stock_status'){
		$sql = "SELECT * FROM `au_stock_status` WHERE ticker= '$ticker' ";
		$result = $this->db_model->getQueryData($sql);
	}elseif($q['chartTable']=='stock_historical'){
		 $sql = "SELECT * FROM `au_stock_historical` WHERE `ticker`='$ticker'  ORDER BY date ASC";
			 $result = $this->db_model->getQueryData($sql);
	}elseif($q['chartTable']=='date_dim'){
		 $sql = "SELECT * FROM `au_date_dim` WHERE YEAR(date) = Year(CURRENT_DATE())  ORDER BY date ASC";
			 $result = $this->db_model->getQueryData($sql);
	}elseif($q['chartTable']=='daily_change'){
		 $sql = "SELECT * FROM `au_daily_change` WHERE `ticker`='$ticker'  ORDER BY id ASC";
			 $result = $this->db_model->getQueryData($sql);
	}elseif($q['chartTable']=='weekly_change'){
		 $sql = "SELECT * FROM `au_weekly_change` WHERE `ticker`='$ticker'  ORDER BY id ASC";
			 $result = $this->db_model->getQueryData($sql);
	}elseif($q['chartTable']=='monthly_change'){
		 $sql = "SELECT * FROM `au_monthly_change` WHERE `ticker`='$ticker'  ORDER BY id ASC";
			 $result = $this->db_model->getQueryData($sql);
	}elseif($q['chartTable']=='quarterly_change'){
		 $sql = "SELECT * FROM `au_quarterly_change` WHERE `ticker`='$ticker'  ORDER BY id ASC";
			 $result = $this->db_model->getQueryData($sql);
	}elseif($q['chartTable']=='yearly_change'){
		 $sql = "SELECT * FROM `yearly_change` WHERE `ticker`='$ticker'  ORDER BY id ASC";
			 $result = $this->db_model->getQueryData($sql);
	}else{
		//and YEAR(date) = Year(CURRENT_DATE())
		$sql = "SELECT * FROM `au_stock_report` WHERE `report_toggle` ='$toggle' and ticker= '$ticker'  ORDER BY date ASC";
		$result = $this->db_model->getQueryData($sql);
	}
		$data = array();
		$data['date'] = array();
		$data['val'] = array();
	$data['rawResult']=$result;
		foreach ($result as $row) {
			$data['label'] = ($q['clm_label']!='')?$row->$q['clm_label']:@$row->ticker;
			$data['date'][] = ($q['clm_x']!='')?$row->$q['clm_x']:$row->date;
			$data['val'][] = ($q['clm_y']!='')?$row->$q['clm_y']:$row->adj_close;
		}
		return $data;
	}

	function barChartAjax($q) {
		$ticker = $q['ticker'];
	$toggle = $q['toggle'];
	if($q['chartTable']=='company_stats'){
	$result=$this->staticsTableAjax($q);
	}elseif($q['chartTable']=='stock'){
		$sql = "SELECT * FROM `au_stock` WHERE ticker= '$ticker' ORDER BY date ASC limit 0,30";
		$result = $this->db_model->getQueryData($sql);
	}elseif($q['chartTable']=='stock_status'){
		$sql = "SELECT * FROM `au_stock_status` WHERE ticker= '$ticker'";
		$result = $this->db_model->getQueryData($sql);
	}elseif($q['chartTable']=='stock_historical'){
		 $sql = "SELECT * FROM `au_stock_historical` WHERE `ticker`='$ticker'  ORDER BY date ASC";
			 $result = $this->db_model->getQueryData($sql);
	}elseif($q['chartTable']=='date_dim'){
		 $sql = "SELECT * FROM `au_date_dim` WHERE YEAR(date) = Year(CURRENT_DATE()) ORDER BY date ASC";
			 $result = $this->db_model->getQueryData($sql);
	}elseif($q['chartTable']=='daily_change'){
		 $sql = "SELECT * FROM `au_daily_change` WHERE `ticker`='$ticker'  ORDER BY id ASC";
			 $result = $this->db_model->getQueryData($sql);
	}elseif($q['chartTable']=='weekly_change'){
		 $sql = "SELECT * FROM `au_weekly_change` WHERE `ticker`='$ticker'  ORDER BY id ASC";
			 $result = $this->db_model->getQueryData($sql);
	}elseif($q['chartTable']=='monthly_change'){
		 $sql = "SELECT * FROM `au_monthly_change` WHERE `ticker`='$ticker'  ORDER BY id ASC";
			 $result = $this->db_model->getQueryData($sql);
	}elseif($q['chartTable']=='quarterly_change'){
		 $sql = "SELECT * FROM `au_quarterly_change` WHERE `ticker`='$ticker'  ORDER BY id ASC";
			 $result = $this->db_model->getQueryData($sql);
	}elseif($q['chartTable']=='yearly_change'){
		 $sql = "SELECT * FROM `yearly_change` WHERE `ticker`='$ticker'  ORDER BY id ASC";
			 $result = $this->db_model->getQueryData($sql);
	}else{
		 $sql = "SELECT * FROM `au_stock_historical` WHERE `ticker`='$ticker'  ORDER BY date ASC";
				 $result = $this->db_model->getQueryData($sql);
	}
	 
		$data = array();
		$data['days'] = array();
		$data['val'] = array();
	$data['rawResult']=$result;
		foreach ($result as $row) {
	 
			$data['label'] = ($q['clm_label']!='')?$row->$q['clm_label']:@$row->ticker;
			$data['days'][] = ($q['clm_x']!='')?$row->$q['clm_x']: $row->measure_date . ": $" . $row->min_low;
			$data['val'][] = ($q['clm_y']!='')?$row->$q['clm_y']:$row->min_low;
		
			/*$data['label'] = $row->ticker;
			$data['days'][] = $row->measure_date . ": $" . $row->min_low;
			;
			$data['val'][] = $row->min_low;*/
		}

		return $data;
	}

	function staticsTableAjax($q) {
		$con = "where 1";

		$con .=(@$q['sector'] != '') ? " and sector='" . $q['sector'] . "'" : ' and 1';
		$con .=(@$q['industry'] != '') ? " and industry='" . $q['industry'] . "'" : ' and 1';
		$con .=(@$q['pricegroup'] != '') ? " and price_group='" . $q['pricegroup'] . "'" : ' and 1';
		//$con .=($q['company']!=='')?" and company='".$q['company']."'":' and 1';
		$con .=($q['ticker'] != '') ? " and ticker='" . $q['ticker'] . "'" : ' and 1';
		$sql = "select * from au_company_stats $con";
		$result = $this->db_model->getQueryData($sql);
		return $result;
	}

	function ajaxDatarequest() {
		$con = array(
				'sector' => @$this->input->post('sector'),
				'industry' => @$this->input->post('industry'),
				'pricegroup' => @$this->input->post('price_group'),
				'company' => @$this->input->post('company'),
				'ticker' => $this->input->post('ticker'),
				'sortby' => @$this->input->post('sortby'),
				'toggle' => @$this->input->post('toggle'),
		'chartTable' => @$this->input->post('chartTable'),
		'clm_label' => @$this->input->post('clm_label'),
		'clm_x' => @$this->input->post('clm_x'),
		'clm_y' => @$this->input->post('clm_y')
		);
		$request = @$this->input->post('request');
//          $data=array(
//            'lineChartData'=>  $this->lineChartAjax($con),
//              'barChartData'=> $this->barChartAjax($con),
//              'staticsTableData'=>$this->staticsTableAjax($con),
//              'priceTableData'=>$this->priceChange($con)
//          );
//          echo json_encode($data);
		switch ($request) {
			case 'lineChart':
				$result = $this->lineChartAjax($con);
				echo json_encode($result);
				break;
			case 'staticsTable':
			if(isset($con['chartTable']) and $con['chartTable']!='')
		$result = $this->lineChartAjax($con);
		else
				$result = $this->staticsTableAjax($con);
				echo json_encode($result);
				break;
			case 'barChart':
				$result = $this->barChartAjax($con);
				echo json_encode($result);
				break;
			case 'priceTable':
				$data['priceTable'] = $this->priceChange($con);
				$data['earningTable'] = $this->staticsTableAjax($con);
				echo json_encode($data);
				break;
				defalt:
				break;
		}
	}

	function filterDataAjax() {
		$field = @$this->input->post('field');
		$con = "where 1  ";
		switch ($field) {
			case 'ticker':
				if (@$this->input->post('company') != '' && $field == 'ticker') {
			$field='price_group';
					$con.=" and company=\"" . @$this->input->post('company') . "\"";
				}
		break;
			case 'company':
				if (@$this->input->post('price_group')) {
					$con.=" and price_group='" . @$this->input->post('price_group') . "'";
				}
		break;
			case 'price_group':
				if (@$this->input->post('industry') != '') {
					$con.=" and industry='" . @$this->input->post('industry') . "'";
				}
			case 'industry':
				if (@$this->input->post('sector') != '') {
					$con.=" and sector='" . @$this->input->post('sector') . "'";
				}
				break;
		case 'byticker':
				if (@$this->input->post('ticker') != '') {
			$field='price_group';
					$con.=" and ticker='" . @$this->input->post('ticker') . "'";
				}
				break;
			default :
				break;
		}


//          if(@$this->input->post('sector') != '' && $field == 'industry' ){
//            $con.="and sector='".@$this->input->post('sector')."'";
//          }
//          if(@$this->input->post('industry') != '' && $field == 'price_group'){
//            $con.="and industry='".@$this->input->post('industry')."'";
//          }
//          if(@$this->input->post('price_group' && $field == 'compant') != ''){
//            $con.="and price_group='".@$this->input->post('price_group')."'";
//          }
//          if(@$this->input->post('company') != '' && $field == 'ticker'){
//            $con.="and company='".@$this->input->post('company')."'";
//          }
//          if(@$this->input->post('ticker') != '' && $field == 'industry'){
//            $con.="and ticker='".@$this->input->post('ticker')."'";
//          }
		//$val=$this->input->post('val');
		//$con=$this->input->post('con');
		
		 $sql = "SELECT DISTINCT $field, company, ticker,sector,industry  FROM `au_company_stats` $con";
		$result = $this->db_model->getQueryArrayData($sql);
	 
		$val = array();
		foreach ($result as $row) {
			$val[$field][] = $row[$field];
			if($field != 'company'){
				$val['company'][]=$row['company'];
			}
			if($field != 'ticker'){
			$val['ticker'][]=$row['ticker'];
			}
		
		if($field != 'sector'){
			$val['sector'][]=$row['sector'];
		}
		
		if($field != 'industry'){
			$val['industry'][]=$row['industry'];
		}
			
		
			
		}
	
		echo json_encode($val);
	}

	function lineReportToggle() {
		$toggle = $this->input->post('toggle');
		$ticker = @$this->input->post('ticker');
	$clm_x = @$this->input->post('clm_x');
	$clm_y = @$this->input->post('clm_y');
	$clm_label= @$this->input->post('clm_label');
	$chartTable= @$this->input->post('chartTable');
		if (!$ticker) {
			$con = "ticker= (SELECT `ticker` FROM `au_stock` limit 0,1)";
		} else {
			$con = "ticker= '$ticker'";
		}
	$chartTable=($chartTable!='')?'au_'.$chartTable:'au_stock_report';
		//$sql = "SELECT * FROM `au_stock_report` WHERE `report_toggle` ='$toggle' and $con and YEAR(DATE_FORMAT(STR_TO_DATE(date, '%m/%d/%Y'), '%Y-%m-%d')) = Year(CURRENT_DATE())";
	
	$sql = "SELECT * FROM `$chartTable` WHERE `report_toggle` ='$toggle' and $con and YEAR(date) = Year(CURRENT_DATE()) ORDER BY date ASC";
		$result = $this->db_model->getQueryData($sql);
		$data = array();
		$data['date'] = array();
		$data['val'] = array();
		foreach ($result as $row) {
			$data['label'] = ($clm_label!='')?$row->{$clm_label}:$row->ticker;
			$data['date'][] = ($clm_x!='')?$row->{$clm_x}:$row->date;
			$data['val'][] = ($clm_y!='')?$row->{$clm_y}:$row->adj_close;
		}
		echo json_encode($data);
	}

	function ajaxSaveChart() {
		$this->authCheck();
		$data = array(
				'userId' => $this->session->userdata('uid'),
				'type' => @$this->input->post('type'),
				'title' => @$this->input->post('title'),
				'chartData' => json_encode(@$this->input->post('sData')),
		'table_name' => @$this->input->post('table_name')
		);
		if ($this->db_model->SaveForm('save_charts', $data)) {
			echo 'success';
		} else {
			echo 'error';
		}
	}

	function authCheck() {

		if ($this->session->userdata('uid') != "" && $this->session->userdata("type") === "user") {
			
		} else {
			redirect('/login');
		}
	}
	
	function ajaxDatasavePortfolio() {
	 print_r($_POST);
		foreach($_POST['Symbol'] as $cid=>$rowedit){
		$data = array(
			'Input_Notes' => $_POST['Input_Notes'][$cid],
			'EstimatedSharesPurchased' => $_POST['EstimatedSharesPurchased'][$cid]
		);
		$this->db_model->UpdateForm('save_charts', $data, array('id'=>$cid));
		
	}
	//new record added
	foreach(@$_POST['newSymbol'] as $cid=>$rowedit){
		$sql = "SELECT * FROM `au_stock` WHERE ticker= '".$rowedit."' ORDER BY date limit 0,30";
		$result = $this->db_model->getQueryData($sql);		
		$data = array();
		$data['date'] = array();
		$data['val'] = array();
		$data['rawResult']=$result;
		foreach ($result as $row) {
			$data['label'] = @$row->ticker;
			$data['date'][] = $row->date;
			$data['val'][] = $row->adj_close;
		}
		
		 $dataInsert = array(
				'userId' => $this->session->userdata('uid'),
				'type' => 'lineChart',
				'title' => 'Stocks Price Data ',
				'chartData' => json_encode($data),
		'table_name' => 'stock',
		'Input_Notes' => $_POST['newInput_Notes'][$cid],
		'EstimatedSharesPurchased' => $_POST['newEstimatedSharesPurchased'][$cid]
		);
			$this->db_model->SaveForm('save_charts', $dataInsert);
		
	}
	}

}
