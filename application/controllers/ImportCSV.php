<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImportCSV
 *
 * @author MAT
 */
class ImportCSV extends CI_Controller {

  //put your code here

  public function __construct() {
    parent::__construct();
    $this->load->database();
    $this->load->library('session');
    $this->load->library('csvreader');
    $this->load->helper('language');
    $this->load->helper(array('form', 'html', 'url', 'path'));
    $this->load->library('form_validation');
    $this->load->library('pagination');
    $this->load->model('admin_model');
    $this->load->model('db_model');
    $this->load->model('ajax_model');
    $this->load->model('import_csv');
    
  }

  public function index() {
    $this->authCheck();
    $data['planList'] = $this->db_model->getData("plans");
    $this->load->view('admin/planList-view',$data);
  }

  function authCheck() {
    if ($this->session->userdata('type') == "") {
      redirect('admin/login');
    }
  }
  public function importCompanyStats(){
    $this->authCheck();
    $this->form_validation->set_rules('fileName', 'File Name', 'required|trim');
    if ($this->form_validation->run() == FALSE) {
      // validation hasn't been passed
      //echo "error";
     // $this->load->view('admin/newChart-view',$data);
    } else {
      $filename=@$this->input->post('fileName');
    
     $filePath= './csvFiles/'.$filename;
      
    $info=stat($filePath);
    $csvData =   $this->csvreader->parse_file($filePath);
      $con1=array(
        'file_name'  =>$filename,
        );
    $con=array(
        'file_name'  =>$filename,
        'upload_time'=>$info['ctime'],
        'file_mod_time'=>$info['mtime'],
        'file_size'=>$info['size']
    );
    if($this->db_model->GetNumRows('csv_log',$con1)===0){
      $this->db_model->SaveForm('csv_log',$con);
      $res=$this->ImportBatch('company_stats', $csvData);
      
    }else{   
    if($this->db_model->GetNumRows('csv_log',$con)===0){
      
        $res=$this->ImportBatch('company_stats', $csvData);
        if(!$res){
          $this->db_model->UpdateForm('csv_log',$con,$con1);
        }
         }
        
    }
    }
      redirect('ImportCSV/companyStats');
        
  }
  public function companyStats(){
   $this->authCheck();
        $con=array(
        'file_name'  =>'Company_Stats.csv',
        );
    $data['fileInfo']=$this->db_model->getData('csv_log',$con);
    $data['columns']=$this->db_model->getColumns('company_stats');
    $data['fileList']= $this->fileList("./csvFiles/");
        $this->load->view('admin/companyStats-view', $data);
  }
 

  public function importDailyChange(){
    $this->authCheck();
    $this->form_validation->set_rules('fileName', 'File Name', 'required|trim');
    if ($this->form_validation->run() == FALSE) {
      // validation hasn't been passed
      //echo "error";
     // $this->load->view('admin/newChart-view',$data);
    } else {
      $filename=@$this->input->post('fileName');
    
     $filePath= './csvFiles/'.$filename;
    
    
    $info=stat($filePath);
    $csvData =   $this->csvreader->parse_file($filePath);
      $con1=array(
        'file_name'  =>$filename,
        );
    $con=array(
        'file_name'  =>$filename,
        'upload_time'=>$info['ctime'],
        'file_mod_time'=>$info['mtime'],
        'file_size'=>$info['size']
    );
    if($this->db_model->GetNumRows('csv_log',$con1)===0){
      $this->db_model->SaveForm('csv_log',$con);
      $res=$this->ImportBatch('daily_change', $csvData);
      
    }else{   
    if($this->db_model->GetNumRows('csv_log',$con)===0){
      $res=$this->ImportBatch('daily_change', $csvData);
        if(!$res){
          $this->db_model->UpdateForm('csv_log',$con,$con1);
        }
         }
         
    }
    }
     redirect('ImportCSV/dailyChange');
        
  }
  public function dailyChange(){
    $this->authCheck();
    $con=array(
        'file_name'  =>'Daily_Change.csv',
        );
    $data['fileInfo']=$this->db_model->getData('csv_log',$con);
   $data['fileList']= $this->fileList("./csvFiles/");
    $this->load->view('admin/dailyChange-view', $data);
  }
  
