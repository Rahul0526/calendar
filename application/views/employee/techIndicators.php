<?php include_once 'header.php'; ?>

<section id="tech-us">
  <div class="container">
    <div class="center wow fadeInDown">
      <h2>
        <?= $page->title ?>
      </h2>
    </div>
    <p class="lead">
      <?= htmlspecialchars_decode($page->content) ?>
    </p>
  </div>

  <!--/.container--> 
</section>
<!--/techIndicators-->
<?php include_once 'footer.php'; ?>
