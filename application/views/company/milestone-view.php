<?php
include_once 'header.php';
include_once 'left-menu.php';
?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>
       Milestones 
        <small>List</small>
      </h1>
       </section>
  <section class="content">
      <div class="row">
        <div class="col-xs-80 ">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Milestones Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
            
              <table  class="table table-bordered table-hover datatable">
                <thead>
                <tr>
                  <th>Title</th>                  
                  <th>Days</th>
                  <th>Weight</th>  
                   <th>Industry Type</th> 
                  <th>Description</th>              
                  <th>Action</th>
                </tr>
                </thead>
               <tbody>
                
                  <?php
				  if(!empty($milestonesList)){
                  foreach($milestonesList as $milestones){					  
                  ?>
                  <tr>
                  <td><?=$milestones->Title?></td>                 
                  <td><?=$milestones->days?></td>
                  <td><?=$milestones->weight?></td>
                  <td><?=$milestones->industryType?></td>    
                   <td><?=$milestones->description?></td>                
                  <td>
                  <a  href="<?=site_url('company/editMilestone/'.$milestones->id)?>" title=""><span class="badge" data-toggle="tooltip"  data-original-title="Edit Plan"><i class="fa fa-pencil"></i></span></a>&nbsp;&nbsp;&nbsp;
                  <a  href="<?=site_url('company/deleteMilestone/'.$milestones->id)?>" title="" onclick="return confirm('Are you sure?')"><span class="badge bg-red" data-toggle="tooltip"  data-original-title="Delete User"><i class="fa fa-trash-o"></i></span></a></td>
                </tr>
                  <?php }
				  }?>
               </tbody>
                <tfoot>
                <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Days</th>
                  <th>Weight</th>                 
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