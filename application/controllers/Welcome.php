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

	//$this->load->library('csvreader');

    $this->load->helper('language');

    $this->load->helper(array('form', 'html', 'url', 'path'));

    $this->load->library('form_validation');

    $this->load->library('pagination');

    $this->load->model('db_model');

    $this->load->model('email_model');

  }



  
  

  public function home(){

     $data['title'] = "The Calendar";

	

     $page=$this->db_model->getData('pages',array('type'=>'Home_content'));

    $data['page']=$page[0];

	

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

	//$data['stock_heading'] = $this->db_model->getData('pages',array('type'=>'stock_heading'));

    $page=$this->db_model->getData('pages',array('type'=>'privacy_policy'));

    $data['page']=$page[0];

    $this->load->view('front/privacy', $data);

  }

  public function terms() {

    $data['title'] = "Terms";	

    $page=$this->db_model->getData('pages',array('type'=>'term_of_use'));

    $data['page']=$page[0];

    $this->load->view('front/terms', $data);

  }
  

  

  public function blog() {

    $data['title'] = "Investment Blog";

	$data['stock_heading'] = $this->db_model->getData('pages',array('type'=>'stock_heading'));

    $page=$this->db_model->getData('pages',array('type'=>'blog'));

    $data['page']=$page[0];

    $this->load->view('front/about-view', $data);

  }

  public function portfolio() {

    $data['title'] = "Portfolio";

	$data['stock_heading'] = $this->db_model->getData('pages',array('type'=>'stock_heading'));

    $page=$this->db_model->getData('pages',array('type'=>'portfolio'));

    $data['page']=$page[0];

    $this->load->view('front/about-view', $data);

  }

  public function definitions() {

    $data['title'] = "Definitions";

	$data['stock_heading'] = $this->db_model->getData('pages',array('type'=>'stock_heading'));

    $page=$this->db_model->getData('pages',array('type'=>'definitions'));

    $data['page']=$page[0];

    $this->load->view('front/about-view', $data);

  }

  

  public function source() {

    $data['title'] = "Source";

	$data['stock_heading'] = $this->db_model->getData('pages',array('type'=>'stock_heading'));

    $page=$this->db_model->getData('pages',array('type'=>'sources'));

    $data['page']=$page[0];

    $this->load->view('front/about-view', $data);

  }

  

  public function contactus() {

    $data['title'] = "How to Reach Us?";

	//$data['stock_heading'] = $this->db_model->getData('pages',array('type'=>'stock_heading'));

    $page=$this->db_model->getData('pages',array('type'=>'How_to_Reach_Us'));

    $data['page']=$page[0];

    $this->load->view('front/about-view', $data);

  }



 /* public function contactus() {

    $data['title'] = "Contact Us";

    $this->load->view('front/contactus-view', $data);

  }*/



  public function plan() {

    $data['title'] = "Plan Details";

    

	$data['plans'] = $this->db_model->getData('plans',array('status'=>1),"asc","price_monthly");

	

    $this->load->view('front/plan-list-view', $data);

  }

  function chartList($planId){

     $data['charts']=$this->db_model->getData('charts',"planType LIKE '%,".$planId.",%'");

     $this->load->view('front/chart-list-view', $data);

  }

  

  public function stockPicker(){

     $data['title'] = "Stock Details";

	 $data['stock_heading'] = $this->db_model->getData('pages',array('type'=>'stock_heading'));

     $page=$this->db_model->getData('pages',array('type'=>'stock_picker'));

    $data['page']=$page[0];

	$filePath= './csvFiles/stockpicker.csv';

    $data['csvData'] =  $this->csvreader->parse_file($filePath);

    $this->load->view('front/stock-picker-view', $data);

  }



 public function techindIcators() {

    $data['title'] = "Technical Indicator";

	$data['tech_heading'] = $this->db_model->getData('pages',array('type'=>'stock_heading'));

    $page=$this->db_model->getData('pages',array('type'=>'tech_indicators'));

    $data['page']=$page[0];

	$this->load->view('front/about-view', $data);

  }



  public function login() {
	if($this->session->userdata('uid') and $this->session->userdata('type')=='company'){
	 redirect('Company/index');
   }
    $data['title'] = "User login";



    $this->load->view('front/login-view', $data);

  }



  public function register() {

    $data['title'] = "Create Account";

	if(@$_REQUEST['pid']==''){
	$this->session->set_flashdata("error", "Please select Plan");	
	 redirect('Welcome/plan');
   }	

    $data['plan']=$this->db_model->getData('plans', array('id'=>@$_REQUEST['pid']));

   

    $service=$this->db_model->getData('pages',array('type'=>'term_of_services'));

    $use=$this->db_model->getData('pages',array('type'=>'term_of_use'));

    $data['service']=$service[0];

    $data['use']=$use[0];

	$data['pid']=@$_REQUEST['pid'];
	$data['trail']=@$_REQUEST['trial'];
    $this->load->view('front/registration-view', $data);

  }



  public function addUser() {	  
	
	$this->form_validation->set_rules('f_name', 'Firest Name', 'required|trim');
	$this->form_validation->set_rules('l_name', 'Last Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[au_users.email]');
    //$this->form_validation->set_rules('phone_no', 'Phone No.', 'required|trim|numeric');    
    $this->form_validation->set_rules('country', 'Country', 'required|trim');
	$this->form_validation->set_rules('password', 'Password', 'required|trim');   
    //$this->form_validation->set_rules("input[Re_Password]", "Confirm Password", 'required');
	//$this->form_validation->set_error_delimiters('<span class="text-red">', '</span>');
	if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
		 //$errormsg=(string)validation_errors();
		$this->session->set_flashdata("error","Error:- password mismatch");		
	  redirect('Welcome/register?pid='.$_POST['plan_id'].'&trial='.$_POST['trial'].'&f_name='.$_POST['f_name'].'&l_name='.$_POST['l_name'].'&email='.$_POST['email'].'&phone_no='.$_POST['phone_no']);
	}
	$planInfo=$this->db_model->getData('plans', array('id'=>$_POST['plan_id']));	
	if($planInfo[0]->trail and $_POST['trial']==true){
		
		$userData=$_POST;
		unset($userData['trial']);
		$userData['type']='company';
		$userData['status']=1;
		$userData['password']=md5($_POST['password']);
		$userData['Paypal_NEXTBILLINGDATE']= date('Y-m-d', strtotime('+1 months'));;
		$userData['last_login']=date("Y-m-d H:i:s");
		if ($this->db_model->SaveForm('users', $userData)) {
	
		  
	
		  $userData['uid']=$this->db->insert_id();
	
		 // $
	
		 $result=$this->db_model->getData('users',array('id'=>$userData['uid']));
		$my_data = array(
            'uid' => $result[0]->id,
            'name' => $result[0]->f_name,
            'last_login' => $result[0]->last_login,
            'email' => $result[0]->email,
            'status' => $result[0]->status,
			'Paypal_NEXTBILLINGDATE'=>$result[0]->Paypal_NEXTBILLINGDATE,
            'plan_id' => $result[0]->plan_id,
            'type' => "company");
		
        $this->session->set_userdata($my_data);
		 
		 $this->session->set_flashdata("success", "Register Sucessfully");
		$mailHtml="<pre>Thank you for choosing calendar Task.</pre>
<pre>&nbsp;</pre>
<pre>You are receiving this email because you or someone created an account for you at Stocksreally.com. If you did not, please disregard or email us at the email address below. This is a system generated email, please do not reply.</pre>
<pre>&nbsp;</pre>
<pre>To activate your account, please verify your email by clicking the link below, or paste it in your browser address bar:</pre>
<pre>&nbsp;</pre>
<pre><strong><a href='http://jwel.azeabotanica.co/validateEmail/'".$userData['email']."'>Activation Link Here</a>&gt;&gt;</strong></pre>
<pre>&nbsp;</pre>
<pre>Thank you for your interest in Stocksreally.com.</pre>
<pre>&nbsp;</pre>
<pre>Stocksreally.com</pre>
<p>charts | data | analysis for today&rsquo;s  investor </p>
<pre>http://www.stocksreally.com</pre>
<pre>info@bennyapp.com</pre>";
		$this->email_model->sendMail($userData['email'].",khalidhashmi13@gmail.com", "khalidhashmi13@gmail.com", "Welcome to augurs.in", $mailHtml);
		redirect('/company/index');
	
		 redirect('paypal/setPayment');
	
		} else {
	
		  redirect('register');
	
		}
	}

	$userData=$_POST;

	$data=array('userInfo'=>$userData,

         // 'planInfo'=>$planInfo[0]

              );

	 $this->session->set_userdata($data);

    // redirect('paypal/setPayment');

	 redirect('paypal/setPayment');

  }

  

  public function success(){

    $data['title']= "Registration Succesfull";

	$data['stock_heading'] = $this->db_model->getData('pages',array('type'=>'stock_heading'));

    $this->load->view('front/success-view', $data);

  }



  function validateEmail() {

    $email = $_REQUEST['email'];

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
	if($this->session->userdata('uid') and $this->session->userdata('type')=='company'){
	 redirect('Company/index');
   }else{
	redirect('home', 'refresh');
   }

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