  public function importDateDim(){
    $this->authCheck();
    $this->form_validation->set_rules('fileName', 'File Name', 'required|trim');
    if ($this->form_validation->run() == FALSE) {
      // validation hasn't been passed
      //echo "error";
     // $this->load->view('admin/newChart-view',$data);
    } else {
      $filename=@$this->input->post('fileName');
    
     $filePath= './csvFiles/'.$filename;  
    
    $info=stat($filePath);
    $csvData =   $this->csvreader->parse_file($filePath);
      $con1=array(
        'file_name'  =>$filename
        );
    $con=array(
        'file_name'  =>$filename,
        'upload_time'=>$info['ctime'],
        'file_mod_time'=>$info['mtime'],
        'file_size'=>$info['size']
    );
    if($this->db_model->GetNumRows('csv_log',$con1)===0){
      $this->db_model->SaveForm('csv_log',$con);
      $res=$this->ImportBatch('date_dim', $csvData);
      
    }else{   
    if($this->db_model->GetNumRows('csv_log',$con)===0){
      $res=$this->ImportBatch('date_dim', $csvData);
        if(!$res){
          $this->db_model->UpdateForm('csv_log',$con,$con1);
        }
         }
         
    }
    }
     redirect('ImportCSV/dateDim');
        
  }
  public function dateDim(){
    $this->authCheck();
    $con=array(
        'file_name'  =>'Date_Dim.csv',
        );
    $data['fileInfo']=$this->db_model->getData('csv_log',$con);
    $data['fileList']= $this->fileList("./csvFiles/");
    $this->load->view('admin/dateDim-view', $data);
  }
  
  public function importMonthlyChange(){
     $this->authCheck();
    $this->form_validation->set_rules('fileName', 'File Name', 'required|trim');
    if ($this->form_validation->run() == FALSE) {
      // validation hasn't been passed
      //echo "error";
     // $this->load->view('admin/newChart-view',$data);
    } else {
      $filename=@$this->input->post('fileName');
    
     $filePath= './csvFiles/'.$filename;  
    
    $info=stat($filePath);
    $csvData =   $this->csvreader->parse_file($filePath);
      $con1=array(
        'file_name'  =>$filename
        );
    $con=array(
        'file_name'  =>$filename,
        'upload_time'=>$info['ctime'],
        'file_mod_time'=>$info['mtime'],
        'file_size'=>$info['size']
    );
    if($this->db_model->GetNumRows('csv_log',$con1)===0){
      $this->db_model->SaveForm('csv_log',$con);
      $res=$this->ImportBatch('monthly_change', $csvData);
      
    }else{   
    if($this->db_model->GetNumRows('csv_log',$con)===0){
      $res=$this->ImportBatch('monthly_change', $csvData);
        if(!$res){
          $this->db_model->UpdateForm('csv_log',$con,$con1);
        }
         }
         
    }
    }
     redirect('ImportCSV/monthlyChange');
        
  }
  public function monthlyChange(){
    $this->authCheck();
    $con=array(
        'file_name'  =>'Monthly_Change.csv',
        );
    $data['fileInfo']=$this->db_model->getData('csv_log',$con);
    $data['fileList']= $this->fileList("./csvFiles/");
    $this->load->view('admin/monthlyChange-view', $data);
  }
  
