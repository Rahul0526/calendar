<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Email_model
 *
 * @author MAT
 */
class Email_model extends CI_Model {
  //put your code here
  
  public function __construct() {
        parent::__construct();
        $config = Array(
     'protocol' => 'smtp',
     'smtp_host' => 'calendar.augurstech.com',
     'validation'=>TRUE,
     'smtp_port' => 465,
     'smtp_user' => 'noreply@calendar.augurstech.com', // change it to yours
     'smtp_pass' => 'Augurs@009', // change it to yours
     'mailtype' => 'html',
     'charset' => 'iso-8859-1',
     'wordwrap' => TRUE,
     'newline' => "\r\n",
     'crlf' => "\r\n",  
     'smtp_timeout'=>30
  ); 
 
  $this->load->library('email', $config);
    }
    
    public function sendMail($to,$from,$sub,$msg){
      $this->email->from($from, "Stocksrealitty Team");
  $this->email->to($to);
 // $this->email->cc("testcc@domainname.com");
  $this->email->subject($sub);
  $this->email->message($msg);   
  if($this->email->send()){     
    return true;  
  } 
 else {//show_error($this->email->print_debugger());
	return FALSE;
  }
    }
}
