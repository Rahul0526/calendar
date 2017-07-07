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
class Page extends CI_Controller{
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
   function authCheck() {
    if ($this->session->userdata('type') != "admin") {
      redirect('admin/login');
    }
   }
    
    public function addPage(){
      $this->authCheck();
      $data['title']="Page Content";
      $this->form_validation->set_rules('title', 'Title', 'required|trim');
      $this->form_validation->set_rules('type', 'type', 'required|trim');
    $this->form_validation->set_rules('content', 'Page Content', 'required');

    $this->form_validation->set_error_delimiters('<span class="text-red">', '</span>');

    if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
      $this->load->view('admin/pageAdd-view',$data);
    } else {
     // print_r($_POST);die;
      $form_data=array(
          'title'=>@$this->input->post('title'),  
          'type'=>@$this->input->post('type'),  
          'content'=>htmlspecialchars(@$this->input->post('content')),  
      );
      $type=$this->input->post('type');
       if ($this->db_model->SaveForm('pages', $form_data) == TRUE) {
        $this->session->set_flashdata('success', 'New Page Added ');
        redirect('page/view/1/'.$type);
      } else {
        $this->session->set_flashdata('error', 'unable to add ');
        redirect($_SERVER['HTTP_REFERER']);
      }
    }
    
    }
    
    function update(){
      $this->authCheck();
      $form_data=array(
          'content'=>htmlspecialchars(@$this->input->post('content')),
          'update_dt'=>date("Y-m-d H:i:s")
      );
      $con=array('id'=>@$this->input->post('pageId'),
          'type'=>@$this->input->post('type'));
       if ($this->db_model->UpdateForm('pages', $form_data,$con) == TRUE) {
        $this->session->set_flashdata('success', 'Page Updated ');
        redirect($_SERVER['HTTP_REFERER']);
      } else {
        $this->session->set_flashdata('error', 'unable to Update ');
        redirect($_SERVER['HTTP_REFERER']);
      }
    }
    
    public function view($id,$type){
      $this->authCheck();
      $pageData=$this->db_model->getData('pages',array('type'=>$type));
      $data['page']=$pageData[0];
      $data['title']=$pageData[0]->title." Content";
      $this->load->view('admin/page-view',$data);
    }  
  
  }