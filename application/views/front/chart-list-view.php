<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">  
	
	<!-- core CSS -->
    <link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
</head>
<body class="homepage">
  <section>
<div class="container">
  
<div class="center"> 
  <table class="table table-bordered">
  <tr>
    <th>#</th>
    <th>Title</th>
    <th>Type</th>
  </tr>
  <?php foreach($charts as $chart){?>
  <tr>
    <td></td>
    <td><?=$chart->title?></td>
    <td><?=$chart->chartType?></td>
  </tr>
  <?php }?>
</table>
</div>
</div>
  </section>
</body>
</html>

