<?php
include_once 'header.php';
include_once 'left-menu.php';
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1> Plans <small>List</small> </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-80 ">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Upgrade Plan</h3>
            <!-- <a href="<?=site_url('plans/newplan')?>" class="btn btn-flat  btn-circle pull-right"><i class="fa fa-plus-circle fa-3x"></i></a>--> 
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form class="form-horizontal" action="<?=site_url('Company/upgrade_plan')?>" method="post">
              <table  class="table table-bordered table-hover datatable">
                <thead>
                  <tr>
                    <th>Choose Plan <?php echo form_error('planid'); ?></th>
                    <th>Description</th>
                    <th>Price Monthly</th>                   
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach($planList as $plan){
                  ?>
                  <tr>
                    <td>
                    <?php if ($plan->id==$this->session->userdata('plan_id')){?>
                    <strong>(Current Active Plan)  <?=$plan->title?></strong>
                    <?php }else{?>
                    <label>
                        <input type="radio" name="planid" value="<?=$plan->id?>" />
                        <?=$plan->title?>
                      </label>
                      <?php } ?></td>
                    <td><?=html_entity_decode($plan->description)?></td>
                    <td>$
                      <?=$plan->price_monthly?></td>
                    
                  <?php }?>
                </tbody>
                
              </table>
              <!--<div class="box-body">
              	<div class="form-group">
                <?php echo form_error('plantype'); ?>
                <label for="inputEmail3" class="col-sm-20 control-label">Plan Type</label>
                <div class="col-sm-40">
                  <label for="plantype0" class="">
                    <input id="plantype0" checked="checked" name="plantype" type="radio" class="" value="monthly"  />
                    Monthly</label>
                  <label for="plantype1" class="">
                    <input id="plantype1" name="plantype" type="radio" class="" value="yearly" />
                    Yearly</label>
                   </div>
              </div>
              </div>-->
               <input id="hidden" name="plantype" type="hidden" class="" value="monthly" />
              <div class="box-footer">
              <button type="submit" class="btn btn-info pull-right">Upgrade</button>
            </div>
            </form>
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