<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Plan
 *
 * @author MAT
 */
class Plans extends CI_Controller {

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
    $data['planList'] = $this->db_model->getData("plans",array('status'=>1));
    $this->load->view('admin/planList-view', $data);
  }

  function authCheck() {
    if ($this->session->userdata('type') == "") {
      redirect('admin/login');
    }
  }

  public function newPlan() {
    $this->authCheck();
    $this->form_validation->set_rules('title', 'Title', 'required|trim');
    $this->form_validation->set_rules('description', 'Description', 'trim');
	$this->form_validation->set_rules('employees', 'Employees', 'numeric');
    $this->form_validation->set_rules('price_monthly', 'Price Monthly', 'required|trim');
   // $this->form_validation->set_rules('price_yearly', 'price Yearly', 'required|trim');
    $this->form_validation->set_rules('status', 'Status', 'required');

    $this->form_validation->set_error_delimiters('<span class="text-red">', '</span>');

    if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
      $this->load->view('admin/newPlan-view');
    } else { // passed validation proceed to post success logic
      // build array for the model

      $form_data = array(
          'title' => set_value('title'),
          'description' => set_value('description'),
		  'employees' => set_value('employees'),
          'price_monthly' => set_value('price_monthly'),
          'price_yearly' => set_value('price_yearly'),
		  'trail' => set_value('trail'),
          'status' => set_value('status')
      );

      // run insert model to write data to db

      if ($this->db_model->SaveForm('plans', $form_data) == TRUE) {
        $this->session->set_flashdata('success', 'New Plan Added ');
        redirect('plans/');
      } else {
        $this->session->set_flashdata('error', 'unable to add ');
        redirect($_SERVER['HTTP_REFERER']);
      }
    }
  }

  public function editPlan($id = null) {
    $this->authCheck();
    $planData = $this->db_model->getData('plans', array('id' => $id));
    $data['planInfo'] = $planData[0];
    $this->form_validation->set_rules('title', 'Title', 'required|trim');
    $this->form_validation->set_rules('employees', 'Employees', 'numeric');
    $this->form_validation->set_rules('price_monthly', 'Price Monthly', 'required|trim');
    //$this->form_validation->set_rules('price_yearly', 'price Yearly', 'required|trim');
    $this->form_validation->set_rules('status', 'Status', 'required');

    $this->form_validation->set_error_delimiters('<span class="text-red">', '</span>');

    if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
	
	 // $data['featuresList'] = $this->db_model->getData("features_Txt",array('Status'=>1));
     
      $this->load->view('admin/editPlan-view', $data);
    } else { // passed validation proceed to post success logic
      // build array for the model

      $form_data = array(
          'title' => set_value('title'),
          
          'price_monthly' => set_value('price_monthly'),
		  'employees' => set_value('employees'),
          'price_yearly' => set_value('price_yearly'),
		  'description' => set_value('description'),
		  'trail' => set_value('trail'),
          'status' => set_value('status')
      );

      // run insert model to write data to db

      if ($this->db_model->UpdateForm('plans', $form_data, array('id' => $id)) == TRUE) {
        $this->session->set_flashdata('success', 'Plan Updated  ');
        redirect('plans/');
      } else {
        $this->session->set_flashdata('error', 'Unable to update ');
        redirect($_SERVER['HTTP_REFERER']);
      }
    }
  }
  
  

  public function deletePlan($id = "") {
    $this->authCheck();
    if ($this->db_model->DeleteRow('plans', array('id' => $id))) {
      $this->session->set_flashdata('success', 'Plan Deleted');
      redirect($_SERVER['HTTP_REFERER']);
    } else {
      $this->session->set_flashdata('error', 'Unable to Delete');
      redirect($_SERVER['HTTP_REFERER']);
    }
  }

  function activatePlan($id = '') {
    $this->authCheck();
    if ($this->db_model->UpdateForm('plans', array('status' => 1), array("id"=>$id))) {
      $this->session->set_flashdata('success', 'Plan Activated');
      redirect($_SERVER['HTTP_REFERER']);
    } else {
      $this->session->set_flashdata('error', 'Unable to activate');
      redirect($_SERVER['HTTP_REFERER']);
    }
  }

  function inActivatePlan($id = '') {
    $this->authCheck();
    if ($this->db_model->UpdateForm('plans', array('status' => 0), array("id"=>$id))) {
      $this->session->set_flashdata('success', 'Plan Blocked');
      redirect($_SERVER['HTTP_REFERER']);
    } else {
      $this->session->set_flashdata('error', 'Unable to block');
      redirect($_SERVER['HTTP_REFERER']);
    }
  }
  
  public function addfeatures() {
    $this->authCheck();
    $this->form_validation->set_rules('title', 'Title', 'required|trim');
    $this->form_validation->set_rules('description', 'Description', 'trim');    
    $this->form_validation->set_rules('status', 'Status', 'required');

    $this->form_validation->set_error_delimiters('<span class="text-red">', '</span>');

    if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
      $this->load->view('admin/newFeatures-view');
    } else { // passed validation proceed to post success logic
      // build array for the model
	 $sql = "SELECT MAX(orderby) as orderby FROM `au_features_Txt`";
      $result = $this->db_model->getQueryData($sql);
	 
      $form_data = array(
          'title' => set_value('title'),
          'description' => set_value('description'),
		  'bold' => set_value('bold'),    
		  'orderby'=>($result[0]->orderby)+1,   
          'status' => set_value('status')
      );

      // run insert model to write data to db

      if ($this->db_model->SaveForm('features_Txt', $form_data) == TRUE) {
        $this->session->set_flashdata('success', 'New Features  Added ');
        redirect('plans/featureslist');
      } else {
        $this->session->set_flashdata('error', 'unable to add ');
        redirect($_SERVER['HTTP_REFERER']);
      }
    }
  }
  
   public function featureslist() {
    $this->authCheck();
    $data['planList'] = $this->db_model->getLimitData("features_Txt",'',100000,'orderby');
    $this->load->view('admin/featuresList-view', $data);
  }
  
  public function editFeatures($id = null) {
    $this->authCheck();
    $planData = $this->db_model->getData('features_Txt', array('id' => $id));
    $data['planInfo'] = $planData[0];
    $this->form_validation->set_rules('title', 'Title', 'required|trim');    
    $this->form_validation->set_rules('status', 'Status', 'required');

    $this->form_validation->set_error_delimiters('<span class="text-red">', '</span>');

    if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
      $this->load->view('admin/editFeatures-view', $data);
    } else { // passed validation proceed to post success logic
      // build array for the model

      $form_data = array(
           'title' => set_value('title'),
          'description' => set_value('description'),
		  'bold' => set_value('bold'),           
          'status' => set_value('status')
      );
	 

      // run insert model to write data to db

      if ($this->db_model->UpdateForm('features_Txt', $form_data, array('id' => $id)) == TRUE) {
        $this->session->set_flashdata('success', 'Features Updated  ');
        redirect('plans/featureslist');
      } else {
        $this->session->set_flashdata('error', 'Unable to update ');
        redirect($_SERVER['HTTP_REFERER']);
      }
    }
  }
  
  public function ajaxDatasaveFeaturelist() {
    $this->authCheck();
    
      $form_data = array(
           'orderby' => set_value('ordernumber')         
      );
	 

      // run insert model to write data to db

      if ($this->db_model->UpdateForm('features_Txt', $form_data, array('id' => set_value('featureid'))) == TRUE) {
        //$this->session->set_flashdata('success', 'Features Updated  ');
		echo true;
       
      } else {
        //$this->session->set_flashdata('error', 'Unable to update ');
		echo false;
        
      }
    
  }
  
  
  function activateFeatures($id = '') {
    $this->authCheck();
    if ($this->db_model->UpdateForm('features_Txt', array('status' => 1), array("id"=>$id))) {
      $this->session->set_flashdata('success', 'features Activated');
      redirect($_SERVER['HTTP_REFERER']);
    } else {
      $this->session->set_flashdata('error', 'Unable to activate');
      redirect($_SERVER['HTTP_REFERER']);
    }
  }

  function inActivateFeatures($id = '') {
    $this->authCheck();
    if ($this->db_model->UpdateForm('features_Txt', array('status' => 0), array("id"=>$id))) {
      $this->session->set_flashdata('success', 'Features Blocked');
      redirect($_SERVER['HTTP_REFERER']);
    } else {
      $this->session->set_flashdata('error', 'Unable to block');
      redirect($_SERVER['HTTP_REFERER']);
    }
  }
  
  public function deleteFeatures($id = "") {
    $this->authCheck();
    if ($this->db_model->DeleteRow('features_Txt', array('id' => $id))) {
      $this->session->set_flashdata('success', 'Features Deleted');
      redirect($_SERVER['HTTP_REFERER']);
    } else {
      $this->session->set_flashdata('error', 'Unable to Delete');
      redirect($_SERVER['HTTP_REFERER']);
    }
  }

  //put your code here
}
