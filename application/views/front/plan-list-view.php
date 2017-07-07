<?php include_once 'header.php';?>
<link href="<?=base_url()?>assets/css/plan.css" rel="stylesheet">

<section class="pricing-page">
  <div class="container">
    <div class="center wow fadeInDown">
      <h2>Plan List </h2>
    </div>
    <section id="pricePlans">
      <ul id="plans">
      <?php $TITLE=array('bestPlanTitle','');
	$subtitle=array('bestPlanPrice','');
	$counter=0;
	foreach($plans as $plan){
		$subpricenumber=array_rand($TITLE);
	?>
        <li class="plan">
          <ul class="planContainer">
            <li class="title">
              <h2 class="<?php echo $TITLE[$subpricenumber];?>"><?php echo $plan->title?></h2>
            </li>
            <li class="price">
              <p class="<?php echo $subtitle[$subpricenumber];?>"><?php echo floor($plan->price_monthly)?>/<?php echo ($subpricenumber==0)?'month':'<span>month</span>'?></p>
            </li>
            <li>
             <?php echo html_entity_decode($plan->description)?>
            </li>
            <li class="button"><a href="<?=site_url('register?pid='.$plan->id)?>">Purchase</a></li>
            <?php if($plan->trail){?>
           <li class="button"><a class="bestPlanButton" href="<?=site_url('register?pid='.$plan->id.'&trial=true')?>">Trial</a></li>
           <?php } ?>
          </ul>
        </li>
      <?php $counter++;
	  	if($counter==4){
			$counter=0;
			echo '</ul><ul id="plans">';
		  }
		}?>        
      </ul>      
    </section>
   
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
