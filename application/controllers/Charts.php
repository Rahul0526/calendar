<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of charts
 *
 * @author MAT
 */
class Charts extends CI_Controller{
  //put your code here
  public function __construct() {
    parent::__construct();
    $this->load->database();
    $this->load->library('session');
    $this->load->helper('language');
    $this->load->helper(array('form', 'html', 'url', 'path'));
    $this->load->library('form_validation');
    $this->load->library('pagination');
    $this->load->model('db_model');
      
  }

  public function index() {
    $this->authCheck();
    $sql="select c.*  from au_charts c";
    $chartList = $this->db_model->getQueryData($sql);
	foreach($chartList as $key=>$chart){
		
		
		$sql="select title  from au_plans where id in(".trim($chart->planType,",").")";
        $planlist = $this->db_model->getQueryData($sql);
		$planlistS="";
		foreach($planlist as $plist){
			$planlistS.=$plist->title.',';
		}
	 $chartList[$key]->plan=trim($planlistS,",");
	}
	$data['chartList']=$chartList;
    $this->load->view('admin/chartList-view',$data);
	
  }
  function authCheck() {
    if ($this->session->userdata('type') != "admin") {
      redirect('admin/login');
    }
  }
  
  public function addChart(){
    $this->authCheck();
    $data['planList']=$this->db_model->getData('plans');
    $this->form_validation->set_rules('chartTable', 'Chart Table', 'required|trim');
    $this->form_validation->set_rules('chartType', 'Chart Type', 'trim');
    $this->form_validation->set_rules('planType[]', 'Subscription Level', 'required|trim');
    $this->form_validation->set_rules('title', 'Chart Heading', 'required|trim');
     $this->form_validation->set_rules('x_axis', 'X-axis Label', 'required|trim');
      $this->form_validation->set_rules('y_axis', 'Y-axis Label', 'required|trim');
    $this->form_validation->set_rules('status', 'Status', 'required');

    $this->form_validation->set_error_delimiters('<span class="text-red">', '</span>');

    if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
      $this->load->view('admin/newChart-view',$data);
    } else { // passed validation proceed to post success logic
      // build array for the model
		
      $form_data = array(
          'chartTable' => set_value('chartTable'),
          'chartType' => set_value('chartType'),
          'planType' => ",".implode(",",$_POST['planType']).",",
          'title' => set_value('title'),
		  'dataLabel' => set_value('dataLabel'),
           'x_axis' => set_value('x_axis'),
           'y_axis' => set_value('y_axis'),           
          'status' => set_value('status')
      );
      
       if ($this->db_model->SaveForm('charts', $form_data) == TRUE) {
        $this->session->set_flashdata('success', 'New Chart Added ');
        redirect('charts/index');
      } else {
        $this->session->set_flashdata('error', 'unable to add ');
        redirect($_SERVER['HTTP_REFERER']);
      }
    }
    
    
  }
  
   public function deleteChart($id = "") {
    $this->authCheck();
    if ($this->db_model->DeleteRow('charts', array('id' => $id))) {
      $this->session->set_flashdata('success', 'Chart Deleted');
      redirect($_SERVER['HTTP_REFERER']);
    } else {
      $this->session->set_flashdata('error', 'Unable to Delete');
      redirect($_SERVER['HTTP_REFERER']);
    }
  }

  function activateChart($id = '') {
    $this->authCheck();
    if ($this->db_model->UpdateForm('charts', array('status' => 1), array("id"=>$id))) {
      $this->session->set_flashdata('success', 'Charts Activated');
      redirect($_SERVER['HTTP_REFERER']);
    } else {
      $this->session->set_flashdata('error', 'Unable to activate');
      redirect($_SERVER['HTTP_REFERER']);
    }
  }

  function inActivateChart($id = '') {
    $this->authCheck();
    if ($this->db_model->UpdateForm('charts', array('status' => 0), array("id"=>$id))) {
      $this->session->set_flashdata('success', 'Chart Blocked');
      redirect($_SERVER['HTTP_REFERER']);
    } else {
      $this->session->set_flashdata('error', 'Unable to block');
      redirect($_SERVER['HTTP_REFERER']);
    }
  }

  
  function tableCols(){
    $table=$this->input->post('table');
            $columns=$this->db_model->getColumns($table);
            echo json_encode($columns);
  }
  
  
   function chartPreview(){
    $this->authCheck();
    $table=@$this->input->post('chartTable');
    $chartType=@$this->input->post('chartType');
    $xAxis=@$this->input->post('x_axis');
    $yAxis=@$this->input->post('y_axis');
    $dataLabel=@$this->input->post('dataLabel');
    if($chartType === 'table'){
      $sql="select $dataLabel, $xAxis, $yAxis from au_$table  limit 0,30";
      $data=$this->db_model->getQueryArrayData($sql);
    }
    else{
      $sql="select $dataLabel, $xAxis, $yAxis from au_$table where $dataLabel=(select $dataLabel from au_$table limit 0,1) limit 0,30";
      $result=$this->db_model->getQueryArrayData($sql);
    $data=array(
        'xAxis'=>array(),
        'yAxis'=>array()
    );
    foreach($result as $row){
      $data['dataLabel']=$row[$dataLabel];
      $data['xAxis'][]=$row[$xAxis];
      $data['yAxis'][]=$row[$yAxis];
    }
    }
    echo json_encode($data);
  }

}
