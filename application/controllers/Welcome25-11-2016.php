<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   * 		http://example.com/index.php/welcome
   * 	- or -
   * 		http://example.com/index.php/welcome/index
   * 	- or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
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
    $this->load->model('db_model');
    $this->load->model('email_model');
  }

  public function home() {
    $data['title'] = "Home";
    $data['dayEnding'] = $this->db_model->getLimitData("daily_change", "", 30, "percent_change_day");
    $data['weekEnding'] = $this->db_model->getLimitData("weekly_change", "", 30, "percent_change_week");
    $data['monthEnding'] = $this->db_model->getLimitData("monthly_change", "", 30, "percent_change_month");
    $data['quarterEnding'] = $this->db_model->getLimitData("quarterly_change", "", 30, "percent_change_quarter");
    $data['yearEnding'] = $this->db_model->getLimitData("yearly_change", "", 30, "percent_change_year");
    //$data['priceChange'] = $this->priceChange();
    $data['historicChart'] = $this->historicChartData();
    $data['columns'] = $this->db_model->getColumns('company_stats');
    $data['companyData'] = $this->companyData();
    $data['stackChart'] = $this->stackChartData();
    $this->load->view('front/home-view', $data);
  }

  public function about() {
    $data['title'] = "About";
    $page=$this->db_model->getData('pages',array('type'=>'about'));
    $data['page']=$page[0];
    $this->load->view('front/about-view', $data);
  }
  
  public function privacy() {
    $data['title'] = "Privacy";
    $page=$this->db_model->getData('pages',array('type'=>'privacy_policy'));
    $data['page']=$page[0];
    $this->load->view('front/privacy', $data);
  }
  public function charts() {
    $data['title'] = "Chart List";
    $page=$this->db_model->getData('pages',array('type'=>'chart_list'));
    $data['page']=$page[0];
    $this->load->view('front/about-view', $data);
  }
  public function requestChart() {
    $data['title'] = "Request Chart";
    $page=$this->db_model->getData('pages',array('type'=>'request_chart'));
    $data['page']=$page[0];
    $this->load->view('front/about-view', $data);
  }
  public function blog() {
    $data['title'] = "Investment Blog";
    $page=$this->db_model->getData('pages',array('type'=>'blog'));
    $data['page']=$page[0];
    $this->load->view('front/about-view', $data);
  }
  public function portfolio() {
    $data['title'] = "Portfolio";
    $page=$this->db_model->getData('pages',array('type'=>'portfolio'));
    $data['page']=$page[0];
    $this->load->view('front/about-view', $data);
  }
  public function definitions() {
    $data['title'] = "Definitions";
    $page=$this->db_model->getData('pages',array('type'=>'definitions'));
    $data['page']=$page[0];
    $this->load->view('front/about-view', $data);
  }
  
  public function source() {
    $data['title'] = "Source";
    $page=$this->db_model->getData('pages',array('type'=>'sources'));
    $data['page']=$page[0];
    $this->load->view('front/about-view', $data);
  }

  public function contactus() {
    $data['title'] = "Contact Us";
    $this->load->view('front/contactus-view', $data);
  }

  public function plan() {
    $data['title'] = "Plan Details";
    $data['level1']=$this->db_model->getData('plans', array('id'=>1));
    $data['level2']=$this->db_model->getData('plans', array('id'=>2));
    $data['level3']=$this->db_model->getData('plans', array('id'=>3));
    $data['level4']=$this->db_model->getData('plans', array('id'=>4));

    $this->load->view('front/plan-list-view', $data);
  }
  function chartList($planId){
     $data['charts']=$this->db_model->getData('charts', array('planType'=>$planId));
     $this->load->view('front/chart-list-view', $data);
  }
  
  public function stockPicker(){
     $data['title'] = "Stock Details";
     $page=$this->db_model->getData('pages',array('type'=>'stock_picker'));
    $data['page']=$page[0];
    $this->load->view('front/stock-picker-view', $data);
  }

  public function login() {
    $data['title'] = "User login";

    $this->load->view('front/login-view', $data);
  }

  public function register() {
    $data['title'] = "Create Account";
    $data['level1']=$this->db_model->getData('plans', array('id'=>1));
    $data['level2']=$this->db_model->getData('plans', array('id'=>2));
    $data['level3']=$this->db_model->getData('plans', array('id'=>3));
    $data['level4']=$this->db_model->getData('plans', array('id'=>4));
    $service=$this->db_model->getData('pages',array('type'=>'term_of_services'));
    $use=$this->db_model->getData('pages',array('type'=>'term_of_use'));
    $data['service']=$service[0];
    $data['use']=$use[0];

    $this->load->view('front/registration-view', $data);
  }

  public function addUser() {
	  
    /*if ($this->db_model->SaveForm('users', $_POST)) {
      $userData=$_POST;
      $userData['id']=$this->db->insert_id();
     // $planInfo=$this->db_model->getData('plans', array('id'=>$userData['planId']));
      $data=array('userInfo'=>$userData,
         // 'planInfo'=>$planInfo[0]
              );
     $this->session->set_userdata($data);
     redirect('paypal/setPayment');
    } else {
      redirect('register');
    }*/
	$userData=$_POST;
	 $data=array('userInfo'=>$userData,
         // 'planInfo'=>$planInfo[0]
              );
	 $this->session->set_userdata($data);
     redirect('paypal/setPayment');
  }
  
  public function success(){
    $data['title']= "Registration Succesfull";
    $this->load->view('front/success-view', $data);
  }

  function validateEmail() {
    $email = $_POST['email'];
    $con = array('email' => $email);
    $x = $this->db_model->GetNumRows('users', $con);
    //echo $str = $this->db->last_query();
    //print_r($x);
    if ($x > 0) {
      echo "false";
    } else {
      echo "true";
    }
  }

  public function index() {
    redirect('home', 'refresh');
  }

  function sendmail() {
    echo $this->email_model->sendMail("singh87shailu@gmail.com", "noreply@stocksreally.com", "test Sub", "test message");
  }

  function companyData() {
    $sql = "select * from au_company_stats limit 0, 30";
    $result = $this->db_model->getQueryData($sql);
    return $result;
  }

  function stackChartData() {

    $sql = "SELECT `ticker`,`date`,`adj_close` FROM `au_stock_report` WHERE `ticker`='A' and report_toggle= 'daily' and DATE(date)>(CURRENT_DATE()- INTERVAL '30' DAY) order by date Asc ";
    $result = $this->db_model->getQueryData($sql);
    $data = array();
    $data['date'] = array();
    $data['val'] = array();

    foreach ($result as $row) {
      $data['label'] = $row->ticker;
      $data['date'][] = $row->date;
      $data['val'][] = $row->adj_close;
    }

    return $data;
  }

  function historicChartData() {
    $sql = "SELECT * FROM `au_stock_historical` WHERE `ticker`='AA' ORDER BY sort_order ASC";
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

  function priceChange() {
    $sql = "SELECT D.ticker,`price_change_day`,`percent_change_day`, `price_change_month`,`percent_change_month`,`price_change_week`,`percent_change_week`,`price_change_quarter`,`percent_change_quarter`,`price_change_year`,`percent_change_year` FROM `au_daily_change` D join au_weekly_change W on D.ticker=W.ticker join au_monthly_change M on D.ticker=M.ticker join au_quarterly_change Q on D.ticker=Q.ticker join au_yearly_change Y on D.ticker=Y.ticker  limit 0, 30";

    $result = $this->db_model->getQueryData($sql);
    return $result;
  }

}