  public function importQuarterlyChange(){
     $this->authCheck();
    $this->form_validation->set_rules('fileName', 'File Name', 'required|trim');
    if ($this->form_validation->run() == FALSE) {
      // validation hasn't been passed
      //echo "error";
     // $this->load->view('admin/newChart-view',$data);
    } else {
      $filename=@$this->input->post('fileName');
    
     $filePath= './csvFiles/'.$filename;  
    
    $info=stat($filePath);
    $csvData =   $this->csvreader->parse_file($filePath);
      $con1=array(
        'file_name'  =>$filename
        );
    $con=array(
        'file_name'  =>$filename,
        'upload_time'=>$info['ctime'],
        'file_mod_time'=>$info['mtime'],
        'file_size'=>$info['size']
    );
    if($this->db_model->GetNumRows('csv_log',$con1)===0){
      $this->db_model->SaveForm('csv_log',$con);
      $res=$this->ImportBatch('quarterly_change', $csvData);
      
    }else{   
    if($this->db_model->GetNumRows('csv_log',$con)===0){
      $res=$this->ImportBatch('quarterly_change', $csvData);
        if(!$res){
          $this->db_model->UpdateForm('csv_log',$con,$con1);
        }
         }
        
    }
    }
      redirect('ImportCSV/quarterlyChange');
        
  }
  public function quarterlyChange(){
    $this->authCheck();
    $con=array(
        'file_name'  =>'Quarterly_Change.csv',
        );
    $data['fileInfo']=$this->db_model->getData('csv_log',$con);
    $data['fileList']= $this->fileList("./csvFiles/");
    $this->load->view('admin/quarterlyChange-view', $data);
  }
  
  public function importWeeklyChange(){
    $this->authCheck();
    $this->form_validation->set_rules('fileName', 'File Name', 'required|trim');
    if ($this->form_validation->run() == FALSE) {
      // validation hasn't been passed
      //echo "error";
     // $this->load->view('admin/newChart-view',$data);
    } else {
      $filename=@$this->input->post('fileName');
    
     $filePath= './csvFiles/'.$filename;  
    
    $info=stat($filePath);
    $csvData =   $this->csvreader->parse_file($filePath);
      $con1=array(
        'file_name'  =>$filename
        );
    $con=array(
        'file_name'  =>$filename,
        'upload_time'=>$info['ctime'],
        'file_mod_time'=>$info['mtime'],
        'file_size'=>$info['size']
    );
    if($this->db_model->GetNumRows('csv_log',$con1)===0){
      $this->db_model->SaveForm('csv_log',$con);
      $res=$this->ImportBatch('weekly_change', $csvData);
      
    }else{   
    if($this->db_model->GetNumRows('csv_log',$con)===0){
      $res=$this->ImportBatch('weekly_change', $csvData);
        if(!$res){
          $this->db_model->UpdateForm('csv_log',$con,$con1);
        }
         }
         
    }
    }
     redirect('ImportCSV/weeklyChange');
        
  }
  public function weeklyChange(){
    $this->authCheck();
    $con=array(
        'file_name'  =>'Weekly_Change.csv',
        );
    $data['fileInfo']=$this->db_model->getData('csv_log',$con);
    $data['fileList']= $this->fileList("./csvFiles/");
    $this->load->view('admin/weeklyChange-view', $data);
  }
  
   public function importYearlyChange(){
     $this->authCheck();
    $this->form_validation->set_rules('fileName', 'File Name', 'required|trim');
    if ($this->form_validation->run() == FALSE) {
      // validation hasn't been passed
      //echo "error";
     // $this->load->view('admin/newChart-view',$data);
    } else {
      $filename=@$this->input->post('fileName');
    
     $filePath= './csvFiles/'.$filename;  
    
    $info=stat($filePath);
    $csvData =   $this->csvreader->parse_file($filePath);
      $con1=array(
        'file_name'  =>$filename
        );
    $con=array(
        'file_name'  =>$filename,
        'upload_time'=>$info['ctime'],
        'file_mod_time'=>$info['mtime'],
        'file_size'=>$info['size']
    );
    if($this->db_model->GetNumRows('csv_log',$con1)===0){
      $this->db_model->SaveForm('csv_log',$con);
      $res=$this->ImportBatch('yearly_change', $csvData);
      
    }else{   
    if($this->db_model->GetNumRows('csv_log',$con)===0){
      $res=$this->ImportBatch('yearly_change', $csvData);
        if(!$res){
          $this->db_model->UpdateForm('csv_log',$con,$con1);
        }
         }
         
    }
    }
     redirect('ImportCSV/yearlyChange');
        
  }
  public function yearlyChange(){
    $this->authCheck();
    $con=array(
        'file_name'  =>'Yearly_Change.csv',
        );
    $data['fileInfo']=$this->db_model->getData('csv_log',$con);
    $data['fileList']= $this->fileList("./csvFiles/");
    $this->load->view('admin/yearlyChange-view', $data);
  }
  
