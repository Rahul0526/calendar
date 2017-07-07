<?php
include_once 'header.php';
include_once 'left-menu.php';
?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>
       Monthly Change 
        <small>List</small>
      </h1>
       </section>
  <section class="content">
      <div class="row">
        <div class="col-xs-80 ">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Monthly Change Data List</h3>
              <a href="" class="btn btn-flat  btn-circle pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-upload fa-3x"></i></a> 
              <span class="text-sm pull-right text-muted">File Size- <?php echo round($fileInfo[0]->file_size/1024,2);?>kb</span><br/>
              <span class="text-sm pull-right">File last modified- <?php echo date("Y-m-d H:i:s",$fileInfo[0]->file_mod_time)?></span><br />
              <span class="text-sm pull-right">last upload- <?php echo date("Y-m-d H:i:s",  strtotime($fileInfo[0]->trans_dt))?></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <input type="hidden" id="req_url" value="<?php echo site_url('ImportCSV/getAjaxData/monthly_change')?>" />
              <table  class="table table-bordered table-hover largeData" data-url="">
                <thead>
                <tr>
                  <th>Sr.</th>
                  <th>Ticker</th>
                  <th>Date</th>
                  <th>Month_End_Adj_Close</th>
                  <th>Month_Start_Open</th>
                  <th>Price_Change_Month</th>
                  <th>Percent_Change_Month</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                  <th>Sr.</th>
                   <th>Ticker</th>
                  <th>Date</th>
                  <th>Month_End_Adj_Close</th>
                  <th>Month_Start_Open</th>
                  <th>Price_Change_Month</th>
                  <th>Percent_Change_Month</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
  </section>  
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Import CSV</h4>
      </div>
       <form action="<?=site_url('ImportCSV/importMonthlyChange')?>" method="post">
      <div class="modal-body">
        <select class="form-control" name="fileName" required="required">
          <option value=''>--Select CSV File--</option>
          <?php          foreach($fileList as $file){?>
               <option value="<?=$file?>"><?=$file?></option>
          <?php }?>
        </select>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Import</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
       </form>
    </div>

  </div>
</div>
<?php
include_once 'footer.php';
?>