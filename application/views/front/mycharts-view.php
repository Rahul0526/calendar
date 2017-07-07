<?php include_once 'header.php'; ?>
<section id="about-us">
  <div class="container">
    <div class="center wow fadeInDown">
      <h2>Saved Charts </h2>
    </div>
    <div class="panel">
      <div class="panel-body">
        <table class="dataTable table-bordered">
          <thead>
            <tr>
              <td>Title</td>
              <td>Type</td>
              <td>Saved On</td>
              <td>Action</td>
             </tr>
          </thead>
          <tbody>
           <?php if(!empty($chartList)){?>
            <?php foreach($chartList as $chart){?>
            <tr>
              <td><?=$chart->title?></td>
              <td><?=$chart->type?></td>
              <td><?=$chart->trans_dt?></td>
              <td><a href="<?=site_url('users/viewChart/').$chart->id?>" class="btn  btn-primary">View Chart</a>
                <a href="<?=site_url('users/deleteChart/').$chart->id?>" class="btn  btn-danger">Delete Chart
                </a>
              </td>
              </tr>
            <?php }
		   }?>
          </tbody>
        </table>
      </div>
    </div>
  </div><!--/.container-->
</section><!--/about-us-->
<?php include_once 'footer.php'; ?>
	