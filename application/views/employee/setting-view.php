<?php
include_once 'header.php';
?>
<section>
  <div class="container"> 
  <div class="col-xs-70 col-md-offset-5">
     
        <div class="panel panel-default">
          <div class="panel-heading clearfix">
          <h2 class="no-margin"> Account Setting</h2>
          </div>
          <div class="panel-body">
           
           <div class="col-md-80">
             <form action="<?=site_url('employee/setting');?>" method="post" name="userProfile">
          <div class="form-group">
            <label class="control-label">Current Password*</label>
            <input maxlength="100" type="password" required="required" name="current_password" class="form-control" placeholder="Current Password" value="<?php echo set_value('current_password'); ?>" />
            <?php echo form_error('current_password'); ?>
          </div>
             <div class="form-group">
            <label class="control-label">New Password*</label>
            <input maxlength="100" type="password" required="required" name="new_password" class="form-control" placeholder="New Password" value="<?php echo set_value('new_password'); ?>"/>
            <?php echo form_error('new_password'); ?>
          </div>
             <div class="form-group">
            <label class="control-label">Confirm Password*</label>
            <input maxlength="100" type="password" name="conform_password"  class="form-control" placeholder="Confirm Password" value="<?php echo set_value('conform_password'); ?>"/>
            <?php echo form_error('conform_password'); ?>
          </div>
             <div class="form-group">
               <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit" >Update</button>
             </div></form>
          </div>
            
          </div>
       
         
      </div>
     
    </div>
  </div>
</section>

<?php 
include_once 'footer.php';
?>