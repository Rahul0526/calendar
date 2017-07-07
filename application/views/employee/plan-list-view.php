<?php include_once 'header.php';?>
<link href="<?=base_url()?>assets/css/plan.css" rel="stylesheet">
<section> </section>
<section class="pricing-page">
  <div class="container">
    <div class="center wow fadeInDown">
      <h2>Plan List </h2>
    </div>
    <?php $class=array('basic','standard','ultimate');
	
	
	foreach($plans as $plan){
	?>
    
    <div class="whole">
      <div class="type <?php echo $class[array_rand($class)];?>">
        <p><?php echo $plan->title?></p>
      </div>
      <div class="plan">
        <div class="header"> <span>$</span><?php echo floor($plan->price_monthly)?><sup><?php echo $plan->price_monthly-floor($plan->price_monthly)?></sup>
          <p class="month">per month</p>
        </div>
        <div class="header"> <span>$</span><?php echo floor($plan->price_yearly)?><sup><?php echo $plan->price_yearly-floor($plan->price_yearly)?></sup>
          <p class="month">per year</p>
        </div>
        <div class="content">
          <ul>
            <li><?php echo $plan->description?></li>            
          </ul>
        </div>
        <div class="price"> <a href="<?=site_url('register?pid='.$plan->id)?>" class="bottom">
          <p class="cart">Add to cart</p>
          </a> </div>
      </div>
    </div>
    <?php }?>
    
    
    
  </div>
</section>
<script>
  $('.header').click(function(){
  
  var $this = $(this);
  $this.closest(".whole").find(".content").slideToggle();
  
  
});

$("input").on("mouseenter",function(){
  event.preventDefault();
  
  $(this).animate(
    
    {opacity:1}
  
  
  );

});

$(".whole").on("click","a",function(){
  event.preventDefault();
  $(".plan").removeClass("selected");
  $(this).closest(".whole").find(".plan").addClass("selected");


});
</script>
<?php include_once 'footer.php';?>
