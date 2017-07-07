<?php
include_once 'header.php';
include_once 'left-menu.php';
?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        New Features
        <small>Form</small>
      </h1>
       </section>
 <section class="content">
      <div class="row">
<div class="col-md-80">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Features</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?=site_url('plans/addfeatures')?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-20 control-label">Title</label>

                  <div class="col-sm-40">
                   <input id="title" type="text" required="required" name="title" class="form-control" value="<?php echo set_value('title'); ?>"  />
                    <?php echo form_error('title'); ?>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-20 control-label">Description</label>

                  <div class="col-sm-40">
                   <?php echo form_textarea( array( 'name' => 'description', 'class'=>"form-control", 'rows' => '5', 'cols' => '80', 'value' => set_value('description') ) )?>
                     <?php echo form_error('description'); ?>
                  </div>
                </div>
                 
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-20 control-label">Bold</label>

                  <div class="col-sm-40">
                  <input id="status" name="bold" type="radio" class="" value="1" <?php echo $this->form_validation->set_radio('bold', '1'); ?> />
        		<label for="status" class="">Active</label>

        		<input id="status" name="bold" type="radio" class="" checked="checked" value="0" <?php echo $this->form_validation->set_radio('bold', '0'); ?> />
        		<label for="status" class="">Inactive</label>
                         <?php echo form_error('bold'); ?>
                        
                  </div>
                </div>
                 
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-20 control-label">Status</label>

                  <div class="col-sm-40">
                  <input id="status" name="status" type="radio" class="" value="1" <?php echo $this->form_validation->set_radio('status', '1'); ?> />
        		<label for="status" class="">Active</label>

        		<input id="status" name="status" type="radio" class="" value="0" <?php echo $this->form_validation->set_radio('status', '0'); ?> />
        		<label for="status" class="">Inactive</label>
                         <?php echo form_error('status'); ?>
                        
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