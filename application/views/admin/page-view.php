<?php
include_once 'header.php';
include_once 'left-menu.php';
?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$page->title?>
        <small></small>
      </h1>
       </section>
 <section class="content">
      <div class="row">
<div class="col-md-80">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update <?=$page->title?> Content</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?=site_url('page/update')?>" method="post">
              <div class="box-body">
                <div class="col-sm-80"> 
                  <input type="hidden" value="<?=$page->id?>"  name="pageId" />
                  <input type="hidden" name="type" value="<?=$page->type?>" />
                  <?php echo form_error('content'); ?>
                  <textarea id="editor"  class="textarea" style="width: 100%; height: 800px;" name="content">
                    <?=htmlspecialchars_decode($page->content)?>
                  </textarea>
                   
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
               
                <button type="submit" class="btn btn-info pull-right">Update</button>
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
<script src="<?=base_url('assets')?>/plugins/ckeditor/initeditor.js"></script>
<script>

	initEditor();

    </script>
