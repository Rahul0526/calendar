<div class="row-border ">
  <div class="col-md-80">
    <h2 class="text-center text-bold">
      <?php
  if(!$this->session->userdata('uid')){?>
      <a href="<?=site_url('plan')?>" class="text-primary">
      <?php }?>
      <?php if(isset($stock_heading[0])){
 echo htmlspecialchars_decode($stock_heading[0]->content);} ?>
      </a> </h2>
  </div>
  <footer  class="midnight-blue" id="footer">
    <div class="container">
      <div class="row">
      
      <div class=" clearfix"></div>
        <div class="footer-icon">
          <ul>
            <li><a target="_blank" href="https://www.facebook.com/AugursTechnology"><img src="http://stocksreally.com/assets/images/f2.png" alt="Like Us on FB"></a> </li>
            <li><a target="_blank" href="https://twitter.com/AugursTech"><img src="http://stocksreally.com/assets/images/t2.png" alt="Follow Us on Twitter"></a> </li>
           
          </ul>
        </div>
        
        <!--   <div class="col-sm-80">
                    <ul class="text-center">
                        <li><a href="http://stocksreally.com/index.php/about">About site</a></li>
                        <li><a href="https://www.facebook.com/people/Kaeman-Jenkins/100014723980791">Like Us on FB</a></li>
                        <li><a href="https://twitter.com/Stocksreally">Follow Us on Twitter</a></li>
                        <li><a href="http://stocksreally.com/index.php/contactus">Contact</a></li>
                        <li><a href="http://stocksreally.com/index.php/welcome/privacy">Privacy</a></li>
                        <li><a href="http://stocksreally.com/index.php/welcome/terms">Terms</a></li>
                    </ul>
                </div>-->
        <div class="col-sm-80 text-center"> <small> augurs.in is a property of The Calendar, LLC. &nbsp;&nbsp; All Rights Reserved
          <?=date("Y");?>
          &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=base_url()?>/index.php/privacy">Privacy</a>&nbsp;&nbsp;<a href="<?=base_url()?>/index.php/terms">Terms</a></small> </div>
      </div>
    </div>
  </footer>
  <!--/#footer--> 
</div>
<div class="modal-ax"></div>
<script src="<?=base_url()?>assets/js/jquery.js"></script> 
<script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script> 
<script src="<?=base_url()?>assets/js/jquery.prettyPhoto.js"></script> 
<script src="<?=base_url()?>assets/js/jquery.isotope.min.js"></script> 
<script src="<?=base_url()?>assets/plugins/jqueryValidate/dist/jquery.validate.min.js"></script> 
<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script> 
<script src="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.js"></script> 
<script src="<?=base_url()?>assets/plugins/sweetAlert/dist/sweetalert.min.js"></script> 
<script src="<?=base_url()?>assets/plugins/chartjs/Chart.min.js"></script> 
<script src="<?=base_url()?>assets/js/main.js"></script> 
<script src="<?=base_url()?>assets/js/wow.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script> 

<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>-->
<?php if($title==="Home"){?>
<?php }?>
<script src="<?=base_url()?>assets/js/chart-demo.js"></script> 
<script src="<?=base_url()?>assets/js/custom.js"></script>
<?php if($this->session->flashdata('error'))
                {?>
<script type="text/javascript">
  swal('Error Message',"<?=$this->session->flashdata('error')?>",'error');
  </script>
<?php }
                 if($this->session->flashdata('success'))
                {?>
<script type="text/javascript">
  swal('Success Message',"<?=$this->session->flashdata('success')?>",'success');
  </script>
<?php }?>
</body></html>