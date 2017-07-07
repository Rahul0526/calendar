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
class Admin_model extends CI_Model {
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function userLogin($param) {
        
        $result=$this->db->get_where('au_admin',$param);
        if($result->num_rows()==1)
        {
            $this->db->where($param);
            $this->db->update('admin',array('last_login'=>date("Y-m-d H:m:s")));
            return $result->result();
        }
        else{
        return "noresult";
        }
    }
    public function customerLogin($param) {
        
        $result=$this->db->get_where('resto_customer',$param);
        if($result->num_rows()==1)
        {
           // $this->db->where($param);
           // $this->db->update('resto_user',array('login_ip'=>$this->input->ip_address(),'last_login'=>date("Y-m-d H:m:s")));
            return $result->result();
        }
        else{
        return "noresult";
        }
    }
    
    
     /** 
       * function SaveForm()
       *
       * insert form data
       * @param $form_data - array
       * @return Bool - TRUE or FALSE
       */

	function SaveForm($table,$form_data)
	{
		$this->db->insert($table, $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
        /**
         * 
         * @param type $table
         * @param type $con will be an array format like array(id=>$id)
         * @return type
         */
        function getData($table,$con="")
        {
            if($con==""){
                $this->db->order_by("id", "desc");
                $result= $this->db->get($table);
            }else{
                $this->db->order_by("id", "desc");
           $result= $this->db->get_where($table,$con);
            }
           if($result->num_rows())
           {
               return $result->result();
           }
           
        }
        /**
         * 
         * @param type $table
         * @param type $con
         * @return type Data Array
         */
        function getDataArray($table,$con="")
        {
            if($con==""){
                $result= $this->db->get($table);
            }else{
           $result= $this->db->get_where($table,$con);
            }
           if($result->num_rows())
           {
               return $result->result_array();
           }
           
        }
        /**
         * 
         * @param type $table
         * @param type $form_data
         * @param type $con
         * @return boolean
         */
        function UpdateForm($table,$form_data,$con)
	{
            
		$this->db->where('id', $con);
                $this->db->update($table, $form_data);
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
        /**
         * 
         * @param type $table
         * @param type $form_data status value like 1 or 0
         * @param type $con
         * @return boolean
         */
        function ChangeStatus($table,$form_data,$con)
	{
           $this->db->where('id', $con);
           $this->db->update($table, $form_data); 
           if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
             return FALSE;
        }
        function ChangeOrderStatus($table,$form_data,$con)
	{
           $this->db->where($con);
           $this->db->update($table, $form_data); 
           if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
             return FALSE;
        }
        /**
         * Delete Row by condition
         * @param type $table
         * @param type $con
         * @return boolean
         */
        function DeleteRow($table,$con)
        {
        $this->db->delete($table, $con); 
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
        }
        /**
         * 
         * @param type $catid
         * @return string|boolean
         */
         
        function getProductByCat($catid)
        {
          
        $this->db->where('category', $catid);
        $this->db->where('status', '1');
        $query = $this->db->get('resto_products');
        $products = array();

        if($query->result()){
            foreach ($query->result() as $product) {
                $products[$product->id] = $product->product_code."/".$product->product_name;
            }
            return $products;
        } else {
            return FALSE;
        }
        }
        /**
         * 
         * @param type $table string table name
         * @param type $con array condition
         * @return type number of rows
         */
        function GetNumRows($table,$con)
        {
            $this->db->where($con);
            $this->db->from($table);
            return $this->db->count_all_results();
        }
        /**
         * 
         * @param type $table
         * @param type $con
         * @return type
         */
        function GetSumRows($table,$coulumn,$con)
        {
           $this->db->select_sum($coulumn);
           $this->db->where($con);
            $this->db->from($table);
           $data = $this->db->get();
           //print_r($this->db->last_query());die; 
           $q=$data->result_array();
           return $q[0][$coulumn];
            
          // return $this->db->count_all_results();
        }
        /**
         * 
         * @param type $table
         * @param type $form_data
         * @param type $con
         * 
         */
        function updateCart($table,$form_data,$con)
        {
            $this->db->set('quantity', 'quantity+1', FALSE);
            $this->db->where($con);
            $this->db->update($table);
        }
        
        function getQueryData($sql)
        {
          $result=$this->db->query($sql);
          return $result->result(); 
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
        function getCity()
        {
            $this->db->select('city_name');
            $this->db->order_by('city_name','ASC');
            $res=$this->db->get('coke_city');
            foreach($res->result() as $city)
            {
                $cityList[$city->city_name]=$city->city_name;
            }
              return $cityList;      
        }
         function getState()
        {
            $this->db->distinct('city_state');
            $this->db->order_by('city_state','ASC');
            $res=$this->db->get('coke_city');
            foreach($res->result() as $city)
            {
                $stateList[$city->city_state]=$city->city_state;
            }
              return $stateList;      
        }
        function sendNotification($msg)
        {
            $this->load->model('sendmail_model');
             $users=$this->getData('employee',array('emp_status'=>1));
                foreach($users as $row)
                {
                   if($row->emp_device=="android" && !empty($row->emp_deviceid))
                   {
                       $msgStatus[]=$this->sendmail_model->SendMsgTo_Android($msg,$row->emp_deviceid);
                   }
                    if($row->emp_device=="iOS" && !empty($row->emp_deviceid))
                   {
                      // $msgStatus[]=$this->sendmail_model->SendMsgTo_iOS($msg,$row->emp_deviceid);
                   }
                }
        }
}

                            