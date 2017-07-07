<?php
include_once 'header.php';
include_once 'left-menu.php';
?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        New Plan
        <small>Form</small>
      </h1>
       </section>
 <section class="content">
      <div class="row">
<div class="col-md-80">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Plan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?=site_url('plans/newPlan')?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-20 control-label">Title</label>

                  <div class="col-sm-40">
                   <input id="title" type="text" name="title" class="form-control" value="<?php echo set_value('title'); ?>"  />
                    <?php echo form_error('title'); ?>
                  </div>
                </div>
                <div class="form-group">
                <label for="inputEmail3" class="col-sm-20 control-label">Allow Employees(number)</label>
                <div class="col-sm-40">
                  <input id="employees" type="text" name="employees" class="form-control"  value="<?php echo set_value('employees'); ?>"  />
                  <?php echo form_error('free_days'); ?> </div>
              </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-20 control-label">Description</label>

                  <div class="col-sm-40">
                   <?php echo form_textarea( array( 'name' => 'description','id'=>'description', 'class'=>"form-control", 'rows' => '5', 'cols' => '80', 'value' => set_value('description') ) )?>
                     <?php echo form_error('description'); ?>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-20 control-label">Price Monthly</label>

                  <div class="col-sm-40">
                   <input id="price_monthly" type="text" name="price_monthly" class="form-control"  value="<?php echo set_value('price_monthly'); ?>"  />
                    <?php echo form_error('price_monthly'); ?>
                   
                  </div>
                </div>
                
                 <!--<div class="form-group">
                  <label for="inputEmail3" class="col-sm-20 control-label">Price Yearly</label>

                  <div class="col-sm-40">
                   <input id="price_yearly" type="text" name="price_yearly" class="form-control"  value="<?php echo set_value('price_yearly'); ?>"  />
                    <?php echo form_error('price_yearly'); ?>
                  </div>
                </div>-->                
                
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
                
                <div class="form-group">
                  <label for="trail" class="col-sm-20 control-label">Trail</label>

                  <div class="col-sm-40">
                  <input id="trail" name="trail" type="checkbox" class="" value="1" <?php echo $this->form_validation->set_radio('trail', '1'); ?> />
        		
                         <?php echo form_error('trail'); ?>
                        
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

<script src="<?=base_url('assets')?>/plugins/ckeditor/ckeditor.js"></script>
<script src="<?=base_url('assets')?>/plugins/ckeditor/config.js"></script>
<script>
       $(document).ready(function(e) {
        
    
        CKEDITOR.config.toolbar_Full =
[
    { name: 'document',    items : [ 'Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates' ] },
    { name: 'clipboard',   items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
    { name: 'editing',     items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
    { name: 'forms',       items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
    '/',
    { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
    { name: 'paragraph',   items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
    { name: 'links',       items : [ 'Link','Unlink','Anchor' ] },
    { name: 'insert',      items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak' ] },
    '/',
    { name: 'styles',      items : [ 'Styles','Format','Font','FontSize' ] },
    { name: 'colors',      items : [ 'TextColor','BGColor' ] },
    { name: 'tools',       items : [ 'Maximize', 'ShowBlocks','-','About' ] }
];
        CKEDITOR.replace('description');
        //$('#editor1').ckeditor();
        //bootstrap WYSIHTML5 - text editor
       // $(".textarea").wysihtml5();
      });
    </script>