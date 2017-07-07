<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ajax_model
 *
 * @author MAT
 */
class Ajax_model extends CI_Model{
  //put your code here
  var $table = 'monthly_change';
    //var $column_order = array(null, 'ticker','date','month_end_adj_close','month_start_open','price_change_month','percent_change_month'); //set column field database for datatable orderable
   // var $column_search = array('ticker','date','month_end_adj_close','month_start_open','price_change_month','percent_change_month'); //set column field database for datatable searchable 
    var $order = array('id' => 'asc'); // default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    private function _get_datatables_query($table)
    {
        $fields=$this->db->list_fields($table);
        $this->db->from($table);
          $column_order = $fields;
          $column_search=$fields;
 
        $i = 0;
     
        foreach ($column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables($table)
    {
        $this->_get_datatables_query($table);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result_array();
    }
 
    function count_filtered($table)
    {
        $this->_get_datatables_query($table);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all($table)
    {
        $this->db->from($table);
        return $this->db->count_all_results();
    }
}
