<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

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
class Db_model extends CI_Model {

  //put your code here
  public function __construct() {
    parent::__construct();
  }

  /**
   * function SaveForm()
   *
   * insert form data
   * @param $form_data - array
   * @return Bool - TRUE or FALSE
   */
  function SaveForm($table, $form_data) {
    $this->db->insert($table, $form_data);
    // echo $this->db->last_query(); die; 
    if ($this->db->affected_rows() == '1') {
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
  function getData($table, $con = "",$orderby="desc",$orderbyc="id") {
    
      $this->db->order_by($orderbyc, $orderby);
	  if($con=="")
	   $result = $this->db->get($table, $con);
	  else
      $result = $this->db->get_where($table, $con);
    
    if ($result->num_rows()) {
      return $result->result();
    }
  }
  /**
   * 
   * @param type $table
   * @param type $con
   * @param type $limit
   */
  function getLimitData($table,$con="",$limit=0,$orderBy){
    if ($con == "") {
      $this->db->order_by($orderBy, "asc");
      $result = $this->db->get($table,$limit);
    } else {
      $this->db->order_by($orderBy, "asc");
      $result = $this->db->get_where($table, $con,$limit);
    }
     if ($result->num_rows()) {
      return $result->result();
    }
  }

  /**
   * 
   * @param type $table
   * @param type $con
   * @return type Data Array
   */
  function getDataArray($table, $con = "") {
    if ($con == "") {
      $result = $this->db->get($table);
    } else {
      $result = $this->db->get_where($table, $con);
    }
    if ($result->num_rows()) {
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
  function UpdateForm($table, $form_data, $con) {
    $this->db->where($con);
    $this->db->update($table, $form_data);
    if ($this->db->affected_rows() == '1') {
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
  function ChangeStatus($table, $form_data, $con) {
    $this->db->where('id', $con);
    $this->db->update($table, $form_data);
    if ($this->db->affected_rows() == '1') {
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
  function DeleteRow($table, $con) {
    $this->db->delete($table, $con);
    if ($this->db->affected_rows() == '1') {
      return TRUE;
    }

    return FALSE;
  }

  /**
   * 
   * @param type $table string table name
   * @param type $con array condition
   * @return type number of rows
   */
  function GetNumRows($table, $con) {
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
  function GetSumRows($table, $coulumn, $con) {
    $this->db->select_sum($coulumn);
    $this->db->where($con);
    $this->db->from($table);
    $data = $this->db->get();
    //print_r($this->db->last_query());die; 
    $q = $data->result_array();
    return $q[0][$coulumn];

    // return $this->db->count_all_results();
  }

  /**
   * 
   * @param type $sql
   * @return type
   */
  function getQueryData($sql) {
    $result = $this->db->query($sql);
    return $result->result();
  }
 function getQueryArrayData($sql) {
    $result = $this->db->query($sql);
    return $result->result_array();
  }
  /**
   * 
   * @param type $table User table Name
   * @param type $data  Password Array
   * @param type $con   Condition Array
   */
  function getCity() {
    $this->db->select('city_name');
    $this->db->order_by('city_name', 'ASC');
    $res = $this->db->get('coke_city');
    foreach ($res->result() as $city) {
      $cityList[$city->city_name] = $city->city_name;
    }
    return $cityList;
  }

  function getState() {
    $this->db->distinct('city_state');
    $this->db->order_by('city_state', 'ASC');
    $res = $this->db->get('coke_city');
    foreach ($res->result() as $city) {
      $stateList[$city->city_state] = $city->city_state;
    }
    return $stateList;
  }

/**
   * Batch insert 
   * @param type $table
   * @param type $data
   * @return type
   */

  function batchInsert($table, $data) {
    $this->db->trans_begin();
   
    $this->db->insert_batch($table, $data);
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
    } else {
      $this->db->trans_commit();
    }
   return $this->db->trans_status();
  }
  /**
   * 
   * @param type $table
   * @return type
   */
  function getColumns($table){
    return $this->db->list_fields($table);
  }
  
  function loadCSV($table,$file){
   // echo BASEPATH;die;
    $sql='LOAD DATA LOCAL INFILE ".\csvFiles\Stock_2012.csv"
        INTO TABLE au_stock
        FIELDS TERMINATED by ","
        OPTIONALLY ENCLOSED BY "\'"
        LINES TERMINATED BY "\n"
		IGNORE 1 LINES';
    return $this->getQueryArrayData($sql);
  }
  
  function getPlane() {
    $this->db->distinct('title');
    $this->db->order_by('title', 'ASC');
    $res = $this->db->get('au_plans');
    foreach ($res->result() as $city) {
      $stateList[$city->id] = $city->title;
    }
    return $stateList;
  }

}
