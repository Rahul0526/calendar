<?php
include_once 'header.php';
include_once 'left-menu.php';
?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>
       Plans 
        <small>List</small>
      </h1>
       </section>
  <section class="content">
      <div class="row">
        <div class="col-xs-80 ">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Plan Data Table</h3>
             <!-- <a href="<?=site_url('plans/newplan')?>" class="btn btn-flat  btn-circle pull-right"><i class="fa fa-plus-circle fa-3x"></i></a>-->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table  class="table table-bordered table-hover datatable">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Price Monthly</th>
                  <th>Price Yearly</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
               <tbody>
                
                  <?php
                  foreach($planList as $plan){
                  ?>
                  <tr>
                  <td><?=$plan->title?></td>
                  <td><?=$plan->description?></td>
                  <td>$ <?=$plan->price_monthly?></td>
                  <td>$ <?=$plan->price_yearly?></td>
                 <td><?=$plan->status==1?"<span class='badge bg-green'>ACTIVE</span>":"<span class='badge bg-yellow'>BLOCKED</span>"?></td>
                  <td><a  href="<?=site_url('plans/editPlan/'.$plan->id)?>" title=""><span class="badge" data-toggle="tooltip"  data-original-title="Edit Plan"><i class="fa fa-pencil"></i></span></a>
                    <a  href="<?=site_url('plans/activatePlan/'.$plan->id)?>" title=""><span class="badge bg-green" data-toggle="tooltip"  data-original-title="Activate Plan"><i class="fa fa-check"></i></span></a> 
                    <a  href="<?=site_url('plans/inActivatePlan/'.$plan->id)?>" title=""><span class="badge bg-yellow" data-toggle="tooltip"  data-original-title="Block Plan"><i class="fa fa-ban"></i></span></a>
<!--                  <a  href="<?=site_url('plans/deletePlan/'.$plan->id)?>" title=""><span class="badge bg-red" data-toggle="tooltip"  data-original-title="Delete Plan"><i class="fa fa-trash-o"></i></span></a></td>-->
                </tr>
                  <?php }?>
               </tbody>
                <tfoot>
                <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Price Monthly</th>
                  <th>Price Yearly</th>
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