   public function importStock(){
    $this->authCheck();
    $filePath= './csvFiles/Stock_2012.csv';
     $filePath2= base_url('csvFiles/Stock_2012.csv');
    
    $info=stat($filePath);
    //$csvData =   $this->csvreader->parse_file($filePath);
      $con1=array(
        'file_name'  =>'Stock.csv',
        );
    $con=array(
        'file_name'  =>'Stock.csv',
        'upload_time'=>$info['ctime'],
        'file_mod_time'=>$info['mtime'],
        'file_size'=>$info['size']
    );
//   if($this->db_model->GetNumRows('csv_log',$con1)===0){
//      $this->db_model->SaveForm('csv_log',$con);
//      $this->import_csv->parse_file($filePath,'stock',true);
//      
//    }else{   
//    if($this->db_model->GetNumRows('csv_log',$con)===0){
//      $res=$this->ImportBatch('stock', $csvData);
//        if(!$res){
//         $this->db_model->UpdateForm('csv_log',$con,$con1);
//        }
//        }
//         
//   }
  $this->import_csv->parse_file($filePath,'stock',true);
   // $this->db_model->loadCSV("au_stock",$filePath2);
     redirect('ImportCSV/stock');        
  }
  public function stock(){
    $this->authCheck();
    $con=array(
        'file_name'  =>'Stock.csv',
        );
    $data['csvInfo']=  $this->fileInfo('./csvFiles/Stock_2012.csv');
    $data['fileInfo']=$this->db_model->getData('csv_log',$con);
    $data['fileList']= $this->fileList("./csvFiles/");
    $this->load->view('admin/stock-view', $data);
  }
  
  
    public function importStockStatus(){
     $this->authCheck();
    $this->form_validation->set_rules('fileName', 'File Name', 'required|trim');
    if ($this->form_validation->run() == FALSE) {
      // validation hasn't been passed
      //echo "error";
     // $this->load->view('admin/newChart-view',$data);
    } else {
      $filename=@$this->input->post('fileName');
    
     $filePath= './csvFiles/'.$filename;  
    
    $info=stat($filePath);
    $csvData =   $this->csvreader->parse_file($filePath);
      $con1=array(
        'file_name'  =>$filename
        );
    $con=array(
        'file_name'  =>$filename,
        'upload_time'=>$info['ctime'],
        'file_mod_time'=>$info['mtime'],
        'file_size'=>$info['size']
    );
    if($this->db_model->GetNumRows('csv_log',$con1)===0){
      $this->db_model->SaveForm('csv_log',$con);
      $res=$this->ImportBatch('stock_status', $csvData);
      
    }else{   
    if($this->db_model->GetNumRows('csv_log',$con)===0){
      $res=$this->ImportBatch('stock_status', $csvData);
        if(!$res){
          $this->db_model->UpdateForm('csv_log',$con,$con1);
        }
         }
         
    }
    }
     redirect('ImportCSV/stockStatus');
        
  }
  public function stockStatus(){
    $this->authCheck();
    $con=array(
        'file_name'  =>'Stock_Status.csv',
        );
    $data['fileInfo']=$this->db_model->getData('csv_log',$con);
    $data['fileList']= $this->fileList("./csvFiles/");
    $this->load->view('admin/stockStatus-view', $data);
  }
  
