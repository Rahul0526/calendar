<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin_model
 *
 * @author Shailesh Singh
 */
class User_model extends CI_Model {
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function userLogin($param) {
        
        $result=$this->db->get_where('users',$param);
        if($result->num_rows()==1) {
            $this->db->where($param);
            $this->db->update('admin',array('last_login'=>date("Y-m-d H:m:s")));
            return $result->result();
        } else {
            return "noresult";
        }
    }
        /**
         * 
         * @param type $table User table Name
         * @param type $data  Password Array
         * @param type $con   Condition Array
         */
        function forgotPassword($table,$data,$con)
        {
            $this->db->where($con);
           $this->db->update($table, $data); 
           if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
             return FALSE;
        }
       
}

                            