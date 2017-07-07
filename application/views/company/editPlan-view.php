<?php
include_once 'header.php';
include_once 'left-menu.php';
?>

<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Edit Plan <small>Form</small> </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-80"> 
        <!-- Horizontal Form -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Plan</h3>
          </div>
          <!-- /.box-header --> 
          <!-- form start -->
          <form class="form-horizontal" action="<?=site_url('plans/editPlan/').$planInfo->id?>" method="post">
            <div class="box-body">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-20 control-label">Title</label>
                <div class="col-sm-40">
                  <input id="title" type="text" name="title" class="form-control" value="<?php echo $planInfo->title; ?>"  />
                  <?php echo form_error('title'); ?> </div>
              </div>
              <!--<div class="form-group">
                  <label for="inputEmail3" class="col-sm-20 control-label">Description</label>

                  <div class="col-sm-40">
                   <?php echo form_textarea( array( 'name' => 'description', 'class'=>"form-control", 'rows' => '5', 'cols' => '80', 'value' => $planInfo->description ) )?>
                     <?php echo form_error('description'); ?>
                  </div>
                </div>-->
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-20 control-label">Allow Employees(number)</label>
                <div class="col-sm-40">
                  <input id="employees" type="text" name="employees" class="form-control"  value="<?php echo $planInfo->employees; ?>"  />
                  <?php echo form_error('free_days'); ?> </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-20 control-label">Price Monthly</label>
                <div class="col-sm-40">
                  <input id="price_monthly" type="text" name="price_monthly" class="form-control"  value="<?php echo $planInfo->price_monthly; ?>"  />
                  <?php echo form_error('price_monthly'); ?> </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-20 control-label">Price Yearly</label>
                <div class="col-sm-40">
                  <input id="price_yearly" type="text" name="price_yearly" class="form-control"  value="<?php echo $planInfo->price_yearly; ?>"  />
                  <?php echo form_error('price_yearly'); ?> </div>
              </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-20 control-label">Description</label>

                  <div class="col-sm-40">
                   <?php echo form_textarea( array( 'name' => 'description', 'class'=>"form-control", 'rows' => '5', 'cols' => '80', 'value' => $planInfo->description ) )?>
                     <?php echo form_error('description'); ?>
                  </div>
                </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-20 control-label">Status</label>
                <div class="col-sm-40">
                  <label for="status0" class="">
                    <input id="status0" name="status" type="radio" class="" value="1" <?php echo ($planInfo->status==1)?"checked":'' ?> />
                    Active</label>
                  <label for="status1" class="">
                    <input id="status1" name="status" type="radio" class="" value="0" <?php echo ($planInfo->status==0)?"checked":''; ?>  />
                    Inactive</label>
                  <?php echo form_error('status'); ?> </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-info pull-right">Submit</button>
            </div>
            <!-- /.box-footer -->
          </form>
        </div>
        <!-- /.box --> 
        
      </div>
    </div>
  </section>
</div>
<?php
include_once 'footer.php';
?>