    public function importStockHistorical(){
     $this->authCheck();
    $this->form_validation->set_rules('fileName', 'File Name', 'required|trim');
    if ($this->form_validation->run() == FALSE) {
      // validation hasn't been passed
      //echo "error";
     // $this->load->view('admin/newChart-view',$data);
    } else {
      $filename=@$this->input->post('fileName');
    
     $filePath= './csvFiles/'.$filename;  
    
    $info=stat($filePath);
    $csvData =   $this->csvreader->parse_file($filePath);
      $con1=array(
        'file_name'  =>$filename
        );
    $con=array(
        'file_name'  =>$filename,
        'upload_time'=>$info['ctime'],
        'file_mod_time'=>$info['mtime'],
        'file_size'=>$info['size']
    );
    if($this->db_model->GetNumRows('csv_log',$con1)===0){
      $this->db_model->SaveForm('csv_log',$con);
      $res=$this->ImportBatch('stock_historical', $csvData);
      
    }else{   
    if($this->db_model->GetNumRows('csv_log',$con)===0){
      $res=$this->ImportBatch('stock_historical', $csvData);
        if(!$res){
          $this->db_model->UpdateForm('csv_log',$con,$con1);
        }
         }
         
    }
    }
     redirect('ImportCSV/stockHistorical');
        
  }
  public function stockHistorical(){
    $this->authCheck();
    $con=array(
        'file_name'  =>'Stock_Historical.csv',
        );
    $data['fileInfo']=$this->db_model->getData('csv_log',$con);
    $data['fileList']= $this->fileList("./csvFiles/");
    $this->load->view('admin/stockHistorical-view', $data);
  }
  
  
   public function importStockReport(){
    $this->authCheck();
    $this->form_validation->set_rules('fileName', 'File Name', 'required|trim');
    if ($this->form_validation->run() == FALSE) {
      // validation hasn't been passed
      //echo "error";
     // $this->load->view('admin/newChart-view',$data);
    } else {
      $filename=@$this->input->post('fileName');
    
     $filePath= './csvFiles/'.$filename;
    
    $info=stat($filePath);
    $csvData =   $this->csvreader->parse_file($filePath);
      $con1=array(
        'file_name'  =>$filename,
        );
    $con=array(
        'file_name'  =>$filename,
        'upload_time'=>$info['ctime'],
        'table_link'=>"au_stock_report",
        'file_mod_time'=>$info['mtime'],
        'file_size'=>$info['size']
    );
    if($this->db_model->GetNumRows('csv_log',$con1)===0){
      $this->db_model->SaveForm('csv_log',$con);
      $res=$this->ImportBatch('stock_report', $csvData);
      
    }else{   
    if($this->db_model->GetNumRows('csv_log',$con)===0){
      $res=$this->ImportBatch('stock_report', $csvData);
        if(!$res){
          $this->db_model->UpdateForm('csv_log',$con,$con1);
        }
         }        
         }
    }
     redirect('ImportCSV/stockReport');
        
  }
  public function stockReport(){
    $this->authCheck();
    $con=array(
        '	table_link'  =>'au_stock_report',
        );
    $data['fileList']= $this->fileList("./csvFiles/");
    $data['fileInfo']=$this->db_model->getData('csv_log',$con);
    //$data['csvData']=$this->db_model->getData('yearly_change');
    $this->load->view('admin/stockReport-view', $data);
  }
  
  
   public function getAjaxData($table){
   // $table='monthly_change';
    $list=$this->ajax_model->get_datatables($table);
     $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
            $row = array_values($customers);
////            $row[] = $no;
//            $row[] = $customers->ticker;
//            $row[] = $customers->date;
//            $row[] = $customers->month_end_adj_close;
//            $row[] = $customers->month_start_open;
//            $row[] = $customers->price_change_month;
//            $row[] = $customers->percent_change_month;
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->ajax_model->count_all($table),
                        "recordsFiltered" => $this->ajax_model->count_filtered($table),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
  }

  function ImportBatch($table,$csvData){
    $dataArr=array_chunk($csvData,400,true);
    foreach ($dataArr as $dataInsert){
       $this->db_model->batchInsert($table,$dataInsert);
     //print_r($dataInsert);
    }
  }
  
  function fileInfo($filePath){
     $info=stat($filePath);
     return $info;
  }
  
  function fileList($dir){
   // $dir= './csvFiles/';
    $files=array();
    if (is_dir($dir)){      
  if ($dh = opendir($dir)){
    while (($file = readdir($dh)) !== false){
       $files[]=$file ;
    }
    closedir($dh);
  }
  
  }
  return $files;
  }
  
}
 