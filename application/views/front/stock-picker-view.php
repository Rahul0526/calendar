<?php include_once 'header.php';?>
<section id="blog">
  <div class="container">
    <div class="center wow fadeInDown">
      <h2>
        <?= $page->title ?>
      </h2>
    </div>
    <div class="blog">
      <div class="row">
        <div class="col-md-80">
          <div class="blog-item">
            <div class="row">
              <div class="col-md-80">
                <?= htmlspecialchars_decode($page->content) ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-80">
                <table  class="table table-bordered table-hover largeData" data-url="">
                  <thead>
                    <tr>
                      <th style="font-size: 20px;">Ticker</th>
                      <th style="font-size: 20px;">Technical Indicator</th>
                      <th style="font-size: 20px;">Notes</th>
                      <th style="font-size: 20px;">Notes 2</th>
                      <th style="font-size: 20px;">Value</th>
                    </tr>
                    <?php foreach($csvData as $col){?>
                    <tr>
                      <td><?php echo $col['ticker']; ?></td>
                      <td><?php echo $col['technical_indicator']; ?></td>
                      <td><?php echo $col['notes']; ?></td>
                      <td><?php echo $col['notes_2']; ?></td>
                      <td><?php echo $col['value']; ?></td>
                    </tr>
                    <?php } ?>
                  </thead>
                </table>
              </div>
            </div>
            <div class="row">
              <div style="text-align:center; margin:auto 0"> <a href="<?=site_url('/register')?>" class="btn btn-primary btn-lg">Sign Up</a> </div>
            </div>
          </div>
          <!--/.blog-item--> 
        </div>
        <!--/.col-md-8--> 
        
      </div>
    </div>
  </div>
  <!--/.container--> 
</section>
<!--/about-us-->
<?php include_once 'footer.php';?>
