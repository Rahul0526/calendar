<?php
include_once 'header.php';
include_once 'left-menu.php';
?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>
        Admin Setting
        <small>Form</small>
      </h1>
       </section>
 <section class="content">
      <div class="row">
<div class="col-md-80">
          <!-- Horizontal Form -->
          
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Change Setting</h3>
            </div>
            
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?=site_url('Company/setting')?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-20 control-label">Email</label>

                  <div class="col-sm-40">
                    <input id="title" type="text" name="email" readonly="" class="form-control" value="<?php echo $this->session->userdata('email'); ?>"  />
                   
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-20 control-label">Current Password</label>

                  <div class="col-sm-40">
                   <input id="title" type="password" name="c_pass" class="form-control" value="<?php echo set_value('c_pass'); ?>"  />
                    <?php echo form_error('c_pass'); ?>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-20 control-label">New Password</label>

                  <div class="col-sm-40">
                   <input id="title" type="password" name="n_pass" class="form-control" value="<?php echo set_value('n_pass'); ?>"  />
                    <?php echo form_error('n_pass'); ?>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-20 control-label"> Confirm Password</label>

                  <div class="col-sm-40">
                    <input id="title" type="password" name="re_pass" class="form-control" value="<?php echo set_value('re_pass'); ?>"  />
                    <?php echo form_error('re_pass'); ?>
                   
                  </div>
                </div>
                
                </div>
              
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Cancel</button>
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