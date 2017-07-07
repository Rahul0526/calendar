<?php
include_once 'header.php';
include_once 'left-menu.php';
?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>
       Charts 
        <small>List</small>
      </h1>
       </section>
  <section class="content">
      <div class="row">
        <div class="col-xs-80 ">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Chart Data Table</h3>
              <a href="<?=site_url('charts/addChart')?>" class="btn btn-flat  btn-circle pull-right"><i class="fa fa-plus-circle fa-3x"></i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table  class="table table-bordered table-hover datatable">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Subscription</th>
                  <th>Data File</th>
                  <th>Chart Type</th>
                  <th>Data Label</th>
                  <th>X-axis Label</th>
                  <th>Y-axis Label</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
               <tbody>
                
                  <?php
                  foreach($chartList as $row){
                    ?>
                  <tr>
                  <td><?=$row->title?></td>
                  <td> <?=$row->plan?></td>
                  <td><?=$row->chartTable?></td>
                  <td> <?=$row->chartType?></td>
                  <td> <?=$row->dataLabel?></td>
                  <td> <?=$row->x_axis?></td>
                  <td> <?=$row->y_axis?></td>
                 <td><?=$row->status==1?"<span class='badge bg-green'>ACTIVE</span>":"<span class='badge bg-yellow'>BLOCKED</span>"?></td>
                  <td><a  href="<?=site_url('charts/activateChart/'.$row->id)?>" title=""><span class="badge bg-green" data-toggle="tooltip"  data-original-title="Activate Chart"><i class="fa fa-check"></i></span></a> 
                    <a  href="<?=site_url('charts/inActivateChart/'.$row->id)?>" title=""><span class="badge bg-yellow" data-toggle="tooltip"  data-original-title="Block Chart"><i class="fa fa-ban"></i></span></a>
                  <a  href="<?=site_url('charts/deleteChart/'.$row->id)?>" title=""><span class="badge bg-red" data-toggle="tooltip"  data-original-title="Delete Chart"><i class="fa fa-trash-o"></i></span></a></td>
                </tr>
                  <?php }?>
               </tbody>
                <tfoot>
                <tr>
                   <th>Title</th>
                  <th>Subscription</th>
                  <th>Data File</th>
                  <th>Chart Type</th>
                  <th>Data Label</th>
                  <th>X-axis Label</th>
                  <th>Y-axis Label</th>
                  <th>Status</th>
                  <th>Action</th>
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
<?php
include_once 'footer.php';
?>