<?php
include_once 'header.php';
include_once 'left-menu.php';
?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Page
        <small></small>
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
            <form class="form-horizontal" action="<?=site_url('page/addPage')?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-20 control-label">Title</label>

                  <div class="col-sm-40">
                   <input id="title" type="text" name="title" class="form-control" value="<?php echo set_value('title'); ?>"  />
                    <?php echo form_error('title'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-20 control-label">Type</label>
                <div class="col-sm-40">
                   <input id="type" type="text" name="type" class="form-control" value="<?php echo set_value('type'); ?>"  />
                    <?php echo form_error('type'); ?>
                  </div>
                </div>
                <div class="form-group">
                  
                <div class="col-sm-80"> 
                  <?php echo form_error('content'); ?>
                  <textarea id="editor1" cols="20"  class="textarea" style="width: 100%" name="content"></textarea>
                   
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
        $(function () {
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
        CKEDITOR.replace('editor1');
        //$('#editor1').ckeditor();
        //bootstrap WYSIHTML5 - text editor
       // $(".textarea").wysihtml5();
      });
    </script>