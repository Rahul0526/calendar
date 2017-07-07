<?php include_once 'header.php';?>
<section id="blog">
  <div class="container">
    <!--<div class="center wow fadeInDown">
      <h2>
       
      </h2>
    </div>-->
    
    <div class="blog">
      <div class="row">
        <div class="col-md-80">
          <div class="blog-item">
            <div class="row">
              <div class="col-md-80">
                <?= htmlspecialchars_decode($page->content) ?>
                <br/>
              </div>
            </div>
            
            <div class="row">
              <div style="text-align:center; margin:auto 0"><a href="<?=site_url('/plan')?>" class="btn btn-primary btn-lg">Sign Up</a> </div>
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
